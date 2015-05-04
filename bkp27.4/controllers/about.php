<?php
/*
 * This is login controler 
 * Default controller 
 * author SANKAR YETURI <sankar.g@siriinnovations.com>
 */
class about extends Controller {

    public function __construct() {
        parent::__construct();        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "About us";
        $metaData['description'] = "About us";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * signup()
     */
    public function index()  {        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "About us";
        $metaData['description'] = "About us";
        $this->view->meta        = $metaData;        
        $this->view->LoadView('about_us');
    }    
}
?>