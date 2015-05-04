<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Banners
* 
* This is Banners controller in Banners Module 
* 
* PHP version 5
* 
* @category   Banners
* @package    Banners
* @author     farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Banners extends Controller {
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
            $this->LoadHelper('Seo');           // Load email helper
            $this->LoadHelper('ImageUpload');   // Load thumbnail helper        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Banners";        
        $this->view->meta  =  $metaData;
    }
    
    /**
     * index
     * View banners list
     * @access public
     */
    public function index() {  
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Banners - Add Banners";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->BannerList      = $this->model->processGetBanners();    // get banners list
        $this->view->LoadView('banner_view', 'banners');
    } 
    
    /**
     * add
     * load add banners page
     * @access public
     */
    public function add() { 
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Banners - Add Banners";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->LoadView('banner_add', 'banners');
    }
    
    /**
     * add()
     * add banners details
     * @access public
     */
    public function AddbannerDetails() {

        $filedir  = BASE . "uploads/banners/";
        //$thumbdir = BASE . "uploads/banners/thumbs/";
        $randName = rand(101010, 909090);
        if(!empty($_FILES['image_file']['name'])){
            $imageDimensions = getimagesize($_FILES["image_file"]["tmp_name"]);
            $imageWidth      = $imageDimensions[0];
            $imageHeight     = $imageDimensions[1]; 
            
            $newName  = "banner_" . $randName;
            $ext      = substr($_FILES['image_file']['name'], strrpos($_FILES['image_file']['name'], '.') + 1);
            
            $originalDimensions = $this->model->processGetPositionsById(1);
            $orgDim = explode("*", $originalDimensions['position_size']);
            
            if($imageWidth == $orgDim[0] && $imageHeight == $orgDim[1]) {            
                $newName = "banners_" . $randName;
                $ext = substr($_FILES['image_file']['name'], strrpos($_FILES['image_file']['name'], '.') + 1);

                $fullname = $filedir . $newName.".".strtolower($ext);
                //$fullname2 = $thumbdir . $newName.".".strtolower($ext);
                move_uploaded_file($_FILES['image_file']['tmp_name'], $fullname);

                $_POST['image_file'] = $newName.".".strtolower($ext);
                
                $result = $this->model->processAddbanner($_POST);
                if($result != 0){
                    $this->session->sets('success' ,'New banner details are sucessfully added');
                    $this->redirect('banners');
                } else {
                    $this->session->sets('fail' ,'Please check the details');
                    $this->redirect('banners/add');
                }
            } else {
                $this->session->sets('image_dimension' ,'Please upload '.$originalDimensions['position_size'].' dimension image');
                $this->redirect('banners/add');
            }            
        }
    }
    
    /**
     * edit()
     * load edit banners details page
     * @param int $id
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Banners - Edit Banners";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->bannerDetails   = $this->model->getBannerDetails($id); // get banner details
        $this->view->LoadView('banner_edit', 'banners');        
    }
        
    /**
     * updateBanner()
     * update banners details
     * @access public
     */    
    public function updateBannerDetails() {

        $filedir  = BASE . "uploads/banners/";
        $randName = rand(101010, 909090);
        if(!empty($_FILES['image_file']['name'])){
            $unlinkFile = $filedir.$_POST['old_image_file'];
            unlink($unlinkFile);
            
            $imageDimensions = getimagesize($_FILES["image_file"]["tmp_name"]);
            $imageWidth      = $imageDimensions[0];
            $imageHeight     = $imageDimensions[1];
            
            $originalDimensions = $this->model->processGetPositionsById(1);
            $orgDim = explode("*", $originalDimensions['position_size']);
            
            if($imageWidth == $orgDim[0] && $imageHeight == $orgDim[1]) {   
                $newName = "banners_" . $randName;
                $ext = substr($_FILES['image_file']['name'], strrpos($_FILES['image_file']['name'], '.') + 1);

                $fullname = $filedir . $newName.".".strtolower($ext);
                move_uploaded_file($_FILES['image_file']['tmp_name'], $fullname);

                $_POST['image_file'] = $newName.".".strtolower($ext);
            } else {
                $this->session->sets('image_dimension' ,'Please upload '.$originalDimensions['position_size'].' dimension image');
                $this->redirect("banners/edit/".$_POST['BannerID']);
                //exit;
            }
            
        } else {
            $_POST['image_file'] = $_POST['old_image_file'];
        }
        $result = $this->model->bannerUpdate($_POST);
        if($result) {
            $this->session->sets('EditSuccess', 'Banner details are sucessfully updated');
            $this->redirect("banners");
        } else {
            $this->session->sets('EditFailure', 'Please check the details');
            $this->redirect("banners/edit/".$_POST['BannerID']);
        }
    }
    
    /**
     * deleteBanner
     * delete banner details from database
     * @access public
     */
    public function deleteBanner() {
        $filedir = BASE . "uploads/banners/";
        $eventsunlink_data = $this->model->processBannersDataUnlink($_POST['deleteme']);
        foreach ($eventsunlink_data as $data) {
            if(!empty($data['image_file'])) {
                if (file_exists($filedir . $data['image_file'])) {
                    unlink($filedir . $data['image_file']);
                }
            }
        }
        $this->model->processBannerDelete($_POST['deleteme']);
        echo 1;
    }
    
    /**
     * changeStatus()
     * change banner status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];
        if($status == 'y') {            
            echo "0";
        } 
        else {
            echo "1";
        }
        $this->model->changeStatus($_POST);
    }
    
    /**
     * details()
     * load details banners details page
     * @param int $id
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage Banners - Details Banners";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->bannerDetails   = $this->model->getBannerDetails($id); // get banner details
        $this->view->LoadView('banner_detail', 'banners');        
    }
}

/* End of file banners.php */
/* Location: ./modules/banners/controllers/banners.php */
?>