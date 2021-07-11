<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dispenser extends CI_Controller {



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

        $data['header'] = $this->load->view('dispen/header', $data, TRUE);

        $data['footer'] = $this->load->view('dispen/footer', $data, TRUE);

        $data['services'] = $this->User_model->get_service();

		$this->load->view('dispen/home',$data);

    }

    public function get_token(){

        $_SESSION['user']['name'] = $this->input->post("name"); //Get User's name from the form

        $_SESSION['user']['phone'] = $this->input->post("phone"); //Get User's email from the form

        $_SESSION['user']['service_id'] = $this->input->post("service"); //Get User's seleted service id 

        $datetime = date("Y/m/d H:i");

        //echo $datetime;



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

        //echo sizeof($queues);

        /**

         * Running a loop to find out next available time for a shedule job

         */

        while($index<sizeof($queues)){

            //echo $datetime . " " . $index;

            $startdate = new DateTime($queues[$index]->starttime); //Start time of an existing queue entry

            $endDate = new DateTime($queues[$index]->endtime); //End time of an existing queue entry.

            //echo $queues[$index]->starttime." ".$queues[$index]->endtime . " ".$expectDate->format('Y/m/d H:i:s');

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

                                $add2 = new DateInterval('PT5M'); //Adding 1 min extra time to the expected time to check weather get a free time or not

                                $expectDate->add($add2); // Adding method

                                $expectDatetoend->add($add2);

                                $datetime =  $expectDate->format('Y/m/d H:i:s');

                                $_SESSION['user']['starttime'] = $datetime;

                                

                                $_SESSION['user']['endtime'] = $expectDatetoend->format('Y/m/d H:i:s');

                                $time = new DateTime($datetime);

                                $time = $time->format('H:i:s');

                                //echo "Expected Date: ".$expectDate->format("Y/M/D H:i:s")."  Counter:".$counter_no;

                                $_SESSION['counter']['time'] = $time;

                                redirect(base_url()."Dispenser/confirm_token","refresh");

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

            if($flag){

                $expectDate->sub($interval);

                $expectDatetoend->sub($interval);

            }

            //echo $datetime;

            $add2 = new DateInterval('PT5M'); //Adding 1 min extra time to the expected time to check weather get a free time or not

            $expectDate->add($add2); // Adding method

            $expectDatetoend->add($add2);

            $datetime =  $expectDate->format('Y/m/d H:i:s');

            $_SESSION['user']['starttime'] = $datetime;

            // $services = $this->User_model->get_service_single($_SESSION['user']['service_id']);

            // $interval = new DateInterval('PT'.$services[0]->duration."M");

            // $expectDate->add($interval);

            $_SESSION['user']['endtime'] = $expectDatetoend->format('Y/m/d H:i:s');

            $time = new DateTime($datetime);

            $time = $time->format('H:i:s');

            $_SESSION['counter']['time'] = $time;

            redirect(base_url()."Dispenser/confirm_token","refresh");;





    }

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

            $this->load->view('dispen/token_confirm',$data);

        }else{

            redirect(base_url());

        }

        

    }

    public function confirm_token_data(){

        if(isset($_SESSION['user'])){

            $temp['submit'] = $this->input->post("submit"); //Get Date

            if($temp['submit'] =="Confirm"){

                $data2['name'] = $_SESSION['user']['name'];

                $data['email'] = "uqueue.2219@gmail.com";

                $data['service_id'] = $_SESSION['user']['service_id'];

                $data['starttime'] = $_SESSION['user']['starttime'];

                $_SESSION['token']['time'] = $data['starttime'];

                $data['pin'] = substr(md5(NOW()."uqueue.2219@gmail.com"),0,4);

                $data['token_no'] = substr(md5("uqueue.2219@gmail.com".NOW()),0,4);

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



                redirect(base_url()."Dispenser/token_page","refresh");

                //echo $data['token_no']." ".$data['pin']." ".$data['starttime'];





            }else{

                redirect(base_url());

            }

        }else{

            redirect(base_url());

        }

    }

    public function token_page()

	{

        if(isset($_SESSION['user'])){

            $data['baseurl'] = $this->config->item('base_url');

            $data['header'] = $this->load->view('user/header', $data, TRUE);

            $data['footer'] = $this->load->view('user/footer', $data, TRUE);

            $data['time'] = $_SESSION['token']['time'];

            $data['token'] =$_SESSION['token']['token'];

            $data['counter'] = $_SESSION['token']['counter'];

            $this->load->view('dispen/token',$data);

            $this->session->sess_destroy();

        }else{

            redirect(base_url());

        }

    }

}