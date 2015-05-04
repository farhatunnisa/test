<?php
/**
* ChangePassword
* 
* This is cahnge password controller in ChangePassword Module
* 
* PHP version 5
* 
* @category   changePassword
* @package    changePassword
* @author     yuvakumar anusuri <yuva.kumar@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class ChangePassword extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();      
    }
  
    /**
    * changePassword
    * 
    * Load changePassword page
    * 
    * @access public
    */
    
    public function changePassword() {
         $metaData = array();
         $metaData['title'] = "Manage Password - Edit Password";        
         $this->view->meta =  $metaData;
         $this->view->dashboardAssets = false;
         $this->view->dropzoneAssets = false;
         $this->view->datatableAssets = false;
         $this->view->formAssets = true;
         $this->view->LoadView('changepassword'); 
    }
    /**
    * updateEditPassword
    * 
    * save password details in database
    * 
    * @access public
    */
    public function updateEditPassword () {   
        $data = array(
            'opassword' => $_POST['old_pass'],
            'npassword' => $_POST['new_pass'],
            'rpassword' => $_POST['confirm_pass'],
            'id' => $_POST['adminuser_id']
        );
        $result = $this->model->updateEditPassword($data);        
        if($result){
            $this->session->sets('success','Your password has been reset successfully.');
            $this->redirect('changePassword/changePassword');
        } else {
             $this->session->sets('fail','Your password reset failed.');
            $this->redirect('changePassword/changePassword');
        }
    }   
}
?>

