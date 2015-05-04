  
<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Event Details</li>
         <li style="float: right">  <a href="javascript:void(0)" onclick="window.history.back();">Back</a> <span class="divider"><i class="icon-reply"></i></span> </li>
      </ul>
    </div>
    <!-- END Breadcrumb -->
    
    
    
    <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-user"></i>Event Details</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="row user-div">            
              <?php 
              $event_dates = date("m/d/Y",  strtotime($this->events['start_date'])) . " - " . date("m/d/Y",  strtotime($this->events['end_date'])); 
              ?>  
              <div class="col-md-12 user-profile-info usr-profile">
              <ul>
                <li class="even"><span class="newsheadblock">Title:</span> <?php echo $this->events['event_title'];?></li>               
                <li class="odd"><span class="newsheadblock">Sponsor:</span> <?php echo $this->events['sponsor'];?></li>                
                <li class="even"><span class="newsheadblock">Email:</span> <?php echo $this->events['email'];?></li>                
                <li class="odd"><span class="newsheadblock">Mobile:</span> <?php echo $this->events['mobile'];?></li>                
                <li class="even"><span class="newsheadblock">Website:</span> <a href="<?php echo $this->events['website'];?>"><?php echo $this->events['website'];?></a></li>                
                <li class="odd"><span class="newsheadblock">Event Dates:</span> <?php echo $event_dates;?></li>                
                <li class="even"><span class="newsheadblock">Language:</span> 
                    <?php 
                    if(strlen($this->events['language']) === 3) {
			echo "Telugu, Hindi";
			} else {
			if($this->events['language'] == 1) {
			echo "Telugu";
			} else {
			echo "Hindi";
			}
			}
			
                    ?>  
                </li>
                <li class="odd"><span class="newsheadblock">Image:</span> <img src="<?php echo SITEURL . "/uploads/events/" . $this->events['event_poster'];?>"/></li>
                <li class="even"><span class="newsheadblock">Overview:</span> <?php echo $this->events['event_overview'];?></li>
                <li class="odd"><span class="newsheadblock">Description:</span> <?php echo strip_tags($this->events['long_desc']);?></li>
                <li class="even"><span class="newsheadblock">Meta Tags:</span> <?php echo $this->events['meta_tags'];?></li>
                <li class="odd"><span class="newsheadblock">Meta Description:</span> <?php echo $this->events['meta_desc'];?></li>
                <li class="even"><span class="newsheadblock">Status:</span> 
                    <?php 
                        if($this->events['status'] == '1'){
                            echo "Active";
                        } else {
                            echo "Not Active";
                        }
                    ?>
                </li>
                </ul>
              </div>
              
              
              
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content changepassword">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4><i class="icon-lock"></i> Change Password</h4>
      </div>
      <div class="modal-body frms">
        <form action="#" class="form-horizontal" id="validation-form">
        <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Current Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-camera"></i><strong>Current Password</strong></span>
                    <input type="password" data-rule-minlength="6" data-rule-required="true" class="form-control" id="password" name="password" placeholder="Current Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">New Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-check"></i><strong>New Password</strong></span>
                    <input type="password" data-rule-minlength="6" data-rule-required="true" class="form-control" id="password1" name="password1" placeholder="New Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Confirm Password</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-key"></i><strong>Confirm Password</strong></span>
                    <input type="password" data-rule-equalto="#password1" data-rule-minlength="6" data-rule-required="true" class="form-control" id="confirm-password" name="confirm-password" placeholder="Re-enter Password">
                  </div>
                </div>
              </div>              
              
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                  <input type="submit" value="Submit" class="btn btn-primary">
                  <button class="btn" type="button">Cancel</button>
                </div>
              </div>        
        </form>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->