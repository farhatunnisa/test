<?php
/**
* Courses_Model
* 
* This is Courses model in Courses Module 
* 
* PHP version 5
* 
* @category   Courses_Model
* @package    Courses
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Courses_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getCourseList()
     * get the course list
     * @access public
     * @return type
     */
    public function getCourseList() {
       $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE status = 1 LIMIT 0,4 " ;
       return $this->db->findAll($sql);
       
    }
    
    /**
     * getCourseDetails()
     * get the course individual details
     * @param type $id
     * @access public
     * @return type Description
     */
    public function getCourseDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE course_id = $id " ;        
        return $this->db->find($sql);
    }
    
    public function getFacultydata($ids) {
        //$facultyid = explode(",", $ids);
        //print_r($facultyid); exit;
        $sql = "SELECT * FROM ".DB_PREFIX."faculty WHERE faculty_id IN ($ids)" ;
        return $this->db->findAll($sql);
    }
}

/* End of file courses_model.php */
/* Location: ./modules/courses/models/courses_model.php */
?>
