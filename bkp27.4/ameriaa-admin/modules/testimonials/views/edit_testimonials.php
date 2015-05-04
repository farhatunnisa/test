<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL; ?>testimonials" title="Course">testimonials</a></li>
            <li><a title="Add Course" style="cursor: auto;">Edit testimonials</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Edit Testimonials
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>testimonials/updateTestimonialsDetails" method="post" 
                    enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Client name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter course name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->testimonialDetaisl['client_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->testimonialDetaisl['location']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description" data-rule-required="true" 
                              data-rule-minlength="3"><?php echo $this->testimonialDetaisl['description']; ?></textarea>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Client Image</label>
                    <div class="col-sm-9">
                      <input type="hidden" id="old_image" name="old_image" value="<?php echo $this->testimonialDetaisl['image']; ?>" >
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" >
                    </div>
                    <div class="col-sm-1">
                        <img src="<?php echo SITEURL."uploads/testimonials/".$this->testimonialDetaisl['image'];  ?>" alt="" title="" style="width: 30px; height: 30px;" />
                    </div>
                </div>                
                
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->testimonialDetaisl['status'] == 1){ echo "checked"; } ?>>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->testimonialDetaisl['status'] == 0){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">                      
                    <input type="hidden" id="testimonial_id" name="testimonial_id" value="<?php echo $this->testimonialDetaisl['testimonial_id']; ?>" >
                    <input type="hidden" name="old_image" value="<?php echo $this->testimonialDetaisl['image'];?>" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
