<?php
/**
* changepassword_model
* 
* This is change password model in Change Password Module 
* 
* PHP version 5
* 
* @category   changepassword_model
* @package    change password
* @author     sankar yeturi<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class changepassword_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * updateEditPassword
     * Check password  details in database
     * @access   public
     * @param    array   $data  post data
     * @return   boolean true/false
     */
    public function updateEditPassword($data) {
        $id =  $this->session->gets('adminuser_id');
        $dataIn = array();
        $dataIn['password'] = $this->PassHash($data['npassword']);
        $sql = "select password from ".DB_PREFIX."adminusers WHERE adminuser_id = '".$id."'";
        $result = $this->db->find($sql);
        if($result['password'] == $this->PassHash($data['opassword'])) {
            $r =$this->db->update(DB_PREFIX.'adminusers', $dataIn, "`adminuser_id` = $id");
            return 1;
        }else { 
            return 0; 
        }  
    }
}
?>
