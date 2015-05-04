<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Course
* 
* This is Course controller in Course Module 
* 
* PHP version 5
* 
* @category   Course
* @package    Course
* author SANKAR YETURI <SANKAR.G@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Courses extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();             
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "Course";
        $metaData['description'] = "Course";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * index()
     * load course page
     * @access public
     */
    public function index() {
        $metaData                = array();
        $metaData['title']       = "Course";
        $metaData['description'] = "Course";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->courseList  = $this->model->getCourseList();
        $this->view->Loadview('course', 'courses');
    }
    
    /**
     * details()
     * @param int $id
     * @access public
     */
    public function details($id) {
        $metaData                = array();
        $metaData['title']       = "Course details";
        $metaData['description'] = "Course details";
        $this->view->meta        = $metaData;
        $data = $this->model->getCourseDetails($id); 
        $this->view->facultyData = $this->model->getFacultydata($data['faculty_id']);
        $this->view->courseDetails  = $data;
        $this->view->Loadview('details', 'courses');
    }
}

/* End of file course.php */
/* Location: ./modules/course/controllers/course.php */
?>