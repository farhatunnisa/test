<?php
/*
 * This is login controler 
 * Default controller 
 * author SANKAR YETURI <sankar.g@siriinnovations.com>
 */
class login extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct(); 
        //login condition        
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        $result = $this->model->loginSubmit($_POST);
        print_r($result); exit;
    }    
}
?>