<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Forgetpassword_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * news letter email check
     * @param type $data
     */
    public function checkEmail($data){
        $result = $this->db->findAll('SELECT email FROM '.DB_PREFIX.'members WHERE email = "'.$data['email'].'" ');
        return $result;
    }/**
     * courselist()
     * @return type
     */
	public function courselist() {
        $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE status = 1 LIMIT 0,8 " ;
       return $this->db->findAll($sql);
    }
     public function testmonialslist(){
		 $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' " ;
		 return  $this->db->findAll($sql);
	}
    
    /**
     * getUserDetails()
     * get user details
     * @param post $data
     * @access public
     * @return array 
     */
    public function getUserDetails($email){
		 return $this->db->find("SELECT * FROM ".DB_PREFIX."members WHERE email = '".$email."' ");
    }
    
    /**
     * updateForgotPassword
     * update the password field
     * @param array $data
     * @param int $userId
     * @access public
     * @return type Description
     */
    public function updateForgotPassword($value,$userId){
		return $this->db->update(DB_PREFIX."members",$value,"`member_id` = ".$userId." ");
	}
}
?>