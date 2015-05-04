<?php
$permissions = $this->session->gets('permissions');
?>
<!-- BEGIN Content -->
  <div id="main-content">     
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        
        <li class="active">Manage Banners</li>       
      </ul>      
    </div>
    <!-- END Breadcrumb --> 
    <!-- success message -->
    <?php
        if($this->session->gets('success') || $this->session->gets('fail') ) {
        ?>
        <div class="success_msg" id="divsuccess">
            <?php
            if($this->session->gets('fail')) {
            ?>
            <i class="icon-remove"></i><span class="text-error">
                <?php 
                echo $this->session->gets('fail'); $this->session->sets('fail', '');
                ?>
            </span><br />
            <?php } else if($this->session->gets('success')) { ?>
           <i class="icon-check"></i><span class="text-success">
               <?php 
                echo $this->session->gets('success'); $this->session->sets('success', '');
                ?>
           </span><br />
            <?php } ?>          
        </div>
    <?php } ?>
    <!-- /-success message -->
    <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-table"></i>View Banners</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="btn-toolbar pull-right clearfix">
              <div class="btn-group btn-align icons-top"> 
                  <a class="btn btn-add show-tooltip" title="Add new banner" href="<?php echo SITEURL; ?>banners/add"><i class="icon-plus"></i></a>
                  <a class="btn btn-edit show-tooltip deleteme" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>banners/deleteBanner"><i class="icon-trash"></i></a>
                  <a class="btn btn-refresh show-tooltip" title="Refresh" href="javascript:void(0)" onclick="location.reload();"><i class="icon-repeat"></i></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive" style="border:0">
              <table class="table table-advance" id="table1">
                <thead>
                  <tr>
                    <th style="width:18px" class="sorting-disabled">
                        <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" value="selectall"/>
                        <label for="checkbox-1-1"></label>
                    </th>                                     
                    <th>Banner Name</th>
                    <th class="text-center sorting">Created</th>
                    <th class="text-center sorting">Status</th>
                    <th class="text-center sorting-disabled">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $ch = 1;
                        foreach($this->banner as $banner) { $ch++; 
                        ?>
                        <tr class="table-flag-blue" id="deleteitem_<?php echo $banner['banner_id'];   ?>">
                            <td width="5%">
                                <input type="checkbox" id="checkbox-1-<?php echo $ch; ?>" class="regular-checkbox" name="regular-checkbox" value="<?php echo $banner['banner_id']; ?>"/>
                                <label for="checkbox-1-<?php echo $ch; ?>"></label>
                            </td>
                            
                            <td  width="40%"><?php echo $banner['banner_title']; ?></td>
                            <td  width="20%" class="text-center"><?php  echo $banner['created']; ?></td>
                            
                            <td class="text-center" id="status<?php echo $ch;?>">
                            <?php
                                if($banner['status'] == 'y') {
                            ?>
                            <a href="javascript:void(0)" onclick="changeStatus('status<?php echo $ch;?>', '<?php echo $banner['banner_id'];?>', '<?php echo $banner['status'];?>')">
                            <i class="icon-ok ok-btn"></i>
                            <?php } else { ?>
                            <a href="javascript:void(0)" onclick="changeStatus('status<?php echo $ch;?>', '<?php echo $banner['banner_id'];?>', '<?php echo $banner['status'];?>')">
                            <i class="icon-remove remov"></i>
                            <?php } ?>
                            </a>
                            </td>
                            
                            <td  width="15%" class="text-center">
                                <a href="<?php echo SITEURL; ?>banners/edit/<?php echo $banner['banner_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                <a href="javascript:void(0);" title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $banner['banner_id'];?>" url="<?php echo SITEURL; ?>banners/deleteBanner"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content --> 
    <script type="text/javascript">
        $(document).ready(function(){
            $("#divsuccess").fadeOut(5000);
        }); 
        
        function changeStatus(id, banner_id, status) {
            var url= "<?php echo SITEURL; ?>banners/changeStatus";
            $('#'+id).html('<img src="<?php echo THEMEURL ; ?>images/loading_small.gif">');
            $.ajax({
                type: "POST",             
                url: url,
                data: 'statusId='+status+'&banner_id='+banner_id,
                success: function(data) {  
                    if(data == 1){
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ banner_id +'\', \'y\')">\n\
                                            <i class="icon-ok ok-btn"></i>\n\
                                        </a>');
                    } else {
                        $('#'+id).html('<a href="javascript:void(0)" onclick="changeStatus(\''+ id +'\', \''+ banner_id +'\', \'p\')">\n\
                                            <i class="icon-remove remov"></i>\n\
                                        </a>');
                    }
                }
            });
        }
    </script>