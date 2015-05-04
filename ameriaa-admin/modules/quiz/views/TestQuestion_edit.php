
<!-- BEGIN Content -->
  <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
          
       
    <!-- BEGIN Breadcrumb -->
    <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
        <ul class="movingrowlinks">	
          <li><a href="" title="Home">Home </a></li>		
          <li><a href="<?php echo SITEURL;?>quiz" title="quiz">Quiz</a></li>
          <li><a title="Add test question" style="cursor: auto;">Edit Test Question</a></li>
        </ul><br>
     </div>
    <!-- END Breadcrumb --> 
    
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">
            Edit Question
          </div>
        <div class="panel-body">
            <form class="form-horizontal" id="validation-form" action="<?php echo SITEURL; ?>quiz/updateTestQuestionDetails" method='post' enctype="multipart/form-data">
             
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-id-1">Question Name</label>
                 <div class="col-sm-10">
                    <textarea class="form-control" id="body_content" name="question_name" rows="4" cols="30" data-rule-minlength="3" data-rule-required="true">
                        <?php echo $this->QuestionDetails['question_name']; ?>
                    </textarea>
                  </div>
                </div>
               <div class="line line-dashed b-b line-lg pull-in"></div>
                <thead>
                <?php
                  if($this->optionsLists != '') {
                         $i = 2;
                         $j = 1;
                  foreach($this->optionsLists as $value) {
                ?>
                    
               <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label"><?php echo "Option".$j; ?></label>
                <div class="col-sm-10">
                    <input type="text" value='<?php echo $value['choice_name']; ?>' class="form-control" placeholder="<?php echo "Option".$j; ?>" id="textfield5" name="choice_name[]" data-rule-minlength="3" data-rule-required="true">
                    <input type="hidden" value="<?php echo $value['choice_id']; ?>" name="choice_ids[]">
                </div>
              </div>
                          
              </thead>
              <tbody>        
                  
                 <?php
                    $i++;
                    $j++;
                  }  }                        
                 ?>                          
                
               </tbody>
              <div class="line line-dashed b-b line-lg pull-in"></div> 
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Answer Explanation</label>
                <div class="col-sm-10">
                    <input type="text" value='<?php echo $this->QuestionDetails['question_explanation']; ?>' data-rule-minlength="3" data-rule-required="true" class="form-control" placeholder="Question Explanation" 
                           name="question_explanation"  data-rule-minlength="3" data-rule-required="true">
                </div>
              </div>
               <div class="line line-dashed b-b line-lg pull-in"></div>
               
             <div class="form-group">
                <label class="col-sm-2 control-label">Question Status</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label class="i-checks">
                          <input type="radio" value='y' name="question_status" <?php if($this->QuestionDetails['question_status'] == 'y')  echo "checked"; ?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                     <div class="radio">
                        <label class="i-checks">
                          <input type="radio" <?php if($this->QuestionDetails['question_status'] == 'n')  echo "checked"; ?> value='n' name="question_status">
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div> 
                </div>
              </div>                           
              <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type='hidden' name='question_id' value='<?php echo $this->QuestionDetails['question_id']; ?>'>
                    <input type='hidden' name='test_id' value='<?php echo $this->QuestionDetails['test_id']; ?>'>
                    <input type='hidden' name='test_type' value='<?php echo $this->QuestionDetails['test_type']; ?>'>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" id="cancel" class="btn btn-default">Cancel</button>                    
                  </div>
              </div>                
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
$('#cancel').click(function() {
   if(confirm("Are you sure you want to navigate away from this page?"))
   {
      history.go(-1);
   }        
   return false;
});
});
</script> 