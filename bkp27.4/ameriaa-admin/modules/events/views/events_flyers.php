<?php
$permissions = $this->session->gets('permissions');
?> 
<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Event Flyers</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
    <div class="success_msg" style="display: none;"></div>
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-picture"></i>Event Flyers</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <div class="clearfix">
                <div class="pull-left">
                    
                </div>
                <div class="pull-right">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <?php if(in_array($this->flyersModuleId, $permissions['add'])) { ?>
                            <a href="#" style="display: none;" class="btn btn-primary show-tooltip" id="clear-dropzone" title="Clear Dropzone"><i class="icon-cloud-clear"></i> Clear Dropzone</a>
                            <a href="#" class="btn btn-primary show-tooltip" title="Upload new images" id="upload-dropzone"><i class="icon-cloud-upload"></i> Upload</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-content frms" id="upload-dropzone-area" style="display: none;">                
                <div id="my-awesome-dropzone" class="dropzone hidden-xs dz-clickable" action="<?php echo SITEURL; ?>events/eventFlyersUpload/<?php echo $this->event_id; ?>">
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
                              location.reload();
                                /*$.ajax({
                                    type: "POST",
                                    url: "<?php echo SITEURL; ?>events/flyersRefresh/<?php echo $this->event_id; ?>",
                                    success:function(result){
                                        $(".gallery").html(result);
                                    }
                                }); */
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
            <ul class="gallery">
                <?php //echo "<pre>"; print_r($this->eventFlyers); exit; ?>
                <?php foreach ($this->eventFlyers as $eventFlyers) { ?>
                <li id="photoid_<?php echo $eventFlyers['flyer_id']; ?>">
                    <a href="<?php echo SITEURL; ?>uploads/eventsflyers/<?php echo $eventFlyers['event_id']?>/<?php echo $eventFlyers['flyer_file']?>" rel="prettyPhoto" title="Description of image">
                        <div>
                            <img src="<?php echo SITEURL; ?>uploads/eventsflyers/<?php echo $eventFlyers['event_id']?>/<?php echo "thumb_".$eventFlyers['flyer_file']?>" alt="" />
                            <i></i>
                        </div>
                    </a>
                    <div class="gallery-tools">
                        <?php if(in_array($this->flyersModuleId, $permissions['edit'])) { ?>
                        <a href="#" title="<?php echo $eventFlyers['flyer_title']?>" description="<?php echo $eventFlyers['flyer_desc']?>" url="<?php echo $eventFlyers['flyer_id']?>" class="eventphoto_edit"><i class="icon-pencil"></i></a>
                        <?php } ?>
                        
                        <?php if(in_array($this->flyersModuleId, $permissions['delete'])) { ?>
                        <a href="#" title="<?php echo $eventFlyers['flyer_title']?>" url="<?php echo $eventFlyers['flyer_id']?>" class="eventphoto_delete"><i class="icon-trash"></i></a>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?> 
            </ul>
            <!--<div class="text-center">
                <ul class="pagination pagination-bullet">
                    <li class="active"><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>-->
        </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content changepassword">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><i class="icon-lock"></i> Edit Info</h4>
          </div>
          <div class="modal-body frms">
              <form id="photoinfo" action="<?php echo SITEURL; ?>events/eventFlyersTitles">                            
                  <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Title</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Title</strong></span>
                          <input type="text" data-rule-minlength="3" data-rule-required="true" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Description</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Description</strong></span>
                              <textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" id="long_desc" name="long_desc" placeholder="Write Something here..."></textarea>
                        </div>
                      </div>
                    </div> 
                  <div class="form-group">
                    <div class="col-lg-12 controls">
                      <input type="hidden" name="photo_id" id="photo_id" value="" />
                      <button class="btn btn-success" id="submit">submit</button>
                      <button class="btn" type="button" id="close">Cancel</button>
                      <span id="pleasewait" style="display: none;"><img width="50" height="50" src="<?php echo THEMEURL; ?>images/loader.gif" alt="Please Wait"/></span>
                    </div>
                  </div>        
            </form>
              
          </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<div class="modal fade" id="myModal-Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content changepassword">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><i class="icon-lock"></i> Delete Alert </h4>
          </div>
          <div class="modal-body frms">
              <form id="photodelete" action="<?php echo SITEURL; ?>events/eventFlyersDelete" autocompete="off">                            
                  <div class="form-group">
                      <div class="col-lg-12 controls">                          
                        Are you sure you want to delete this record?
                        <br>
                        <strong>This action cannot be undone!!!</strong>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12 controls">
                      <input type="hidden" name="photo_id" id="photo_id" value="" />
                      <button class="btn btn-success" id="submit">Yes</button>
                      <button class="btn" type="button" id="close">No</button>
                      <span id="pleasewait" style="display: none;"><img width="50" height="50" src="<?php echo THEMEURL; ?>images/loader.gif" alt="Please Wait"/></span>
                    </div>
                  </div>        
            </form>              
          </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>