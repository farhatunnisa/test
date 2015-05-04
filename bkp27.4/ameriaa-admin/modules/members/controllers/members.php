<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* members
* 
* This is members controller in members Module 
* 
* PHP version 5
* 
* @category   members
* @package    members
* @author     SUDHARSHAN MEKALA<sudharshan.mphp@gmail.com>
* @author     farhatn unnisa<farhat.unnisa@gmail.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class members extends Controller {
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
        $metaData['title'] = "Manage members";        
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
        $metaData['title']              = "Manage members";        
        $this->view->meta               = $metaData;
        $this->view->dashboardAssets    = false;    
		$this->view->dropzoneAssets    = false;	
        $this->view->datatableAssets    = true;
        $this->view->formAssets         = true;        
        // load members view page
        $this->view->LoadView('members', 'members');
    } 
    
    /**
     * getmember()
     * get the members list
     * @access public
     */
    public function getmembers() {        
        $result = $this->model->getmembers();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change members status
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
      * details()
      * load members details page
      * 
      * @access public
      */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage members - members details";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->dropzoneAssets  = false;
        $this->view->formAssets      = false;        
        $this->view->membersDetails  = $this->model->membersDetails($id);    // get the members details
        // load add members view page
        $this->view->LoadView('details_members', 'members');
    }
    
    /**
     * edit()
     * load edit page
     * 
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage members - edit members";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->dropzoneAssets  = false;
        $this->view->formAssets      = true;        
        $this->view->membersDetails  = $this->model->membersDetails($id);        // get the members details
        $this->view->countriesList   = file_get_contents(SITEURL."index/getCountries");     // get contries list
        // load edit members view page
        $this->view->LoadView('edit_members', 'members');
    }
    
    /**
     * updateMemberDetails()
     * update member form details
     * 
     * @access public
     */
    public function updateMemberDetails() {
        //echo "<pre>";        print_r($_POST); exit;
        // image upload 
        if(!empty($_FILES['image']['name'])) {
            $filedir  = BASE . "uploads/members/";
            $thumbdir = BASE . "uploads/members/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['first_name']);
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
        
        $result = $this->model->updateMemberDetails($_POST);
        if($result) {
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('members');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('members/edit/'.$_POST['member_id']);
        }
    }
    
    /**
     * deleteMember()
     * delete the members data
     * @access public
     */
    public function deleteMember() {
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteMember($_POST['deleteme']);
            echo 1;
        }
    }
    
    
}

/* End of file members.php */
/* Location: ./modules/members/controllers/members.php */

?>