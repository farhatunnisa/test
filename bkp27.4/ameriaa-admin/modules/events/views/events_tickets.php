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
        <li class="active">Event Tickets</li>
      </ul>
    </div>
    <!-- END Breadcrumb -->
    <?php 
          $eventtickets = $this->session->gets('eventtickets');
          $eventticketf = $this->session->gets('eventticketf');
    ?>
    <?php if($eventtickets != ''){ ?>
    <div class="success_msg"> 
        <i class="icon-check"></i><span class="text-success"><?php echo $eventtickets; $this->session->sets('eventtickets', '');  ?></span><br />
        
    </div>
    <?php } else if($eventticketf != '') { ?>
    <div class="success_msg"> 
       
        <i class="icon-remove"></i><span class="text-error"><?php echo $eventticketf; $this->session->sets('eventticketf', '');  ?></span><br />
        
    </div>
    <?php  } ?>
     <div class="success_msg" style="display: none;"></div>
    <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-book"></i>Event Tickets</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content adv-table editable-table cursor">
            <div class="btn-toolbar pull-right clearfix">
              <div class="btn-group btn-align icons-top"> 
                   <?php if(in_array($this->ticketModuleId, $permissions['add'])) { ?>
              <a href="<?php echo SITEURL; ?>events/ticketAdd/<?php echo $this->event_id; ?>" class="btn btn-add show-tooltip" title="Add new record"><i class="icon-plus"></i></a> 
                   <?php } ?>
               <?php if(in_array($this->ticketModuleId, $permissions['delete'])) { ?>
              <a class="btn btn-delete show-tooltip deleteme" title="Delete selected" href="javascript:void(0);" id="" url="<?php echo SITEURL; ?>events/deleteEventTickets"><i class="icon-trash"></i></a> 
               <?php } ?>
              <a class="btn btn-refresh show-tooltip" title="Refresh" href="javascript:void(0)" onclick="location.reload();" ><i class="icon-repeat"></i></a> 
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
                    
                    <th class="text-center">Price</th>
                    <th class="text-center">Selling Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Currency</th>
                    <th class="text-center">Per Person</th>
                     <?php if(in_array($this->ticketModuleId, $permissions['status'])) { ?>
                    <th class="text-center">Status</th>
                     <?php } ?>
                    <th class="text-center sorting-disabled">Actions</th>
                  </tr>
                </thead>
                <tbody id="dynamicTickets">
                    <?php
                    $ch = 1; foreach($this->eventTickets as $events) { $ch++;
                    ?>
                    <tr class="table-flag-blue" id="deleteitem_<?php echo $events['ticket_id']; ?>">
                        <td width="2%">
                            <input type="checkbox" id="checkbox-1-<?php echo $events['ticket_id']; ?>" name="regular-checkbox" class="regular-checkbox" value="<?php echo $events['ticket_id']; ?>"/>
                            <label for="checkbox-1-<?php echo $events['ticket_id']; ?>"></label>
                        </td>
                        <td width="20%"><?php echo $events['ticket_name']; ?></td>                        
                        <td width="8%" class="text-center"><?php echo $events['ticket_price']; ?></td>
                        <td width="15%" class="text-center"><?php echo $events['selling_price']; ?></td>
                        <td width="8%" class="text-center"><?php echo $events['ticket_quantity']; ?></td>
                        <td width="8%" class="text-center"><?php echo $events['ticket_currency']; ?></td>
                        <td width="12%" class="text-center"><?php echo $events['min_perbooking'] . "-" . $events['max_perbooking']; ?></td>
                          <?php if(in_array($this->ticketModuleId, $permissions['status'])) { ?>
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
                        <td width="15%" class="text-center">
                            <?php if(in_array($this->ticketModuleId, $permissions['edit'])) { ?>
                            <a href="<?php echo SITEURL; ?>events/ticketEdit/<?php echo $events['ticket_id'];?>" title="" class="btn btn-primary btn-edit show-tooltip" data-original-title="Edit"><i class="icon-pencil"></i></a> 
                            <?php } ?>
                            <a href="<?php echo SITEURL; ?>events/ticketDetails/<?php echo $events['ticket_id'];?>" title="" class="btn btn-danger btn-view show-tooltip" data-original-title="View"><i class="icon-eye-open"></i></a> 
                            <?php if(in_array($this->ticketModuleId, $permissions['delete'])) { ?>
                            <a href="javascript:void(0);"  title="" class="btn btn-danger btn-delete show-tooltip deleteme" data-original-title="Delete" id="<?php echo $events['ticket_id'];?>" url="<?php echo SITEURL; ?>events/deleteEventTickets"><i class="icon-trash"></i></a>
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