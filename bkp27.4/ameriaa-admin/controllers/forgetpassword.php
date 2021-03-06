<?php
/*
 * This is index controler 
 * Default controller 
 */
class Forgetpassword extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();  
        // verify login user
        if($this->session->gets('adminuser_id')) 
            $this->redirect('dashboard');
        // loading email helper
        $this->LoadHelper('Email');
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        $this->view->layout = "loginlayout";
        $this->view->LoadView('forgetpassword');
    }
    
    /**
     * checkEmail
     * check email existing or not
     */
    public function checkEmail() {
        $result = $this->model->checkEmail($_POST);
        if($result) {
            echo "true";           
        } else {
            echo "false";
        }
    }

        /**
     * forgotPassword()
     * forgot password
     * @access public
     */
    public function forgetPassword(){
        $email = $_POST['email'];
        $mailid = $this->model->getUserDetails($email);
        if($mailid != ''){
            $randName = rand(10101010, 90909090);
            $password = $this->PassHash($mailid['adminuser_id'].$randName.$mailid['adminuser_id']);
            $value = array();
            $value['password'] = $password;
            $result = $this->model->updateForgotPassword($value,$mailid['adminuser_id']);
            if($result == 1){
                if(!empty($mailid['email'])){            
                    $this->LoadHelper('Email');
                    $this->Email->To = $email;
                    $this->Email->From = "admin@siriinnovations.com";
                    $this->Email->Subject = "Your Login Details";                           
                    $this->Email->Message = "<p>Hello <span style='color:red'>".$mailid['username']."</span></p>, Your Login Details<br>";
                    $this->Email->Message .= '<table>
                                                <tr><td>User id- </td><td>'.$mailid['email'].'</td></tr>
                                                <tr><td>Password- </td><td>'.$mailid['adminuser_id'].$randName.$mailid['adminuser_id'].'</td></tr>
                                             </table>';            
                    $this->Email->send();            
                }
                echo "1";
            } else {
                $this->session->sets("forgot_faillure", 'sorry due to some error process not completed');
                echo "0";
            }
        } else {
            $this->session->sets("forgot_faillure", 'sorry due to some error process not completed');
            echo "0";
        }
    }
}
