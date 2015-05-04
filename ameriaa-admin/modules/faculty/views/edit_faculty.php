<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."faculty"; ?>" title="Faculty">Faculty</a></li>
            <li><a title="Edit Faculty" style="cursor: auto;">Edit Faculty</a></li>
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
              Add Faculty
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>faculty/updateFacultyDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Faculty name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Enter faculty name" 
                           data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="50" value="<?php echo $this->facultyDetails['faculty_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your title ex:'Ph.D'" 
                           data-rule-required="true" data-rule-minlength="2" data-rule-maxlength="20" value="<?php echo $this->facultyDetails['designation']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email-id " data-rule-required="true" 
                           data-rule-email="true" value="<?php echo $this->facultyDetails['email']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Phone number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" 
                           data-rule-required="true" data-rule-number="true" data-rule-maxlength="15" value="<?php echo $this->facultyDetails['phone_number']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">                        
                      <select ui-jq="chosen" class="w-md" id="country" name="country">
                        <?php
                          $data = json_decode($this->countriesList, true);
                          foreach ($data as $country) { ?>
                          <option value="<?php echo $country['country_code']; ?>" <?php if($country['country_code'] == $this->facultyDetails['country']){ echo "selected"; } ?>>
                              <?php echo $country['country_name']; ?>
                          </option>
                          <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter city name" data-rule-required="true" 
                               data-rule-minlength="3" data-rule-maxlength="20" value="<?php echo $this->facultyDetails['city']; ?>">
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1" >Short description</label>
                  <div class="col-sm-10">
                      <textarea id="short_desc" name="short_desc" class="form-control" rows='6'><?php echo $this->facultyDetails['short_desc']; ?></textarea>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Full description</label>
                  <div class="col-sm-10">
                    <textarea id="body_content" name="full_desc" rows="4" cols="30"><?php echo $this->facultyDetails['full_desc']; ?></textarea>
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
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-9">
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s"  >                      
                    </div>
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9"><span style="color: red"> Note: Please upload 372*372 image only</span></div>
                    <div class="col-sm-1">
                        <img src="<?php echo SITEURL."uploads/faculty/".$this->facultyDetails['image'];  ?>" alt="" title="" style="width: 30px; height: 30px;" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->facultyDetails['status'] == 1){ echo "checked"; } ?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->facultyDetails['status'] == 0){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="faculty_id" value="<?php echo $this->facultyDetails['faculty_id'];?>" /> 
                    <input type="hidden" name="old_image" value="<?php echo $this->facultyDetails['image'];?>" />
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