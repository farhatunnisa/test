<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* blog
* 
* This is blog controller in blog Module 
* 
* PHP version 5
* 
* @category   blog
* @package    blog
* author SANKAR YETURI <sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class blog extends Controller {
    
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();

        // Set meta data
        $metaData                = array();
        $metaData['title']       = "Blog";
        $metaData['description'] = "Blog";
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
        $metaData['title']       = "Blog";
        $metaData['description'] = "Blog";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        //$this->view->blogList    = $this->model->getBlogList();
        $this->view->bloglist = $this->model->getBlogList();
        //echo "<pre>";print_r($list);exit;
        $this->view->Loadview('blog', 'blog');
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
        $metaData['title']       = "Blog";
        $metaData['description'] = "Blog";
        $this->view->meta        = $metaData;
        //$this->view->left_layout = "left_view";
        $this->view->blogDetails = $this->model->getBlogDetails($id);        
        $this->view->commentslist = $this->model->getComments($id);
        $this->view->postList = $this->model->getposts($id);
        //echo "<pre>";print_r($commentslist);exit;
        $this->view->Loadview('blog_details', 'blog');
    }
    
    /**
     * postcomment()
     * @access public
     */
    public function postcomment() {
        $result = $this->model->postcomment($_POST);
        //print_r($result); exit;
        echo $result; exit;
    }
    
}

/* End of file blog.php */
/* Location: ./modules/blog/controllers/blog.php */
?>