<?php

/**
 * Logout
 * 
 * PHP version 5
 * 
 * @author SANKAR YETURI <sankar.g@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class logout extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->LoadHelper("Seo");
    }
    
    /**
     * 
     */
    public function index() {
        $this->session->destroy();
        $this->redirect('index');
    }  
}
?>
