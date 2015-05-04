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
        $this->masterslider = true;
    }
    
    /**
     * index()
     * loading login page
     * @access public
     */
    public function index() {
        $this->masterslider           = true;
        $this->view->coursesList      = $this->model->getallcourses();
        $this->view->testimonialsList = $this->model->gettestimonials();
        $this->view->blogList         = $this->model->getblog();
        $this->view->newsList         = $this->model->getnews();
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
    
    /**
     * countries()
     */
    public function countries() {
        $result = $this->model->getCountries($_POST);
        print_r(json_encode($result, true)); exit;
    }
    
    /**
     * Emailavailability()
     */
    public function Emailavailability() {
        $result = $this->model->checkEmail($_POST);
        if($result) {
            echo "1";    //email exit;        
        } else {
            echo "0";
        }
    }
    
    
}

?>