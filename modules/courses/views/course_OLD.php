<div class="container">
    <div class="titleSection parallax register">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Course</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="page-selection">Course</a></li>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /titleSection -->
    <div class="innerContent">
      <div class="pageWidth">
        <div class="registration">
          <div class="upcomingCourses rowSpace">
            <div class="pageWidth">
              <h1 class="bdrTitle">Courses<span></span></h1>
              <?php            
              $i = 0;
              $div1  = '';
              $div2  = '';
              $class = '';
              foreach ($this->courseList as $data){
                if ($i % 2 == 0) {                      
                  $div1  = "<ul>";
                  $div2  = "";
                  $class = "fadeInLeft";
                } else {
                  $div1  = "";
                  $div2  = "</ul>";
                  $class = "fadeInRight";
                }
                echo $div1; ?>
                <li class="wow fadeInLeft animated">
                  <div class="date"> <i class="icon-calendar"></i> 17 April - 19 April <span>2015</span> </div>
                  <div class="courseDetails">
                    <h2><?php echo $data['course_title']; ?></h2>
                    <span class="location"> <i class="icon-map-marker"></i><?php echo $data['location']; ?></span>
                    <p><?php echo substr($data['short_desc'], 0, 80); ?></p>
                    <a href="<?php echo SITEURL; ?>courses/details/<?php echo $data['course_id']; ?>" class="btn btnBlue"> <i class="icon-chevron-sign-right"></i></a> </div>
                  <?php if($data['discount'] != ''){ ?>
                  <div class="offerBar">
                    <p><?php echo $data['discount']; ?>%</p>
                  </div><?php } ?>
                  <div class="clear"></div>
                </li>                
              <?php echo $div2; 
                    $i++; }  ?>              
            </div>
          </div>
          <!-- /upcoming courses -->
          <div class="clear"></div>
        </div>
        <!-- /registration --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>