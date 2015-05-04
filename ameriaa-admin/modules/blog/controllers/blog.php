<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Blog
* 
* This is Blog controller in Blog Module 
* 
* PHP version 5
* 
* @category   Blog
* @package    Blog
* @author     SANKAR YETURI<snakar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Blog extends Controller {
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
        $this->LoadHelper('Seo');           //Load form helper
        $this->LoadHelper('Form');          //Load form helper
        $this->LoadHelper('ImageUpload');   // Load thumbnail helper
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Blog";        
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
        $metaData['title']           = "Manage Blog";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        // load blog view page
        $this->view->LoadView('blog', 'blog');
    } 
    
    /**
     * getblog()
     * get the blog list
     * @access public
     */
    public function getBlog() {        
        $result = $this->model->getBlog();
        print_r(json_encode($result, true)); exit;
    }
    
    /**
     * changeStatus
     * change blog status
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
     * deleteBlog()
     * delete the blog records
     * @access public
     */
    public function deleteBlog() {        
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteBlog($_POST['deleteme']);
            echo 1;
        }
    }

    /**
     * add()
     * load blog add page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage blog - Add blog";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;   
        $this->view->dropzoneAssets  = false;
        // load add blog view page
        $this->view->LoadView('add_blog', 'blog');
    }
    
    /**
     * addblogDetails()
     * add blog form details
     * @access public
     */
    public function addBlogDetails() {
      if(isset($_POST['submit'])) {
        /********* image upload  ***********/
        $filedir  = BASE . "uploads/blog/";
        $thumbdir = BASE . "uploads/blog/thumbs/";
        $slugName = $this->Seo->pageslug($_POST['blog_name']);
        $randName = rand(101010, 909090);
        $newName  = $slugName . $randName;
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
        $result = $this->model->addBlogDetails($_POST);        
        if($result) {
            $this->session->sets("success", 'Successfully Added');
            $this->redirect('blog/');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('blog/add_blog');
        }
      }
      else {
         $this->session->sets("fail", 'soryy due to some error process not completed');
         $this->redirect('blog');
      }
    }
    
    /**
     * details()
     * load blog details page
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage blog - blog details";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = false;  
        $this->view->dropzoneAssets  = false;
        $this->view->blogDetails     = $this->model->blogDetails($id);    // get the blog details
        // load add blog view page
        $this->view->LoadView('blog_details', 'blog');
    }
    
    /**
     * edit()
     * load edit blog page
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage blog - Edit blog";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->blogDetails     = $this->model->blogDetails($id);    // get the blog details
        // load add blog view page
        $this->view->LoadView('edit_blog', 'blog');
    }
    
    /**
     * updateblogDetails()
     * update blog form details
     * @access public
     */
    public function updateblogDetails() {
        // image upload 
        if(!empty($_FILES['image']['name'])){
            $filedir  = BASE . "uploads/blog/";
            $thumbdir = BASE . "uploads/blog/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['blog_name']);
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
            $_POST['image'] = $_POST['old_image'];
        }
        
        $result = $this->model->updateblogDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('blog');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('blog/edit/'.$_POST['blog_id']);
        }
    }
    
    /**
     * comments()
     * load comments page
     * @param int $id
     * @access public
     */
    public function comments($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage blog - Edit blog";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;        
        // load add blog view page
        $this->view->LoadView('comments', 'blog');
    }
    
    /**
     * getComments()
     * get all comments list
     * @access public
     * @return type Description
     */
    public function getComments() {
        $result = $this->model->getComments();
        print_r(json_encode($result, true)); exit;
    }
}

/* End of file blog.php */
/* Location: ./modules/blog/controllers/blog.php */
?>