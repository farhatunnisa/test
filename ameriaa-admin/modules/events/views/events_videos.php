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
        <li class="active">Event Videos</li>
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
            <h3><i class="icon-picture"></i>Event Videos</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <div class="clearfix">
                <div class="pull-left"> 
                </div>
                <div class="pull-right">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <?php if(in_array($this->videosModuleId, $permissions['add'])) { ?>
                            <a href="#" style="display: none;" class="btn btn-primary show-tooltip" id="clear-dropzone" title="Clear Dropzone"><i class="icon-cloud-clear"></i> Clear Dropzone</a>
                            <a href="#" class="btn btn-primary show-tooltip" title="Upload new images" id="upload-dropzone"><i class="icon-cloud-upload"></i> Add</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="box-content frms" id="upload-dropzone-area" style="display: none;">                
                <form name="processuser" action="<?php echo SITEURL; ?>events/addEventVideo" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Title</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Title</strong></span>
                          <input type="text" id="video_title" name="video_title" class="form-control" placeholder="Title" data-rule-required="true" data-rule-minlength="3"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Youtube Url</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"> <span class="input-group-addon"><i class="icon-link"></i><strong>Youtube Url</strong></span>
                          <input type="text" data-rule-required="true" data-rule-url="true" id="youtube_url" name="youtube_url" placeholder="Ex: http://google.com" class="form-control">
                        </div>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Status</label>
                      <div class="col-lg-12 controls">
                        <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Status</strong></span>
                        <div class="rc-div">
                          <div class="radio-inline">
                            <input type="radio" name="status" value="1" class="regular-radio" id="r1" />
                            <label for="r1"></label>
                            <label>Publish</label>
                          </div>
                          <div class="radio-inline">
                            <input type="radio" name="status" value="0" class="regular-radio" id="r2" />
                            <label for="r2"></label>
                            <label>Not Publish</label>
                          </div>
                       </div><!-- rc-div end -->   
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                        <input type="hidden" name="event_id" value="<?php echo $this->event_id; ?>" />
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <button class="btn" type="reset">Cancel</button>
                      </div>
                    </div>
                  </form>
               
            </div>
            <hr>  
            <?php if(count($this->eventVideos) != 0) { ?>
                <ul class="youtube-videogallery">
                    <?php foreach ($this->eventVideos as $videos) { ?>
                    <li>
                        <a href="<?php echo trim($videos['video_url']); ?>">
                          <?php echo $videos['video_title'] . "-" . $videos['video_id'] . "-" .$videos['video_title'] ."-". trim($videos['video_url']) ; ?>
                        </a>              
                    </li> 
                    <?php } ?>
                </ul>
            <?php } else { ?> 
                <font color="FF0000"><h3 align="center">No Videos</h3></font>
            <?php } ?>
            <script>
                $(document).ready(function(){
                    $("ul.youtube-videogallery").youtubeVideoGallery( {plugin:'colorbox',assetFolder:'<?php echo THEMEURL; ?>assets/youtube-gallery/'} );
                });
            </script>
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
                <form id="photoinfo" action="<?php echo SITEURL; ?>events/eventVideos">                            
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Title</label>
                        <div class="col-lg-12 controls">
                          <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Title</strong></span>
                            <input type="text"  class="form-control" id="title" name="title" data-rule-required="true" data-rule-minlength="3"/>
                          </div>
                        </div>
                    </div>                  
                    <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Youtube Url</label>
                          <div class="col-lg-12 controls">
                            <div class="input-group"> <span class="input-group-addon"><i class="icon-link"></i><strong>Youtube Url</strong></span>
                              <input type="text" data-rule-required="true" data-rule-url="true" id="long_desc" name="long_desc" placeholder="Ex: http://google.com" class="form-control">
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
              <form id="photodelete" action="<?php echo SITEURL; ?>events/eventVideosDelete">                            
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