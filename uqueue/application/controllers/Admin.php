<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
This Class is responsible for handling all user interection
*/


class Admin extends CI_Controller {


    public $data = array();
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
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
        $data['header'] = $this->load->view('admin/header', $data, TRUE);
        $data['footer'] = $this->load->view('admin/footer', $data, TRUE);
		$this->load->view('admin/login',$data);
    }
	public function admin_login(){
		$_SESSION['admin']['email'] = $this->input->post("em"); //Get admin's enail from the form
		$em = $this->input->post("em"); //Get time
		$pass = $this->input->post("pass"); //Get Date

		$data['admin'] = $this->Admin_model->check_admin($em,$pass);
		if(count($data['admin'])>0 && isset($_SESSION['admin']['email'])){
			$_SESSION['admin']['email'] = $this->input->post("em"); //Get admin's enail from the form
			$data['baseurl'] = $this->config->item('base_url');
			$data['header'] = $this->load->view('admin/header', $data, TRUE);
			$data['footer'] = $this->load->view('admin/footer', $data, TRUE);
			$data['counters'] = $this->Admin_model->view_counters();
			$this->load->view('admin/home',$data);
		}else{
			$data['baseurl'] = $this->config->item('base_url');
			header('Location: '.$data['baseurl']."index.php/admin/index");
		}
		
	}
	public function admin_logout(){
		$_SESSION['admin']['email'] = "";
		$data['baseurl'] = $this->config->item('base_url');
		header('Location: '.$data['baseurl']."index.php/admin/index");
	}
	public function create($something){
		if($something=="counter"){
			$sdc = $this->input->post("sdc");
			$c_num = $this->input->post("counternum");
			$data_2 = array(
				"id" => "",
				"counter_no" => $c_num,
				"total_served" => "",
				"start_time" => "",
				"end_time" => "",
				"status" => "Active",
				"sdc" => $sdc
				
			);
			
            $this->Admin_model->create_counter($data_2);
			$data['baseurl'] = $this->config->item('base_url');
			header('Location: '.$data['baseurl']."index.php/admin/show_admin_board");
		}
		if($something=="service"){
			$s_type = $this->input->post("servicetype");
			$s_detail = $this->input->post("servicdetails");
			$data_3 = array(
				"id" => "",
				"name" => $s_type,
				"duration" => "5",
				"details" => $s_detail,
				
			);
			
            $this->Admin_model->create_service($data_3);
			$data['baseurl'] = $this->config->item('base_url');
			header('Location: '.$data['baseurl']."index.php/admin/show_admin_board");
		}
	}
	public function show_admin_board(){
			if(isset($_SESSION['admin']['email'])){
				$data['baseurl'] = $this->config->item('base_url');
				$data['header'] = $this->load->view('admin/header', $data, TRUE);
				$data['footer'] = $this->load->view('admin/footer', $data, TRUE);
				$data['counters'] = $this->Admin_model->view_counters();
				$this->load->view('admin/home',$data);
			}else{
				$data['baseurl'] = $this->config->item('base_url');
				header('Location: '.$data['baseurl']."index.php/admin/index");
			}
	}
	public function show_queue(){
			if(isset($_SESSION['admin']['email'])){
				$data['baseurl'] = $this->config->item('base_url');
				$data['header'] = $this->load->view('admin/header', $data, TRUE);
				$data['queue'] = $this->Admin_model->view_queue();
				$this->load->view('admin/queue',$data);
			}else{
				$data['baseurl'] = $this->config->item('base_url');
				header('Location: '.$data['baseurl']."index.php/admin/index");
			}
	}
	public function show_services(){
			if(isset($_SESSION['admin']['email'])){
				$data['baseurl'] = $this->config->item('base_url');
				$data['header'] = $this->load->view('admin/header', $data, TRUE);
				$data['services'] = $this->Admin_model->view_services();
				$this->load->view('admin/services',$data);
			}else{
				$data['baseurl'] = $this->config->item('base_url');
				header('Location: '.$data['baseurl']."index.php/admin/index");
			}
	}
	public function show_report(){
			if(isset($_SESSION['admin']['email'])){
				$data['baseurl'] = $this->config->item('base_url');
				$data['header'] = $this->load->view('admin/header', $data, TRUE);
				$data['report'] = $this->Admin_model->view_report();
				$this->load->view('admin/report',$data);
			}else{
				$data['baseurl'] = $this->config->item('base_url');
				header('Location: '.$data['baseurl']."index.php/admin/index");
			}
	}
}