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
            <li><a title="Add faculty" style="cursor: auto;">Add Gallery</a></li>
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
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Gallery
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>gallery/updateGalleryDetails" method="post" 
                    enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Gallery name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gallery_name" name="gallery_name" placeholder="Enter gallery name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->galleryDetails['gallery_title']; ?>">
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
                    <div class="col-sm-9">
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" >
                    </div>
                    <img src="<?php echo SITEURL; ?>uploads/eventsphotos/thumbnail/<?php echo $this->galleryDetails['thum_image']; ?>" 
                         style="width: 35px; height: 35px;" >
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->galleryDetails['gallery_status'] == 1 ) { echo "checked"; } ?>>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->galleryDetails['gallery_status'] == 0 ) { echo "checked"; } ?>>
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
                      <input type="hidden" name="gallery_id" id="gallery_id" value="<?php echo $this->galleryDetails['gallery_id']; ?>" >
                      <input type="hidden" name="old_image" id="old_image" value="<?php echo $this->galleryDetails['thum_image']; ?>" >
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

  