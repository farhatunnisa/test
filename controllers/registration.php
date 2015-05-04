<?php
/*
 * This is registration controler 
 * Default controller 
 */
class registration extends Controller {

    public function __construct() {
        parent::__construct();           
        // healpers
        $this->LoadHelper('Form');
        $this->LoadHelper('ImageUpload');
        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "User registration";
        $metaData['description'] = "User registration";
        $this->view->meta        = $metaData;       
        $this->masterslider      = false;
    }
    
    /**
     * signup()
     */
    public function index()  {        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "User registration";
        $metaData['description'] = "User registration";
        $this->view->meta        = $metaData;
        $this->masterslider      = false;
        $this->view->countrieslist  = json_decode($this->countries(), true);
        $this->view->membershiplist = $this->model->getMembershipData();
        // load registration view page
        $this->view->LoadView('register');
    }
    
    /**
     * registerdetails()
     */
    public function registerdetails() {
        $error = array();
        $success = array();
        $response  = array('file' => array());
        
        $filedir   = BASE . "uploads/members/";  
        $file_tmp  = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $ext1 = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);       
        $newFile = $_FILES['file']['name'];
        $format  = date("dmY")."".date("His")."_";
        $newName = $format."_medical_licence.".$ext1;         
        $info = array(
            'name'     => $file_name,
            'filename' => $file_name,
            'size'     => $file_size,
            'type'     => $file_type
        );       
        $allowedFileTypes = array("pdf","PDF", "docx", "DOCX", "doc","DOC");       
        if(in_array($ext1, $allowedFileTypes)) {            
           if(move_uploaded_file($file_tmp, $filedir . $newName)){
              $info['filename'] = $newName;
              $info['filepath'] = $filedir;
              $info['success'] = "done";
              $formData = $this->Form->prevent_xss($_POST);              
              $result   = $this->model->addregisterdetails($formData, $newName);
              if($result) {
                   $this->session->sets("success", 'Your registration completed');
                  $this->redirect('index');
               } else {
                   echo "fail";
                   $this->session->sets("faillure", 'sorry due to some error process not completed');
                   $this->redirect('registration/signup');
               }
           } else {
               $info['error'] = "error on file upload";
           }
       } else {
           $info['error'] = $ext1. " extension not allowed";
       }
    }
    
    /**
     * addAttachment
     * @access public
     */    
    public function addAttachment() {
       $error = array();
       $success = array();
       $response  = array('file' => array());        
       
       $filedir   = BASE . "uploads/attachments/";  
       $file_tmp  = $_FILES['file']['tmp_name'];
       $file_name = $_FILES['file']['name'];
       $file_size = $_FILES['file']['size'];
       $file_type = $_FILES['file']['type'];
       $ext1 = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
       
       $newFile = $_FILES['file']['name'];
       $format = date("dmY")."".date("His")."_";
       $newName = $format.$newFile;
       
       $info = array(
           'name'     => $file_name,
           'filename' => $file_name,
           'size'     => $file_size,
           'type'     => $file_type
       );
       
       $allowedFileTypes = array("jpeg","JPEG", "jpg", "JPG", "png","PNG");
       
       if(in_array($ext1, $allowedFileTypes)) {            
           if(move_uploaded_file($file_tmp, $filedir . $newName)){
              $info['filename'] = $newName;
              $info['filepath'] = $filedir;
              $info['success'] = "done";
              $formData = $this->Form->prevent_xss($_POST);
              $result   = $this->model->processAddattachment($formData,$info);
              if($result) {
                   $this->view->lastId = $result;
                   $this->session->sets("success", 'Your registration completed');
                   //$this->index();
                   $this->redirect('opportunities');
               } else {
                   $this->session->sets("faillure", 'sorry due to some error process not completed');
                   $this->redirect('opportunities/addopportunityattachments');
               }


           } else {
               $info['error'] = "error on file upload";
           }
       } else {
           $info['error'] = $ext1. " extension not allowed";
       }
    }
        
    /**
     * countries()
     * get contries list
     */
    public function countries() {
        $data = SITEURL."index/countries";
        return file_get_contents($data);        
    }
    
    /**
     * emailcheck()
     * echeck email existing or not
     * @access public
     */
    public function emailcheck() {
        $emailId = $_POST['email'];        
        $result  = $this->model->emailcheck($emailId);
        if($result) {
            $idStatus = "0";            
        } else {
            $idStatus = "1";           
        }        
        header('Content-type: application/json');
        die( json_encode( $idStatus ) );        
    }
    
}


?>
