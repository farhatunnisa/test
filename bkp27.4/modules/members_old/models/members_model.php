<?php
/**
* members_Model
* 
* This is members model in members Module 
* 
* PHP version 5
* 
* @category   members_Model
* @package    members
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class members_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getMemberDetails()
     * get the member details
     * @access public
     * @return type
     */
    public function getMemberDetails() {
        $id = $this->session->gets('ameriaa_user_id');
        $sql = "SELECT * FROM ".DB_PREFIX."members WHERE member_id = '$id'  " ;
        return $this->db->find($sql);
       
    }
    
}

/* End of file members_model.php */
/* Location: ./modules/members/models/members_model.php */
?>