<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* memberships
* 
* This is memberships controller in memberships Module 
* 
* PHP version 5
* 
* @category   memberships
* @package    memberships
* @author     SUDHARSHAN MEKALA<><sudharshan.mphp@gmail.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class memberships extends Controller {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();
        
        // Verify user login
        if(!$this->session->gets('adminuser_id')) 
            $this->redirect('index');        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage memberships";        
        $this->view->meta =  $metaData;        
        $this->view->dropzoneAssets     = false;
    }
    
   /**
    * index
    * load view page
    * @access public
    * @return type Description
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title']              = "Manage memberships";        
        $this->view->meta               = $metaData;
        $this->view->dashboardAssets    = false;        
        $this->view->datatableAssets    = true;
        $this->view->formAssets         = true; 
        $this->view->dropzoneAssets     = false;
        // load memberships view page
        $this->view->LoadView('memberships', 'memberships');
    } 
	
	/**
     * add()
     * load memberships add page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']              = "Manage memberships - Add memberships";        
        $this->view->meta               = $metaData;
        $this->view->dashboardAssets    = false;        
        $this->view->datatableAssets    = false;
        $this->view->formAssets         = true; 
        $this->view->dropzoneAssets     = false;
        // load add memberships view page
        $this->view->LoadView('add_memberships', 'memberships');
    }
    
   
    /**
     * addMembershipsDetails()
     * add memberships form details
     * @access public
     */
    public function addMembershipsDetails() {        

        $result = $this->model->addMembershipsDetails($_POST);
		
        if($result != 0) {
            $this->session->sets("success", 'memberships details successfully added');
            $this->redirect('memberships');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('memberships/add/');
        }
    }
	
    /**
     * getMemberships()
     * get the memberships list
     * @access public
     */
    public function getMemberships() {        
        $result = $this->model->getMemberships();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change membership status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];        
        $this->model->changeStatus($_POST); 
        if($status == 1) {            
            echo 0;
        } else {
            echo 1;
        }
    }
    
    /**
     * deletememberships()
     * delete the memberships records
     * @access public
     */
    public function deletememberships() {        
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deletememberships($_POST['deleteme']);
            echo 1;
        }
    }

    
    /**
     * details()
     * load memberships details page
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']             		 = "Manage memberships - memberships details";        
        $this->view->meta              		 = $metaData;
        $this->view->dashboardAssets   		 = false;        
        $this->view->datatableAssets    	 = true;
        $this->view->formAssets              = false;        
        $this->view->membershipsDetails    	 = $this->model->membershipsDetails($id);    // get the memberships details
        // load add memberships view page
        $this->view->LoadView('details_memberships', 'memberships');
    }
    
    /**
     * edit()
     * load edit memberships page
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']              = "Manage memberships - Edit memberships";        
        $this->view->meta               = $metaData;
        $this->view->dashboardAssets    = false;        
        $this->view->datatableAssets    = false;
        $this->view->formAssets         = true;        
        $this->view->membershipsDetails     = $this->model->membershipsDetails($id);    // get the memberships details
        // load add memberships view page
        $this->view->LoadView('edit_memberships', 'memberships');
    }
    
    /**
     * updateMembershipDetails()
     * update memberships form details
     * @access public
     */
    public function updateMembershipDetails()
	{
		$result = $this->model->updateMembershipDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('memberships');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('memberships/edit/'.$_POST['membership_id']);
        }
    }
}

/* End of file memberships.php */
/* Location: ./modules/memberships/controllers/memberships.php */
?>