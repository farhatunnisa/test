<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Course
* 
* This is members controller in members Module 
* 
* PHP version 5
* 
* @category   members
* @package    members
* author SANKAR YETURI <sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Members extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();
        // Verify user login
        if(!$this->session->gets('ameriaa_user_id')) 
            $this->redirect('index');
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "Members";
        $metaData['description'] = "Members";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * index()
     * load course page
     * @access public
     */
    public function index() {
        // load mete data
        $metaData                = array();
        $metaData['title']       = "Members";
        $metaData['description'] = "Members";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->memberDetails  = $this->model->getMemberDetails();
        $this->view->Loadview('profile_info', 'members');
    }
    
    /**
     * details()
     * @param int $id
     * @access public
     */
//    public function details($id) {
//        $metaData                = array();
//        $metaData['title']       = "Members details";
//        $metaData['description'] = "Members details";
//        $this->view->meta        = $metaData;
//        $this->view->courseDetails  = $this->model->getCourseDetails($id); 
//        $this->view->Loadview('details', 'members');
//    }
    
    /**
     * edit()
     * load edit member page
     * @param int $id
     * @access public
     */
    public function editdetails() {
        // load mete data
        $metaData                = array();
        $metaData['title']       = "Edit Members details";
        $metaData['description'] = "Edit Members details";
        $this->view->meta        = $metaData;
        $this->view->memberDetails  = $this->model->getMemberDetails();
        // load view page
        $this->view->Loadview('member_edit', 'members');
    }
}

/* End of file course.php */
/* Location: ./modules/members/controllers/members.php */
?>