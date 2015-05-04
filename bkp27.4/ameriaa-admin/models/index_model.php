<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class index_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * getUserDetails()
     * get user details
     * @param post $data
     * @access public
     * @return array 
     */
    public function getUserDetails($email){
        return $this->db->find("SELECT * FROM ".DB_PREFIX."adminusers WHERE email = '".$email."' ");
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
        return $this->db->update(DB_PREFIX."adminusers",$value,"`adminuser_id` = ".$userId." ");
    }
    
    /**
     * getCountries()
     * get all countries
     */
    public function getCountries() {
        $sql = "CALL ".DB_PREFIX."get_countries_prc()";
        $res = $this->db->findAll($sql);
        return $res;
    }
}
?>
