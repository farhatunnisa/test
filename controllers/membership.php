<?php
/*
 * This is membership controler 
 * Default controller 
 * author farhat unnisa <farhat.unnisa@siriinnovations.com>
 */
class membership extends Controller {

    public function __construct() {
        parent::__construct();        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "Membership";
        $metaData['description'] = "Membership";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * signup()
     */
    public function index()  {        
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "Membership";
        $metaData['description'] = "Membership";
        $this->view->meta        = $metaData; 
        
        $this->view->courselist  = $this->model->courselist();
        $this->view->testmonialslist  = $this->model->testmonialslist();
        $this->view->LoadView('membership');
    }    
}
?>