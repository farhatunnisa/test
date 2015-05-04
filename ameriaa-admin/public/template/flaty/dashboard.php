<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="app.settings.asideFolded = false; app.settings.asideDock = false;">
          <!-- main -->
          <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black"><?php echo ucfirst($this->session->gets('adminuser_name')); ?> Dashboard</h1>
                  <small class="text-muted">Welcome to ameriaa </small>
                </div>
                <div class="col-sm-6 text-right hidden-xs">                  
                </div>
              </div>
            </div>
            <!-- / main header -->
            <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
              <!-- stats -->
              <div class="row">
                <div class="col-md-12">
                  <div class="row row-sm text-center">
                    <div class="col-xs-3">
                      <div class="panel padder-v item">
                        <div class="h1 text-info font-thin h1"><?php echo $this->courseCount['count'];
                                ?></div>
                        <span class="text-muted text-xs">Courses </span>
                        <div class="top text-right w-full">
                          <i class="fa fa-caret-down text-warning m-r-sm"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <a href class="block panel padder-v bg-primary item">
                        <span class="text-white font-thin h1 block"><?php echo $this->facultyCount['count']; ?></span>
                        <span class="text-muted text-xs">Faculty</span>
                        <span class="bottom text-right w-full">
                          <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                        </span>
                      </a>
                    </div>
                    <div class="col-xs-3">
                      <a href class="block panel padder-v bg-info item">
                        <span class="text-white font-thin h1 block">50</span>
                        <span class="text-muted text-xs">Comments</span>
                        <span class="top text-left">
                          <i class="fa fa-caret-up text-warning m-l-sm"></i>
                        </span>
                      </a>
                    </div>
                    <div class="col-xs-3">
                      <div class="panel padder-v item">
                        <div class="font-thin h1">60</div>
                        <span class="text-muted text-xs">Feedbacks</span>
                        <div class="bottom text-left">
                          <i class="fa fa-caret-up text-warning m-l-sm"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 tile-active">
                        <div class="tile tile-img" data-stop="3500" style="background-image: url(<?php echo THEMEURL; ?>img/5.jpg);">
                            <p class="title">Gallery</p>
                        </div>

                        <a class="tile tile-lime" data-stop="5000" href="<?php echo SITEURL; ?>gallery">
                            <p class="title">Gallery page</p>
                            <p>Click on this tile block to see our amazing gallery page. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="img img-bottom">
                                <i class="fa fa-picture-o"></i>
                            </div>
                        </a>
                    </div>
                    <!-- quiz questions list -->
                    <div class="col-md-6">
                      <div class="panel no-border">
                        <div class="panel-heading wrapper b-b b-light">                      
                          <h4 class="font-thin m-t-none m-b-none text-muted" style="float: left;">Latest Quiz </h4>
                          <a href="<?php echo SITEURL; ?>quiz/add"><button class="btn btn-primary btn-addon btn-sm" style="float: right; padding: 0px 10px;">
                              <i class="fa fa-plus" style="margin: -1px 10px -6px -10px; line-height: 25px; height: 20px;"></i>Add
                          </button></a>
                          <div style="clear: both;"></div>
                        </div>
                        <ul class="list-group list-group-lg m-b-none" style="min-height: 69px;">                            
                          <?php if(count($this->quizDetails) != 0 ){ 
                                  foreach ($this->quizDetails as $quizlist){ ?>
                            <li class="list-group-item" style="text-align: left;">
                                <a href="<?php echo SITEURL."quiz/details/".$quizlist['topic_id']; ?>">1. <?php echo $quizlist['topic_name']; ?>
                                    <span class="pull-right label bg-warning inline m-t-sm">View</span>
                                </a>
                            </li>
                          <?php } } else { ?>
                          <div style="text-align: center;opacity: 0.3;">
                            <p style="position: relative;
                                            display: inline-block;
                                            margin-top: 0px;
                                            margin-bottom: 10px;
                                            line-height: 59px;
                                            font-size: 17px;">
                                    No question
                            </p>
                          </div><?php } ?>
                        </ul>                    
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- quiz list end -->
                  </div>
                </div>                
              </div>
              <!-- / stats -->
              
              <div class="row">
                <!-- course list -->
                <div class="col-md-6">
                  <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light">
                      <h4 class="font-thin m-t-none m-b-none text-muted" style="float: left;">Courses</h4>
                      <a href="<?php echo SITEURL; ?>course/add" title=""><button class="btn btn-primary btn-addon btn-sm" style="float: right; padding: 0px 10px;">
                          <i class="fa fa-plus" style="margin: -1px 10px -6px -10px; line-height: 25px; height: 20px;"></i>Add
                      </button></a>
                      <div style="clear: both;"></div>
                    </div>
                    <ul class="list-group list-group-lg m-b-none" style="min-height: 250px;">
                      <?php foreach ($this->courseList as $courselist){ ?>
                          <li class="list-group-item">
                            <a href="javascript:void(0);" class="thumb-sm m-r">
                                <img src="<?php echo SITEURL; ?>uploads/courses/<?php echo $courselist['image']; ?>" class="r r-2x" 
                                     style="width: 40px;height: 40px; overflow: hidden; ">
                            </a>
                            <a href="<?php echo SITEURL."course/details/".$courselist['course_id']; ?>">
                                <span class="pull-right label bg-warning inline m-t-sm">View</span>
                            </a>
                            <a href="javascript:void(0);"><?php echo $courselist['course_title']; ?></a>                            
                          </li>
                      <?php } ?>                      
                    </ul>
                    
                  </div>
                </div>
                <!-- course list end -->
                
                <!-- faculty list -->
                <div class="col-md-6">
                  <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light">                      
                      <h4 class="font-thin m-t-none m-b-none text-muted" style="float: left;">Faculty</h4>
                      <a href="<?php echo SITEURL; ?>faculty/add"><button class="btn btn-primary btn-addon btn-sm" style="float: right; padding: 0px 10px;">
                          <i class="fa fa-plus" style="margin: -1px 10px -6px -10px; line-height: 25px; height: 20px;"></i>Add
                      </button></a>
                      <div style="clear: both;"></div>
                    </div>
                    <ul class="list-group list-group-lg m-b-none" style="min-height: 250px;">                      
                      <?php foreach ($this->facultyList as $facultydata) { ?>
                        <li class="list-group-item">
                            <a href="javascript:void(0);" class="thumb-sm m-r">
                              <img src="<?php echo SITEURL; ?>uploads/faculty/<?php echo $facultydata['image']; ?>" class="r r-2x"
                                   style="width: 40px;height: 40px; overflow: hidden; ">
                            </a>
                            <a href="<?php echo SITEURL."faculty/details/".$facultydata['faculty_id']; ?>">
                                <span class="pull-right label bg-warning inline m-t-sm">View</span></a>
                            <a href="javascript:void(0);"><?php echo $facultydata['faculty_name']; ?></a>
                        </li>
                      <?php } ?>                      
                    </ul>                    
                  </div>
                </div>
                <!-- faculty list end -->
              </div>
              
              <!-- tasks -->
              <div class="row">
                <!-- blog posts list -->
                <div class="col-md-6">
                  <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light">
                      <h4 class="font-thin m-t-none m-b-none text-muted">Blog posts</h4>              
                    </div>
                    <ul class="list-group list-group-lg m-b-none" style="height: 250px;">
                      <div style="text-align: center;opacity: 0.3;">
                        <p style="position: relative;
                                    top: 35px;
                                    display: inline-block;
                                    margin-top: 0px;
                                    margin-bottom: 10px;
                                    line-height: 128px;
                                    font-size: 17px;">
                            No posts
                        </p>
                    </div>
                    </ul>
                    
                  </div>
                </div>
                <!-- blog posts list end -->
                <!-- Testimonials list -->
                <div class="col-md-6">
                  <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light">
                      <h4 class="font-thin m-t-none m-b-none text-muted">Testimonials</h4>              
                    </div>
                    <ul class="list-group list-group-lg m-b-none" style="height: 250px;">
                        <?php foreach ($this->testimonialList as $testimonialdata) { ?>
                        <li class="list-group-item">
                            <a href="javascript:void(0);" class="thumb-sm m-r">
                              <img src="<?php echo SITEURL; ?>uploads/testimonials/<?php echo $testimonialdata['image']; ?>" class="r r-2x"
                                   style="width: 40px;height: 40px; overflow: hidden; ">
                            </a>
                            <a href="<?php echo SITEURL."testimonials/details/".$testimonialdata['testimonial_id']; ?>">
                                <span class="pull-right label bg-warning inline m-t-sm">View</span></a>
                            <a href="javascript:void(0);"><?php echo $testimonialdata['client_name']; ?></a>
                        </li>
                      <?php } ?>
                        <div style="text-align: center;opacity: 0.3;">
                            <p style="position: relative;
                                        top: 35px;
                                        display: inline-block;
                                        margin-top: 0px;
                                        margin-bottom: 10px;
                                        line-height: 128px;
                                        font-size: 17px;">
                                No testimonials
                            </p>
                        </div>
                    </ul>
                    
                  </div>
                </div>
                <!-- Testimonials list end -->
                
              </div>
              <!-- / tasks -->
            </div>
          </div>
          <!-- / main -->
        </div>
    </div>
  </div>
  <!-- / content -->

  <style>


  </style>