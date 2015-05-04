<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* testimonials
* 
* This is testimonials controller in testimonials Module 
* 
* PHP version 5
* 
* @category   testimonials
* @package    testimonials
* author SANKAR YETURI <sankar.g@siriinnovations.com>
* @other author Sudharshan<sudharshan.m@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class testimonials extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "testimonials";
        $metaData['description'] = "testimonials";
        $this->view->meta        = $metaData;        
    }
    
    /**
     * index()
     * load course page
     * @access public
     */
    public function index() {
        // load mete data
        $metaData                = array();
        $metaData['title']       = "testimonials";
        $metaData['description'] = "testimonials";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->testimonialsList    = $this->model->gettestimonialssList();
        $this->view->courselist  = $this->model->courselist();
        $this->view->Loadview('testimonials', 'testimonials');
    }
    
    /**
     * details()
     * load blog details page
     * @param int $id
     * @access public     
     */
    public function details($id) {
		// load mete data
        $metaData                = array();
        $metaData['title']       = "News";
        $metaData['description'] = "News";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->newsDetails = $this->model->getNewsDetails($id);
        $this->view->relatedNews = $this->model->getRelatedNews($id);  
        $this->view->popularNews = $this->model->getPopularNews($id);	
        $this->view->Loadview('news_details', 'news');
    }
    
}

/* End of file news.php */
/* Location: ./modules/news/controllers/news.php */
?>