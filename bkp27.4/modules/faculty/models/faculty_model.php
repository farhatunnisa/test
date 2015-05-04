<?php
/**
* faculty_Model
* 
* This is faculty model in faculty Module 
* 
* PHP version 5
* 
* @category   faculty_Model
* @package    faculty
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @other author     SUDHARSHAN <sudharshan.m@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class faculty_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getFacultyList()
     * get the faculty list
     * @access public
     * @return type
     */
    public function getFacultyList() {
       $sql = "SELECT * FROM ".DB_PREFIX."faculty WHERE status = 1 LIMIT 0,4 " ;
       return $this->db->findAll($sql);
       
    }
    
    /**
     * getFacultyDetails()
     * get the faculty individual details
     * @param type $id
     * @access public
     * @return type Description
     */
    
    
    public function getFacultyDetails($id) {
        //$facultyid = explode(",", $ids);
        //print_r($facultyid); exit;
        $sql = "SELECT * FROM ".DB_PREFIX."faculty WHERE faculty_id = $id" ;
        return $this->db->find($sql);
    }
}

/* End of file faculty_model.php */
/* Location: ./modules/faculty/models/faculty_model.php */
?>
