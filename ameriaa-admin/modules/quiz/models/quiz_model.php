<?php
/**
* quiz_Model
* 
* This is quizz model in quiz Module 
* 
* PHP version 5
* 
* @category   quiz_Model
* @package    quiz
* @author     farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class quiz_Model extends Model {
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * processGetTopic()
     * @return type
     */
    public function processGetTopic() {
        $sql = "SELECT * FROM ".DB_PREFIX."topic ORDER BY topic_id DESC";
        return $this->db->findAll($sql);
    }
    
    /**
     * addtopicDetails
     * 
     * @param type $data
     * @return type
     */   
    public function addtopicDetails($data) {
        
        $values                 = array();
        $values['topic_name']   = $data['title'];
        $values['status']       = $data['status'];
        $values['created']      = date('y-m-d h:i:s a', time());
        $this->db->insert(DB_PREFIX.'topic', $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getTopicDetails
     * 
     * @param type $id
     * @return type
     */
    public function getTopicDetails($id) {
        return $this->db->find("SELECT * FROM ".DB_PREFIX."topic WHERE topic_id = '".$id."'  ");
    }
    
    /**
     * update Topic details
     * @param type $data
     * @return type
     */
    public function UpdateTopic($data) {        
        
        $values                 = array();
        $values['topic_name']   = $data['title'];
        $values['status']       = $data['status'];
        $values['created']      = date('y-m-d h:i:s a', time());
        
        $id                     = $data['TopicID'];
        $sql = $this->db->update(DB_PREFIX.'topic', $values, "`topic_id` = $id");
        return $sql;
    }
    
    /**
     * processTopicDelete
     * delete Topic details from database
     * @access   public
     * @param    int   $id  topic_id 
     * @return   boolean true/false
     */
    public function processTopicDelete($id) {
        $this->db->deleteAll(DB_PREFIX."topic", "topic_id", $id);
        return true;
    }
    
    /**
     * changeStatus()
     * change topic status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data) {
        extract($data);        
        $values = array();
        if($data['statusId'] == '1') {
            $values['status'] = '0';
        } else {
            $values['status'] = '1';
        }
        $id = $data['TopicId'];       
        $result = $this->db->update(DB_PREFIX.'topic', $values, "`topic_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * addTestQuestionsDetails()
     * @param type $data
     * @return boolean
     */
    public function addTestQuestionsDetails($data) {
        
        extract($data);
        
        $sql = "SELECT * FROM ".DB_PREFIX."_ottestinformation WHERE test_id = :test_id";
        $result = $this->db->find($sql, array(':test_id' => $test_id));
        
        if($result['test_id'] != '') {
            $testInformation                       = array();            
            $testInformation['noof_testquestions'] = $result['noof_testquestions'] + $test_noofquestions;             
            $result = $this->db->update(DB_PREFIX.'_ottestinformation', $testInformation, "`test_id` = $test_id"); 
        } else {
            $testInformation                       = array();
            $testInformation['test_id']            = $test_id;
            $testInformation['noof_testquestions'] = $test_noofquestions;
            $res = $this->db->insert(DB_PREFIX.'_ottestinformation', $testInformation);
        } 
       
        /**
         * Add Normal test questions with options
         */        
        if(!empty($test_noofquestions)) {
            
            for($i=1; $i <= $test_noofquestions; $i++) {
                $name                           = $question_name;
                $answer                         = $question_answer;
                $explanation                    = $question_explanation; 
                $values                         = array();           
                $values['test_id']              = $test_id;
                $values['question_name']        = $name['TestQuestion'.$i];
                $values['question_answer']      = $answer['TestQuestion'.$i];
                $values['question_explanation'] = $explanation['TestQuestion'.$i];
                
                $res = $this->db->insert(DB_PREFIX.'_ottestquestions', $values);
                $id  = $this->db->lastInsertId();
                
                $optionArr   = $data['TestQuestion'.$i];
                $optionCount = count($optionArr);           
                for($j=1; $j<=$optionCount; $j++) {                 
                   $optionValues                = array();
                   $optionValues['question_id'] = $id;
                   $optionValues['choice_list'] = "option".$j;
                   $optionValues['choice_name'] = $optionArr['option'.$j];                      
                   $res = $this->db->insert(DB_PREFIX.'_ottestchoices', $optionValues);
                }                
            }                 
        }                   
        if($res) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * questionsInformation()
     * @param type $testId
     * @return type
     */
    public function questionsInformation($testId) {
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestinformation WHERE test_id = :test_id";
        $result = $this->db->find($sql, array(':test_id' => $testId));               
        return $result;
    }
    
    /**
     * manageTestQuestions()
     * @param type $id
     * @return type
     */
    public function manageTestQuestions($id) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestquestions WHERE test_id = :test_id";
        $result = $this->db->findAll($sql, array(':test_id' => $id));               
        return $result;    
    }
    
    /**
     * choiceCountDetails()
     * @param type $questionId
     * @return type
     */
    public function choiceCountDetails($questionId) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestchoices WHERE question_id = :question_id";
        $result = $this->db->findAll($sql, array(':question_id' => $questionId));               
        return $result;
    }
    
    /**
     * getQuestionIdDetails()
     * @param type $questionId
     * @return type
     */
    public function getQuestionIdDetails($questionId) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestquestions WHERE question_id = :question_id";
        $result = $this->db->find($sql, array(':question_id' => $questionId));               
        return $result;
    }
   
   /**
    * updateTestQuestionDetails()
    * @param type $data
    * @return boolean
    */
   public function updateTestQuestionDetails($data) {
       
         extract($data);         
          
         $values                         = array();         
         $values['question_name']        = $question_name; 
         $values['question_status']      = $question_status; 
         $values['question_explanation'] = $question_explanation;
         $id                             = $question_id;    

         $result = $this->db->update(DB_PREFIX.'_ottestquestions', $values, "`question_id` = $id");

         $optionNameArr = $data['choice_name'];
         $choicecount   = count($data['choice_name']);
         $choiceids     = $data['choice_ids'];         
         $choicevalues  = array();
         $choice        = array();

         for($i=0; $i<$choicecount; $i++) {                  
            $choicevalues['choice_name'] = $optionNameArr[$i]; 
            $choice                      = $choiceids[$i];               
            $result = $this->db->update(DB_PREFIX.'_ottestchoices', $choicevalues, "`question_id` = $id AND `choice_id` = $choice");                          
        } 
          
         if($result) {             
             return true;
         } else {
             return false;    
         }  
     }
     
     /**
      * deleteTestQuestion()
      * @param type $questionId
      */
     public function deleteTestQuestion($questionId) {       
	 $this->db->delete(DB_PREFIX.'_ottestquestions',"question_id=$questionId");      
     }
    
     /**
      * getOptionId()
      * @param type $questionId
      * @return type
      */
    public function getOptionId($questionId){
        
       $sql = "SELECT choice_id FROM ".DB_PREFIX."_ottestchoices WHERE  question_id = :question_id";
       return $this->db->findAll($sql, array(':question_id' => $questionId));
    }
    
    /**
     * deleteAllTestQuestions()
     * @param type $data
     * @return type
     */
    public function deleteAllTestQuestions($data) { 
         
         extract($data);
         $ids = $deletdata;         
         return $this->db->deleteAll(DB_PREFIX.'_ottestquestions', "`test_id`", $ids);         
     }
     
     /**
      * deleteAllTestQuestionOptions()
      * @param type $data
      * @return type
      */
     public function deleteAllTestQuestionOptions($data) { 
         
         extract($data);
         $ids = $deletdata;        
         return $this->db->deleteAll(DB_PREFIX.'_ottestchoices', "`question_id`", $ids);
     }
   
    /**
     * displayTestQuestionInformation()
     * @param type $questionId
     * @return type
     */
    public function displayTestQuestionInformation($questionId) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestquestions WHERE question_id = :question_id";
        $result = $this->db->find($sql, array(':question_id' => $questionId));               
        return $result;
    }
    
    /**
     * testQuestionAnswer()
     * @param type $questionId
     * @param type $answer
     * @return type
     */
    public function testQuestionAnswer($questionId, $answer) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestchoices WHERE question_id = :question_id AND choice_list = :choice_list";
        $result = $this->db->find($sql, array(':question_id' => $questionId, ':choice_list' => $answer));
        return $result;        
    }
    
    /**
     * editOptionDetails()
     * @param type $questionId
     * @param type $choiceId
     * @return type
     */
    public function editOptionDetails($questionId, $choiceId) {
        
        $sql    = "SELECT * FROM ".DB_PREFIX."_ottestchoices WHERE question_id = :question_id AND choice_id = :choice_id";
        $result = $this->db->find($sql, array(':question_id' => $questionId, ':choice_id' => $choiceId));
        return $result;        
    }
    
    /**
     * updateOptionDetails()
     * @param type $data
     * @return boolean
     */
    public function updateOptionDetails($data) {
         
         extract($data);
         
         $values                = array();
         $values['choice_name'] = $choice_name;
         $questionId            = $question_id; 
         $choiceId              = $choice_id;
         
         $result = $this->db->update(DB_PREFIX.'_ottestchoices', $values, "`question_id` = $questionId AND `choice_id` = $choiceId");
                    
         if($result) {
            return true;
         } else {
            return false;    
         }
     }
    
    
}

/* End of file quiz_model.php */
/* Location: ./modules/quiz/models/quiz_model.php */
?>
