<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."faculty"; ?>" title="Faculty">Faculty</a></li>
            <li><a title="Add faculty" style="cursor: auto;">Faculty details</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Faculty details
            </div>
            <div class="panel-body">
              <div class="row user-div">
                <div class="leftarea">
                  <div class="col-md-3">
                    <div class="profile"> 
                        <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/faculty/<?php echo $this->facultyDetails['image'] ?>" alt="profile picture">
                        <div class="btn-e">
                            <a href="<?php echo SITEURL; ?>faculty/edit/<?php echo $this->facultyDetails['faculty_id']; ?>">
                                <i class="icon-edit"></i>Edit Profile
                            </a>
                        </div>
                    </div>                
                  </div>
                </div> 
                <div class="rightarea"> 
                  <div class="col-md-9 user-profile-info usr-profile">
                    <ul>
                      <li class="even"><span>Faculty name:</span><?php echo $this->facultyDetails['faculty_name']; ?></li>
                      <li class="odd"><span>Designation :</span><?php echo $this->facultyDetails['designation']; ?></li>
                      <li class="even"><span>Email :</span> <?php echo $this->facultyDetails['email']; ?></li>
                      <li class="odd"><span>Phone number :</span> <?php echo $this->facultyDetails['phone_number']; ?></li>
                      <li class="even"><span>City :</span> <?php echo $this->facultyDetails['city']; ?></li>
                      <li class="odd"><span>Country :</span> <?php echo $this->facultyDetails['country_name']; ?></li>
                      <li class="even"><span>Description :</span> <?php echo $this->facultyDetails['short_desc']; ?></li>                      
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