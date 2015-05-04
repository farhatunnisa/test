<?php
/**
* course_Model
* 
* This is course model in course Module 
* 
* PHP version 5
* 
* @category   course_model
* @package    course
* @author     farhat unnisa<farhat.unnisa@siriinnovations.com>
* @author     SANAKR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Course_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
   /**
    * getCourses()
    * get the courses list
    * @access public
    * @return type array()
    */
    public function getCourses() {
        $tableName = DB_PREFIX.'courses';
        $columns   = array("$tableName.course_id",
                           "$tableName.course_title",
                           "$tableName.location",
                           "$tableName.start_date",                         
                           "$tableName.status",
                           "$tableName.course_id"
                          );
        $indexId     = '$tableName.course_id';
        $columnOrder = "$tableName.course_id";
        $orderby     = "ORDER BY $columnOrder DESC";
        $joinMe      = "";
        $condition   = " WHERE $tableName.course_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }   
    
    /**
     * getFaculty()
     * get faculty list
     * @access public
     * @return type
     */
    public function getFaculty() {
        $sql = "SELECT * from ".DB_PREFIX."faculty ORDER BY faculty_id DESC";
        return $this->db->findAll($sql);
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
        $result = $this->db->update(DB_PREFIX.'courses', $values, "`course_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deleteCourse()
     * delte the faculty records
     * @param type $data
     * @access public
     * @return type
     */
    public function deleteCourse($data) {
        return $this->db->deleteAll(DB_PREFIX.'courses', "`course_id`", $data);
    }
    
    /**
     * addCourseDetails
     * add course form details
     * @param array $data
     * @access public
     * @return int
     */
    public function addCourseDetails($data) {  

        $values                   = array();
        $values['course_title']   = $data['course_name'];
        $values['location']       = $data['location'];
        $values['country']        = $data['country'];
        $values['short_desc']     = trim($data['short_desc']);
        $values['full_desc']      = serialize($data['full_desc']); 
        $values['member_fee']     = $data['member_fee'];
        $values['non_member_fee'] = $data['non_member_fee'];
        $values['discount']       = $data['discount'];
        $values['status']         = $data['status'];
        $date = $data['date'];
        $finaldate = explode("to", $date);
        $values['start_date']     = $finaldate[0];
        $values['end_date']       = $finaldate[1];
        if(!empty($data['image'])) {
            $values['image']          = $data['image'];  
        } else {
            $values['image']          = $data['old_image'];  
        }
        $name = $data['faculty_name'];
        $facultyname = implode(',', $name);
        $values['faculty_id'] = $facultyname; 
        
        $sql = $this->db->insert(DB_PREFIX."courses", $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getCourseDetails()
     * @param type $id
     * @return type
     */
    public function getCourseDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE course_id = $id ";
        return $this->db->find($sql);
    }
    
    /**
     * updateCourseDetails()
     * update course form details
     * @param array $data
     * @access public
     */
    public function updateCourseDetails($data) {
        //echo "<pre>"; print_r($data); exit;
        $values = array();
        $values['course_title']   = $data['course_name'];
        $values['location']       = $data['location'];
        $values['country']        = $data['country'];
        $values['short_desc']     = trim($data['short_desc']);
        $values['full_desc']      = serialize($data['full_desc']);
        $values['member_fee']     = $data['member_fee'];
        $values['non_member_fee'] = $data['non_member_fee'];
        $values['discount']       = $data['discount'];
        $values['status']         = $data['status'];
        $date = $data['date'];
        $finaldate = explode("to", $date);
        $values['start_date']     = $finaldate[0];
        $values['end_date']       = $finaldate[1];
        if(!empty($data['image'])) {
            $values['image'] = $data['image'];
        }
        $facultyname = implode(',', $data['faculty_name']);
        $values['faculty_id'] = $facultyname;
        $id = $data['course_id'];
        $result = $this->db->update(DB_PREFIX.'courses', $values, "`course_id` = $id");
        return $result;
    }
            
}

/* End of file course_model.php */
/* Location: ./modules/course/models/course_model.php */
?>