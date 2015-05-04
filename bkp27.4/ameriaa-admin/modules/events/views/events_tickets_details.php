  
<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events/tickets/<?php echo $this->eventDetails['event_id'];?>">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Event Tickets</li>
         <li style="float: right">  <a href="javascript:void(0)" onclick="window.history.back();">Back</a> <span class="divider"><i class="icon-reply"></i></span> </li>
      </ul>
    </div>
    <!-- END Breadcrumb -->
    
    
    
    <!-- BEGIN Main Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-user"></i><?php echo $this->eventDetails['event_title'];?>  <i class="icon-angle-right"></i> <?php echo $this->eventTicket['ticket_name'];?></h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="row user-div">            
              <div class="col-md-12 user-profile-info usr-profile">
                    <?php 
                        list($a, $b) = explode(" ", $this->eventTicket['start_sale']);
                        list($c, $d) = explode(" ", $this->eventTicket['end_sale']);                
                        $start_sale_date = date("m/d/Y", strtotime($a));
                        $start_sale_time = date('H:i A', strtotime($b));                
                        $end_sale_date = date("m/d/Y", strtotime($c));
                        $end_sale_time = date('H:i A', strtotime($d));
                    ?>
                  <style>.newsheadblock{width: 20%}</style>    
              <ul>
                <li class="odd"><span class="newsheadblock">Event Name:</span> <?php echo $this->eventDetails['event_title'];?></li>                 
                <li class="even"><span class="newsheadblock">Ticket Name:</span> <?php echo $this->eventTicket['ticket_name'];?></li>               
                <li class="odd"><span class="newsheadblock">Description:</span> <?php echo $this->eventTicket['ticket_desc'];?></li>                
                <li class="even"><span class="newsheadblock">Ticket Price:</span> <?php echo $this->eventTicket['ticket_price'];?></li>                
                <li class="odd"><span class="newsheadblock">Selling Price:</span> <?php echo $this->eventTicket['selling_price'];?></li>                
                <li class="even"><span class="newsheadblock">Ticket Quantity:</span> <?php echo $this->eventTicket['ticket_quantity'];?></li>                
                <li class="odd"><span class="newsheadblock">Ticket Currency:</span> <?php echo $this->eventTicket['ticket_currency'];?></li>                
                <li class="even"><span class="newsheadblock">Minimum Tickets Per Person:</span> <?php echo $this->eventTicket['min_perbooking'];?></li>
                <li class="odd"><span class="newsheadblock">Maximum Tickets Per Person:</span> <?php echo $this->eventTicket['max_perbooking'];?></li>
                <li class="even"><span class="newsheadblock">Start Sales:</span> <?php echo $start_sale_date . " " . $start_sale_time;?></li>
                <li class="odd"><span class="newsheadblock">End Sales:</span> <?php echo $end_sale_date . " " . $end_sale_time;?></li>
                <li class="even"><span class="newsheadblock">Status:</span> 
                    <?php 
                        if($this->eventTicket['status'] == '1'){
                            echo "Active";
                        } else {
                            echo "Not Active";
                        }
                    ?>
                </li>
               
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->