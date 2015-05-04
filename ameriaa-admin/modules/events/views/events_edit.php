<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Edit Event</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
        <?php 
    $failure = $this->session->gets('failure'); 
    if($failure != '') { 
    ?>
     <div class="success_msg">
     <i class="icon-remove"></i><span class="text-error"><?php echo $failure; $this->session->sets('failure', ''); ?></span><br />
    </div>
    <?php } ?>
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Edit Event</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <form name="processuser" action="<?php echo SITEURL; ?>events/updateEvents" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Event Title</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Event Title</strong></span>
                    <input type="text" name="event_title" value="<?php echo $this->events['event_title'];?>" class="form-control" id="title" data-rule-required="true" data-rule-minlength="3"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Sponsor</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Sponsor</strong></span>
                    <input type="text" name="sponsor" value="<?php echo $this->events['sponsor'];?>" class="form-control" data-rule-required="true" data-rule-minlength="3"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Overview</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Overview</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" name="event_overview" placeholder="Write Something here..."><?php echo $this->events['event_overview'];?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Description</strong></span>
                 	<textarea id="body_content" name="long_desc" rows="4" cols="30"><?php echo $this->events['long_desc'];?></textarea>
                        <?php $this->editor->loadBasicEditor("body_content"); ?>
                  </div>
                </div>
              </div>
              <?php 
              $event_dates = date("m/d/Y",  strtotime($this->events['start_date'])) . " - " . date("m/d/Y",  strtotime($this->events['end_date'])); 
              ?>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Event Dates</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-calendar"></i><strong>Event Dates</strong></span>
                    <input type="text" name="event_dates" value="<?php echo $event_dates;?>" class="form-control date-range" placeholder="Select Date Ranges (Start Date to End Date)" />
                  </div>
                </div>
              </div>
              <div class="form-group">
		<label class="col-sm-3 col-lg-2 control-label">Language</label>
		<div class="col-lg-12 controls">
		<div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>Language</strong></span>
		<select name="language_id[]" data-placeholder="Select Language" class="form-control chosen select-search" multiple="multiple" tabindex="6">
		<?php
		if(strlen($this->events['language']) === 3) {
		?>
		<option value=""> </option>
		<?php foreach ($this->language as $language) { ?>
		<option value="<?php echo $language['language_id']; ?>" selected><?php echo $language['name']; ?></option>
		<?php } } else {
		?>
		<option value=""> </option>
		<?php foreach ($this->language as $language) { ?>
		<option value="<?php echo $language['language_id']; ?>" <?php if($this->events['language'] == $language['language_id']) echo "selected";?>><?php echo $language['name']; ?></option>
		<?php } } ?>
		</select>
		</div>
		</div>
		</div>
		
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Email</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-envelope"></i><strong>Email</strong></span>
                    <input type="text" data-rule-email="true" value="<?php echo $this->events['email'];?>" data-rule-required="true" class="form-control" id="email" name="email" placeholder="Ex: info@gmail.com">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Mobile</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-font"></i><strong>Mobile</strong></span>
                    <input type="text" data-rule-required="true" data-rule-number="true" value="<?php echo $this->events['mobile'];?>" id="mobile" name="mobile" placeholder="Only numbers" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Website</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-link"></i><strong>Website</strong></span>
                    <input type="text" data-rule-required="true" data-rule-url="true" value="<?php echo $this->events['website'];?>" id="website" name="website" placeholder="Ex: http://google.com" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group file-float">
                <label class="col-sm-3 col-lg-2 control-label">Upload Image</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-upload-alt"></i><strong>Upload Image</strong></span>
                    <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span>
                      <input type="file" name="image_file" class="file-input" data-rule-extension="true"/>
                      </span> <span class="fileupload-preview"></span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Terms & Conditions</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Terms & Conditions</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" name="termscondition" placeholder="Write Something here..."><?php echo $this->events['termscondition'];?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Meta Tags</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Meta Tags</strong></span>
                    <input type="text" name="meta_tags" value="<?php echo $this->events['meta_tags'];?>" class="form-control"  data-rule-required="true" data-rule-minlength="3"/>
                  </div>
                </div>
              </div>  
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Meta Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Meta Description</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" name="meta_desc" placeholder="Write Something here..."><?php echo $this->events['meta_desc'];?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Status</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Status</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                      <input type="radio" name="status" value="1" <?php if($this->events['status'] == "1") echo "checked";?> class="regular-radio" id="r1" />
                      <label for="r1"></label>
                      <label>Publish</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" name="status" value="0" <?php if($this->events['status'] == "0") echo "checked";?> class="regular-radio" id="r2" />
                      <label for="r2"></label>
                      <label>Not Publish</label>
                    </div>
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                  <input type="hidden" name="event_id" value="<?php echo $this->events['event_id'];?>" /> 
                  <input type="hidden" name="old_image_file" value="<?php echo $this->events['event_poster'];?>" /> 
                  <input type="submit" value="Update" class="btn btn-primary">
                  <a class="btn"href="<?php echo SITEURL; ?>events">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->
    <style>
    .box {
        overflow: hidden
    }
    .btn-file > input{
    transform:none;
    }
    .btn-file{
    overflow: inherit;
    }
    </style>