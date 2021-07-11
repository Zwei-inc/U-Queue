<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
This Class is responsible for handling all user interection
*/


class User extends CI_Controller {


    public $data = array();
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->helper('date');
    	$this->load->library('email');
	}
    /*
        This method is responsible for opening the homepage to the user view
    */
    public function index()
	{
        $data['baseurl'] = $this->config->item('base_url');
        $data['header'] = $this->load->view('user/header', $data, TRUE);
        $data['footer'] = $this->load->view('user/footer', $data, TRUE);
        $data['services'] = $this->User_model->get_service();
		$this->load->view('user/home',$data);
    }


    /*  
        This method is responsible for receving post data,
        from the home page get token form
    */
    public function get_token_data(){
        $_SESSION['user']['name'] = $this->input->post("fname"); //Get User's name from the form
        $_SESSION['user']['email'] = $this->input->post("email"); //Get User's email from the form
        $_SESSION['user']['service_id'] = $this->input->post("service"); //Get User's seleted service id 
        $date = $this->input->post("date"); //Get time
        $time = $this->input->post("time"); //Get Date
        $datetime = $date." ".$time;

        $queues = $this->User_model->get_queue($datetime); //Getting existing queue
        $counters = $this->User_model->get_active_counter(); //getting all counters
        $counter_count=0;
        foreach($counters as $c){
            $counter_count++; //counting total counter 
        }
        $counter_no = null;
        $index=0;
        $flag = false;
        $expectDate = new DateTime($datetime); // Users expected datetime convert from string into datetime
        $expectDatetoend = new DateTime($datetime);
        $services = $this->User_model->get_service_single($_SESSION['user']['service_id']);
        $interval1 = new DateInterval('PT'.$services[0]->duration."M");
        $expectDatetoend->add($interval1);

        /**
         * Running a loop to find out next available time for a shedule job
         */
        while($index<sizeof($queues)){
            $startdate = new DateTime($queues[$index]->starttime); //Start time of an existing queue entry
            $endDate = new DateTime($queues[$index]->endtime); //End time of an existing queue entry.
            
            if($startdate<=$expectDate && $expectDate<=$endDate){
                //echo $startdate->format('Y/m/d H:i:s')." ".$endDate->format('Y/m/d H:i:s');
                $count = $this->User_model->check_busy_counter($startdate,$endDate);
                //echo "Counter ".$counter_count." ".sizeof($count)."\n";
                /**
                 * Adding extra time when no counter is free on the given time slot
                 */
                if(sizeof($count)==$counter_count){
                    $interval = new DateInterval('PT5M'); //Adding 1 min extra time to the expected time to check weather get a free time or not
                    $expectDate->add($interval); // Adding method
                    $expectDatetoend->add($interval);
                    $flag = true;
                }else{
                    foreach($count as $cc){
                        /**
                         * Checking weather there is any free counter on the given time slot or not
                         */
                        foreach($counters as $c){
                            if($c->id != $cc->counter_id){
                                $counter_no = $c->id;
                                $_SESSION['user']['counter_id'] = $counter_no;
                                $_SESSION['user']['counter_no'] = $c->counter_no;
                                if($flag){
                                    $expectDate->sub($interval); //Class e change
                                    $expectDatetoend->sub($interval);
                                }
                                $datetime =  $expectDate->format('Y/m/d H:i:s');
                                $_SESSION['user']['starttime'] = $datetime;
                                
                                $_SESSION['user']['endtime'] = $expectDatetoend->format('Y/m/d H:i:s');
                                $time = new DateTime($datetime);
                                $time = $time->format('H:i:s');
                                //echo "Expected Date: ".$expectDate->format("Y/M/D H:i:s")."  Counter:".$counter_no;
                                $_SESSION['counter']['time'] = $time;
                                redirect(base_url()."user/confirm_token","refresh");
                            }
                        }
                    }
                    $index++;
                    continue;
                }
            }else{
                $index++;
            } 
        }

        /**
         * If there is no time conflict just put the time into as it is
         */
        if($flag){
            $expectDate->sub($interval);
            $expectDatetoend->sub($interval);
        }
        $datetime =  $expectDate->format('Y/m/d H:i:s');
        $_SESSION['user']['starttime'] = $datetime;
        // $services = $this->User_model->get_service_single($_SESSION['user']['service_id']);
        // $interval = new DateInterval('PT'.$services[0]->duration."M");
        // $expectDate->add($interval);
        $_SESSION['user']['endtime'] = $expectDatetoend->format('Y/m/d H:i:s');
        $time = new DateTime($datetime);
        $time = $time->format('H:i:s');
        $_SESSION['counter']['time'] = $time;
        redirect(base_url()."user/confirm_token","refresh");;
    }
    

    /*
        This method is responsible for opening the confirm_token_time_page to the user view
    */
    public function confirm_token()
	{
        if(isset($_SESSION['user'])){
            $data['baseurl'] = $this->config->item('base_url');
            $data['header'] = $this->load->view('user/header', $data, TRUE);
            $data['footer'] = $this->load->view('user/footer', $data, TRUE);
            $data['services'] = $this->User_model->get_service();
            $data['time'] = $_SESSION['counter']['time'];
            if(isset($_SESSION['user']['counter_id'])){
                $counters = $this->User_model->get_counter_single($_SESSION['user']['counter_id']);
                $data['counter'] = $counters[0]->counter_no;
            }else{
                $counters = $this->User_model->get_active_counter();
                $data['counter'] = $counters[0]->counter_no;
            }
            $this->load->view('user/token_confirm',$data);
        }else{
            redirect(base_url());
        }
        
    }

    /*
        This method is responsible for opening the token_page to the user view
    */
    public function token_page()
	{
        if(isset($_SESSION['user'])){
            $data['baseurl'] = $this->config->item('base_url');
            $data['header'] = $this->load->view('user/header', $data, TRUE);
            $data['footer'] = $this->load->view('user/footer', $data, TRUE);
            $data['time'] = $_SESSION['token']['time'];
            $data['token'] =$_SESSION['token']['token'];
            $data['counter'] = $_SESSION['token']['counter'];
            $data['email'] = $_SESSION['email']['send'];
            $this->load->view('user/token',$data);
            $this->session->sess_destroy();
        }else{
            redirect(base_url());
        }
    }

    /*
        This method is responsible for handleing confirm token process
    */

    public function confirm_token_data(){
        if(isset($_SESSION['user'])){
            $temp['submit'] = $this->input->post("submit"); //Get Date
            if($temp['submit'] =="Confirm"){
                $data2['name'] = $_SESSION['user']['name'];
                $data['email'] = $_SESSION['user']['email'];
                $data['service_id'] = $_SESSION['user']['service_id'];
                $data['starttime'] = $_SESSION['user']['starttime'];
                $_SESSION['token']['time'] = $data['starttime'];
                $data['pin'] = substr(md5(NOW().$_SESSION['user']['email']),0,4);
                $data['token_no'] = substr(md5($_SESSION['user']['email'].NOW()),0,4);
                $_SESSION['token']['token'] = $data['token_no'];
                $data['endtime'] = $_SESSION['user']['endtime'];
                if(isset($_SESSION['user']['counter_id'])){
                    $data['counter_id'] = $_SESSION['user']['counter_id'];
                    $counters = $this->User_model->get_counter_single($data['counter_id']);
                    $_SESSION['token']['counter'] = $counters[0]->counter_no;
                }else{
                    $counters = $this->User_model->get_active_counter();
                    $data['counter_id'] = $counters[0]->id;
                    $_SESSION['token']['counter'] = $counters[0]->counter_no;
                }
                $data2['email'] = $data['email'];
                $this->User_model->insert_user_data($data2);
                $this->User_model->insert_queue_data($data);

                $msg = "Dear ".$data2['name'].
                "<br><br><b>This is your appointed time:&nbsp;</b>".$data['starttime'].
                "<br><b>This is your token no:&nbsp;</b>".$data['token_no'].
                "<br><b>This Your pin:&nbsp;</b>".$data['pin'].
                "<br><br><h3><i>Thank You For Using Our Service</i></h3>".
                "<h4>Team UQUEUE</h4>";
                $subject = "Your Token Details and pin";

                $_SESSION['email']['send'] = $this->sendEmail($data2['email'],$subject,$msg);

                redirect(base_url()."user/token_page","refresh");
                //echo $data['token_no']." ".$data['pin']." ".$data['starttime'];


            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }


    /**
     * 
     * This method is for showing the search details to the user about his her assigned token...
     * 
     */
    public function search(){
        $token = $this->input->post('token');
        $queue = $this->User_model->get_queue_single($token);
        if(sizeof($queue)!=0){
            $user = $this->User_model->get_user_single($queue[0]->email);
            $service = $this->User_model->get_service_single($queue[0]->service_id);
            $counter = $this->User_model->get_counter_single($queue[0]->counter_id);
            $data['baseurl'] = $this->config->item('base_url');
            $data['header'] = $this->load->view('user/header', $data, TRUE);
            $data['footer'] = $this->load->view('user/footer', $data, TRUE);
            $data['name'] = $user[0]->name;
            $data['service'] = $service[0]->name;
            $data['token'] = $queue[0]->token_no;
            $data['time'] = $queue[0]->starttime;
            $data['counter'] = $counter[0]->counter_no;
            $this->load->view('user/search',$data);
        }else{
            $_SESSION['error'] = "Wrong Token No.Please try again with valid token no";
            redirect(base_url());
        }

        

    }

    /**
     * 
     * This method is for sending email to specific email address...
     */
    public function sendEmail($to, $subject, $message) {
    
        $this->load->library('email');
        $this->email->from('uqueue.2219@gmail.com', 'U-Queue');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
        
    }







    // Test Functions not related to any thing meaningful
    public function test(){
         //$date = new DateTime();
         //echo $date;
         $queues = $this->User_model->get_queue('2020/05/16 22:25'); //Getting existing queue
         echo sizeof($queues);
        // $interval = new DateInterval('PT10M');

        // $date->add($interval);
        // echo $date->format('Y-m-d H:i:s') . "\n";

        // $date->add($interval);
        // echo $date->format('Y-m-d H-i:s') . "\n";

        // echo NOW();
        
        // $response = file_get_contents('https://api.covid19api.com/countries');
        // $obj = json_decode($response);
        
        // foreach($obj as $key => $value){
        //     foreach($value as $key => $value){
        //         if($key =="Provinces"){
        //             foreach($value as $v){
        //                 echo "Provinces".$v."\n";
        //             }
        //         }else{
        //             echo "$key : $value \n";
        //         }
        //     }
        // }
        
    }
	public function get_token_data_test(){
        $data['submit'] = $this->input->post("submit"); //Get Date
        echo $data['submit'] . " ".$_SESSION['user']['datetime'];
        //$this->confirm_token();
    }
}