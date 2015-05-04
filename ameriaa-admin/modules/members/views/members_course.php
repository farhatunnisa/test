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
                <div class="rightarea"> 
                    
                  <div class="col-md-9 user-profile-info usr-profile">
                      <?php foreach($this->courses as $courses) { ?>
                    <ul>
                      <li class="odd"><span>cousre name :</span><?php echo $courses['course_title']; ?></li>
                      <li class="even"><span>Faculty name :</span><?php echo $courses['faculty_name']; ?></li>
                      <li class="odd"><span>Start date :</span><?php echo $courses['start_date']; ?></li>
                      <li class="even"><span>End date :</span><?php echo $courses['end_date']; ?></li>
                    </ul>
                       <?php } ?> 
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