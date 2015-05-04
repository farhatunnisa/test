<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* faculty
* 
* This is faculty controller in faculty Module 
* 
* PHP version 5
* 
* @category   faculty
* @package    faculty
* author SANKAR YETURI <SANKAR.G@siriinnovations.com>
* @other author     SUDHARSHAN <sudharshan.m@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class faculty extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();             
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "faculty";
        $metaData['description'] = "faculty";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * index()
     * load faculty page
     * @access public
     */
    public function index() {
        $metaData                = array();
        $metaData['title']       = "faculty";
        $metaData['description'] = "faculty";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->facultyList  = $this->model->getFacultyList();
        $this->view->Loadview('faculty', 'faculty');
    }
    
    /**
     * details()
     * @param int $id
     * @access public
     */
    public function details($id) {
        $metaData                = array();
        $metaData['title']       = "faculty details";
        $metaData['description'] = "faculty details";
        $this->view->meta        = $metaData;
        $data = $this->model->getFacultyDetails($id); 
        $this->view->facultyDetails  = $data;
        $this->view->Loadview('details', 'faculty');
    }
}

/* End of file faculty.php */
/* Location: ./modules/faculty/controllers/faculty.php */
?>