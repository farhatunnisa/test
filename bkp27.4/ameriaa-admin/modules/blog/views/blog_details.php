<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."blog" ; ?>" title="Members">Blog</a></li>
            <li><a href="javascript:void(0)" title="Blog" style="cursor: auto;">Blog details</a></li>
          </ul><br>
        </div>
          
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Blog details
            </div>
            <div class="panel-body">
              <div class="row user-div">
                <div class="leftarea">
                  <div class="col-md-3">
                    <div class="profile"> 
                        <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/blog/thumbs/<?php echo $this->blogDetails['image'] ?>" 
                             alt="profile picture">
                    </div>                
                  </div>
                </div> 
                <div class="rightarea"> 
                  <div class="col-md-9 user-profile-info usr-profile">
                    <ul>
                      <li class="odd"><span>Blog name :</span><?php echo $this->blogDetails['blog_title']; ?></li>                      
                      <li class="even"><span>Posted by :</span><?php echo $this->blogDetails['username']; ?></li>
                      <li class="odd"><span>Created date :</span>
                          <?php 
                            $date = date_create($this->blogDetails['created_date']);
                            echo date_format($date,"D, d M Y"); ?>
                      </li>
                      <li class="even"><span>Description :</span><?php echo $this->blogDetails['short_desc']; ?></li>
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