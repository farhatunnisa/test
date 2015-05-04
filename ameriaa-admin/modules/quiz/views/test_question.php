
<!-- BEGIN Content -->
<div id="content" class="app-content" role="main">
  <div class="app-content-body "> 
   
    <!-- BEGIN Breadcrumb -->
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>quiz" title="quiz">Quiz</a></li>
            <li><a title="Add question" style="cursor: auto;">Add Questions</a></li>
          </ul><br>
        </div>
    <!-- END Breadcrumb --> 
    
   <div class="wrapper-md">
      <div class="panel panel-default">
          <div class="panel-heading font-bold">
              Add Questions
            </div>
        <div class="panel-body">
          <div class="box-title">
            <h3><i class="icon-reorder"></i> Add Test Question Form</h3>
            <div class="box-tool">                 
                <a href="#" data-action="collapse"><i class="icon-chevron-up"></i></a> 
            </div>
          </div>
          <div class="box-content">
            <form class="form-horizontal" id="validation-form" action="<?php echo SITEURL; ?>quiz/addTestQuestionsDetails" method='post' enctype="multipart/form-data">  
            <!-- question boxes start -->
            <div class="row user-div">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group" style="padding: 15px;margin-bottom: 15px;">
                                    <div class="col-lg-12 controls">
                                      <div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>How many questions</strong></span>
                                        <select class="form-control chosen select-search" data-placeholder="Choose" tabindex="1" id="totalQuestions" name="totalQuestions" onchange="totalQuestionsOnchange(this.val)">
                                          
                                          <option value="5">5</option>
                                          <option value="10">10</option>
                                          <option value="15">15</option>
                                          <option value="20">20</option>
                                          <option value="25">25</option>
                                          <option value="30">30</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-6">
                                <div class="form-group" style="padding: 15px;margin-bottom: 15px;">
                                    <div class="col-lg-12 controls">
                                      <div class="input-group"> <span class="input-group-addon"><i class="icon-time"></i><strong>Test Duration</strong></span>
                                        <div class="input-group bootstrap-timepicker-component">
                                          <input class="form-control timepicker-default" type="text" name="test_time" />
                                          <span class="input-group-addon align"><i class="icon-time"></i></span> </div>
                                      </div>
                                    </div>
                                </div>
                            </div>-->
                        </div> 
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <h3><i class="icon-puzzle-piece"></i>Simple Type Questions</h3>
                            <div class="box-tool">
                                <div class="box-tool2">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box-content">                            
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="input-group"> <span class="input-group-addon"><i class="icon-font"></i><strong>How many questions</strong></span>
                                    <input type="text" data-rule-required="true" data-rule-number="true" id="test_noofquestions" name="test_noofquestions" placeholder="Only numbers" class="form-control">                                  
                                    <input type='button' value='Add Questions' id='addButton'>
                                  </div>
                                </div>
                            </div>                            
                           
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="table-responsive" style="border:0">
                                      <style>
                                          .question-paper tbody{
                                              margin-bottom: 5px;
                                          }
                                          .question-paper tbody tr th{
                                              background: #ccc;                                              
                                              border-right: 1px solid #ccc;
                                          }
                                          .istoolbar_container table tr td,  .table-advance .istoolbar_container table tbody > tr {
                                            padding: 0px;
                                            border: 0 !important;
                                           }
                                      </style>
                                      <table class="table table-advance question-paper" id="question-paper">                                        
                                      </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
<!--            <div class="row user-div">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-title">
                            <h3><i class="icon-puzzle-piece"></i> Passage Type Questions</h3>
                            <div class="box-tool">
                                <div class="box-tool2">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-content">                            
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="input-group"> <span class="input-group-addon"><i class="icon-font"></i><strong>How many questions</strong></span>
                                    <input type="text" data-rule-number="true" id="test_noofpassages" name="test_noofpassages" placeholder="Only numbers" class="form-control">                                    
                                    <input type='button' value='Add Passage With Questions' id='addPassage'>                                     
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="table-responsive" style="border:0">
                                      <style>
                                          .question-paper1 tbody {
                                              margin-bottom: 5px;
                                          }
                                          .question-paper1 tbody tr th {
                                              background: #ccc;                                              
                                              border-right: 1px solid #ccc;
                                          }
                                          .istoolbar_container table tr td,  .table-advance .istoolbar_container table tbody > tr {
                                            padding: 0px;
                                            border: 0 !important;
                                           }
                                           
                                          .passage-question tbody{
                                              margin-bottom: 5px;
                                          }
                                          .passage-question tbody tr th{
                                              background: #ccc;                                              
                                              border-right: 1px solid #ccc;
                                          }
                                          
                                      </style>
                                      <table class="table table-advance passage-question" id="passage-question">                                        
                                      </table>
                                      
                                      <table class="table table-advance question-paper1" id="question-paper1">                                        
                                      </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
<!--            <div class="row user-div">
                <div class="col-md-12">
                   <div class="box">
                        <div class="box-title">
                            <h3><i class="icon-puzzle-piece"></i> Figure Type Questions</h3>
                            <div class="box-tool">
                                <div class="box-tool2">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-content">                            
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="input-group"> <span class="input-group-addon"><i class="icon-font"></i><strong>How many questions</strong></span>
                                    <input type="text" data-rule-number="true" id="test_noofuploads" name="test_noofuploads" placeholder="Only numbers" class="form-control">
                                    <input type='button' value='Add Questions' id='addFigureQuestions'> 
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 controls">
                                  <div class="table-responsive" style="border:0">
                                      <style>
                                          .picquestion-paper tbody{
                                              margin-bottom: 5px;
                                          }
                                          .picquestion-paper tbody tr th{
                                              background: #ccc;                                              
                                              border-right: 1px solid #ccc;
                                          }
                                      </style>
                                      <table class="table table-advance picquestion-paper" id="picquestion-paper">                                        
                                      </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- /question boxes ends -->
            <div class="form-group last">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
<!--                <input type="hidden" name="testcount" value="0" id="testcount"/>-->
                <input type='hidden' name='test_id' value='<?php echo $this->testQuestionId; ?>'>
<!--                <input type='hidden' name='simple_questions' id="simple_questions">-->
<!--                <input type='hidden' name='passage_questions' id="passage_questions">
                <input type='hidden' name='picture_questions' id="picture_questions">-->
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
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
<!-- END CONTENT -->
<script type="text/javascript"> 
$(document).ready(function() {    
    
    $(document).on("click","#addButton", function() {
        var mainQuestion = parseInt($("#totalQuestions").val());       
        //var passageQuestions = $("#test_noofpassages").val();
        var simpleQuestions = $("#test_noofquestions").val();
        //var uploadQuestions = $("#test_noofuploads").val();
        
        var totalQuestions =  Number(passageQuestions) + Number(simpleQuestions) + Number(uploadQuestions);
        if(totalQuestions > mainQuestion) {
            alert("Limit Exceed");
            return false;
        }
        
        var rowCount = $('#question-paper .question-simple').length;        
        var countMe;
        var initialize;
        if(rowCount != 0) {
            var tbodyid = "#"+$("#question-paper .question-simple:last").attr("id");            
            var getTbodyId = tbodyid.split("-");             
            initialize = parseInt(getTbodyId[1]) + 1;
            countMe = parseInt($("#test_noofquestions").val()) + parseInt(getTbodyId[1]); 
            var passageQuestions = $("#test_noofpassages").val();       
            var uploadQuestions = $("#test_noofuploads").val();
            var totalQuestions = Number(passageQuestions) + Number(countMe) + Number(uploadQuestions);
            
            if(totalQuestions > mainQuestion) {
                alert("Limit Exceed");
                return false;
            }            
        } else {
            initialize = 1;
            countMe = parseInt($("#test_noofquestions").val());
        }        
        var dynamicQuestion = "";        
        for(var i=initialize; i<=countMe; i++) {
        dynamicQuestion += '<tbody id="question-'+i+'" class="question-simple">'+
                            '<tr bgcolor="#ccc">'+
                              '<td width="10%"><strong>Question '+i+'</strong></td>'+
                              '<td width="70%">&nbsp;</td>'+
                              '<td width="10%" colspan="2" align="right">'+
                                  '<a class="btn btn-add show-tooltip addoptions" title="Add option" href="javascript:void(0)"><i class="icon-plus"></i></a>'+
                                  '<a class="btn btn-delete show-tooltip removeQuestion" title="Delete question" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                              '</td>'+
                            '</tr>'+  
                            '<tr>'+
                              '<th width="10%">Question</th>'+
                              '<td width="80%" colspan="3" id="td-body_content'+i+'">'+                                  
                                  '<textarea id="editor'+i+'" name="question_name[TestQuestion' + i +']" class="form-control"></textarea><span id="div_editor'+i+'"></span>'+
                                  '<input type="hidden" name="normal_type" value="Normal">'+
                              '</td>'+
                            '</tr>';
          for(var j=1; j<=4; j++) {
                dynamicQuestion += '<tr class="options-box" id="'+i+'-'+j+'">'+
                            '<th width="10%">Option '+j+'</th>'+
                            '<td width="70%">'+
                                '<input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="username" name="TestQuestion' + i +'[option' + j +']" placeholder="Option'+j+'">'+
                            '</td>'+
                            '<td width="5%" style="text-align: center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[TestQuestion'+i+']" value="option' + j +'" class="regular-radio" id="r'+i+j+'" checked />'+
                                    '<label for="r'+i+j+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip removeOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
          }          
          dynamicQuestion += '<tr>'+
                              '<th width="10%">Explanation</th>'+
                              '<td colspan="3">'+
                                  '<textarea data-rule-minlength="3" rows="2" data-rule-required="true" class="form-control" id="About" name="question_explanation[TestQuestion'+i+']" placeholder="Write Question here..."></textarea>'+                                  
                              '</td>'+
                            '</tr>'+
                            '<tr>'+
                              '<td colspan="4">&nbsp;</td>'+
                            '</tr>'+
                          '</tbody>';
        }
        $("#question-paper").append(dynamicQuestion);
      
//        for(var k=initialize; k<=countMe; k++) {
//            $('<script>'+
//            'window["oEdit'+k+'"] = new InnovaEditor("oEdit'+k+'");'+
//            'window["oEdit'+k+'"].width = "100%";'+
//            'window["oEdit'+k+'"].height = 50;'+
//            'window["oEdit'+k+'"].enableFlickr = false;'+
//            'window["oEdit'+k+'"].enableCssButtons = false;'+
//            'window["oEdit'+k+'"].flickrUser = "";'+
//            'window["oEdit'+k+'"].returnKeyMode = 2;'+
//            'window["oEdit'+k+'"].toolbarMode = 2;'+
//            'window["oEdit'+k+'"].groups = ['+
//                            '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
//                            '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
//                            '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
//                            '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
//                            '];'+
//            'window["oEdit'+k+'"].css ="http://localhost/ameriaa/ameriaa-admin/public/template/admin/assets/editor/siri-theme/ergo/css/custom.css";'+
//            'window["oEdit'+k+'"].fileBrowser = "http://localhost/ameriaa/ameriaa-admin/public/template/admin/assets/editor/filemanager.php";'+
//            'window["oEdit'+k+'"].mode="XHTMLBody";'+
//            'window["oEdit'+k+'"].REPLACE("editor'+k+'","div_editor'+k+'");'+
//            '<\/script>').appendTo('body');              
//        }
    });
    
    $(document).on("click", ".addoptions", function() { 
        var tbodyid = "#"+$(this).parent().parent().parent().attr("id");
        var id = $(tbodyid+" tr.options-box:last").attr("id");
        var res = id.split("-");
        var iplus = parseInt(res[0]);
        var jplus = parseInt(res[1]) + 1;
        var dynamicOption = '<tr class="options-box" id="'+iplus+'-'+jplus+'">'+
                            '<th width="10%">Option '+jplus+'</th>'+
                            '<td width="70%">'+
                                '<input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="username" name="TestQuestion' + iplus +'[option' + jplus +']" placeholder="Option'+jplus+'">'+
                            '</td>'+
                            '<td width="5%" style="text-align:center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[TestQuestion'+iplus+']" value="option' + jplus +'" class="regular-radio" id="r'+iplus+jplus+'" />'+
                                    '<label for="r'+iplus+jplus+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip removeOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
        $(tbodyid+" tr.options-box:last").after(dynamicOption);
    });
    
    $(document).on("click",".removeQuestion", function() {
        $(this).parent().parent().parent().remove();
    });
    
    $(document).on("click", ".removeOption", function(){
        $(this).parent().parent().remove();
    });
});
</script>

<!--<script type="text/javascript"> 
// Figure Questions

$(document).ready(function() {
   
    $(document).on("click","#addFigureQuestions", function() {
        var mainQuestion = $("#totalQuestions").val(); 
        var passageQuestions = $("#test_noofpassages").val();
        var simpleQuestions = $("#test_noofquestions").val();
        var uploadQuestions = $("#test_noofuploads").val();
        var totalQuestions = Number(passageQuestions) + Number(simpleQuestions) + Number(uploadQuestions);
        if(totalQuestions > mainQuestion) {
            alert("Limit Exceed");
            return false;
        }        
        var rowCount = $('#picquestion-paper .question-picture').length;
       
        var countMe;
        var initialize;
        if(rowCount != 0) {
            var tbodyid = "#"+$("#picquestion-paper .question-picture:last").attr("id");
            alert(tbodyid);
            var getTbodyId = tbodyid.split("-");            
            initialize = parseInt(getTbodyId[1]) + 1;
            countMe = parseInt($("#test_noofuploads").val()) + parseInt(getTbodyId[1]);
            var passageQuestions = $("#test_noofpassages").val();
            var simpleQuestions = $("#test_noofquestions").val();
            var totalQuestions = Number(passageQuestions) + Number(simpleQuestions) + Number(countMe);
            if(totalQuestions > mainQuestion) {
                alert("Limit Exceed");
                return false;
            }
        } else {
            initialize = 1;
            countMe = parseInt($("#test_noofuploads").val());
        }        
        var dynamicFigureQuestion = "";        
        for(var i=initialize; i<=countMe; i++) {
        dynamicFigureQuestion += '<tbody id="question-'+i+'" class="question-picture">'+
                            '<tr bgcolor="#ccc">'+
                              '<td width="10%"><strong>Upload Question'+i+'</strong></td>'+
                              '<td width="70%">&nbsp;</td>'+
                              '<td width="10%" colspan="2" align="right">'+
                                  '<a class="btn btn-add show-tooltip picaddoptions" title="Add option" href="javascript:void(0)"><i class="icon-plus"></i></a>'+
                                  '<a class="btn btn-delete show-tooltip picRemoveQuestion" title="Delete question" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                              '</td>'+
                            '</tr>'+  
                            '<tr>'+
                              '<th width="10%">Question'+i+'</th>'+
                              '<td width="80%" colspan="3">'+
                                  '<textarea id="piceditor'+i+'" data-rule-minlength="3" rows="2" data-rule-required="true" name="question_name[UploadQuestion' + i +']"></textarea><span id="div_piceditor'+i+'"></span>'+
                                  '<input type="hidden" name="picture_type" value="Picture">'+
                              '</td>'+
                            '</tr>';
            for(var j=1; j<=4; j++) {
                dynamicFigureQuestion += '<tr class="picoptions-box" id="'+i+'-'+j+'">'+
                            '<th width="10%">Option '+j+'</th>'+
                            '<td width="70%">'+
                            '<div class="file-float">'+
                            '<div class="col-lg-12 controls">'+                  
                            '<div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select Picture</span> <span class="fileupload-exists">Change</span>'+
                              '<input type="file" class="file-input" name="UploadQuestion'+ i+'[option' + j +']"  />'+
                              '</span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a> </div>'+                  
                            '</div>'+
                            '</div>'+                             
                            '</td>'+
                            '<td width="5%" style="text-align: center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[UploadQuestion'+i+']" value="option' + j +'" class="regular-radio" id="picradio'+i+j+'" checked />'+
                                    '<label for="picradio'+i+j+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip picRemoveOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
          }          
          dynamicFigureQuestion += '<tr>'+
                              '<th width="10%">Explanation</th>'+
                              '<td colspan="3">'+
                                  '<textarea data-rule-minlength="3" rows="2" data-rule-required="true" name="question_explanation[UploadQuestion'+i+']" class="form-control" id="About" name="About" placeholder="Write Something here..."></textarea>'+
                              '</td>'+
                            '</tr>'+
                            '<tr>'+
                              '<td colspan="4">&nbsp;</td>'+
                            '</tr>'+
                          '</tbody>';
        }
        $("#picquestion-paper").append(dynamicFigureQuestion);
        for(var k=initialize; k<=countMe; k++) {
            $('<script>'+
            'window["oEditPicture'+k+'"] = new InnovaEditor("oEditPicture'+k+'");'+
            'window["oEditPicture'+k+'"].width = "100%";'+
            'window["oEditPicture'+k+'"].height = 50;'+
            'window["oEditPicture'+k+'"].enableFlickr = false;'+
            'window["oEditPicture'+k+'"].enableCssButtons = false;'+
            'window["oEditPicture'+k+'"].flickrUser = "";'+
            'window["oEditPicture'+k+'"].returnKeyMode = 2;'+
            'window["oEditPicture'+k+'"].toolbarMode = 2;'+
            'window["oEditPicture'+k+'"].groups = ['+
                            '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
                            '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
                            '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
                            '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
                            '];'+
            'window["oEditPicture'+k+'"].css ="http://localhost/brainwizz/admin/public/template/admin/assets/editor/siri-theme/ergo/css/custom.css";'+
            'window["oEditPicture'+k+'"].fileBrowser = "http://localhost/brainwizz/admin/public/template/admin/assets/editor/filemanager.php";'+
            'window["oEditPicture'+k+'"].mode="XHTMLBody";'+
            'window["oEditPicture'+k+'"].REPLACE("piceditor'+k+'","div_piceditor'+k+'");'+
            '<\/script>').appendTo('body');              
        }
    });
    
    $(document).on("click", ".picaddoptions", function() { 
        var tbodyid = "#"+$(this).parent().parent().parent().attr("id");
        var id = $(tbodyid+" tr.picoptions-box:last").attr("id");
        var res = id.split("-");
        var iplus = parseInt(res[0]);
        var jplus = parseInt(res[1]) + 1;
        var dynamicOption = '<tr class="picoptions-box" id="'+iplus+'-'+jplus+'">'+
                            '<th width="10%">Option '+jplus+'</th>'+
                            '<td width="70%">'+
                            '<div class="file-float">'+
                            '<div class="col-lg-12 controls">'+                  
                            '<div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select Picture</span> <span class="fileupload-exists">Change</span>'+
                              '<input type="file" class="file-input" name="UploadQuestion'+iplus+'[option' + jplus +']"  />'+
                              '</span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a> </div>'+                  
                            '</div>'+
                            '</div>'+                             
                            '</td>'+
                            '<td width="5%" style="text-align: center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[UploadQuestion'+iplus+']" value="option' + jplus +'" class="regular-radio" id="picradio'+iplus+jplus+'" />'+
                                    '<label for="picradio'+iplus+jplus+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip picRemoveOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
        $(tbodyid+" tr.picoptions-box:last").after(dynamicOption);
    });
        
    $(document).on("click",".picRemoveQuestion", function(){
        $(this).parent().parent().parent().remove();
    });
    $(document).on("click", ".picRemoveOption", function(){
        $(this).parent().parent().remove();
    });
});
    
</script>-->

<!--<script>
    //Add Passage with Questions
   
    $(document).on("click","#addPassage", function() {
        var mainQuestion = $("#totalQuestions").val();
        var passageQuestions = $("#test_noofpassages").val();
        var simpleQuestions = $("#test_noofquestions").val();
        var uploadQuestions = $("#test_noofuploads").val();
        var totalQuestions = Number(passageQuestions) + Number(simpleQuestions) + Number(uploadQuestions);  

        if(totalQuestions > mainQuestion) {
            alert("Limit Exceed");
            return false;
        }
        
        var rowCount = $('#passage-question .question-passage').length;        
        var totalCount;
        var initialize;
        if(rowCount != 0) {
            var tbodyid = "#"+$("#passage-question .question-passage:last").attr("id");
            //var tbodyid = "#"+$("#passage-question .question-passage").attr("id");
            var getTbodyId = tbodyid.split("-");           
            initialize = parseInt(getTbodyId[1]) + 1;
            totalCount = parseInt($("#test_noofpassages").val()) + parseInt(getTbodyId[1]);
            var simpleQuestions = $("#test_noofquestions").val();
            var uploadQuestions = $("#test_noofuploads").val();
            var totalQuestions = Number(totalCount) + Number(simpleQuestions) + Number(uploadQuestions);
            if(totalQuestions > mainQuestion) {
                alert("Limit Exceed");
                return false;
            }
            
        } else {
            initialize = 1;
            totalCount = parseInt($("#test_noofpassages").val());
        }
        
        var dynamicPassageQuestions = "";        
        for(var m = initialize; m <= totalCount; m++) {
        dynamicPassageQuestions += '<tbody id="passageDescription-'+m+'" class="question-passage">'+
                            '<tr bgcolor="#ccc">'+
                              '<td width="10%"><strong>Passage Description'+m+'</strong></td>'+
                              '<td width="70%">&nbsp;</td>'+
                              '<td width="10%" colspan="2" align="right">'+
                                  '<a class="btn btn-add show-tooltip passageAddQuestions" title="Add Questions" href="javascript:void(0)"><i class="icon-plus"></i></a>'+
                                  '<a class="btn btn-delete show-tooltip passageRemoveQuestion" title="Delete question" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                              '</td>'+
                            '</tr>'+  
                            '<tr>'+
                              '<th width="10%">Passage '+m+'</th>'+
                              '<td width="80%" colspan="3" id="td-body_content'+m+'">'+                                  
                                  '<textarea id="passageeditor'+m+'" name="passage_data['+m+']"></textarea><span id="passage_div_editor'+m+'"></span>'+
                                  '<input type="hidden" name="passage_type" value="Passage">'+
                              '</td>'+
                            '</tr>'+
                            '<tr>'+
                              '<td colspan="4">&nbsp;</td>'+
                            '</tr>';                                                 
        $("#passage-question").append(dynamicPassageQuestions);
            
            $('<script>'+
            'window["oEditPassage'+m+'"] = new InnovaEditor("oEditPassage'+m+'");'+
            'window["oEditPassage'+m+'"].width = "100%";'+
            'window["oEditPassage'+m+'"].height = 50;'+
            'window["oEditPassage'+m+'"].enableFlickr = false;'+
            'window["oEditPassage'+m+'"].enableCssButtons = false;'+
            'window["oEditPassage'+m+'"].flickrUser = "";'+
            'window["oEditPassage'+m+'"].returnKeyMode = 2;'+
            'window["oEditPassage'+m+'"].toolbarMode = 2;'+
            'window["oEditPassage'+m+'"].groups = ['+
                            '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
                            '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
                            '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
                            '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
                            '];'+
            'window["oEditPassage'+m+'"].css ="http://localhost/brainwizz/admin/public/template/admin/assets/editor/siri-theme/ergo/css/custom.css";'+
            'window["oEditPassage'+m+'"].fileBrowser = "http://localhost/brainwizz/admin/public/template/admin/assets/editor/filemanager.php";'+
            'window["oEditPassage'+m+'"].mode="XHTMLBody";'+
            'window["oEditPassage'+m+'"].REPLACE("passageeditor'+m+'","passage_div_editor'+m+'");'+
            '<\/script>').appendTo('body');              
       
        var dynamicPassageQuestions = "";        
        for(var i=1; i<=5; i++) {
        dynamicPassageQuestions += '<tbody id="passageQuestion-'+i+'" class="passageQuestions">'+
                            '<tr bgcolor="#ccc">'+
                              '<td width="10%"><strong>Passage '+m+' Question '+i+'</strong></td>'+
                              '<td width="70%">&nbsp;</td>'+
                              '<td width="10%" colspan="2" align="right">'+
                                  '<a class="btn btn-add show-tooltip passageAddoptions" title="Add option" href="javascript:void(0)"><i class="icon-plus"></i></a>'+
                                  '<a class="btn btn-delete show-tooltip passageRemoveQuestion" title="Delete question" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                              '</td>'+
                            '</tr>'+  
                            '<tr>'+
                              '<th width="10%">Question '+i+'</th>'+
                              '<td width="80%" colspan="3" id="td-body_content'+i+'">'+                                  
                                  '<textarea id="questionEditor'+i+m+'" name="passage_name[Passage'+m+'][Question'+i+']"></textarea><span id="question_div_editor'+i+m+'"></span>'+
                                  '<input type="hidden" name="passage_type" value="Passage">'+
                              '</td>'+
                            '</tr>';
          for(var j=1; j<=4; j++) {
                dynamicPassageQuestions += '<tr class="passageoptions-box" id="'+i+'-'+j+'">'+
                            '<th width="10%">Option'+j+'</th>'+
                            '<td width="70%">'+
                                '<input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="username" name="Passage'+m+'Question'+i+'[option'+j+']" placeholder="Option'+j+'">'+
                            '</td>'+
                            '<td width="5%" style="text-align: center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[Passage'+m+'Question'+i+']" value="option' + j +'" class="regular-radio" id="passageradio'+m+i+j+'" checked />'+
                                    '<label for="passageradio'+m+i+j+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip passageRemoveOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
          }          
          dynamicPassageQuestions += '<tr>'+
                              '<th width="10%">Explanation</th>'+
                              '<td colspan="3">'+
                                  '<textarea data-rule-minlength="3" rows="2" data-rule-required="true" class="form-control" id="About" name="question_explanation[Passage'+m+'Question'+i+']" placeholder="Write Question here..."></textarea>'+                                  
                              '</td>'+
                            '</tr>'+
                            '<tr>'+
                              '<td colspan="4">&nbsp;</td>'+
                            '</tr>'+
                          '</tbody>';
        }
        }
        $("#passage-question").append(dynamicPassageQuestions);
        var tbodyid = "#"+$("#passage-question .question-passage:last").attr("id");       
        var getTbodyId = tbodyid.split("-");           
            initialize = parseInt(getTbodyId[1]);        
        for(var pdis=1; pdis<=initialize; pdis++) {        
            for(var k=1; k<=5; k++) {
                $('<script>'+
                'window["oEditQuestion'+pdis+k+'"] = new InnovaEditor("oEditQuestion'+pdis+k+'");'+
                'window["oEditQuestion'+pdis+k+'"].width = "100%";'+
                'window["oEditQuestion'+pdis+k+'"].height = 50;'+
                'window["oEditQuestion'+pdis+k+'"].enableFlickr = false;'+
                'window["oEditQuestion'+pdis+k+'"].enableCssButtons = false;'+
                'window["oEditQuestion'+pdis+k+'"].flickrUser = "";'+
                'window["oEditQuestion'+pdis+k+'"].returnKeyMode = 2;'+
                'window["oEditQuestion'+pdis+k+'"].toolbarMode = 2;'+
                'window["oEditQuestion'+pdis+k+'"].groups = ['+
                                '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
                                '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
                                '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
                                '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
                                '];'+
                'window["oEditQuestion'+pdis+k+'"].css ="http://localhost/brainwizz/admin/public/template/admin/assets/editor/siri-theme/ergo/css/custom.css";'+
                'window["oEditQuestion'+pdis+k+'"].fileBrowser = "http://localhost/brainwizz/admin/public/template/admin/assets/editor/filemanager.php";'+
                'window["oEditQuestion'+pdis+k+'"].mode="XHTMLBody";'+
                'window["oEditQuestion'+pdis+k+'"].REPLACE("questionEditor'+k+pdis+'","question_div_editor'+k+pdis+'");'+
                '<\/script>').appendTo('body');              
            }
        }
        
    $(document).on("click", ".passageAddoptions", function() { 
        var tbodyid = "#"+$(this).parent().parent().parent().attr("id");
        var id = $(tbodyid+" tr.passageoptions-box:last").attr("id");
        var res = id.split("-");
        var iplus = parseInt(res[0]);
        var jplus = parseInt(res[1]) + 1;
        var dynamicOption = '<tr class="passageoptions-box" id="'+iplus+'-'+jplus+'">'+
                            '<th width="10%">Option '+jplus+'</th>'+
                            '<td width="70%">'+
                                '<input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" name="Passage'+iplus+'Question'+iplus+'[option'+jplus+']" placeholder="Option'+jplus+'">'+
                            '</td>'+
                            '<td width="5%" style="text-align:center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[Passage'+iplus+'Question'+jplus+']" value="option' + jplus +'" class="regular-radio" id="r'+iplus+jplus+'" />'+
                                    '<label for="r'+iplus+jplus+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip removeOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
        $(tbodyid+" tr.passageoptions-box:last").after(dynamicOption);
    });
    
    // Add Passage Single Question
   $(document).on("click", ".passageAddQuestions", function() { 
        //var tbodyid = "#"+$(this).parent().parent().parent().parent().attr("id"); 
        var id = "#"+$("#passage-question .passageQuestions:last").attr("id");
       
        //var id = $(tbodyid+".passageQuestions:last").attr("id");
       
        var res = id.split("-");
        var jplus = parseInt(res[1]) + 1;
        var dynamicPassageQuestions = "";        
       
        dynamicPassageQuestions += '<tbody id="passageQuestion-'+jplus+'" class="passageQuestions">'+
                            '<tr bgcolor="#ccc">'+
                              '<td width="10%"><strong>Passage Question '+jplus+'</strong></td>'+
                              '<td width="70%">&nbsp;</td>'+
                              '<td width="10%" colspan="2" align="right">'+
                                  '<a class="btn btn-add show-tooltip passageAddoptions" title="Add option" href="javascript:void(0)"><i class="icon-plus"></i></a>'+
                                  '<a class="btn btn-delete show-tooltip passageRemoveQuestion" title="Delete question" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                              '</td>'+
                            '</tr>'+  
                            '<tr>'+
                              '<th width="10%">Question '+jplus+'</th>'+
                              '<td width="80%" colspan="3" id="td-body_content'+jplus+'">'+                                  
                                  '<textarea id="questionEditor'+i+'" name="passage_name[Passage'+m+'][Question'+jplus+']"></textarea><span id="question_div_editor'+i+'"></span>'+
                                  '<input type="hidden" name="passage_type" value="Passage">'+
                              '</td>'+
                            '</tr>';
          for(var j=1; j<=4; j++) {
                dynamicPassageQuestions += '<tr class="passageoptions-box" id="'+jplus+'-'+j+'">'+
                            '<th width="10%">Option '+j+'</th>'+
                            '<td width="70%">'+
                                '<input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="username" name="Passage'+m+'Question'+jplus+'[option'+j+']" placeholder="Option'+j+'">'+
                            '</td>'+
                            '<td width="5%" style="text-align: center">'+
                                '<div class="radio-inline">'+
                                    '<input type="radio" name="question_answer[Passage'+m+'Question'+jplus+']" value="option' + j +'" class="regular-radio" id="r'+jplus+j+'" checked />'+
                                    '<label for="r'+jplus+j+'"></label>'+
                                '</div>'+
                            '</td>'+
                            '<td width="5%">'+
                                '<a class="btn btn-delete show-tooltip passageRemoveOption" title="Delete option" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                            '</td>'+                                            
                          '</tr>';
          }          
          dynamicPassageQuestions += '<tr>'+
                              '<th width="10%">Explanation</th>'+
                              '<td colspan="3">'+
                                  '<textarea data-rule-minlength="3" rows="2" data-rule-required="true" class="form-control" id="About" name="question_explanation[Passage'+m+'Question'+i+']" placeholder="Write Question here..."></textarea>'+                                  
                              '</td>'+
                            '</tr>'+
                            '<tr>'+
                              '<td colspan="4">&nbsp;</td>'+
                            '</tr>'+
                          '</tbody>';
       
        $("#passage-question").append(dynamicPassageQuestions);  
        
        for(var k=1; k<=1; k++) {
            $('<script>'+
            'window["oEdit'+jplus+'"] = new InnovaEditor("oEdit'+jplus+'");'+
            'window["oEdit'+jplus+'"].width = "100%";'+
            'window["oEdit'+jplus+'"].height = 50;'+
            'window["oEdit'+jplus+'"].enableFlickr = false;'+
            'window["oEdit'+jplus+'"].enableCssButtons = false;'+
            'window["oEdit'+jplus+'"].flickrUser = "";'+
            'window["oEdit'+jplus+'"].returnKeyMode = 2;'+
            'window["oEdit'+jplus+'"].toolbarMode = 2;'+
            'window["oEdit'+jplus+'"].groups = ['+
                            '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
                            '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
                            '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
                            '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
                            '];'+
            'window["oEdit'+jplus+'"].css ="http://localhost/brainwizz/admin/public/template/admin/assets/editor/siri-theme/ergo/css/custom.css";'+
            'window["oEdit'+jplus+'"].fileBrowser = "http://localhost/brainwizz/admin/public/template/admin/assets/editor/filemanager.php";'+
            'window["oEdit'+jplus+'"].mode="XHTMLBody";'+
            'window["oEdit'+jplus+'"].REPLACE("questionEditor'+jplus+'","question_div_editor'+jplus+'");'+
            '<\/script>').appendTo('body');              
        }   
    });
                  
    $(document).on("click",".passageRemoveQuestion", function(){
        $(this).parent().parent().parent().remove();
    });
    $(document).on("click", ".passageRemoveOption", function(){
        $(this).parent().parent().remove();
    });
    });
 
</script>-->