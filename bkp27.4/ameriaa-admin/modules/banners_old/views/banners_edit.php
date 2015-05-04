<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li><span class="divider"><a href="<?php echo SITEURL; ?>banners">Banners</a> <i class="icon-angle-right"></i></span></li>
        <li class="active">Edit Banner</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
    
    <!-- success message -->
    
    <!-- success message end -->
    
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Edit Banner</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
              <form name="processuser" action="<?php echo SITEURL; ?>banners/updateBanner" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-2 control-label">Banner Name</label>
                  <div class="col-lg-12 controls">
                    <div class="input-group"> 
                        <span class="input-group-addon">
                            <i class="icon-user"></i>
                            <strong>Banner Name</strong>
                        </span>
                        <input type="text" name="banner_title" class="form-control" id="banner_title" data-rule-required="true" data-rule-minlength="3" 
                               value="<?php echo $this->bannerDetails['banner_title']; ?>"/>
                    </div>
                  </div>
                </div>
                  
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Banner description</label>
                    <div class="col-lg-12 controls">
                      <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Banner description</strong></span>
                        <input type="text" name="description" class="form-control" id="description" data-rule-required="true" data-rule-minlength="3" 
                               value="<?php echo $this->bannerDetails['description']; ?>"/>
                      </div>
                    </div>
                </div>
                  
                <div class="form-group file-pos">
                    <label class="col-sm-3 col-lg-2 control-label">Upolad Image</label>
                    <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i><strong>Upload Image</strong></span>
                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                                <div style="width: 220px; height: 140px; float:left;" class="fileupload-new img-thumbnail">
                                   <img alt="" src="<?php echo SITEURL; ?>uploads/banners/<?php echo $this->bannerDetails['image_file'] ; ?>" />
                                </div>
                                <div style="max-width: 220px; max-height: 140px; line-height: 10px;" class="fileupload-preview fileupload-exists img-thumbnail"></div>
                                <div class="upload-file">
                                   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                   <span class="fileupload-exists">Change</span>
                                   <input type="file" class="default" name="image_file" data-rule-extension="true"></span>
                                   <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                   <span class="label label-important">Note!</span><span style="color: red"> Please upload 870*420 image only</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                  
                <div class="form-group">
                  <label class="col-sm-3 col-lg-2 control-label">Status</label>
                  <div class="col-lg-12 controls">
                    <div class="input-group">
                        <span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Status</strong></span>
                        <div class="rc-div">
                          <div class="radio-inline">
                            <input type="radio" name="status" value="1" <?php if($this->bannerDetails['status'] == "1") { echo "checked"; } ?> class="regular-radio" id="r1" />
                            <label for="r1"></label>
                            <label>Active</label>
                          </div>
                          <div class="radio-inline">
                            <input type="radio" name="status" value="0" <?php if($this->bannerDetails['status'] == "0") { echo "checked"; } ?> class="regular-radio" id="r2" />
                            <label for="r2"></label>
                            <label> Not Active</label>
                          </div>
                        </div><!-- rc-div end -->   
                    </div>
                  </div>
                </div>
                  
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                    <input type="hidden" name="old_image_file" value="<?php echo $this->bannerDetails['image_file'] ?>" />
                    <input type="hidden" name="banner_id" value="<?php echo $this->bannerDetails['banner_id']; ?>" />                    
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <a class="btn" href="<?php echo SITEURL; ?>banners">Cancel</a>
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