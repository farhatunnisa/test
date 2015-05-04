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
            <li><a title="Add user" style="cursor: auto;">Add user</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Add User
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>user/addUser" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email-id " data-rule-required="true" data-rule-email="true">
                    <div class="left_img" id="emailAvailable"></div><span class="left_img" id="userstatus"></span>
                    <div class="clear"></div>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="password" name="password" name="password" placeholder="Enter your password" data-rule-required="true" data-rule-minlength="3">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" id="confirm-password" class="form-control"  name="confirm-password" placeholder="Enter your confirm password" 
                           data-rule-required="true" data-rule-minlength="3" data-rule-equalto="#password">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">User Level</label>
                    <div class="col-sm-10">
                      <select ui-jq="chosen" class="w-md" id="Country" name="userlevel">
                        <option value=""></option>
                        <?php foreach ($this->userRoles as $userRoles) { ?>
                              <option value="<?php echo $userRoles['adminrole_id']; ?>"><?php echo $userRoles['adminrole_name']; ?></option>
                              <?php } ?>                        
                      </select>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="userstatus" value="y" checked>
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="userstatus" value="n" >
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                  </div> 
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input ui-jq="filestyle" type="file" id="image" name="avatar" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s" data-rule-required="true">
                    </div>
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9"><span style="color: red"> Note: Please upload 200*200 image only</span></div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
               
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
   <script type="text/javascript">
        $(document).ready(function(){
            // email check function
            $("#email").blur(function () {
                $('#emailAvailable').html('<img src="<?php echo THEMEURL ; ?>img/loading_small.gif">');
                $.ajax({
                    url:'<?php echo SITEURL; ?>user/getEmailAvailability',
                    type: 'POST',
                    datatype:'application/json',
                    data: {
                        'email' : $('#email').val()           
                    },
                    success:function(data) { 
                        if(data == 1) {
                            $('#emailAvailable').html('<span style="color:green;"><i class="glyphicon glyphicon-ok"></i> Available</span>');
                        } else {
                            $('#emailAvailable').html('<span style="color:#E00303;"><i class="glyphicon glyphicon-remove"></i> Not Available</span>');
                            $("#email").val("");
                            $("#email").focus();
                        }
                    }                      
                });
            });
        });
    </script>
  