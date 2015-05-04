<?php
/*
 * This is index controler 
 * Default controller 
 */
class index extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct(); 
        //login condition
        if($this->session->gets('adminuser_id')) 
            $this->redirect('dashboard');
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        $this->view->layout = "loginlayout";
        $this->view->LoadView('login');
    }
    
    /**
     * forgotPassword()
     * forgot password
     * @access public
     */
    public function forgotPassword(){
        $email = $_POST['forgotEmail'];
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
                $this->session->sets("forgot_faillure", 'soryy due to some error process not completed');
                echo "0";
            }
        } else {
            $this->session->sets("forgot_faillure", 'soryy due to some error process not completed');
            echo "0";
        }
    }
    
    /**
     * getCountries()
     * get countries list
     * @access public
     */
    public function getCountries() {
        $countries = $this->model->getCountries();
        echo json_encode($countries);
    }
}
