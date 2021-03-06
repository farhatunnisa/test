<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li><span class="divider"><a href="<?php echo SITEURL; ?>banners">Banners</a> <i class="icon-angle-right"></i></span></li>
        <li class="active">Add Banner</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
    
    <!-- success message -->
    <?php
        if($this->session->gets('addFailure')) {
        ?>
        <div class="success_msg" id="divsuccess">
            <?php
                if($this->session->gets('addFailure')) {
                ?>
                <i class="icon-remove"></i>
                <span class="text-error">
                    <?php 
                        echo $this->session->gets('addFailure');
                        $this->session->sets('addFailure', '');
                    ?>
                </span><br />
                <?php }  ?>
         </div>
    <?php } ?>
    <?php
        if($this->session->gets('image_dimension')) {
        ?>
        <div class="success_msg" id="divsuccess">
            <?php
                if($this->session->gets('image_dimension')) {
                ?>
                <i class="icon-remove"></i>
                <span class="text-error">
                    <?php 
                        echo $this->session->gets('image_dimension');
                        $this->session->sets('image_dimension', '');
                    ?>
                </span><br />
                <?php }  ?>
         </div>
    <?php } ?>
    <!-- success message end-->
    
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Add Banner</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
              <form name="processuser" action="<?php echo SITEURL; ?>banners/addbanner" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
              
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Banner Name</label>
                    <div class="col-lg-12 controls">
                      <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Banner Name</strong></span>
                        <input type="text" name="banner_title" class="form-control" id="banner_title" data-rule-required="true" data-rule-minlength="3"/>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Banner description</label>
                    <div class="col-lg-12 controls">
                      <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Banner description</strong></span>
                        <input type="text" name="description" class="form-control" id="description" data-rule-required="true" data-rule-minlength="3"/>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group file-float">
                    <label class="col-sm-3 col-lg-2 control-label">Upload Image</label>
                    <div class="col-lg-12 controls">
                      <div class="input-group"> <span class="input-group-addon"><i class="icon-upload-alt"></i><strong>Image</strong></span>
                        <div class="fileupload fileupload-new" data-provides="fileupload"> 
                            <span class="btn btn-default btn-file"> 
                                <span class="fileupload-new">Select file</span> 
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="image_file" class="file-input" data-rule-extension="true" data-rule-required="true"/>
                            </span> 
                            <span class="fileupload-preview"></span> 
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" >Remove</a> 
                            <span class="label label-important">NOTE!</span><span style="color: red"> Please upload 870*420 image only</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                     <label class="col-sm-3 col-lg-2 control-label">Status</label>
                     <div class="col-lg-12 controls">
                       <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Status</strong></span>
                       <div class="rc-div">
                         <div class="radio-inline">
                           <input type="radio" name="status" value="1" class="regular-radio" id="r1" checked />
                           <label for="r1"></label>
                           <label>Active</label>
                         </div>
                         <div class="radio-inline">
                           <input type="radio" name="status" value="0" class="regular-radio" id="r2" />
                           <label for="r2"></label>
                           <label> Not Active</label>
                         </div>
                      </div><!-- rc-div end -->   
                       </div>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
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