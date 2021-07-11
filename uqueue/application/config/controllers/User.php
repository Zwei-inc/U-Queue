<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
This Class is responsible for handling all user interection
*/


class User extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url',);
    	 $this->load->library('email');
	}

    /*This method is responsible for opening the homepage to the user view*/
    public function homePage()
	{
        $data["base_url"] = $this->config->item("base_url");
        $data['header'] = $this->load->view('user/header', $data, TRUE);
		$data['footer'] = $this->load->view('user/footer', $data, TRUE);
		$this->load->view('user/home',$data,true);
    }
    

    public function test(){
        echo "ami aisi";
    }
	
}