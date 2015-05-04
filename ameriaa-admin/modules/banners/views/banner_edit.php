<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>banners" title="Banner">Banner</a></li>
            <li><a title="Add Banner" style="cursor: auto;">Edit Banner</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Banner
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>banners/updateBannerDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Banner name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="faculty_name" name="banner_name" placeholder="Enter Banner name" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->bannerDetails['banner_title']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="6" placeholder="Type description" data-rule-required="true"><?php echo $this->bannerDetails['description']; ?>
                    </textarea>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input ui-jq="filestyle" type="file" id="image" name="image_file" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s"  value="<?php echo $this->bannerDetails['image'];?>">
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="y" <?php if($this->bannerDetails['status'] == 'y'){ echo "checked"; } ?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="n" <?php if($this->bannerDetails['status'] == 'n'){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="BannerID" value="<?php echo $this->bannerDetails['banner_id'];?>" /> 
                    <input type="hidden" name="old_image" value="<?php echo $this->bannerDetails['image_file'];?>" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button"  id="cancel" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  