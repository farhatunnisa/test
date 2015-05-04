<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class login_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * loginSubmit
     * submit login detials
     * @param array $data
     * @access public
     * @return boolean
     */
    public function loginSubmit($data) {
        //print_r($data); //exit;
        $username = $data['email'];
        $password = $this->PassHash($data['password']);
        $result = $this->db->find("SELECT * FROM `".DB_PREFIX."members` "
                                   . "\n WHERE `email` = '$username' "
                                   . "\n AND `password` = '$password' "
                                   . "\n AND `status` = 1");  
                           //echo "<pre>"; print_r($result); exit;
        if($result) {           
            $this->session->sets('ameriaa_user_id', $result['member_id']);
            $this->session->sets('user_name', $result['first_name']);           
            $this->session->sets('image', $result['image']);           
            $this->session->sets('logged_time', date("H:i"));
            $this->session->sets('login', true);            
           return true;
       } else {
           return false;
       }
    }
   
}
?>