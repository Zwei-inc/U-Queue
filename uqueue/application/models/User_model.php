<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


    /*
    This Model is responsible for handling all the database query request of user side
    */

class User_model extends CI_Model {

   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* 
        This method is for getting service list from the database
    */
    public function get_service(){
        $this->db->select("*");
        $this->db->from("service_type");
        $query = $this->db->get();
        return $query->result();
    }

    /* 
        This method is for getting single service  from the database
    */
    public function get_service_single($id){
        $this->db->select("*");
        $this->db->from("service_type");
        $this->db->where("id",$id);
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
    public function get_queue($time){
        $this->db->select("*");
        $this->db->from("queue");
        $this->db->where("endtime >=" , $time);
        $this->db->order_by('starttime','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 
     * This method is for inserting a queue into the database
     */
    public function insert_queue_data($data){
        $this->db->insert("queue",$data);
    }
    /**
     * 
     * This method is for inserting a user into the database
     */
    public function insert_user_data($data){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email",$data['email']);
        $query = $this->db->get();
        $res = $query->result();
        foreach($res as $r){
            return;
        }
        $this->db->insert("user",$data);
    }

    /**
     * 
     * This method is for checking how many counter is busy in given time slot
     */
    public function check_busy_counter($startDate,$endDate){
        $this->db->distinct();
        $this->db->select("counter_id");
        $this->db->from("queue");
        $this->db->where("starttime >=",$startDate->format('Y/m/d H:i:s'));
        $this->db->where("starttime <=",$endDate->format('Y/m/d H:i:s'));
        $query = $this->db->get();
        return $query->result();
    }

}

?>