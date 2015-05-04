<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* partner
* 
* This is partner controller in partner Module 
* 
* PHP version 5
* 
* @category   partner
* @package    partner
* @author     farhat unnisa<farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class partner extends Controller {
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
        $this->LoadHelper('Seo');           //Load form helper
        $this->LoadHelper('Form');          //Load form helper
        $this->LoadHelper('ImageUpload');   // Load thumbnail helper
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage partner";        
        $this->view->meta =  $metaData;        
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
        $metaData['title']           = "Manage partner";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        // load faculty view page
        $this->view->LoadView('partner', 'partner');
    } 
    
    /**
     * getpartner()
     * get the partner list
     * @access public
     */
    public function getpartner() {        
        $result = $this->model->getpartner();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change faculty status
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
     * deletePartner()
     * delete the Partner records
     * @access public
     */
    public function deletePartner() { 
        //echo $_POST['deleteme'];exit;
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deletePartner($_POST['deleteme']);
            echo 1;
        }
    }

    /**
     * add()
     * load partner add page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage partner - Add partner";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;   
        $this->view->dropzoneAssets  = false;        
             
        // load add partner view page
        $this->view->LoadView('add_partner', 'partner');
    }
    
    /**
     * addPartnerDetails()
     * add partner form details
     * @access public
     */
    public function addPartnerDetails() {   

        $filedir  = BASE . "uploads/partner/";
        $thumbdir = BASE . "uploads/partner/thumbs/";
        $slugName = $this->Seo->pageslug($_POST['partner_name']);
        
        // image upload 
        if(!empty($_FILES['image']['name'])) {
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        }        
        $result = $this->model->addPartnerDetails($_POST);
        if($result != 0) {
            $this->session->sets("success", 'Partner details successfully added');
            $this->redirect('partner');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('partner/add/');
        }
    }
    
    /**
     * details()
     * load partner details page
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage partner - Partner details";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = false;  
        $this->view->dropzoneAssets  = false;
        $this->view->partnerDetails  = $this->model->getpartnerDetails($id);    // get the partner details
       
        $this->view->LoadView('details_partner', 'partner');
    }
    
    /**
     * edit()
     * load edit partner page
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage partner - Edit Partner";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->partnerDetails  = $this->model->getpartnerDetails($id);    // get the partner details
       // $this->view->countriesList   = file_get_contents(SITEURL."index/getCountries");
        // load add faculty view page
        $this->view->LoadView('edit_partner', 'partner');
    }
    
    /**
     * updateFacultyDetails()
     * update faculty form details
     * @access public
     */
    public function updatePartnerDetails() {
        // image upload 
        if(!empty($_FILES['image']['name'])){
            $filedir  = BASE . "uploads/partner/";
            $thumbdir = BASE . "uploads/partner/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['partner_title']);
            unlink($filedir.$_POST['old_image']);
            unlink($thumbdir.$_POST['old_image']);
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        } else {
            $_POST['image'] = $_POST['old_image'];
        }
        
        $result = $this->model->updatePartnerDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('partner');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('partner/edit/'.$_POST['partner_id']);
        }
    }    
    
    /**
     * cleanData()
     * 
     * @param type $str
     * @return string
     */
    public function cleanData($str) {
        // escape tab characters
        $str = preg_replace("/\t/", "", $str);

        // escape new lines
        $str = preg_replace("/\r?\n/", "", $str);
        $str = preg_replace("/\r\n/", "", $str);
        $str = preg_replace('/[\r\n\t]+/', "", $str);

        // convert 't' and 'f' to boolean values
        if($str == 't') $str = 'TRUE';
        if($str == 'f') $str = 'FALSE';

        // force certain number/date formats to be imported as strings
        if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
          $str = "'$str";
        }

        // escape fields that include double quotes
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        return $str;
    }
}

/* End of file partner.php */
/* Location: ./modules/partner/controllers/partner.php */
?>
