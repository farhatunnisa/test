<?php
/**
* User_Model
* 
* This is news model in News Module 
* 
* PHP version 5
* 
* @category   User_Model
* @package    User
* @author     yuvakumar anusuri <yuva.kumar@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class User_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
   /**
    * getUserDetails
    * 
    * get all admin user details
    * 
    * @access public
    */
    public function getUserDetails() {
        return $this->db->findAll('SELECT * FROM sg_adminusers au,sg_adminroles ar WHERE au.userlevel = ar.adminrole_id');
    }
    
   /**
    * getUserRoles
    * 
    * get all admin user details
    * 
    * @access public
    */
    public function getUserRoles() {
        return $this->db->findAll('SELECT * FROM sg_adminroles');
    }
    
    /**
     * emailAvailability()
     * @param post $data
     * @access public
     * @return type
     */
    public function EmailAvailability($data) {
       if(isset($data['user_id'])){
           $sql = "SELECT email FROM ".DB_PREFIX."adminusers WHERE email = '".$data['email']."' AND adminuser_id != '".$data['user_id']."' ";
       } else {
           $sql = "SELECT email FROM ".DB_PREFIX."adminusers WHERE email = '".$data['email']."' ";
       }
        $result = $this->db->findAll($sql);
        return $result;
    }
    
    /**
     * processUser
     * add users details
     * @access public
     * @return type Description
     */
    public function processUser($data){
        $dataIn = array();
        $dataIn['username']  = $data['username'];
        $dataIn['password']  = $this->PassHash($data['password']);
        $dataIn['email']     =  $data['email'];
        $dataIn['fname']     = $data['fname'];
        $dataIn['lname']     = $data['lname'];
        $dataIn['userlevel'] = $data['userlevel'];
        $dataIn['avatar']    = $data['avatar'];
        $dataIn['active']    = $data['userstatus'];        
        $this->db->insert(DB_PREFIX.'adminusers', $dataIn);
        return $this->db->lastInsertId();
    }
    
    /**
    * getSingleUserDetails
    * 
    * Get Single user details in users table
    * 
    * @access public
    */
    public function getSingleUserDetails($id) {
       return $this->db->find('SELECT * FROM sg_adminusers WHERE adminuser_id = :adminuser_id', array(':adminuser_id' => $id));      
    }
    
    /**
    * updateUserDetails
    * 
    * Update data into user table
    * 
    * @access public
    */
    public function updateUserDetails($data) {
        $dataIn = array();
        $dataIn['username'] = $data['username'];
        if(!empty($data['password'])){
            $dataIn['password'] = $this->PassHash($data['password']);
        }        
        $dataIn['email']     = $data['email'];
        $dataIn['fname']     = $data['fname'];
        $dataIn['lname']     = $data['lname'];
        $dataIn['userlevel'] = $data['userlevel'];
        if(!empty($data['avatar'])){
            $dataIn['avatar'] = $data['avatar'];
        }        
        $dataIn['active'] = $data['userstatus'];
        $id = $data['adminuser_id'];
        $this->db->update(DB_PREFIX.'adminusers', $dataIn, "`adminuser_id` = $id");
        return true;        
    }
    
    /**
    * processUserDataUnlink
    * 
    * delete user details from database
    * 
    * @access   public
    * @param    int   $id    user post id
    * @return   array
    */
    public function processUserDataUnlink($id) {
        return $this->db->findAll("SELECT avatar FROM sg_adminusers WHERE adminuser_id IN ($id)");
    }
    
    /**
    * processUserDelete
    * 
    * Delete method for user
    * 
    * @access public
    */
    public function processUserDelete($id) {
        $this->db->deleteAll('sg_adminusers', "adminuser_id", $id);
        return true;
    }
    
    /**
     * changeStatus()
     * change user status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data){
        extract($data);        
        $values = array();
        if($data['statusId'] == 'y') {
            $values['active'] = 'n';
        } else {
            $values['active'] = 'y';
        }
        $id = $data['user_id'];       
        $result = $this->db->update(DB_PREFIX.'adminusers', $values, "`adminuser_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * getUserDetail()
     * get the user details
     * @param type $id
     * @access public
     * @return type     
     */
    public function getUserDetail($id) {
        $sql = "SELECT ad.*,r.*" 
                . "\n FROM sg_adminusers AS ad"
                . "\n INNER JOIN sg_adminroles AS r"
                . "\n ON ad.userlevel = r.adminrole_id"
                . "\n WHERE ad.adminuser_id = '$id'";
        return $this->db->find($sql);
    }
}

/* End of file user_model.php */
/* Location: ./modules/user/controllers/user_model.php */
?>