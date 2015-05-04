<?php
/*
 * This is index controler 
 * Default controller 
 */
class index extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct(); 
        //login condition
        
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        //echo "Hi"; exit;
        //$this->view->layout = "loginlayout";
        //$this->view->bannerList = $this->model->getbanners();
        $this->view->coursesList = $this->model->getallcourses();
        $this->view->testimonialsList = $this->model->gettestimonials();
        $this->view->blogList = $this->model->getblog();
        $this->view->newsList = $this->model->getnews();
        $this->view->LoadView('index');
    }
    
    /**
     * newsletter()
     */
    public function newsletter() {
        $result = $this->model->addnewsletter($_POST);
        if($result) {
            $this->redirect('index');
        } else {
            echo "error";
        }
    }
    
    /**
     * search()
     */
    public function search() {
        $this->view->searchList = $this->model->getsearch($_POST);
        $this->view->Loadview('search');
    }
    
    /**
     * contact()
     * footer contact form submit
     * @access public
     */
    public function contact() {
        $result = $this->model->contactDetails($_POST);
        if($result) {
            echo '1';
        } else {
            echo '0';
        }
    }  
}

?>