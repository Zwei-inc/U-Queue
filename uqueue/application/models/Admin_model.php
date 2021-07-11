<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


    /*
    This Model is responsible for handling all the database query request of user side
    */

class Admin_model extends CI_Model {

   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


   public function create_counter($sdc){
        $this->db->insert("counter",$sdc);
    }
	

    /* 
        This method is for view_queue list from the database
    */
    public function view_queue(){
        $this->db->select("*");
        $this->db->from("queue");
        $query = $this->db->get();
        return $query->result();
    }
    public function check_admin($em,$pass){
		$array = array('email =' => $em, 'password =' => $pass);
        $this->db->select("*");
        $this->db->from("admin");
		$this->db->where($array);
        $query = $this->db->get();
        return $query->result();
    }
    public function view_counters(){
        $this->db->select("*");
        $this->db->from("counter");
        $query = $this->db->get();
        return $query->result();
    }
    /* 
        This method is for getting single counter from the database
    */
    public function get_counter_single($id){
        $this->db->select("*");
        $this->db->from("counter");
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->result();
    }

    /* 
        This method is for getting single queue from the database
    */
    public function get_queue_single($token){
        $this->db->select("*");
        $this->db->from("queue");
        $this->db->where("token_no",$token);
        $query = $this->db->get();
        return $query->result();
    }
    /* 
        This method is for getting single user from the database
    */
    public function get_user_single($email){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email",$email);
        $query = $this->db->get();
        return $query->result();
    }

    /*
        this method is for getting active counters
    */
    public function get_active_counter(){
        $this->db->select("*");
        $this->db->from("counter");
        $this->db->where("status","Active");
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * This Method is for getting queue with date and time
     */
    public function get_queue(){
        $this->db->select("*");
        $this->db->from("queue");
        $this->db->order_by('starttime','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 
     * This method is for inserting a service into the database
     */
    public function insert_service_data($data){
        $this->db->insert("service_type",$data);
    }
    /**
     * 
     * This method is for inserting a counter into the database
     */
    public function insert_counter_data($data){
        $this->db->insert("counter",$data);
    }

}

?>