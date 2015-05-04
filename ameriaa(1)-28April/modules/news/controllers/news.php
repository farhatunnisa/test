<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* News
* 
* This is blog controller in blog Module 
* 
* PHP version 5
* 
* @category   News
* @package    News
* author SANKAR YETURI <sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class News extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();
        // Set meta data
        $metaData                = array();
        $metaData['title']       = "News";
        $metaData['description'] = "News";
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
        $metaData['title']       = "News";
        $metaData['description'] = "News";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->newsList    = $this->model->getNewsList();
        $this->view->Loadview('news', 'news');
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
        $this->view->Loadview('news_details', 'news');
    }
    
}

/* End of file news.php */
/* Location: ./modules/news/controllers/news.php */
?>