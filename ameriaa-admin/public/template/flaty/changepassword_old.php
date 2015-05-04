<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Edit Admin Password</li>
      </ul>
    </div>
    <?php if($this->session->gets('failure') != '') { ?>
    <div class="success_msg">
        <i class="icon-remove"></i>
        <span class="text-error"><?php echo $this->session->gets('failure'); $this->session->sets('failure','');  ?></span>     
    </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-edit"></i>Edit Admin Password</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="row user-div">
             
              <div class="col-md-12">
              	<div class="frms">
            <form name="processuser" action="<?php echo SITEURL; ?>changepassword/updateEditPassword" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-key"></i><strong>Password</strong></span>
                      <input type="password" data-rule-minlength="3" data-rule-required="true"   class="form-control" id="opassword" name="opassword" >
                  </div>
                </div>
              </div>
                
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">New Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-key"></i><strong>New Password</strong></span>
                    <input type="password" data-rule-minlength="3" data-rule-required="true"  class="form-control" id="npassword" name="npassword" >
                  </div>
                </div>
              </div>
                
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Confirm Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-key"></i><strong>Confirm Password</strong></span>
                    <input type="password" data-rule-minlength="3" data-rule-required="true" data-rule-equalto="#npassword"  class="form-control" id="rpassword" name="rpassword">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                    <input type="hidden" name="adminuser_id" id="adminuser_id" value="<?php echo $this->session->gets('adminuser_id');?>" /> 
                    
                  <input type="submit" value="Submit" class="btn btn-primary">
                  <button class="btn" type="button" onclick="window.location='<?php echo SITEURL; ?>dashboard'" >Cancel</button>
                </div>
              </div>
            </form>
          </div>  
                  
              </div>
            </div>  
            </div>
          </div>
        </div>
      </div>

   