<?php

/**
 * Edit Posts
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
?>

<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL;?>">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active"><a href="<?php echo SITEURL; ?>posts" >Posts</a><span class="divider"><i class="icon-angle-right"></i></span></li>
        <li class="active">Manage Edit Posts</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
    <?php
         if($this->session->gets('success') || $this->session->gets('faillure') ) {
         ?>
    <div class="success_msg" id="divsuccess">
         <?php
         if($this->session->gets('faillure')) {
         ?>
         <i class="icon-remove"></i><span class="text-error">
             <?php 
             echo $this->session->gets('faillure');
             $this->session->sets('faillure', '');
             ?>
         </span><br />
         <?php } else if($this->session->gets('success')) { ?>
        <i class="icon-check"></i><span class="text-success">
            <?php 
             echo $this->session->gets('success');
             $this->session->sets('success', '');
             ?>
        </span><br />
         <?php } ?>
     </div>
         <?php } ?>
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Edit Post Form</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
              <form action="<?php echo SITEURL; ?>posts/updatePostDetails" method="post" class="form-horizontal" id="validation-form" enctype='multipart/form-data'>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Post Title</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> 
                      <span class="input-group-addon">
                          <i class="glyphicon glyphicon-font"></i>
                          <strong>Post Title</strong>
                      </span>
                    <input type="text" data-rule-minlength="3" data-rule-required="true" value="<?php echo $this->postDetails['post_title']; ?>" class="form-control" id="posttitle" name="post_title" placeholder="Post Title">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Category</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-chevron-down"></i><strong>Category</strong></span>
                    <select data-placeholder="Select Category" name="post_category" class="form-control chosen select-search" multiple="multiple" tabindex="6">
                     <?php 
                        foreach($this->catList as $cats)
                        {
                        ?>
                        <option value="<?php echo $cats['cat_id'];?>" <?php if($this->postDetails['post_catname'] == $cats['cat_id']) echo 'selected';?>><?php echo $cats['cat_name'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="form-group file-float">
                <label class="col-sm-3 col-lg-2 control-label">Post Image</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-upload-alt"></i><strong>Fisheries Image</strong></span>
                    <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select Image</span> <span class="fileupload-exists">Change</span>                      
                      <input type="file" class="form-control"  data-rule-extension="true" id="logo" name="image" placeholder="Please Upload Image">
                      <input type="hidden" name="post_image" value="<?php echo $this->postDetails['post_anchorimage'];?>">
                      </span> <span class="fileupload-preview"><img alt="" width="50" height="30" src="<?php echo FRONTURL."uploads/PostImages/".$this->postDetails['post_anchorimage'] ?>" /></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a> </div>
                  </div>
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Image Caption</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> 
                      <span class="input-group-addon">
                          <i class="glyphicon glyphicon-font"></i>
                          <strong>Image Caption</strong>
                      </span>
                    <input type="text" data-rule-minlength="3" data-rule-required="true" value="<?php echo $this->postDetails['post_imagecaption']; ?>" class="form-control" id="imgcaption" name="img_caption" placeholder="Image Caption">
                  </div>
                </div>
              </div>
              <!--<div class="form-group file-float">
                <label class="col-sm-3 col-lg-2 control-label">File Attachment</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-upload-alt"></i><strong>File Attachment</strong></span>
                    <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span>
                      <input type="file" class="file-input" name="doc_file"/>
                      <input type="hidden" name="post_file" value="<?php echo $this->postDetails['post_file'];?>">
                      </span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a> </div>
                  </div>
                </div>
              </div>-->
                  
              <div class="form-group file-float">
                <label class="col-sm-3 col-lg-2 control-label">File Attachment</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-upload-alt"></i><strong>File Attachment</strong></span>
                    <div class="fileupload fileupload-new" data-provides="fileupload"> <span class="btn btn-default btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span>                      
                      <input type="file" class="form-control" name="doc_file" placeholder="Please Upload File">
                      <input type="hidden" name="post_file" value="<?php echo $this->postDetails['post_file'];?>">
                      </span> <span class="fileupload-preview"></span> <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a> </div>
                  </div>
                </div>
              </div>
                 
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Date</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Date</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_date'] == 'y')  echo "checked"; ?> name="show_date" value="y" class="regular-radio" id="d1" checked="checked" />
                      <label for="d1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_date'] == 'n')  echo "checked"; ?>  name="show_date" value="n" class="regular-radio" id="d2" />
                      <label for="d2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Author</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Author</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_author'] == 'y')  echo "checked"; ?> name="show_author" value="y" class="regular-radio" id="a1" checked="checked" />
                      <label for="a1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_author'] == 'n')  echo "checked"; ?> name="show_author" value="n" class="regular-radio" id="a2" />
                      <label for="a2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Ratings</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Ratings</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_rating'] == 'y')  echo "checked"; ?> name="show_ratings" value="y" class="regular-radio" id="r1" checked="checked" />
                      <label for="r1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_rating'] == 'n')  echo "checked"; ?>  name="show_ratings" value="n" class="regular-radio" id="r2" />
                      <label for="r2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Comments</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Comments</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_comment'] == 'y')  echo "checked"; ?> name="show_comments" value="y" class="regular-radio" id="c1" checked="checked" />
                      <label for="c1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_comment'] == 'n')  echo "checked"; ?>  name="show_comments" value="n" class="regular-radio" id="c2" />
                      <label for="c2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Like/Unlike</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Like/Unlike</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_like'] == 'y')  echo "checked"; ?> name="show_likes" value="y" class="regular-radio" id="l1" checked="checked" />
                      <label for="l1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_like'] == 'n')  echo "checked"; ?> name="show_likes" value="n" class="regular-radio" id="l2" />
                      <label for="l2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Show Share Icon</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Show Share Icon</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_show_shareicon'] == 'y')  echo "checked"; ?> name="show_share_icon" value="y" class="regular-radio" id="s1" checked="checked" />
                      <label for="s1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_show_shareicon'] == 'n')  echo "checked"; ?> name="show_share_icon" value="n" class="regular-radio" id="s2" />
                      <label for="s2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Start Date</label>
                <div class="col-lg-12 controls">
                  <div class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> <span class="input-group-addon"><i class="icon-calendar" style="float:left;"></i><strong style="line-height:20px;">Start Date</strong></span>
                    <input class="form-control date-picker" size="16" type="text" value="<?php echo $this->postDetails['post_startdate']; ?>" name="start_date"/>
                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">End Date</label>
                <div class="col-lg-12 controls">
                  <div class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> <span class="input-group-addon"><i class="icon-calendar" style="float:left;"></i><strong style="line-height:20px;">End Date</strong></span>
                    <input class="form-control date-picker" size="16" type="text" value="<?php echo $this->postDetails['post_enddate']; ?>" name="end_date"/>
                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> </div>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Tags</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> 
                      <span class="input-group-addon">
                          <i class="glyphicon glyphicon-tag"></i>
                          <strong>Tags</strong>
                      </span>
                    <input type="text" data-rule-minlength="3" data-rule-required="true" value="<?php echo $this->postDetails['post_tags']; ?>" class="form-control" id="posttags" name="post_tags" placeholder="Tags">
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Short Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="icon-file-text"></i><strong>Short Description</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control"  name="short_desc" placeholder="Short Description"><?php echo $this->postDetails['post_shortdesc']; ?></textarea>
                  </div>
                </div>
              </div>
              
                  <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Full Description</label>
                <div class="col-lg-12 controls">
                    <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="icon-file-text-alt"></i><strong>Full Description</strong></span>
                  <textarea id="body_content" name="full_desc" rows="4" cols="30"><?php echo $this->postDetails['post_fulldesc']; ?></textarea> </div>
                    <script type="text/javascript">
                   // <![CDATA[
                       var oEdit1 = new InnovaEditor("oEdit1");
                       oEdit1.width="100%";
                       oEdit1.height=450;
                       oEdit1.enableFlickr = false;
                       oEdit1.enableCssButtons = false;
                       oEdit1.flickrUser = "";
                       oEdit1.returnKeyMode = 2;
                       oEdit1.arrCustomButtons = [
                       ["CustomName1","modalDialog('editor/scripts/common/paypal.htm',350,270)","PayPal Button","btnPayPal.gif"],			
                       ["HTML5Video", "modalDialog('editor/scripts/common/webvideo.htm',750,550,'HTML5 Video');", "HTML5 Video", "btnVideo.png"],
                       ["NewsArticle", "modalDialog('editor/scripts/common/webnews.htm',750,550,'News Articles');", "News Articles", "btnVideo.png"]
                       ];
                       oEdit1.toolbarMode = 2;
                       oEdit1.groups=[
                       ["grpEdit", "", ["SourceDialog", "FullScreen", "SearchDialog", "RemoveFormat", "BRK", "Undo", "Redo", "Cut", "Copy", "Paste"]],
                       ["grpFont", "", ["FontName", "FontSize", "Strikethrough", "Superscript", "BRK", "Bold", "Italic", "Underline", "ForeColor", "BackColor"]],
                       ["grpPara", "", ["CompleteTextDialog", "Quote", "Indent", "Outdent", "Styles", "StyleAndFormatting", "Absolute", "BRK", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "Numbering", "Bullets"]],
                       ["grpInsert", "", ["LinkDialog", "BRK", "ImageDialog", "Form"]],
                       ["grpTables", "", ["TableDialog", "BRK", "Guidelines", "Guidelines", "CustomName1"]],
                       ["grpMedia", "", ["Media", "FlashDialog", "YoutubeDialog", "HTML5Video", "BRK", "CustomTag", "CharsDialog", "Line"]]
                       ];

                       oEdit1.css="http://localhost/siri-admin/assets/editor/siri-theme/ergo/css/custom.css";
                       oEdit1.fileBrowser = "http://localhost/siri-admin/assets/editor/filemanager.php";
                       oEdit1.arrCustomTag=[
                       ["First Last Name","[NAME]"],
                       ["Username","[USERNAME]"],
                       ["Site Name","[SITE_NAME]"],
                       ["Site Url","[URL]"]
                       ];
                       oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
                       oEdit1.mode="XHTMLBody";
                       oEdit1.REPLACE("body_content");
                       // ]]>
                   </script>
                </div>
              </div>
                  
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Meta keywords</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="icon-building"></i><strong>Meta keywords</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control"  name="meta_keywords" placeholder="Meta keywords"><?php echo $this->postDetails['post_metakeywords']; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Meta Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="icon-file-text"></i><strong>Meta Description</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control"  name="meta_desc" placeholder="Meta Description"><?php echo $this->postDetails['post_metadesc']; ?></textarea>
                  </div>
                </div>
              </div>
                  
          <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Publish</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Publish</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                        <input type="radio" <?php if($this->postDetails['post_publish'] == 'y')  echo "checked"; ?> name="post_status" value="y" class="regular-radio" id="p1" checked="checked" />
                      <label for="r1"></label>
                      <label>Yes</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" <?php if($this->postDetails['post_publish'] == 'n')  echo "checked"; ?> name="post_status" value="n" class="regular-radio" id="p2" />
                      <label for="r2"></label>
                      <label>No</label>
                    </div>
                   
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                    <input type='hidden' name='post_id' value='<?php echo $this->postDetails['post_id']; ?>'>
                  <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                  <button class="btn" id="cancel" type="button">Cancel</button>
                </div>
              </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->
    <script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $("#divsuccess").fadeOut();
$('#cancel').click(function() {
   if(confirm("Are you sure you want to navigate away from this page?"))
   {
      history.go(-1);
   }        
   return false;
});
});
</script>