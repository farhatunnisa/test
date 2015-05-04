<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL;?>user" title="user">user</a></li>
            <li><a title="Edit user" style="cursor: auto;">Edit user</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Edit user
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>user/updateUser" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->singleUserData['username'];?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->singleUserData['fname'];?>" >
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->singleUserData['lname'];?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email-id " data-rule-required="true" 
                           data-rule-email="true" value="<?php echo $this->singleUserData['email'];?>" readonly>
                    <div class="left_img" id="emailAvailable"></div><span class="left_img" id="userstatus"></span>
                    <div class="clear"></div>
                  </div>
              </div>                  
              <div class="line line-dashed b-b line-lg pull-in"></div>
                
              <div class="form-group">
                <label class="col-sm-2 control-label">User Level</label>
                <div class="col-sm-10">
                  <select ui-jq="chosen" class="w-md" id="Country" name="userlevel">
                    <option value=""></option>
                    <?php foreach ($this->userRoles as $userRoles) { ?>
                    <option value="<?php echo $userRoles['adminrole_id']; ?>" <?php if($this->singleUserData['userlevel'] == $userRoles['adminrole_id']) echo "selected"; ?>><?php echo $userRoles['adminrole_name']; ?></option>
                    <?php } ?>                        
                  </select>
                </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <?php if($this->userId == 1 ){ ?>
                
                <?php } else { ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" <?php if($this->singleUserData['active'] == "y") echo "checked";?> name="userstatus" value="y">
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" <?php if($this->singleUserData['active'] == "n") echo "checked";?> name="userstatus" value="n">
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div> 
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <?php } ?>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-9">
                      <input ui-jq="filestyle" type="file" id="image" name="avatar" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" data-rule-required="true">
                    </div>
                    <img style="width: 35px; height: 35px;" alt="" src="<?php echo SITEURL . "uploads/avatars/" . $this->singleUserData['avatar'];?>" />
                    <div style="clear: both;"></div>                        
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9"><span style="color: red"> Note: Please upload 200*200 image only</span></div>
                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="adminuser_id" value="<?php echo $this->singleUserData['adminuser_id'];?>" /> 
                    <input type="hidden" name="old_avatar" value="<?php echo $this->singleUserData['avatar'];?>" /> 
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#divsuccess").fadeOut(5000);
    });
</script>
  