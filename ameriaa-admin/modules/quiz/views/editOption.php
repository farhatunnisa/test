
<!-- BEGIN Content -->
  <div id="content" class="app-content" role="main"> 
    <div class="app-content-body ">
    <!-- BEGIN Breadcrumb -->
    <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>quiz" title="quiz">Quiz</a></li>
            <li><a title="edit option" style="cursor: auto;">Edit Option </a></li>
          </ul><br>
        </div>
    <!-- END Breadcrumb --> 
    
    <div class="wrapper-md">
      <div class="panel panel-default">
         <div class="panel-heading font-bold">
             Edit  Option
          </div>
        <div class="panel-body">
            <form class="form-horizontal" id="validation-form" action="<?php echo SITEURL; ?>quiz/updateOptionDetails" method='post' enctype="multipart/form-data">
              
             <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Option Name</label>
                <div class="col-sm-10"> 
                    <input type="text" value='<?php echo $this->optionsLists['choice_name']; ?>' class="form-control" placeholder="Option Name" id="textfield5" name="choice_name" data-rule-minlength="3" data-rule-required="true">  
                </div>
             </div>
               
              <div class="form-group last">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                    <input type='hidden' name='question_id' value='<?php echo $this->optionsLists['question_id']; ?>'>
                    <input type='hidden' name='choice_id' value='<?php echo $this->optionsLists['choice_id']; ?>'>
                    <input type='hidden' name='test_id' value='<?php echo $this->QuestionDetails['test_id']; ?>'>
                    <input type='hidden' name='test_type' value='<?php echo $this->QuestionDetails['test_type']; ?>'>
                    <input type="submit" value="Save" name="submit" class="btn btn-primary">
                    <button class="btn" type="button" id="cancel">Cancel</button>
                </div>
              </div>
                
            </form>
          </div>
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
 