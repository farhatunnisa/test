<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."partner"; ?>" title="Partner">Partner</a></li>
            <li><a title="Add partner" style="cursor: auto;">Partner details</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Partner details
            </div>
            <div class="panel-body">
              <div class="row user-div">
                <div class="leftarea">
                  <div class="col-md-3">
                    <div class="profile"> 
                        <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/partner/<?php echo $this->partnerDetails['image'] ?>" alt="profile picture">
                        <div class="btn-e">
                            <a href="<?php echo SITEURL; ?>partner/edit/<?php echo $this->partnerDetails['partner_id']; ?>">
                                <i class="icon-edit"></i>Edit Profile
                            </a>
                        </div>
                    </div>                
                  </div>
                </div> 
                <div class="rightarea"> 
                  <div class="col-md-9 user-profile-info usr-profile">
                    <ul>
                      <li class="even"><span>Title:</span><?php echo $this->partnerDetails['title']; ?></li>
                      <li class="odd"><span>Short Description :</span><?php echo substr($this->partnerDetails['short_description'],0,50); ?></li>
                      <li class="even"><span>Long Description :</span> <?php echo substr($this->partnerDetails['full_description'],0,50); ?></li>
                      <li class="odd"><span>Status :</span> <?php if($this->partnerDetails['status'] == '1') echo "Active"; else echo "Inactive"; ?></li>                   
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