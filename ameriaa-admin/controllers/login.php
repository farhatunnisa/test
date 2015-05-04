<?php
/*
 * This is index controler 
 * Default controller 
 */
class Login extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();  
        // verify login user
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
     * loginSubmit
     * loginsubmit using lgoin user
     * @access public
     */
    public function loginSubmit() {        
        if(isset($_POST['loginsubmit'])) {           
            $result = $this->model->loginSubmit($_POST);            
            if($result) {                
                if(isset($_POST['check'])) {
                    setcookie("username", $_POST['username'], time()+3600);
                }
                $this->redirect('dashboard');
            } else {
                $this->session->sets("failure","Sorry please provide valid details");
                $this->redirect('index');    
            }            
        } else {
            $this->session->sets("failure","Sorry please provide valid details");
            $this->redirect('index');
        }
    }    
}
