<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_model extends Model {
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
        $username = $data['username'];
        $password = $this->PassHash($data['password']);
        $result = $this->db->find("SELECT * FROM `".DB_PREFIX."adminusers` "
                                   . "\n WHERE `email` = '$username' "
                                   . "\n AND `password` = '$password' "
                                   . "\n AND `active` = 'y'");  
        if($result) {           
           $this->processAccess($result['userlevel']);           
           $this->session->sets('adminuser_id', $result['adminuser_id']);
           $this->session->sets('adminuser_name', $result['username']);
           $this->session->sets('userlevel', $result['userlevel']);           
           if(empty($result['avatar'])){
                $this->session->sets('adminuser_avatar', "blank.png"); 
           } else {
                $this->session->sets('adminuser_avatar', $result['avatar']);                
           }
           $this->session->sets('logged_time', date("H:i"));
           $this->session->sets('login', true);            
           return true;
       } else {
           return false;
       }
    }
    
    /**
     * processAccess()
     * get the permissions
     * @param integer $adminRoleId
     * @access public
     * @return array
     */
    public function processAccess($adminRoleId) {
        $result = $this->db->find('SELECT * FROM '.DB_PREFIX.'userpermissions WHERE  adminrole_id = :adminrole_id', array(':adminrole_id' => $adminRoleId));
        $permissionsArray = array();
        foreach ($result as $key => $value) {
            $permissionsArray[$key] = explode(",", $value);
        }
        $this->session->sets('permissions', $permissionsArray);
    }
}
?>