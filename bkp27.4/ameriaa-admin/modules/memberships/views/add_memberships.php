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
            <li><a title="Add memberships" style="cursor: auto;">Add memberships</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add memberships
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>memberships/addMembershipsDetails" method="post" >
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Memberships </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="memberships_title" name="memberships_title" placeholder="Enter memberships name"
                           data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" placeholder="Enter your description" data-rule-required="true" 
                              data-rule-minlength="3" ></textarea>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                              
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" data-rule-required="true" data-rule-number="true">
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
  