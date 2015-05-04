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
        <li class="active">Event Venues</li>
      </ul>
    </div>
    <!-- END Breadcrumb -->
       <?php 
    $successv = $this->session->gets('successv'); 
    $failurev = $this->session->gets('failurev');
    if($successv != '') { 
    ?>
     <div class="success_msg">
     <i class="icon-check"></i><span class="text-success"><?php echo $successv; $this->session->sets('successv', ''); ?></span><br />
    </div>
    <?php } else if($failurev != '') { ?>
        <div class="success_msg">
     <i class="icon-remove"></i><span class="text-error"><?php echo $failurev; $this->session->sets('failurev', ''); ?></span><br />
    </div>
        <?php  }  ?>
     <div class="success_msg" style="display: none;"></div>
    <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-book"></i>Event Venues</h3>
            <div class="box-tool"> <a data-action="collapse" href="javascript:void(0)"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content adv-table editable-table cursor">
            <div class="btn-toolbar pull-right clearfix">
              <div class="btn-group btn-align icons-top"> 
                   <?php if(in_array($this->venueModuleId, $permissions['add'])) { ?>
              <a href="<?php echo SITEURL; ?>events/venueAdd/<?php echo $this->event_id; ?>" class="btn btn-add show-tooltip" title="Add new record"><i class="icon-plus"></i></a> 
                   <?php } ?>
              <?php if(in_array($this->venueModuleId, $permissions['delete'])) { ?>
              <a class="btn btn-delete show-tooltip deleteme" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>events/deleteEventVenues"><i class="icon-trash"></i></a> 
              <?php }?>
              <a class="btn btn-refresh show-tooltip" title="Refresh" href="javascript:void(0)" onclick="location.reload();"><i class="icon-repeat"></i></a> 
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="table-responsive" style="border:0">
              <table class="table table-advance" id="table1">
                <thead>
                  <tr>
                    <th class="sorting-disabled" style="width:18px"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" />
                      <label for="checkbox-1-1"></label></th>
                    <th>Name</th>
                    
                    <th class="text-center">Street</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Country</th>
                    <th class="text-center">State</th>
                    <th class="text-center">Created</th>
                     <?php if(in_array($this->venueModuleId, $permissions['status'])) { ?>
                    <th class="text-center">Status</th>
                     <?php } ?>
                    <th class="text-center sorting-disabled">Actions</th>
                  </tr>
                </thead>
                <tbody id="dynamicTickets">
                    <?php
                    $ch = 1;
                    foreach($this->eventVenues as $venues) { $ch++;
                    ?>
                    <tr class="table-flag-blue" id="deleteitem_<?php echo $venues['venue_id']; ?>">
                        <td width="2%">
                            <input type="checkbox" id="checkbox-1-<?php echo $venues['venue_id']; ?>" name="regular-checkbox" class="regular-checkbox" value="<?php echo $venues['venue_id']; ?>"/>
                            <label for="checkbox-1-<?php echo $venues['venue_id']; ?>"></label>
                        </td>
                        <td width="20%"><?php echo $venues['venues']; ?></td>                        
                        <td width="8%" class="text-center"><?php echo $venues['streets']; ?></td>
                        <td width="15%" class="text-center"><?php echo $venues['areas']; ?></td>
                        <td width="8%" class="text-center"><?php echo $venues['country']; ?></td>
                        <td width="8%" class="text-center"><?php echo $venues['state_name']; ?></td>
                        <td width="12%" class="text-center"><?php echo $venues['created'] ?></td>
                        <?php if(in_array($this->venueModuleId, $permissions['status'])) { ?>
                        <td width="5%" class="text-center">
                            <?php 
                           if($venues['status'] == '1'){ 
                                echo "Active";                            
                            } else {
                                echo "Inactive";                            
                            }
                            ?>
                        </td>
                        <?php } ?>
                        <td width="15%" class="text-center">
                             <?php if(in_array($this->venueModuleId, $permissions['edit'])) { ?>
                            <a href="<?php echo SITEURL; ?>events/venueEdit/<?php echo $venues['venue_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a> 
                             <?php } ?>
                            <a href="<?php echo SITEURL; ?>events/venueDetails/<?php echo $venues['venue_id'];?>" title="" class="btn btn-danger btn-view show-tooltip" data-original-title="View"><i class="icon-eye-open"></i></a> 
                             <?php if(in_array($this->venueModuleId, $permissions['delete'])) { ?>
                            <a href="javascript:void(0);" title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $venues['venue_id'];?>" url="<?php echo SITEURL; ?>events/deleteEventVenues"><i class="icon-trash"></i></a>
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