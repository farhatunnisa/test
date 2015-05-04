<?php
/**
* members_model
* 
* This is members model in members Module 
* 
* PHP version 5
* 
* @category   members_model
* @package    members
* @author     SUDHARSHAN MEKALA <sudharshan.mphp@gmail.com>
* @author     farhat unnisa<farhat.unnisa@gmail.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class members_model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
   /**
    * getmembers()
    * get the members list
    * @access public
    * @return type array()
    */
    public function getmembers() {  
        $tableName = DB_PREFIX.'members';
        $columns = array("$tableName.member_id",
                         "$tableName.first_name",
                         "$tableName.email",
                         "$tableName.country",                         
                         "$tableName.status",
                         "$tableName.member_id"
                        );
        $indexId = '$tableName.member_id';
        $columnOrder = "$tableName.member_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.member_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }  
    
    /**
     * changeStatus()
     * change members status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data) {
        extract($data);
        $values = array();        
        if($data['statusId'] == 1) {
            $values['status'] = 0;
        } else {
            $values['status'] = 1;
        }
        $id = $data['membersId'];        
        $result = $this->db->update(DB_PREFIX.'members', $values, "`member_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */    
    public function membersDetails($id) {
        $result = $this->db->find("SELECT * FROM ".DB_PREFIX."members WHERE member_id = '$id'");
        return $result;
    }
    
    /**
     * updateMemberDetails()
     * @param type $data
     * @return type
     */
    public function updateMemberDetails($data) {
        
        $values                          = array();
        
        $values['title']                 = $data['title'];
        $values['first_name']            = $data['first_name'];
        $values['middle_name']           = $data['middle_name'];
        $values['family_name']           = $data['last_name'];
        $values['title_on_certificate']  = $data['title_on_certificate'];
        $values['company_org']           = $data['company_org'];
        $values['professional_design']   = $data['professional_designation'];
        $values['licence_number']        = $data['license_number'];
        $values['expiry_date']           = $data['expiry_date'];
        $values['country_issued']        = $data['country_issued'];
        $values['field_of_practice']     = $data['field_of_practice'];
        $values['practice_experience']   = $data['no_of_years'];
        $values['address']               = $data['address'];
        $values['city']                  = $data['city'];
        $values['zip_code']              = $data['zip_code'];
        $values['country']               = $data['country'];
        $values['phone']                 = $data['phone'];
        $values['mobile']                = $data['mobile'];
        $values['email']                 = $data['email'];
        $values['website']               = $data['website'];
        $values['dietary_requirement']   = $data['dietary_req'];
        if(!empty($data['image'])) {
            $values['image']                 = $data['image'];
        } else {
            $values['image']                 = $data['old_image'];
        }
        $values['gender']                = $data['gender'];
        $values['status']                = $data['status'];
        
        $id                              = $data['member_id'];
        
        return $this->db->update(DB_PREFIX.'members', $values, "`member_id` = $id");        
    }

    /**
     * deleteMember()
     * delte the faculty records
     * @param type $data
     * @access public
     * @return type
     */
    public function deleteMember($data) {
        return $this->db->deleteAll(DB_PREFIX.'members', "`member_id`", $data);
    }
    
   
}

/* End of file members_model.php */
/* Location: ./modules/members/models/members_model.php */
?>