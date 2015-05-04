<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL; ?>course" title="Course">Course</a></li>
            <li><a title="Add Course" style="cursor: auto;">Add Course</a></li>
          </ul><br>
        </div>
        <!-- success or failure message -->
        <?php
            if($this->session->gets('success') || $this->session->gets('fail') ) {
            ?>
            <div id="divsuccess">
                <?php
                if($this->session->gets('fail')) {
                ?>
                <div class="list-group-item bg-error form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-remove-circle"></i> 
                        <?php 
                            echo $this->session->gets('fail'); $this->session->sets('fail', '');
                        ?>
                    </div>
                </div>                
                <?php } else if($this->session->gets('success')) { ?>
                <div class="list-group-item bg-success form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-ok-circle"></i> 
                        <?php 
                            echo $this->session->gets('success'); $this->session->sets('success', '');
                        ?>
                    </div>
                </div>               
                <?php } ?>
            </div>
        <?php } ?>
        <!-- success or failure message end -->
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Course
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>course/addCourseDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Course name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1" >Short description</label>
                  <div class="col-sm-10">
                      <textarea id="short_desc" name="short_desc" class="form-control" rows='6'></textarea>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">How many days</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_of_days" name="no_of_days" placeholder="Only number" 
                               data-rule-required="true" data-rule-number="true">
                        <input type='button' value='Add Days' id='addButton'>
                      </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1"></label>
                    <div class="col-sm-10">
                        <table class="table table-advance days_desc" id="days_desc"></table>
                    </div>
                </div><div class="clearfix"></div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Member Fee</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="member_fee" name="member_fee" placeholder="Enter member fee" data-rule-required="true"
                           data-rule-number="true">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Non member fee</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="non_member_fee" name="non_member_fee" placeholder="Enter non member fee" 
                           data-rule-required="true" data-rule-number="true">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Course discount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount " 
                            data-rule-number="true" data-rule-maxlength="2">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Faculty name</label>
                    <div class="col-sm-10">                        
                      <select ui-jq="chosen" multiple class="w-md" id="faculty_name" name="faculty_name[]" data-rule-required="true">
                        <option value="">-- select faculty name</option>
                        <?php 
                            foreach ($this->facultyDetails as $facultyDetails) {
                            ?>
                            <option value="<?php echo $facultyDetails['faculty_id']; ?>"><?php echo $facultyDetails['faculty_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Start and end date</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control span2" value="" id="date-range0" name="date" placeholder="mm/dd/yyyy" 
                               data-rule-required="true">
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" data-rule-required="true">
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" checked>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" >
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>  
                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" id="cancel" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
<script type="text/javascript"> 
    // <![CDATA[
    $(document).ready(function () {        
        $("#divsuccess").fadeOut(5000);     // success or failure div hide
        $(document).on("click","#addButton", function() {
            var mainQuestion = parseInt($("#totalQuestions").val());
            var simpleQuestions = $("#no_of_days").val();
            var totalQuestions =  Number(passageDays) + Number(simpleQuestions) + Number(uploadQuestions);
            if(totalQuestions > mainQuestion) {
                alert("Limit Exceed");
                return false;
            }

            var rowCount = $('#days_desc .day-simple').length;        
            var countMe;
            var initialize;
            if(rowCount != 0) {
                var tbodyid = "#"+$("#days_desc .day-simple:last").attr("id");            
                var getTbodyId = tbodyid.split("-");             
                initialize = parseInt(getTbodyId[1]) + 1;
                countMe = parseInt($("#no_of_days").val()) + parseInt(getTbodyId[1]); 
                var passageDays = $("#test_noofpassages").val();       
                var uploadQuestions = $("#test_noofuploads").val();
                var totalQuestions = Number(passageDays) + Number(countMe) + Number(uploadQuestions);

                if(totalQuestions > mainQuestion) {
                    alert("Limit Exceed");
                    return false;
                }            
            } else {
                initialize = 1;
                countMe = parseInt($("#no_of_days").val());
            }        
            var dynamicDays = "";        
            for(var i=initialize; i<=countMe; i++) {
                dynamicDays += '<tbody id="question-'+i+'" class="day-simple">'+
                                    '<tr bgcolor="#ccc">'+
                                      '<td width="10%"><strong>Day '+i+'</strong></td>'+
                                      '<td width="70%">&nbsp;</td>'+
                                      '<td width="10%" colspan="2" align="right">'+
                                          '<a class="btn btn-delete show-tooltip removeDays" title="Delete day" href="javascript:void(0)"><i class="icon-trash"></i></a>'+
                                      '</td>'+
                                    '</tr>'+  
                                    '<tr>'+
                                      '<th width="10%">Description</th>'+
                                      '<td width="80%" colspan="3" id="td-body_content'+i+'">'+                                  
                                          '<textarea id="editor'+i+'" name="full_desc[]"></textarea><span id="div_editor'+i+'"></span>'+
                                          '<input type="hidden" name="normal_type" value="Normal">'+
                                      '</td>'+
                                    '</tr>';
                  
                  dynamicDays += '<tr>'+
                                      '<td colspan="4">&nbsp;</td>'+
                                    '</tr>'+
                                  '</tbody>';
                }
                $("#days_desc").append(dynamicDays);

                for(var k=initialize; k<=countMe; k++) {
                    $('<script>'+
                    'window["oEdit'+k+'"] = new InnovaEditor("oEdit'+k+'");'+
                    'window["oEdit'+k+'"].width = "100%";'+
                    'window["oEdit'+k+'"].height = 50;'+
                    'window["oEdit'+k+'"].enableFlickr = false;'+
                    'window["oEdit'+k+'"].enableCssButtons = false;'+
                    'window["oEdit'+k+'"].flickrUser = "";'+
                    'window["oEdit'+k+'"].returnKeyMode = 2;'+
                    'window["oEdit'+k+'"].toolbarMode = 2;'+
                    'window["oEdit'+k+'"].groups = ['+
                                    '["group1", "", ["Undo", "Redo", "SourceDialog"]],'+  
                                    '["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],'+
                                    '["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],'+
                                    '["group4", "", ["LinkDialog", "ImageDialog"]]'+                            
                                    '];'+
                    'window["oEdit'+k+'"].css = "http://localhost/ameriaa/ameriaa-admin/public/template/flaty/assets/editor/siri-theme/ergo/css/custom.css";'+
                    'window["oEdit'+k+'"].fileBrowser = "http://localhost/ameriaa/ameriaa-admin/public/template/flaty/assets/editor/filemanager.php";'+
                    'window["oEdit'+k+'"].mode="XHTMLBody";'+
                    'window["oEdit'+k+'"].REPLACE("editor'+k+'","div_editor'+k+'");'+
                    '<\/script>').appendTo('body');              
                }
        });
        
        $(document).on("click",".removeDays", function() {
            $(this).parent().parent().parent().remove();
        });
    });
</script>
<script>
    $(function() {
        $('#date-range0').dateRangePicker();
    });
</script>