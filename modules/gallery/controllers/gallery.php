<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* faculty
* 
* This is gallery controller in gallery Module 
* 
* PHP version 5
* 
* @category   gallery
* @package    gallery
* author farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class gallery extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();             
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "gallery";
        $metaData['description'] = "gallery";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * index()
     * load gallery page
     * @access public
     */
    public function index() {
        $metaData                = array();
        $metaData['title']       = "gallery";
        $metaData['description'] = "gallery";
        $this->view->meta        = $metaData;
        $this->view->galleryList  = $this->model->getGalleryList();
        $this->view->courselist  = $this->model->courselist();
        $this->view->testmonialslist  = $this->model->testmonialslist();
        $this->view->Loadview('gallery', 'gallery');
    }
    
    /**
     * details()
     * @param int $id
     * @access public
     */
    public function details($id) {
        $metaData                = array();
        $metaData['title']       = "gallery details";
        $metaData['description'] = "gallery details";
        $this->view->meta        = $metaData;
        $this->view->GalleryDetails  = $this->model->getGalleryDetails($id);
        $this->view->courselist  = $this->model->courselist();
        $this->view->testmonialslist  = $this->model->testmonialslist();
        $this->view->Loadview('details', 'gallery');
    }
}

/* End of file gallery.php */
/* Location: ./modules/gallery/controllers/gallery.php */
?>