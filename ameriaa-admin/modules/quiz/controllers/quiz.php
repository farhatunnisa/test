<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* quizz
* 
* This is quiz controller in quiz Module 
* 
* PHP version 5
* 
* @category   quiz
* @package    quiz
* @author     farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class quiz extends Controller {
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
            $metaData['title'] = "Manage quiz";        
            $this->view->meta  =  $metaData;
    }
    
    /**
     * index
     * View quiz list
     * @access public
     */
    public function index() {  
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Add quiz";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->topicList       = $this->model->processGetTopic();    // get topic list
        $this->view->LoadView('topic_view', 'quiz');
    } 
    
    /**
     * add
     * load add quiz page
     * @access public
     */
    public function add() { 
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Add quiz";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true; 
        $this->view->dropzoneAssets  = false;
        $this->view->LoadView('topic_add', 'quiz');
    }
    
    /**
     * add()
     * add topic details
     * @access public
     */
    public function AddTopicDetails() {
        
        $result = $this->model->addtopicDetails($_POST);
        if($result){
            $this->session->sets("success", 'Topic details successfully added');
            $this->redirect('quiz');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('quiz');
        }        
    }
    
    /**
     * edit()
     * load edit topic details page
     * @param int $id
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Edit quiz";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->TopicDetails    = $this->model->getTopicDetails($id); // get topic details
        $this->view->LoadView('topic_edit', 'quiz');        
    }
        
    /**
     * updateTopicDetails()
     * update Topic details
     * @access public
     */    
    public function updateTopicDetails() {

       $result = $this->model->UpdateTopic($_POST);
        if($result){
            $this->session->sets("success", 'Topic details successfully Updated');
            $this->redirect('quiz');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('quiz');
        }
    }
    
    /**
     * deleteTopic
     * delete Topic details from database
     * @access public
     */
    public function deleteTopic() {
        $this->model->processTopicDelete($_POST['deleteme']);
        echo 1;
    }
    
    /**
     * changeStatus()
     * change topic status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];
        if($status == '1') {            
            echo "0";
        } 
        else {
            echo "1";
        }
        $this->model->changeStatus($_POST);
    }
    
    /**
     * details()
     * load details topic details page
     * @param int $id
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Details quiz";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;   
        $this->view->dropzoneAssets  = false;
        $this->view->TopicDetail     = $this->model->getTopicDetails($id); // get topic details
        $this->view->LoadView('topic_detail', 'quiz');        
    }
    
    /**
     * testquestion()
     * @param type $id
     */
    public function testquestion($id) {
        
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Add testquestion";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;        
        $testId                      = $id;
        $this->view->testQuestionId  = $testId;
        $this->view->LoadView('test_question', 'quiz'); 
    }
    
    /**
     * addTestQuestionsDetails()
     */
    public function addTestQuestionsDetails() {

        $result = $this->model->addTestQuestionsDetails($_POST);       
        if($result) {
            $this->redirect('quiz');
        } else {
            $this->redirect('quiz/testQuestion/'.$_POST['test_id']);
        }        
    }
    
    /**
     * manageTestQuestions()
     * @param type $id
     */
    public function manageTestQuestions($id) {
        
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - managae testquestion";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        $this->view->testId             = $id;
        $questionsCount                 = $this->model->questionsInformation($id);
        $this->view->simpleType         = $questionsCount['noof_testquestions'];
        $questionsData                  = $this->model->manageTestQuestions($id);  
        $this->view->questionsLists     = $questionsData;
        
        foreach($questionsData as $value) {            
            $data = $this->model->choiceCountDetails($value['question_id']);
            $this->view->choiceCountDetails[$value['question_id']] = $data;
        }   
        $this->view->LoadView('manageTestQuestions', 'quiz');
    }
    
    /**
     * editTestQuestion()
     * @param type $questionId
     */
    public function editTestQuestion($questionId) {
         
         $metaData                    = array();
         $metaData['title']           = "Manage quiz - Edit test question";        
         $this->view->meta            = $metaData;        
         $this->view->datatableAssets = false;
         $this->view->formAssets      = true;  
         $this->view->dropzoneAssets  = false;
         $data                        = $this->model->getQuestionIdDetails($questionId);
         $this->view->QuestionDetails = $data;
         
         $optionsData                 = $this->model->choiceCountDetails($questionId);        
         $this->view->optionsLists    = $optionsData;             
         
         $this->view->LoadView('TestQuestion_edit', 'quiz');
    }
    
    /**
     * updateTestQuestionDetails()
     */
    public function updateTestQuestionDetails() {         
           
        $questionId = $_POST['question_id'];
        $testId     = $_POST['test_id'];
        $result     = $this->model->updateTestQuestionDetails($_POST);        
       
        if($result) {
            $this->redirect('quiz/manageTestQuestions/'.$testId);
        } else {           
            $this->redirect('quiz/manageTestQuestions/'.$testId);
        }        
    }
   
  /**
   * deleteTestQuestion()
   * @param type $id
   */
   public function deleteTestQuestion($id) {
        $questionId = $id[0];
        $testId     = $id[1];  
       
        $this->model->deleteTestQuestion($questionId);
        $ids = $this->model->getOptionId($questionId);       
        if($ids!='') {
           foreach($ids as $id1) {
               $this->model->deleteOptions($id1['choice_id']);               
           }               
        }            
          
       $this->redirect('quiz/manageTestQuestions/'.$testId);
    }
    
    /**
     * deleteAllTestQuestions()
     */
    public function deleteAllTestQuestions() {                 
        $this->model->deleteAllTestQuestions($_POST);
        $this->model->deleteAllTestQuestionOptions($_POST);
    }
    
    /**
     * displayTestQuestionOptions()
     * @param type $id
     */
    public function displayTestQuestionOptions($id) {        
        $metaData                    = array();
        $metaData['title']           = "Manage quiz - Edit test question";        
        $this->view->meta            = $metaData;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true; 
        $this->view->dropzoneAssets  = false;
        $optionsData                 = $this->model->choiceCountDetails($id);        
        $this->view->optionsLists    = $optionsData;        
        $answerData                  = $this->model->displayTestQuestionInformation($id);
        $this->view->answerLists     = $answerData;
        $answerDetails               = $this->model->testQuestionAnswer($id,$answerData['question_answer']);
        $this->view->optionAnswerLists = $answerDetails;               
        $this->view->LoadView('TestQuestionOptions_display', 'quiz');      
    }
    
    /**
     * editOption()
     * @param type $id
     */
    public function editOption($id) {

         $metaData                    = array();
         $metaData['title']           = "Manage quiz - Edit question options";        
         $this->view->meta            = $metaData;        
         $this->view->datatableAssets = false;
         $this->view->formAssets      = false; 
        $this->view->dropzoneAssets   = false;
         $questionId                  = $id[0];
         $choiceId                    = $id[1];        
         $optionsData                 = $this->model->editOptionDetails($questionId, $choiceId); 
         $this->view->optionsLists    = $optionsData;    
         $data                        = $this->model->getQuestionIdDetails($questionId);
         $this->view->QuestionDetails = $data;
         $this->view->LoadView('editOption', 'quiz');
    }
    /**
     * updateOptionDetails()
     */
   public function updateOptionDetails() {
        $questionId  = $_POST['question_id'];
        $choiceId    = $_POST['choice_id'];
        $result      = $this->model->updateOptionDetails($_POST);
        if($result) {
            $this->redirect('quiz/displayTestQuestionOptions/'.$questionId);
        } else {
            $this->redirect('quiz/editOption/'.$questionId);
        }        
    }
}

/* End of file quiz.php */
/* Location: ./modules/quiz/controllers/quiz.php */
?>