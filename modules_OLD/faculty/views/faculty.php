<div class="container">
    <div class="titleSection parallax register">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">faculty</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="page-selection">faculty</a></li>
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
              <h1 class="bdrTitle">faculty<span></span></h1>
              <?php            
              $i = 0;
              $div1  = '';
              $div2  = '';
              $class = '';
              foreach ($this->facultyList as $data){
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
                  <div class="date">  <img class="img-responsive img-thumbnail" src="<?php echo SITEURL; ?>uploads/faculty/<?php echo $data['image'] ?>" alt="profile picture"><span></span> </div>
                  <div class="courseDetails">
                    <h2><?php echo $data['faculty_name']; ?></h2>
                    <span class="location"> <i class=""></i><?php echo $data['city']; ?></span>
                    <p><?php echo substr($data['short_desc'], 0, 80); ?></p>
                    <a href="<?php echo SITEURL; ?>faculty/details/<?php echo $data['faculty_id']; ?>" class="btn btnBlue"> <i class="icon-chevron-sign-right"></i></a> </div>
                  
                </li>                
              <?php echo $div2; 
                    $i++; }  ?>              
            </div>
          </div>
          <!-- /upcoming faculty -->
          <div class="clear"></div>
        </div>
        <!-- /registration --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>