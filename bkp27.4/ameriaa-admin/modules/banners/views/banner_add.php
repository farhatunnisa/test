<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>banners" title="banner">Banners</a></li>
            <li><a title="Add banner" style="cursor: auto;">Add Banner</a></li>
          </ul><br>
        </div>
              <!-- END Breadcrumb --> 
    
    <!-- success message -->
    <?php
        if($this->session->gets('addFailure')) {
        ?>
        <div class="success_msg" id="divsuccess">
            <?php
                if($this->session->gets('addFailure')) {
                ?>
                <i class="icon-remove"></i>
                <span class="text-error">
                    <?php 
                        echo $this->session->gets('addFailure');
                        $this->session->sets('addFailure', '');
                    ?>
                </span><br />
                <?php }  ?>
         </div>
    <?php } ?>
    <?php
        if($this->session->gets('image_dimension')) {
        ?>
        <div class="success_msg" id="divsuccess">
            <?php
                if($this->session->gets('image_dimension')) {
                ?>
                <i class="icon-remove"></i>
                <span class="text-error">
                    <?php 
                        echo $this->session->gets('image_dimension');
                        $this->session->sets('image_dimension', '');
                    ?>
                </span><br />
                <?php }  ?>
         </div>
    <?php } ?>
    <!-- success message end-->
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Banner
            </div>
            <div class="panel-body">
                <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>banners/AddbannerDetails" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Banner name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Enter banner name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="6" placeholder="Type description" data-rule-required="true" ></textarea>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input ui-jq="filestyle" type="file" id="image" name="image_file" data-icon="false" data-classButton="btn btn-default" 
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
                    <button type="submit"  id="cancel" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>
                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  