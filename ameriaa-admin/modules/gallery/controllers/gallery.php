<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Gallery Management
* 
* This is Gallery controller in Gallery Module 
* 
* PHP version 5
* 
* @category   Gallery
* @package    Gallery
* @author SANKAR<SANKAR.g@siriinnovations.com>
* @author farhat unnisa<farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Gallery extends Controller {
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
        
        $this->LoadHelper('Email');         // Load email helper       
        $this->LoadHelper('ImageUpload');   // Load ThumbNail helper
        $this->LoadHelper('File');          // Load File helper
    }
    
   /**
    * index
    * View gallery page
    * @access public
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Gallery - View Gallery";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->dropzoneAssets  = true;
        $this->view->formAssets      = true;        
        $this->view->LoadView('gallery', 'gallery');
    } 
    
    /**
     * getGallery
     * get the gallery list
     * @access public
     */
    public function getGallery() {
        $result = $this->model->getGallery();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change faculty status
     * @access public
     */
    public function changeStatus() {
        $status = $_POST['statusId'];        
        $this->model->changeStatus($_POST); 
        if($status == 1) {            
            echo 0;
        } else {
            echo 1;
        }
    }
    
    /**
     * deleteGallery()
     * delete the Gallery records
     * @access public
     */
    public function deleteGallery() {        
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteGallery($_POST['deleteme']);
            echo 1;
        }
    }    
    
    /**
     * add()
     * load add gallery page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Gallery - View Gallery";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->dropzoneAssets  = false;
        $this->view->formAssets      = true;        
        $this->view->LoadView('add_gallery', 'gallery');
    }

    /**
     * Add Gallery Deatils
     */
    public function addGalleryDetails() {
        
        if(isset($_POST['submit'])) {
            //$this->LoadHelper('File');            
            $path1    = BASE.'uploads/eventsphotos/thumbnail/';
            $randName = rand(10101010, 90909090);
            //$ext      = array("png","jpg","JPG","JPEG","jpeg","PNG");
            
            $image_name  = $_FILES['image']['name'];
            $imagesname1 = explode('.', $image_name);
            $imagename2  = $imagesname1[0];
            $imagename3  = $imagesname1[1];
            $image_final_name = $imagename2.$randName.".".$imagename3;
            
            //$this->File->fileNameExtention  = $ext;
            $this->File->fileName = $image_final_name;
            $this->File->fileType = $_FILES['image']['type'];
            $this->File->fileSize = $_FILES['image']['size'];
            $this->File->fileTemp = $_FILES['image']['tmp_name'];            
            $newName = $image_final_name;            
            $folderthumb = $path1;
            $this->ImageUpload->File = $_FILES['image'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $folderthumb;
            $this->ImageUpload->NewWidth = '300';
            $this->ImageUpload->NewHeight = '200';
            $upload_name = $imagename2.$randName;
            $this->ImageUpload->NewName = $upload_name;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $_POST['image'] = $newName;
            
            $result = $this->model->addGalleryDetails($_POST);
            //print_r($result); exit;
            if($result) {
                $this->session->sets("success", 'Successfully Gallery Added');                
                $this->redirect('gallery');
            } else {
                $this->session->sets("fail", 'Soryy due to some error process not completed');
                $this->redirect('gallery/add_gallery');
            }
        } else {
             $this->session->sets("fail", 'Sorry due to some error process not completed');
             $this->redirect('gallery/add_gallery');
        }
     }
     
     
    /**
     * edit()
     * load edit gallery page
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Gallery - Edit Gallery";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->dropzoneAssets  = false;
        $this->view->formAssets      = true;  
        
        if($id == NULL || (!is_numeric($id))) {
             $this->session->sets("fail", 'Sorry due to some error process not completed');
             $this->redirect('gallery');
        }
        $this->view->galleryDetails = $this->model->getGalleryDetails($id);
        $this->view->LoadView('edit_gallery', 'gallery');        
    }
    
    /**
     * updateGalleryDetails()
     * update gallery details
     * @access public
     */
    public function updateGalleryDetails() {
        if(isset($_POST['submit'])) {            
            $galleryId = $_POST['gallery_id'];
            $image_name = $_FILES['image']['name'];
            //$this->LoadHelper('File');
            $path1 = BASE.'uploads/eventsphotos/thumbnail/';  
            
            if(!empty($image_name)) {
                $randName = rand(10101010, 90909090);
                $ext = array("png","PNG","jpg","JPG","gif","GIF");
                $imagesname1 = explode('.', $image_name);
                $imagename2 = $imagesname1[0];
                $imagename3 = $imagesname1[1];
                $image_final_name = $imagename2.$randName.".".$imagename3;
                //print_r($image_final_name); exit;
                $this->File->fileNameExtention  = $ext;
                $this->File->fileName = $image_final_name;
                $this->File->fileType = $_FILES['image']['type'];
                $this->File->fileSize = $_FILES['image']['size'];
                $this->File->fileTemp = $_FILES['image']['tmp_name'];
                $newName     = $image_final_name;
                $folderthumb = $path1;
               
                $this->ImageUpload->File      = $_FILES['image'];
                $this->ImageUpload->method    = 1;
                $this->ImageUpload->SavePath  = $folderthumb;
                $this->ImageUpload->NewWidth  = '300';
                $this->ImageUpload->NewHeight = '200';
                $upload_name = $imagename2.$randName;
                $this->ImageUpload->NewName   = $upload_name;
                $this->ImageUpload->OverWrite = true;
                $err = $this->ImageUpload->UploadFile();
                //print_r($err); exit;
                $_POST['image'] = $newName;
                @unlink($path1.$_POST['old_image']);                
            } else{
                $_POST['image'] = $_POST['old_image'];
            }           
            
            $image_name = $_FILES['image']['name'];

            $result = $this->model->updateGalleryDetails($_POST);
            //print_r($result); exit;
            if($result) {
                $this->session->sets("success", 'Successfully Gallery Updated');
                $this->redirect('gallery');
            } else {
                $this->session->sets("fail", 'Sorry due to some error process not completed');
                $this->redirect('gallery/edit/'.$galleryId);
            }
        } else {            
             $this->session->sets("gallery_faillure", 'Sorry due to some error process not completed');
             $this->redirect('gallery/edit;/'.$galleryId);
        }       
          
    }
    
    /**
     * images()
     * load inner gallery page
     * @param int $id
     * @access public
     */
    public function images($id) { 
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Event Photos";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = true;
        $this->view->event_id        = $id;
        $this->view->galleryImages   = $this->model->getGalleryImages($id);         
        // load gallery_images page
        $this->view->LoadView('gallery_images', 'gallery');
    }
    
    /**
     * galleryImagesUpload
     * upload the gallery images
     * @param int $id
     * @access public
     */
    public function galleryImagesUpload($id){
        $filedir = BASE . "/uploads/eventsphotos/";
        $randName = rand(101010, 909090);
        if (!file_exists($filedir . $id)) {
            mkdir($filedir . $id, 0777, true);
        }
          
        $newName1 = "event_" . $id . "_" . $randName;
        $newName2 = "thumb_event_" . $id . "_" . $randName;
        $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
        $filedir1 = $filedir . $id . "/" ;
                
        $this->ImageUpload->File      = $_FILES['file'];
        $this->ImageUpload->method    = 1;
        $this->ImageUpload->SavePath  = $filedir1;       
        $this->ImageUpload->NewName   = $newName1;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();

        $this->ImageUpload->File      = $_FILES['file'];
        $this->ImageUpload->method    = 1;
        $this->ImageUpload->SavePath  = $filedir1;
        $this->ImageUpload->NewWidth  = '184';
        $this->ImageUpload->NewHeight = '100';
        $this->ImageUpload->NewName   = $newName2;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();
                
        $data = array(
            'gallery_id' => $id,
            'image_file' => $newName1.".".strtolower($ext),
            'image_thumb' => $newName2.".".strtolower($ext),
            'image_added_by' => $this->session->gets('adminuser_id')
        );
        
        $result = $this->model->processGalleryImagesUpload($data);
        if($result){
            echo "success";
        } else {
            echo "error";
        }         
    }
    
    /**
     * Gallery Images Titles update
     */
    public function galleryImageTitles(){
        $data = array(
            'image_id' => $_POST['image_id'],
            'image_title' => $_POST['image_title'],
            'image_desc' => $_POST['image_desc'],
        );
        $result = $this->model->processGalleryImageTitles($data);
        echo 1;
    }
    
    /**
     * Delete gallery Images
     */
    public function galleryImagesDelete() { 
        $id = $_POST['image_id'];
        $eventsunlink_data = $this->model->processGalleryImagesDataUnlink($id);
        $filedir = BASE . "/uploads/eventsphotos/" . $id . "/";
         
        foreach ($eventsunlink_data as $data) {
            if(!empty($data['image_file'])) {
                if (file_exists($filedir . $data['image_file'])) {
                    unlink($filedir . $data['image_file']);                  
                }
            }
        }
        $this->model->processGalleryImagesDelete($id);
        echo $id;
    }
    
    /**
     * imagesRefresh()
     * @param integer $id
     */
    public function imagesRefresh($id) { 
        $this->view->event_id = $id;
        $this->view->galleryImages = $this->model->getGalleryImages($id);
        $this->view->layout = "photoslayout";
        $this->view->LoadView('ajax/images', 'gallery');
    }
    
    /**
     * 
     * @param integer $id
     */
    
    
    /**
     * Gallery Images Titles update
     */
//    public function galleryImageTitles(){        
//        $data = array(
//            $data['image_id'] => $_POST['image_id'],
//            $data['image_title'] => $_POST['image_title'],
//            $data['image_desc'] => $_POST['image_desc'],            
//        );
//        
//        $result = $this->model->processGalleryImageTitles($data);
//        echo 1;
//    }
    
        
}
?>