<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>privileges" title="privileges">Privileges</a></li>
            <li><a title="Add Privileges" style="cursor: auto;">Add Privileges</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add Privileges
            </div>
            <div class="panel-body">
              <form name="processuser" action="<?php echo SITEURL; ?>privileges/addPrivileges" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="short_desc" rows="6" placeholder="Type description" data-rule-required="true" ></textarea>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                               
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="y" checked>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="n" >
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
                    <button type="submit" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>
                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  