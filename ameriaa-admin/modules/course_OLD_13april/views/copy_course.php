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
            <li><a title="Add Course" style="cursor: auto;">Edit Course</a></li>
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
              Edit Course
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>course/addCourseDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Course name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->coursrDetails['course_title']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->coursrDetails['location']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1" >Short description</label>
                  <div class="col-sm-10">
                      <textarea id="short_desc" name="short_desc" class="form-control" rows='6'><?php echo $this->coursrDetails['short_desc']; ?></textarea>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Full description</label>
                  <div class="col-sm-10">
                    <textarea id="body_content" name="full_desc" rows="4" cols="30"><?php echo $this->coursrDetails['full_desc']; ?></textarea>
                      <script type="text/javascript">
                   // <![CDATA[
                       var oEdit1 = new InnovaEditor("oEdit1");
                       oEdit1.width="100%";
                       oEdit1.height=450;
                       oEdit1.enableFlickr = false;
                       oEdit1.enableCssButtons = false;
                       oEdit1.flickrUser = "";
                       oEdit1.returnKeyMode = 2;
                       oEdit1.arrCustomButtons = [
                       ["CustomName1","modalDialog('editor/scripts/common/paypal.htm',350,270)","PayPal Button","btnPayPal.gif"],			
                       ["HTML5Video", "modalDialog('editor/scripts/common/webvideo.htm',750,550,'HTML5 Video');", "HTML5 Video", "btnVideo.png"],
                       ["NewsArticle", "modalDialog('editor/scripts/common/webnews.htm',750,550,'News Articles');", "News Articles", "btnVideo.png"]
                       ];
                       oEdit1.toolbarMode = 2;
                       oEdit1.groups=[
                       ["grpEdit", "", ["SourceDialog", "FullScreen", "SearchDialog", "RemoveFormat", "BRK", "Undo", "Redo", "Cut", "Copy", "Paste"]],
                       ["grpFont", "", ["FontName", "FontSize", "Strikethrough", "Superscript", "BRK", "Bold", "Italic", "Underline", "ForeColor", "BackColor"]],
                       ["grpPara", "", ["CompleteTextDialog", "Quote", "Indent", "Outdent", "Styles", "StyleAndFormatting", "Absolute", "BRK", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "Numbering", "Bullets"]],
                       ["grpInsert", "", ["LinkDialog", "BRK", "ImageDialog", "Form"]],
                       ["grpTables", "", ["TableDialog", "BRK", "Guidelines", "Guidelines", "CustomName1"]],
                       ["grpMedia", "", ["Media", "FlashDialog", "YoutubeDialog", "HTML5Video", "BRK", "CustomTag", "CharsDialog", "Line"]]
                       ];

                       oEdit1.css = SITEURL + "assets/editor/siri-theme/ergo/css/custom.css";
                       oEdit1.fileBrowser = SITEURL+ "assets/editor/filemanager.php";
                       oEdit1.arrCustomTag=[
                       ["First Last Name","[NAME]"],
                       ["Username","[USERNAME]"],
                       ["Site Name","[SITE_NAME]"],
                       ["Site Url","[URL]"]
                       ];
                       oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
                       oEdit1.mode="XHTMLBody";
                       oEdit1.REPLACE("body_content");
                       // ]]>
                   </script>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Member Fee</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="member_fee" name="member_fee" placeholder="Enter member fee" data-rule-required="true" 
                           data-rule-number="true" value="<?php echo $this->coursrDetails['member_fee']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Non member fee</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="non_member_fee" name="non_member_fee" placeholder="Enter non member fee" 
                           data-rule-required="true" data-rule-number="true" value="<?php echo $this->coursrDetails['non_member_fee']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Course discount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount " 
                           data-rule-required="true" data-rule-number="true" data-rule-maxlength="2" value="<?php echo $this->coursrDetails['discount']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Faculty name</label>
                    <div class="col-sm-10">                        
                      <select ui-jq="chosen" multiple class="w-md" id="faculty_id" name="faculty_name[]">
                        <option value="">-- select faculty name</option>
                        <?php 
                            foreach ($this->facultyDetails as $facultyDetails) {
                                $faculty_ids = explode(',', $this->coursrDetails['faculty_id']);
                                $selected = '';
                                if(in_array($facultyDetails['faculty_id'], $faculty_ids)) { $selected = "selected";}
                            ?>
                        <option value="<?php echo $facultyDetails['faculty_id']; ?>" <?php echo $selected ; ?>>
                                <?php echo $facultyDetails['faculty_name']; ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Start date</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control span2" id="dpd1" name="start_date" data-rule-required="true"
                               value="<?php echo date('m/d/Y', strtotime($this->coursrDetails['start_date'])); ?>" >
                    </div>
                    <label class="col-sm-2 control-label">End date</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control span2" id="dpd2" name="end_date"  data-rule-required="true" 
                               value="<?php echo date('m/d/Y', strtotime($this->coursrDetails['end_date'])); ?>">
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>                
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" >
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->coursrDetails['status'] == 1){ echo "checked"; } ?>>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->coursrDetails['status'] == 0){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">                      
                    <input type="hidden" id="old_image" name="old_image" value="<?php echo $this->coursrDetails['image']; ?>" >
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
    });
</script>
