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
            <li><a title="Edit privileges" style="cursor: auto;">Edit Privileges</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Edit Privileges
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>privileges/updatePrivileges" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Enter title name" 
                           data-rule-required="true" data-rule-minlength="3" name="title" value="<?php echo $this->adminRoles['adminrole_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="short_desc" rows="6" placeholder="Type description" data-rule-required="true"><?php echo $this->adminRoles['adminrole_desc']; ?>
                    </textarea>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="y" <?php if($this->adminRoles['adminrole_status'] == "y") echo "checked";?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="n" <?php if($this->adminRoles['adminrole_status'] == "n") echo "checked";?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div>                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="adminrole_id" value="<?php echo $this->adminRoles['adminrole_id'];?>" /> 
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
  