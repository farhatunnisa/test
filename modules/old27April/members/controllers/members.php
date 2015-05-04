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
* author farhat unnisa <farhat.unnisa@siriinnovations.com>
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
       //$this->LoadHelper('seo');
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
    
    public function updatedetails() {
//        echo "<pre>";
//        print_r($_POST);exit;
        
        $filedir  = BASE . "uploads/members/";
        $thumbdir = BASE . "uploads/members/thumbs/";
        
        
        // image upload 
        if(!empty($_FILES['image']['name'])) {
            $randName = rand(101010, 909090);
            $newName = $randName;
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
        }       
        
        $result = $this->model->updateDetails($_POST);
        if($result) {
            $this->session->sets("success", 'Profile details successfully added');
            $this->redirect('members');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('members/editdetails');
            
        }
    }
    
    /**
     * changepassword()
     */
    public function changepassword() {
        $this->view->PasswordDetails = $this->model->getMemberDetails();
        $this->view->Loadview('changepassword','members');
    }
    
    /**
     * updatepassword()
     */
    public function updatepassword() {

        $result = $this->model->Updatepassword($_POST);
        if($result) {
            $this->session->sets("success", 'Password details successfully Updated');
            $this->redirect('members');
        } else {
            $this->session->sets("fail", 'sorry due to some error process not completed');
            $this->redirect('changepassword');
        }
    }
}

/* End of file course.php */
/* Location: ./modules/members/controllers/members.php */
?>