<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."members" ; ?>" title="Members">Members</a></li>
            <li><a href="javascript:void(0)" title="Members" style="cursor: auto;">Members details</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Members details
            </div>
            <div class="panel-body">
              <div class="row user-div">
                <div class="leftarea">
                  <div class="col-md-3">
                    <div class="profile"> 
                        <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/members/<?php echo $this->membersDetails['image'] ?>" 
                             alt="profile picture">
                    </div>                
                  </div>
                </div> 
                <div class="rightarea"> 
                  <div class="col-md-9 user-profile-info usr-profile">
                    <ul>
                      <li class="odd"><span>Title name :</span><?php echo $this->membersDetails['title']; ?></li>
                      <li class="even"><span>First name :</span><?php echo $this->membersDetails['first_name']; ?></li>
                      <li class="odd"><span>Middle Name :</span><?php echo $this->membersDetails['middle_name'];?></li>
                      <li class="even"><span>Last name :</span><?php echo $this->membersDetails['family_name']; ?></li>
                      <li class="odd"><span>Gender :</span> 
                            <?php if($this->membersDetails['gender'] == 'm'){ echo "Male"; } else if($this->membersDetails['gender'] == 'f'){ echo "Female"; } else { echo "Other"; }?>
                      </li>
                      <li class="even"><span>Title on certificate :</span> <?php echo $this->membersDetails['title_on_certificate']; ?></li>
                      <li class="odd"><span>Company/organization :</span> <?php echo $this->membersDetails['company_org']; ?></li>
                      <li class="even"><span>Professional designation  :</span> <?php echo $this->membersDetails['professional_design']; ?></li>
                      <li class="odd"><span>Medical License number :</span> <?php echo $this->membersDetails['licence_number']; ?></li>      
                      <li class="even"><span>Expiry date :</span> <?php echo $this->membersDetails['expiry_date']; ?></li>
                      <li class="odd"><span>Country issued :</span> <?php echo $this->membersDetails['country_issued']; ?></li>
                      <li class="even"><span>Dietary Requirements :</span> <?php echo $this->membersDetails['dietary_requirement']; ?></li>
                      <li class="odd"><span>Field of practice   :</span> <?php echo $this->membersDetails['field_of_practice']; ?></li>
                      <li class="even"><span>Practice experience  :</span> <?php echo $this->membersDetails['practice_experience']; ?></li>
                      <li class="odd"><span>Address :</span> <?php echo $this->membersDetails['address']; ?></li>
                      <li class="even"><span>City :</span> <?php echo $this->membersDetails['city']; ?></li>
                      <li class="odd"><span>State :</span> <?php echo $this->membersDetails['state']; ?></li>
                      <li class="even"><span>Country :</span> <?php echo $this->membersDetails['country']; ?></li>
                      <li class="odd"><span>Zip code :</span> <?php echo $this->membersDetails['zip_code']; ?></li>
                      <li class="even"><span>Phone :</span> <?php echo $this->membersDetails['phone']; ?></li>
                      <li class="odd"><span>Fax :</span> <?php echo $this->membersDetails['fax']; ?></li>
                      <li class="even"><span>Email :</span> <?php echo $this->membersDetails['email']; ?></li>
                      <li class="odd"><span>Website :</span> <?php echo $this->membersDetails['website']; ?></li>                      					  
                    </ul>
                  </div>
                </div>                             
              </div>                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  <style type="text/css">
        .col-md-9.user-profile-info.usr-profile{
            padding-top: 8px;
        }
        .user-div ul li{
            line-height: 22px;
            clear: both;
        }
        .user-div ul li:first-child{
            border-top: 1px solid #ccc; 
        }
        .user-div ul li:last-child{
            border-bottom: 1px solid #ccc; 
        }
        .usr-profile .even {
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }
        .usr-profile .odd {
            border: 1px solid #ccc;
        }
        .usr-profile span{
            width: 25%;
            display: block;
            float: left;
        }
    </style>