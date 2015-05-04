<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Testimonials
* 
* This is Testimonials controller in Testimonials Module 
* 
* PHP version 5
* 
* @category   Testimonials
* @package    Testimonials
* @author     SANKAR YETURI<snakar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Testimonials extends Controller {
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
            $this->LoadHelper('ImageUpload');   // Load image helper
        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage testimonials";
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
        $metaData['title']           = "Manage testimonials";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        // load course view page
        $this->view->LoadView('testimonials', 'testimonials');
    } 
    
    /**
     * getTestimonials()
     * get the testimonials list
     * @access public
     */
    public function getTestimonials() {
        $result = $this->model->getTestimonials();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change testimonials status
     * @access public
     */
    public function changeStatus() {
        $status = $_POST['statusId'];        
        $this->model->changeStatus($_POST); 
        if($status == 1) {            
            echo 0;
        } else {
            echo 1;
        }
    }
    
    /**
     * add()
     * load add testimonials page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Add testimonials";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true; 
        $this->view->dropzoneAssets  = false;
        // load course view page
        $this->view->LoadView('add_testimonials', 'testimonials');
    }
    
    /**
     * addTestimonialDetails()
     * add testimonials form details
     * @access public
     */
    public function addTestimonialDetails() {
        
        if(!empty($_FILES['image']['name'])) {
            $filedir  = BASE . "uploads/testimonials/";
            $thumbdir = BASE . "uploads/testimonials/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['client_name']);
            
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
        
        $result = $this->model->addTestimonialDetails($_POST);
        //print_r($result); exit;
        if($result != 0){
            $this->session->sets("success", 'Testimonials details successfully added');
            $this->redirect('testimonials');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('testimonials/add/');
        }
    }
    
    /**
     * edit()
     * load edit testimonial page
     * @param int $id
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Edit testimonials";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true; 
        $this->view->dropzoneAssets  = false;
        $this->view->testimonialDetaisl = $this->model->getTestimonialDetails($id);
        // load course view page
        $this->view->LoadView('edit_testimonials', 'testimonials');
    }
    
    /**
     * updateTestimonialsDetails()
     * update testimonials form details
     * @access public
     */
    public function updateTestimonialsDetails() {
        // image upload 
      
        $filedir  = BASE . "uploads/testimonials/";
        $thumbdir = BASE . "uploads/testimonials/thumbs/";
        $slugName = $this->Seo->pageslug($_POST['client_name']);
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
                
        $result = $this->model->updateTestimonialsDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('testimonials');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('testimonials/edit/'.$_POST['testimonial_id']);
        }
    }
    
    /**
     * deleteTestimonials()
     * delete the Testimonials records
     * @access public
     */
    public function deleteTestimonials() {
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteTestimonials($_POST['deleteme']);
            echo 1;
        }
    }
    
    /**
     * details()
     * load testimonial details page
     * @param int $id
     * @access public
     */
    public function details($id) {
        // meta date
        $metaData = array();
        $metaData['title']           = "Manage faculty - Faculty details";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->testimonialDetails = $this->model->getTestimonialDetails($id);
        // load testimonial details page
        $this->view->LoadView('details_testimonials','testimonials');
    }
    
}

/* End of file testimonials.php */
/* Location: ./modules/testimonials/controllers/testimonials.php */
?>