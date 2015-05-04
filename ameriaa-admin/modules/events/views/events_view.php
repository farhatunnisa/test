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
        <li class="active">Manage Event</li>      
      </ul>      
    </div>
    <!-- END Breadcrumb --> 
        <!-- END Breadcrumb --> 
    <?php 
    $sucess = $this->session->gets('sucess'); 
    $sucessE = $this->session->gets('sucessE');
    if($sucess != '') { 
    ?>
     <div class="success_msg">
     <i class="icon-check"></i><span class="text-success"><?php echo $sucess; $this->session->sets('sucess', ''); ?></span><br />
    </div>
    <?php }  else if($sucessE != '') { ?>
    <div class="success_msg">
     <i class="icon-check"></i><span class="text-success"><?php echo $sucessE; $this->session->sets('sucessE', ''); ?></span><br />
    </div>
    <?php } ?>
     <div class="success_msg" style="display: none;"></div>
 <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-table"></i>View Events</h3>
            <div class="box-tool"> <a data-action="collapse" href="javascript:void(0)"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="btn-toolbar pull-right clearfix">
              <div class="btn-group btn-align icons-top"> 
                   <?php if(in_array($this->moduleId, $permissions['add'])) { ?>
                  <a class="btn btn-add show-tooltip" title="Add new record" href="<?php echo SITEURL; ?>events/add"><i class="icon-plus"></i></a> 
                   <?php } ?>
                   <?php if(in_array($this->moduleId, $permissions['delete'])) { ?>
                  <a class="btn btn-delete show-tooltip deleteme" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>events/deleteEvents"><i class="icon-trash"></i></a> 
                   <?php } ?>
                  <a class="btn btn-refresh show-tooltip" title="Refresh" href="javascript:void(0)" onclick="location.reload();"><i class="icon-repeat"></i></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive" style="border:0">
              <table class="table table-advance" id="table1">
                <thead>
                  <tr>
                    <th class="sorting-disabled" style="width:18px">
                        <input type="checkbox" id="checkbox-1-1" class="regular-checkbox" value="selectall"/>
                        <label for="checkbox-1-1"></label>
                    </th>                    
                    <th class="sorting">Title</th>                    
                    <th class="text-center sorting">Language</th>
                    <th class="text-center sorting">Created</th>
                    <?php if(in_array($this->moduleId, $permissions['status'])) { ?>
                    <th class="text-center sorting">Status</th>
                    <?php } ?>
                    <?php //$arr = Array(20,21,22,23,24);
                    //if(array_intersect($arr, $permissions['access'])!==$arr) { ?>
                    <th class="text-center">Data</th>
                    <?php //} ?>
                    
                    <th class="text-center sorting-disabled">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $ch = 1; foreach($this->events as $events) { $ch++;
                ?>
                    <tr class="table-flag-blue" id="deleteitem_<?php echo $events['event_id']; ?>">
                    <td width="5%">
                        <input type="checkbox" id="checkbox-1-<?php echo $ch; ?>" class="regular-checkbox" name="regular-checkbox" value="<?php echo $events['event_id']; ?>"/>
                        <label for="checkbox-1-<?php echo $ch; ?>"></label>
                    </td>
                    <td width="28%"><?php echo $events['event_title']; ?></td>
                    <td width="7%" class="text-center">
                        <?php
			if(strlen($events['language']) === 3) {
			echo "Telugu, Hindi";
			} else {
			if($events['language'] == 1) {
			echo "Telugu";
			} else {
			echo "Hindi";
			}
			}
			?>			
                    </td>
                    <td width="7%" class="text-center"><?php echo $events['created']; ?></td>
                     <?php if(in_array($this->moduleId, $permissions['status'])) { ?>
                    <td width="5%" class="text-center">
                        <?php 
                        if($events['status'] == '1'){ 
                            echo "Active";                            
                        } else {
                            echo "Inactive";                            
                        }
                        ?>
                    </td>
                     <?php } ?>
                    <td width="20%" class="text-center">
                         <?php if(in_array($this->venueModuleId, $permissions['access'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/venues/<?php echo $events['event_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Event Venues"><i class="icon-location-arrow"></i></a> 
                         <?php } ?>
                        <?php if(in_array($this->ticketModuleId, $permissions['access'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/tickets/<?php echo $events['event_id'];?>" title="" class="btn btn-primary btn-add show-tooltip" data-original-title="Event Tickets"><i class="icon-ticket"></i></a>
                        <?php } ?>
                        <?php if(in_array($this->flyersModuleId, $permissions['access'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/flyers/<?php echo $events['event_id'];?>" title="" class="btn btn-danger btn-refresh show-tooltip" data-original-title="Event Flyers"><i class="icon-star"></i></a> 
                        <?php } ?>
                         <?php if(in_array($this->photosModuleId, $permissions['access'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/photos/<?php echo $events['event_id'];?>" title="" class="btn btn-danger btn-pdf show-tooltip" data-original-title="Event Photos"><i class="icon-picture"></i></a> 
                         <?php } ?>
                         <?php if(in_array($this->videosModuleId, $permissions['access'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/videos/<?php echo $events['event_id'];?>" title="" class="btn btn-danger btn-print show-tooltip" data-original-title="Event Videos"><i class="icon-film"></i></a> 
                         <?php }?>
                    </td>
                    <td width="15%" class="text-center">
                        <?php if(in_array($this->moduleId, $permissions['edit'])) { ?>
                        <a href="<?php echo SITEURL; ?>events/edit/<?php echo $events['event_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a>
                        <?php } ?>
                        <a href="<?php echo SITEURL; ?>events/details/<?php echo $events['event_id'];?>" title="" class="btn btn-danger btn-view show-tooltip" data-original-title="View"><i class="icon-eye-open"></i></a> 
                        <?php if(in_array($this->moduleId, $permissions['delete'])) { ?>
                        <a href="javascript:void(0);" title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $events['event_id'];?>" url="<?php echo SITEURL; ?>events/deleteEvents"><i class="icon-trash"></i></a>
                        <?php } ?>
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