<?php
/*
 * This is index controler 
 * Default controller 
 */
class forgetpassword extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();  
        // verify login user
//        if($this->session->gets('adminuser_id')) 
//            $this->redirect('dashboard');
        // loading email helper
        $this->LoadHelper('Email');
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        //$this->view->layout = "loginlayout";
        $this->view->courselist  = $this->model->courselist();
        $this->view->testmonialslist  = $this->model->testmonialslist();
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
    public function forgetPassword() {
		    $email = $_POST['email'];
		    $mailid = $this->model->getUserDetails($email);
			if($mailid != '') {
			$randName = rand(10101010, 90909090);
            $password = $this->PassHash($mailid['member_id'].$randName.$mailid['member_id']);
			$value = array();
            $value['password'] = $password;
			$result = $this->model->updateForgotPassword($value,$mailid['member_id']);
            if($result == 1) {
                if(!empty($mailid['email'])) {            
                    $this->LoadHelper('Email');
                    $this->Email->To = $email;
                    $this->Email->From = "admin@ameriaa.com";
                    $this->Email->Subject = "Your Login Details";                           
                    $this->Email->Message = "<p>Hello <span style='color:red'>".$mailid['username']."</span></p>, Your Login Details<br>";
                    $this->Email->Message .= '<table>
                                                <tr><td>User id- </td><td>'.$mailid['email'].'</td></tr>
                                                <tr><td>Password- </td><td>'.$mailid['member_id'].$randName.$mailid['member_id'].'</td></tr>
                                             </table>';            
                    $this->Email->send();            
                }
                echo "1";
            } else {
                $this->session->sets("failure", 'sorry due to some error process not completed');
                echo "0";
            }
        } else {
            $this->session->sets("failure", 'sorry due to some error process not completed');
            echo "0";
        }
    }
}


?>