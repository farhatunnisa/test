  
<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events/venues/<?php echo $this->eventDetails['event_id'];?>">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Event Venues</li>
        <li style="float: right">  <a href="javascript:void(0)"  onclick="window.history.back();">Back</a> <span class="divider"><i class="icon-reply"></i></span> </li>
      </ul>
    </div>
    <!-- END Breadcrumb -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-user"></i><?php echo $this->eventDetails['event_title'];?>  <i class="icon-angle-right"></i> <?php echo $this->eventVenue['venues'];?></h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content">
            <div class="row user-div">            
              <div class="col-md-12 user-profile-info usr-profile">
                   
              <ul>
                <li class="odd"><span class="newsheadblock">Event Name:</span> <?php echo $this->eventDetails['event_title'];?></li>                 
                <li class="even"><span class="newsheadblock">Venue Name:</span> <?php echo $this->eventVenue['venues'];?></li>               
                <li class="odd"><span class="newsheadblock">Street:</span> <?php echo $this->eventVenue['streets'];?></li>                
                <li class="even"><span class="newsheadblock">Area:</span> <?php echo $this->eventVenue['areas'];?></li>                
                <li class="odd"><span class="newsheadblock">Country:</span> <?php echo $this->eventVenue['country'];?></li>                
                <li class="even"><span class="newsheadblock">State:</span> <?php echo $this->eventVenue['state_name'];?></li>                
                <li class="odd"><span class="newsheadblock">City:</span> <?php echo $this->eventVenue['city_name'];?></li>                
               <li class="even"><span class="newsheadblock">Mobile Number:</span> <?php echo $this->eventVenue['ven_phno'];?></li>
                <li class="odd"><span class="newsheadblock">ZIP Code:</span> <?php echo $this->eventVenue['zip_code'];?></li>
                <li class="even"><span class="newsheadblock">Venue Url:</span> <?php echo $this->eventVenue['ven_url'];?></li>
                <li class="odd"><span class="newsheadblock">Status:</span> 
                    <?php 
                        if($this->eventVenue['status'] == '1'){
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