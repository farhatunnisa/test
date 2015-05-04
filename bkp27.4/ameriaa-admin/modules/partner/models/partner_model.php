<?php
/**
* partner_model
* 
* This is partner model in partner Module 
* 
* PHP version 5
* 
* @category   partner_model
* @package    partner
* @author     farhat unnisa<farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class partner_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
   /**
    * getpartner()
    * get the partner list
    * @access public
    * @return type array()
    */
    public function getpartner() {  
        $tableName = DB_PREFIX.'partner';
        $columns = array("$tableName.partner_id",
                         "$tableName.title",                         
                         "$tableName.status",
                         "$tableName.partner_id"
                        );
        $indexId = '$tableName.partner_id';
        $columnOrder = "$tableName.partner_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.partner_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }  
    
    /**
     * changeStatus()
     * change faculty status
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
        $id = $data['facultyId'];        
        $result = $this->db->update(DB_PREFIX.'partner', $values, "`partner_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deletePartner()
     * delte the Partner records
     * @param type $data
     * @access public
     * @return type
     */
    public function deletePartner($data) {
        return $this->db->deleteAll(DB_PREFIX.'partner', "`partner_id`", $data);
    }
    
    /**
     * addPartnerDetails()
     * add faculty form details
     * @param type $data
     * @return type
     */
    public function addPartnerDetails($data) {

        $values                        = array();
        $values['title']               = $data['partner_name'];
        $values['short_description']   = trim($data['short_desc']);
        $values['full_description']    = $data['full_desc']; 
        $values['image']               = $data['image'];
        $values['status']              = $data['status'];
        $result = $this->db->insert(DB_PREFIX.'partner', $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getpartnerDetails()
     * get partner individual detail
     * @param int $id
     * @return array
     */
    public function getpartnerDetails($id) {

        $sql = "SELECT * FROM ".DB_PREFIX."partner WHERE partner_id = '$id'";
        $result = $this->db->find($sql);
        return $result;
    }
    
    /**
     * updatePartnerDetails()
     * update Partner form Details
     * @param type $data
     * @access public
     * @return type Description
     */
    public function updatePartnerDetails($data) {
        
        $values                        = array();
        $values['title']               = $data['partner_title'];
        $values['short_description']   = trim($data['short_desc']);
        $values['full_description']    = $data['full_desc']; 
        $values['status']              = $data['status'];
        if(!empty($data['image'])) {
            $values['image'] = $data['image'];
        }
        $id                            = $data['partner_id'];
        $result = $this->db->update(DB_PREFIX.'partner', $values, "`partner_id` = $id");
        return $result;
    }
    
    
}

/* End of file partner_model.php */
/* Location: ./modules/partner/models/partner_model.php */
?>
