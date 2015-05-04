<?php
/**
 * Login
 * 
 * PHP version 5
 * 
 * @author sankar <sankar.g@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class logout extends Controller {
    
    public function __construct() {
        parent::__construct();
        // loading seo helper
        $this->LoadHelper("Seo");
    }
    
    /**
     * index
     * destroying the sessions
     * @access public
     */
    public function index() {        
        $this->session->destroy();
        $this->redirect('index');        
    }  
}
?>
