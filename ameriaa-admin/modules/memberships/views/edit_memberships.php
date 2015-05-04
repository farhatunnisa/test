<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="" title="memberships">memberships</a></li>
            <li><a title="Add memberships" style="cursor: auto;">Edit memberships</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add memberships
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>memberships/updateMembershipDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Memberships Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="memberships_title" name="memberships_title" placeholder="Enter memberships title" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membershipsDetails['membership_title']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Description</label>
                  <div class="col-sm-10">
                   <textarea class="form-control" id="description" name="description" rows="6" placeholder="Type description" 
                             data-rule-required="true"><?php echo $this->membershipsDetails['description']; ?></textarea>	   
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price " data-rule-required="true" 
                           data-rule-number="true" value="<?php echo $this->membershipsDetails['price']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>	
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->membershipsDetails['status'] == 1){ echo "checked"; } ?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->membershipsDetails['status'] == 0){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="membership_id" value="<?php echo $this->membershipsDetails['membership_id'];?>" /> 
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
  