<?php
/**
* memberships_model
* 
* This is memberships model in memberships Module 
* 
* PHP version 5
* 
* @category   memberships_model
* @package    memberships
*  @author    SUDHARSHAN MEKALA<><sudharshan.mphp@gmail.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class memberships_model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * addMembershipsDetails()
     * add memberships form details
     * @param type $data
     * @return type
     */
    public function addMembershipsDetails($data) {

        $values = array();
        $values['membership_title'] = $data['memberships_title'];
        $values['description']  = $data['description'];
        $values['price']        = $data['price'];
        $values['status']       = $data['status'];
        $result = $this->db->insert(DB_PREFIX.'membership', $values);
        return $this->db->lastInsertId();
    }
    
    
	 /**
    * getMemberships()
    * get the memberships list
    * @access public
    * @return type array()
    */
    public function getMemberships() {  
        $tableName = DB_PREFIX.'membership';
        $columns = array("$tableName.membership_id",
                         "$tableName.membership_title",
                         "$tableName.description",
                         "$tableName.price",                         
                         "$tableName.status",
                         "$tableName.membership_id"
                        );
        $indexId = '$tableName.membership_id';
        $columnOrder = "$tableName.membership_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.membership_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }  
    
  public function membershipsDetails($id) {
        $result = $this->db->find("SELECT * FROM ".DB_PREFIX."membership WHERE membership_id = '$id'");
        return $result;
    }
    /**
     * changeStatus()
     * change memberships status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data){
        extract($data);
        $values = array();        
        if($data['statusId'] == 1) {
            $values['status'] = 0;
        } else {
            $values['status'] = 1;
        }
        $id = $data['membershipsId'];        
        $result = $this->db->update(DB_PREFIX.'membership', $values, "`membership_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deletememberships()
     * delte the memberships records
     * @param type $data
     * @access public
     * @return type
     */
    public function deletememberships($data){
        return $this->db->deleteAll(DB_PREFIX.'membership', "`membership_id`", $data);
    }
    
   
    
    /**
     * updateMembershipDetails()
     * update memberships form Details
     * @param type $data
     * @access public
     * @return type Description
     */
    public function updateMembershipDetails($data) {
	
        $values = array();
        $values['membership_title'] = $data['memberships_title'];
        $values['description']  = $data['description'];
        $values['price']        = $data['price'];
        $values['status']       = $data['status'];
        $id = $data['membership_id'];
        $result = $this->db->update(DB_PREFIX.'membership', $values, "`membership_id` = $id");
        return $result;
    }
}

/* End of file memberships_model.php */
/* Location: ./modules/memberships/models/memberships_model.php */
?>