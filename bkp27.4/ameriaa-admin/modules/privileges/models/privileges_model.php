<?php
/**
 * Manage privileges model
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class privileges_model extends Model {
    /**
     * This is priviliages model constructor
     */
    public function __construct() {
        parent::__construct();        
    }
    
    /**
    * @return array
    */
    public function getAdminRoles() {
        return $this->db->findAll("SELECT * FROM sg_adminroles WHERE adminrole_status = 'y'");
    }
    
    /**
     * 
     * @return array
     */

    public function getModules() {
        return $this->db->findAll("SELECT * FROM sg_modules WHERE module_status = 'y'"); 
    }
    /**
     * 
     * @param integer $id
     * @return array
     */
    public function getRolePermissions($id) {
        
        $result = $this->db->find('SELECT * FROM sg_userpermissions WHERE 
            adminrole_id = :adminrole_id', array(':adminrole_id' => $id));
       return $result;
        
    }
    /**
     * 
     * @param array $data
     * @return boolean
     */
    public function insertPermissionsData($data) {
        
        $res = $this->db->insert('sg_userpermissions', $data);
        if($res) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param array $data
     * @param integer $id
     * @return boolean
     */
    public function updatePermissionsData($data, $id) {        
        $result = $this->db->update('sg_userpermissions', $data, "`adminrole_id` = $id");
        if($result) {
            return true;
        } else {
            return false;    
        }
    }
    
    /**
    * processPrivilegesAdd()
    * 
    * save admin roles in database
    * 
    * @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
    * @access public
    * @param array $data Form post data
    * @return int return last insert id
    */
    public function processPrivilegesAdd($data) {
        $dataIn = array();
        $dataIn['adminrole_name'] = $data['title'];
        $dataIn['adminrole_desc'] = $data['short_desc'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['adminrole_status'] = $data['status'];
        $this->db->insert('sg_adminroles', $dataIn);
        return $this->db->lastInsertId();
    }
    
    /**
    * processGetAdminRolesById
    * 
    * retrive AdminRoles info by id
    * 
    * @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
    * @access   public
    * @param    int     $id adminroles id
    * @return   array   adminroles array
    */
    public function processGetAdminRolesById($id) {
        return $this->db->find('SELECT * FROM sg_adminroles WHERE adminrole_id = :adminrole_id', array(':adminrole_id' => $id));      
    }
    
    /**
    * processPrivilegesUpdate
    * 
    * save AdminRoles details in database
    * 
    * @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
    * @access   public
    * @param    array   $data AdminRoles post data
    * @return   boolean true/false
    */
    public function processPrivilegesUpdate($data){
        $dataIn = array();
        $dataIn['adminrole_name'] = $data['title'];
        $dataIn['adminrole_desc'] = $data['short_desc'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['adminrole_status'] = $data['status'];        
        $id = $data['adminrole_id'];
        
        $this->db->update('sg_adminroles', $dataIn, "`adminrole_id` = $id");
        return true; 
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processPrivilegesDelete($id) {
        $this->db->deleteAll('sg_adminroles', "adminrole_id", $id);
        return true;
    }
    
}
?>
