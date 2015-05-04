<?php
/**
* Header
* 
* This is header controller in Header Controller 
* 
* PHP version 5
* 
* @category   Header
* @package    Search
* @author Original Author <sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Header extends Controller {
    
    public function __construct() {
        parent::__construct();
        // Verify user login
        if(!$this->session->gets('adminuser_id')) 
            $this->redirect('index');
        // loading email helper
        $this->LoadHelper('Email');
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Welcome - Dashboard";        
        $this->view->meta =  $metaData;
    }
       
}
/* End of file header.php */
/* Location: ./controllers/header.php */
?>
