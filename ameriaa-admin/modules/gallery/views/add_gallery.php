<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL;?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>gallery" title="Gallery">Gallery</a></li>
            <li><a title="Add Gallery" style="cursor: auto;">Add Gallery</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Gallery
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>gallery/addGalleryDetails" method="post" 
                    enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Gallery name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gallery_name" name="gallery_name" placeholder="Enter gallery name" data-rule-required="true" 
                           data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
<!--                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Gallery slug</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gallery_slug" name="gallery_slug" placeholder="Enter gallery slug" data-rule-required="true" 
                           data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>-->
                
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
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
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
        $('#cancel').click(function() {
           if(confirm("Are you sure you want to navigate away from this page?"))
           {
              history.go(-1);
           }        
           return false;
        });
    });
</script>
  