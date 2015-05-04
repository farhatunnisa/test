<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Signin_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    
    
    /**
    * processLogin
    *
    * @access 	public
    */
    public function processLogin($username, $password) {
        $pass = $password."@Si9#ri";
        $this->db->select('userId, primaryEmail, password');
        $this->db->from('schooladmit_users');
        $this->db->where('primaryEmail', $username);
        $this->db->where('password', MD5($pass));
        $this->db->limit(1);		
        $query = $this->db->get();		
        if($query->num_rows() == 1) {
            return $query->result();
        }
        else {
            return false;
        }
    }
    
    
}
?>