<?php
class register extends Controller {

    public function __construct() {
        parent::__construct();
        
           
        // healper
        $this->LoadHelper('Form');
        //$this->LoadHelper('ImageUpload');
        //$this->LoadHelper('fb');
        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "User Signing";
        $metaData['description'] = "User Signing";
        $this->view->meta  = $metaData;
        
    }
    
    /**
     * signup()
     */
    public function signup()  {
        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "User SignUp";
        $metaData['description'] = "User SignUp";
        $this->view->meta  = $metaData;
        
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
        $format = date("dmY")."".date("His")."_";
        $newName = $format.$newFile;
        
//       
        $info = array(
            'name'     => $file_name,
            'filename' => $file_name,
            'size'     => $file_size,
            'type'     => $file_type
        );
        //echo "<pre>";print_r($info);exit;
       
        $allowedFileTypes = array("pdf","PDF", "docx", "DOCX", "doc","DOC");
       
        if(in_array($ext1, $allowedFileTypes)) {            
           if(move_uploaded_file($file_tmp, $filedir . $newName)){
              $info['filename'] = $newName;
              $info['filepath'] = $filedir;
              $info['success'] = "done";
              $formData = $this->Form->prevent_xss($_POST);
              $result   = $this->model->addregisterdetails($formData,$info);
              if($result) {
                  //echo "success";
                   //$this->view->lastId = $result;
                   $this->session->sets("success", 'Your registration completed');
                   //$this->index();
                  $this->redirect('index');
               } else {
                   echo "fail";
                   $this->session->sets("faillure", 'sorry due to some error process not completed');
                   $this->redirect('register/signup');
               }


           } else {
               $info['error'] = "error on file upload";
           }
       } else {
           $info['error'] = $ext1. " extension not allowed";
       }
    }
    
    
    
    
    
    
    
    public function addAttachment() {
       // print_r($_POST);
       // exit;      
       $error = array();
       $success = array();
       $response  = array('file' => array());        
       
       $filedir = BASE . "uploads/attachments/";  
       $file_tmp = $_FILES['file']['tmp_name'];
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
        
       
    
}


?>
