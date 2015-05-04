<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Dashboard extends Controller {
    
    public function __construct() {
        parent::__construct();
        // Verify user login
        if(!$this->session->gets('adminuser_id')) 
            $this->redirect('index');
        // loading email healper
        $this->LoadHelper('Email');
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Welcome - Dashboard";        
        $this->view->meta  =  $metaData;
    }
    
    /**
     * index()
     * loading dashboard page
     * @access public
     */    
    public function index() {
        $metaData = array();
        $metaData['title'] = "Welcome - Dashboard";        
        $this->view->meta  =  $metaData;
        $this->view->formAssets      = true;
        $this->view->datatableAssets = false;  
        $this->view->dropzoneAssets  = false;
        $this->view->courseCount     = $this->model->courseCount();
        $this->view->facultyCount    = $this->model->facultyCount();
        $this->view->courseList      = $this->model->getCourses();
        $this->view->facultyList     = $this->model->getFaculty();
        $this->view->quizDetails     = $this->model->getQuiz();
        $this->view->testimonialList = $this->model->getTestimonials();
        $this->view->LoadView('dashboard');
    }    
}
?>