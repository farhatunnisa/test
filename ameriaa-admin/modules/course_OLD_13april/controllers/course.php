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
* @author     SANKAR YETURI<snakar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Course extends Controller {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();
        
        // Verify user login
        if(!$this->session->gets('adminuser_id')) 
            $this->redirect('index');         
        $this->LoadHelper('Seo');           //Load seo helper
        $this->LoadHelper('Form');          //Load form helper
        $this->LoadHelper('ImageUpload');   // Load thumbnail helper
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage courses";        
        $this->view->meta =  $metaData;        
    }
    
   /**
    * index
    * load view page
    * @access public
    * @return type Description
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage courses";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;        
        $this->view->dropzoneAssets  = false;
        // load course view page
        $this->view->LoadView('course', 'course');
    } 
    
    /**
     * getCourses()
     * get the courses list
     * @access public
     */
    public function getCourses() {
        $result = $this->model->getCourses();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * getFaculty() 
     * get faculty list
     * @access public
     */    
    public function getFaculty() {
        $result = $this->model->getFaculty();
        $data = array('faculty' => $result);
        print_r(json_encode($data)); exit;
    }
    
    /**
     * changeStatus
     * change faculty status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];        
        $this->model->changeStatus($_POST); 
        if($status == 1) {            
            echo 0;
        } else {
            echo 1;
        }
    }
    
    /**
     * deleteCourse()
     * delete the Course records
     * @access public
     */
    public function deleteCourse() {        
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteCourse($_POST['deleteme']);
            echo 1;
        }
    }

    /**
     * add()
     * load course add page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage courses - Add courses";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->facultyDetails  = $this->model->getFaculty();
        // load course view page
        $this->view->LoadView('add_course', 'course');
    }
    
    /**
     * addCourseDetails()
     * add course form detials
     * @access publics
     */
    public function addCourseDetails() {
        $filedir  = BASE . "uploads/courses/";
        $thumbdir = BASE . "uploads/courses/thumbs/";
        $slugName = $this->Seo->pageslug($_POST['course_name']);
        // image upload 
        if(!empty($_FILES['image']['name'])){
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        } else {
            $_POST['image'] = $_POST['old_image'];
        }
        $result = $this->model->addCourseDetails($_POST);
        if($result != 0){
            $this->session->sets("success", 'Course details successfully added');
            $this->redirect('course');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('course/add/');
        }
    }
    
    /**
     * edit()
     * load edit course page
     * @param int $id
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage courses - Add courses";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->facultyDetails  = $this->model->getFaculty();
        $this->view->coursrDetails   = $this->model->getCourseDetails($id); 
        // load edit course page
        $this->view->LoadView('edit_course', 'course');        
    }
    
    /**
     * copy()
     * load edit course page
     * @param int $id
     * @access public
     */
    public function copy($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage courses - Add courses";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->facultyDetails  = $this->model->getFaculty();
        $this->view->coursrDetails   = $this->model->getCourseDetails($id); 
        // load edit course page
        $this->view->LoadView('copy_course', 'course');        
    }
    
    /**
     * updateCourseDetails()
     * 
     */
    public function updateCourseDetails() {
        if(!empty($_FILES['image']['name'])){
            $filedir  = BASE . "uploads/courses/";
            $thumbdir = BASE . "uploads/courses/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['course_name']);
            unlink($filedir.$_POST['old_image']);
            unlink($thumbdir.$_POST['old_image']);
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        } else {
            $_POST['image'] = "";
        }
        
        $result = $this->model->updateCourseDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('course');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('course/edit/'.$_POST['course_id']);
        }
    }
    
    /**
     * details()
     * load detials page
     * @param int $id
     * @access public
     */
    public function details($id){
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage courses - Add courses";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->coursrDetaisl   = $this->model->getCourseDetails($id); 
        // load edit course page
        $this->view->LoadView('course_details', 'course');
    }
}

/* End of file category.php */
/* Location: ./modules/course/controllers/course.php */
?>