<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="" title="Home">Home </a></li>		
            <li><a href="" title="Faculty">Faculty</a></li>
            <li><a title="Add faculty" style="cursor: auto;">Course details</a></li>
          </ul><br>
        </div>
        
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Course details
            </div>
            <div class="panel-body">
              <div class="row user-div">
                <div class="leftarea">
                  <div class="col-md-3">
                    <div class="profile"> 
                        <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/courses/<?php echo $this->coursrDetaisl['image']; ?>" 
                             alt="profile picture">
                        <div class="btn-e">
                            <a href="<?php echo SITEURL; ?>course/edit/<?php echo $this->coursrDetaisl['course_id']; ?>">
                                <i class="icon-edit"></i>Edit Course
                            </a>
                        </div>
                    </div>                
                  </div>
                </div> 
                <div class="rightarea"> 
                  <div class="col-md-9 user-profile-info usr-profile">
                    <ul>
                      <li class="even"><span>Course name:</span><?php echo $this->coursrDetaisl['course_title']; ?></li>
                      <li class="odd"><span>location :</span><?php echo $this->coursrDetaisl['location']; ?></li>
                      <li class="even"><span>Member fee :</span> <?php echo $this->coursrDetaisl['member_fee']; ?></li>
                      <li class="odd"><span>Non member fee :</span> <?php echo $this->coursrDetaisl['non_member_fee']; ?></li>
                      <li class="even"><span>Start date :</span> <?php echo $this->coursrDetaisl['start_date']; ?></li>
                      <li class="odd"><span>End date :</span> <?php echo $this->coursrDetaisl['end_date']; ?></li>
                      <li class="even"><span>Short description:</span> <?php echo $this->coursrDetaisl['short_desc']; ?></li>
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