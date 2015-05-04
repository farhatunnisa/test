<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">Manage Gallery Images</h1>
        </div>
        <!-- success or failure message -->
        <?php
            if($this->session->gets('success') || $this->session->gets('fail') ) {
            ?>
            <div id="divsuccess">
                <?php
                if($this->session->gets('fail')) {
                ?>
                <div class="list-group-item bg-error form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-remove-circle"></i> 
                        <?php 
                            echo $this->session->gets('fail'); $this->session->sets('fail', '');
                        ?>
                    </div>
                </div>                
                <?php } else if($this->session->gets('success')) { ?>
                <div class="list-group-item bg-success form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-ok-circle"></i> 
                        <?php 
                            echo $this->session->gets('success'); $this->session->sets('success', '');
                        ?>
                    </div>
                </div>               
                <?php } ?>          
            </div>
        <?php } ?>
        
        <div class="wrapper-md">
          <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                      Gallery
                    </div>                    
                </div>              
            </div>              
            <div class="box-content">                
                <div class="table-responsive">
                    <div class="box-content frms">
                        <div class="clearfix">
                            <div class="pull-left">

                            </div>
                            <div class="pull-right">
                                 <div class="btn-toolbar">
                                    <div class="btn-group"> 
                                        <a href="<?php echo SITEURL;?>gallery" class="btn btn-sm btn-info" title="Back">Back</a>
                                    </div>
                                     <div class="btn-group">
                                        <a href="javascript:void(0)" style="display: none;" class="btn btn-primary show-tooltip" id="clear-dropzone" title="Clear Dropzone"><i class="icon-cloud-clear"></i> Clear Dropzone</a>
                                        <a href="javascript:void(0)" class="btn btn-primary show-tooltip" title="Upload new images" id="upload-dropzone"><i class="icon-cloud-upload"></i>Upload Images</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-content frms" id="upload-dropzone-area" style="display: none;">                
                            <div id="my-awesome-dropzone" class="dropzone hidden-xs dz-clickable" action="<?php echo SITEURL; ?>gallery/galleryImagesUpload/<?php echo $this->event_id; ?>">
                              <div class="dz-default dz-message"><span>Drop files here to upload</span></div>                    
                            </div>              

                            <script language="javascript">
                              // myDropzone is the configuration for the element that has an id attribute
                              // with the value my-dropzone or myDropzone
                              Dropzone.options.myAwesomeDropzone = {
                                init: function() {
                                    var _this = this;
                                    // Setup the observer for the button.
                                    $(document).on("click","#clear-dropzone", function() {
                                      // Using "_this" here, because "this" doesn't point to the dropzone anymore
                                      _this.removeAllFiles();
                                      $("#clear-dropzone").hide();
                                      // If you want to cancel uploads as well, you
                                      // could also call _this.removeAllFiles(true);
                                    });
                                    this.on("complete", function (file) {
                                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                                          $("#clear-dropzone").show();
                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo SITEURL; ?>gallery/imagesRefresh/<?php echo $this->event_id; ?>",
                                                success:function(result){
                                                    $(".gallery").html(result);
                                                }
                                            }); 
                                        }
                                    });
                                }
                              };

                              Dropzone.autoDiscover = false;
                                $("#my-awesome-dropzone").dropzone({
                                    paramName: 'file',
                                    url: $(this).attr("action"),
                                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF",
                                    dictDefaultMessage: "Drag your images",
                                    clickable: true,
                                    enqueueForUpload: true,
                                    maxFilesize: 1,
                                    uploadMultiple: false,
                                    addRemoveLinks: false
                                });

                            </script>
                        </div>
                        <hr> 
                        <?php if(count($this->galleryImages) !=0) { ?>
                            
                        <ul class="gallery">                
                            <?php foreach ($this->galleryImages as $images) { ?>
                            <li id="photoid_<?php echo $images['image_id']; ?>">                    
                                <a class="group1" href="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $images['gallery_id']?>/<?php echo $images['image_file']?>" rel="prettyPhoto" title="Description of image">
                                    <div>
                                        <img width="180" height="130" src="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $images['gallery_id']?>/<?php echo $images['image_file']?>" alt="" />
                                        <i></i>
                                    </div>  
                                    <p><?php //echo SITEURL."Gallery/images/galleryImageTitles/". $images['image_id'] ; ?></p>
                                <div class="gallery-tools">                        
                                    <a href="#" id="" title="<?php echo $images['image_title']?>" description="<?php echo $images['image_desc']?>" url="<?php echo $images['image_id']?>" class="eventphoto_edit"><i class="icon-pencil"></i></a>
                                    <a href="#" title="<?php echo $images['image_title']?>" url="<?php echo $images['image_id']?>" class="eventphoto_delete"><i class="icon-trash"></i></a>
                                </div>
                            </li>
                            <?php } ?>                 
                        </ul>
                        <?php } else{ ?>
                            <font color="FF0000"><h3 align="center">No Images</h3></font>
                        <?php } ?>
                    </div>
                </div><br>
            </div>            
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  <!-- edit pop up -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content changepassword">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><i class="icon-lock"></i> Edit Info</h4>
          </div>
          <div class="modal-body frms">
              <form id="photoinfo" action="<?php echo SITEURL; ?>gallery/galleryImageTitles">                            
                  <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Title</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Title</strong></span>
                          <input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="title" name="image_title" placeholder="Title">
                        </div>
                      </div>
                  </div> 
                  <br>
                  <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Description</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Description</strong></span>
                              <textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" id="long_desc" name="image_desc" placeholder="Write Something here..."></textarea>
                        </div>
                      </div>
                    </div> 
                  <br>
                  <div class="form-group">
                    <div class="col-lg-12 controls">
                      <input type="hidden" name="image_id" id="photo_id" value="" />
                      <button class="btn btn-success" id="submit">submit</button>
                      <button class="btn" type="button" id="close">Cancel</button>
                      <span id="pleasewait" style="display: none;"><img width="25" src="<?php echo THEMEURL; ?>images/loading_small.gif" alt="Please Wait"/></span>
                    </div>
                  </div>        
                  <div class="clearfix"></div>
            </form>
              
          </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
  <!-- edit pop up end -->
  <!-- delete popup -->
  <div class="modal fade" id="myModal-Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content changepassword">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><i class="icon-lock"></i> Delete Alert </h4>
          </div>
          <div class="modal-body frms">
              <form id="photodelete" action="<?php echo SITEURL; ?>gallery/galleryImagesDelete">                            
                  <div class="form-group">
                      <div class="col-lg-12 controls">                          
                        Are you sure you want to delete this record?
                        <br>
                        <strong>This action cannot be undone!!!</strong>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12 controls">
                      <input type="hidden" name="image_id" id="photo_id" value="" />
                      <button class="btn btn-success" id="submit">Yes</button>
                      <button class="btn" type="button" id="close">No</button>
                      <span id="pleasewait" style="display: none;"><img width="20" height="" src="<?php echo THEMEURL; ?>images/loading_small.gif" alt="Please Wait"/></span>
                    </div>
                  </div>        
            </form>              
          </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
  <!-- delete popup end-->
  <style>
      /* Gallery ------------------------------------------ */
.gallery {
	display: inline-block;
	list-style: none;
	margin: 0;
	padding: 0;
}
.gallery > li {
	display: inline-block;
	margin: 5px;
	overflow: hidden;
	position: relative;
}
.gallery > li > a > div {
	display: block;
	position: relative;
}
.gallery > li > a > div > i {
	display: block;
	background-color: #222;
	opacity: 0;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transition: all 0.7s ease;
	-moz-transition: all 0.7s ease;
	-ms-transition: all 0.7s ease;
	-o-transition: all 0.7s ease;
	transition: all 0.7s ease;
}
.gallery > li:hover > a > div > i {
	opacity: 0.5;
}
.gallery > li > .gallery-tools {
	width: 100%;
	position: absolute;
	height: 30px;
	bottom: -30px;
	background-color: #222;
	opacity: 0.8;
	padding: 3px;
	text-align: center;
	-webkit-transition: all 0.7s ease;
	-moz-transition: all 0.7s ease;
	-ms-transition: all 0.7s ease;
	-o-transition: all 0.7s ease;
	transition: all 0.7s ease;
}
.gallery > li:hover > .gallery-tools {
	bottom: 0;
}
.gallery > li > .gallery-tools > a {
	color: rgba(255,255,255,0.5);
	margin: 0 3px;
	font-size: 18px;
}
.gallery > li > .gallery-tools > a:hover {
	color: #fff;
}
.gallery-cat {
	min-width: 150px;
}
.gallery-sort {
	min-width: 100px;
}
  </style>