<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* User
* 
* This is User controller in Users Module 
* 
* PHP version 5
* 
* @category   View
* @package    User
* @author author sankar yeturi <sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class User extends Controller {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();
        if(!$this->session->gets('adminuser_id')) 
        $this->redirect('index');        
        $this->LoadHelper('Email');         // load email helper
        $this->LoadHelper('Seo');           // load seo helper
        $this->LoadHelper('ImageUpload');   // Load Thumb Nail helper
        
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Admin Users";        
        $this->view->meta            = $metaData;
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
    }
    
    /**
     * index
     * View admin users list
     * @access public
     */
    public function index() {       
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Admin Users";        
        $this->view->meta            = $metaData;
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->usersList       = $this->model->getUserDetails();  // get admin users list
        $this->view->LoadView('user_view', 'user');
    }
    
    
    /**
     * add()
     * load admin user add page
     * @access public
     */
    public function add() { 
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Admin Users - Add User";
        $this->view->meta            = $metaData;
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->userRoles       = $this->model->getUserRoles();    // get user roles list        
        $this->view->LoadView('user_add','user');
    }
    
    /**
     * edit()
     * load edit admin user page     
     * @param int $id
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Admin Users - Edit";        
        $this->view->meta            = $metaData;
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->userId              = $id;
        $this->view->singleUserData  = $this->model->getSingleUserDetails($id); // get the user admin user details
        $this->view->userRoles       = $this->model->getUserRoles();            // get the user roles
        $this->view->LoadView('user_edit', 'user');        
    }
    
    /**
     * details
     * details admin user
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Admin Users - Details";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true; 
        $this->view->dropzoneAssets  = false;
        $this->view->singleUserData  = $this->model->getUserDetail($id); // get user details
        $this->view->LoadView('user_details', 'user');        
    }
    
    /**
     * getEmailAvailability()
     * check email existing or not
     * @access public
     */
    public function getEmailAvailability(){
        $idStatus = '';
        $result = $this->model->emailAvailability($_POST);
        if(count($result) == 0) {
            $idStatus = 1;
        } else {
            $idStatus = 0;
        }
        header('Content-type: application/json');
        die( json_encode( $idStatus ) );
    }

    /**
     * addUser
     * save user details in database
     * @access public
     */
    public function addUser(){ 
        
        
        if(!empty($_FILES['avatar']['name'])) {
            $filedir = BASE . "uploads/avatars/";
            $randName = rand(101010, 909090);
            $newName = "profile_" . $randName;
            $ext = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['avatar'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $this->ImageUpload->UploadFile();

            $_POST['avatar'] = $newName.".".strtolower($ext); 
        } else {
            $_POST['avatar'] = "";
        }
        
        $result = $this->model->processUser($_POST);
        if($result){
            $this->session->sets('success','New user successfully added.');
            $this->redirect('user');
        } else {
             $this->session->sets('fail','Please check the details');
            $this->redirect('user/add');
        }
    }
    
    /**
     * updateUser()
     * update user details in database
     * @access public
     */
    public function updateUser() {        
        if(!empty($_FILES['avatar']['name'])){
            $filedir = BASE . "uploads/avatars/";            
            $old_avatar = $filedir . $_POST['old_avatar'];
            unlink($old_avatar);            
            $randName = rand(101010, 909090);
            $newName = "profile_" . $randName;            
            $ext = substr($_FILES['avatar']['name'], strrpos($_FILES['avatar']['name'], '.') + 1);
            
            $this->ImageUpload->File      = $_FILES['avatar'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $this->ImageUpload->UploadFile();
            
            $_POST['avatar'] = $newName.".".strtolower($ext); 
            if($this->session->gets('adminuser_id') == $_POST['adminuser_id']) {
                $this->session->sets('adminuser_avatar', $_POST['avatar']);
            }
        } else {
            $_POST['avatar'] = "";
        }        
        if(empty($_POST['password'])){
            $_POST['password'] = "";
        }
               
        $result = $this->model->updateUserDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('user');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('user/edit/'.$_POST['adminuser_id']);
        }        
    }
    
    /**
     * deleteUser
     * delete user details from database
     * @access public
     */
    public function deleteUser() {
        $userunlink_data = $this->model->processUserDataUnlink($_POST['deleteme']);
        $filedir = BASE . "uploads/avatars/";
        foreach ($userunlink_data as $data) {
            if(!empty($data['avatar'])) {
                if (file_exists($filedir . $data['avatar'])) {
                    unlink($filedir . $data['avatar']);
                    unlink($filedir . 'thumb_'.$data['avatar']);
                }
            }
        }
        $this->model->processUserDelete($_POST['deleteme']);
        echo 1;
    }
    
    /**
     * changeStatus()
     * change user status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];
        if($status == 'y') {            
            echo "0";
        } 
        else {
            echo "1";
        }
        $this->model->changeStatus($_POST);
    }
}

/* End of file user.php */
/* Location: ./modules/user/controllers/user.php */
?>