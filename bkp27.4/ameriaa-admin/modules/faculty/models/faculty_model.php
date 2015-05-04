<?php
/**
* faculty_model
* 
* This is faculty model in faculty Module 
* 
* PHP version 5
* 
* @category   faculty_model
* @package    faculty
* @author     SANAKR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class faculty_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
   /**
    * getFaculty()
    * get the faculty list
    * @access public
    * @return type array()
    */
    public function getFaculty() {  
        $tableName = DB_PREFIX.'faculty';
        $columns = array("$tableName.faculty_id",
                         "$tableName.faculty_name",
                         "$tableName.designation",
                         "$tableName.country",                         
                         "$tableName.status",
                         "$tableName.faculty_id"
                        );
        $indexId = '$tableName.faculty_id';
        $columnOrder = "$tableName.faculty_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.faculty_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }  
    
    /**
     * getFacultyData() 
     * @access public
     * @return type Description
     */
    public function getFacultyData() {
        $sql = "SELECT faculty_id, faculty_name, email, phone_number, city, country FROM ".DB_PREFIX."faculty ";
        return $this->db->findAll($sql);
    }

        /**
     * changeStatus()
     * change faculty status
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
        $id = $data['facultyId'];        
        $result = $this->db->update(DB_PREFIX.'faculty', $values, "`faculty_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deleteFaculty()
     * delte the faculty records
     * @param type $data
     * @access public
     * @return type
     */
    public function deleteFaculty($data){
        return $this->db->deleteAll(DB_PREFIX.'faculty', "`faculty_id`", $data);
    }
    
    /**
     * addFacultyDetails()
     * add faculty form details
     * @param type $data
     * @return type
     */
    public function addFacultyDetails($data) {

        $values = array();
        $values['faculty_name'] = $data['faculty_name'];
        $values['designation']  = $data['designation'];
        $values['email']        = $data['email'];
        $values['phone_number'] = $data['phone_number'];
        $values['city']         = $data['city'];
        $values['country']      = $data['country'];
        $values['short_desc']   = trim($data['short_desc']);
        $values['full_desc']    = $data['full_desc']; 
        $values['image']        = $data['image'];
        $values['status']       = $data['status'];
        $result = $this->db->insert(DB_PREFIX.'faculty', $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * facultyDetails()
     * get faculty individual detail
     * @param int $id
     * @return array
     */
    public function facultyDetails($id) {
        $sql = "SELECT fa.*, con.* "
                . "\n FROM ".DB_PREFIX."faculty AS fa "
                . "\n JOIN ".DB_PREFIX."countries AS con "
                . "\n ON fa.country = con.country_code "
                . "\n WHERE fa.faculty_id = '".$id."' ";
        //echo $sql; exit;
        $result = $this->db->find($sql);
//print_r($result);exit;
        return $result;
    }
    
    /**
     * updateFacultyDetails()
     * update Faculty form Details
     * @param type $data
     * @access public
     * @return type Description
     */
    public function updateFacultyDetails($data) {
        $values = array();
        $values['faculty_name'] = $data['faculty_name'];
        $values['designation']  = $data['designation'];
        $values['email']        = $data['email'];
        $values['phone_number'] = $data['phone_number'];
        $values['city']         = $data['city'];
        $values['country']      = $data['country'];
        $values['short_desc']   = trim($data['short_desc']);
        $values['full_desc']    = $data['full_desc']; 
        $values['status']       = $data['status'];
        if(!empty($data['image'])){
            $values['image'] = $data['image'];
        }
        $id = $data['faculty_id'];
        $result = $this->db->update(DB_PREFIX.'faculty', $values, "`faculty_id` = $id");
        return $result;
    }
}

/* End of file faculty_model.php */
/* Location: ./modules/faculty/models/faculty_model.php */
?>
