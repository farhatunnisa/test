
  <!-- /header -->
  <div class="container">
    <div class="titleSection parallax courseTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Course Program</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a href="<?php echo SITEURL;?>courses">Courses</a></li>
                <li><a class="page-selection">Course Program</a></li>
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
        <div class="coursePage">
          <div class="courseLeft">
            <h1 class="bdrTitle">Find a course<span></span></h1>
            <div class="findCourse">
              <form id="searchCourse">
                <ul>
                  <li><span>Courses</span>
                    <select name="courses">
                      <option>All Courses</option>
                      <option>Basic Course in Aesthetic Medicine</option>
                      <option>Advanced Course in Aesthetic Medicine</option>
                      <option>Basic Course in Facial FAT Grafting A to Z</option>
                      <option>Advanced Techniques of Platelet Rich Plasma</option>
                    </select>
                  </li>
                  <li><span>Date</span>
                    <input type="text" name="date">
                  </li>
                  <li><span>Location</span>
                    <select name="location">
                      <option>All Locations</option>
                      <option>Hyderabad</option>
                      <option>New Delhi</option>
                      <option>Chennai</option>
                    </select>
                  </li>
                  <li class="searchBtn">
                    <button class="btn btnBlue btnIconRight" value="" type="submit">Search <i class="icon-search"></i></button>
                  </li>
                </ul>
              </form>
            </div>
            <div class="downloadCourse">
              <h2>Download the Course Catalogue PDF!</h2>
              <dl>
              	<dt><img src="<?php echo THEMEURL;?>images/icon-pdf.png" alt="icon-pdf" /></dt>
                <dd><p>Lorem Ipsum is simply dummy text of the printing </p></dd>
              </dl>
            </div>
          </div>
          <div class="courseRight">
            <h1 class="bdrTitle">Facial FAT Grafting A to Z<span></span></h1>
            <div class="aboutConsult">
                
               <?php foreach ($this->facultyData as $faculty) { ?>              
              <dl class="multi wow fadeInLeft animated">
                <dt><img src="<?php echo IMAGEURL;?>uploads/faculty/<?php echo $faculty['image'];?>" alt="consult-person1" /></dt>
                <dd>
                  <h3><?php echo $faculty['faculty_name'];?></h3>
                  <span>(<?php echo $faculty['designation'];?>)</span>
                  <p><?php echo substr($faculty['short_desc'],0,50);?>...</p>
                  <a href="<?php echo SITEURL;?>faculty/details/<?php echo $faculty['faculty_id'];?>" class="btn btnBlue">Readmore &raquo;</a></dd>
              </dl>
               <?php  } ?>
              <div class="clear"></div>
            </div>
            <!-- /aboutConsult -->
            
            <div class="courseFee">
              <h1 class="bdrTitle">Course Fee<span></span></h1>
<!--              <div id="login_error" style="display: none; "></div>-->
        <?php $success = $this->session->gets('success');?>
          <div  id="successID" style="color: green;text-align: center" > 
            <span class="text-success"><?php echo $success; $this->session->sets('success','') ?></span><br />
           </div>
            <form method="post" action="<?php echo SITEURL;?>courses/paycoursefee">
              <div class="course_fee" id="coursefeeID">
                <ul class="courseFeeDetails">
                  <li>
                    <input type="radio" name="coursefee"  />
                    Member<strong>US $<?php echo $this->courseDetails['member_fee'];?></strong></li>
                  <li>
                    <input type="radio" name="coursefee"  />
                    Non-Member<strong>US $<?php echo $this->courseDetails['non_member_fee'];?></strong></li>
                </ul>
                <ul class="courseFeeDetails">
                  <li>Choose Option:</li>
                  <?php $data = unserialize($this->courseDetails['full_desc']);
                    $count = count($data);
                    for($i = 1; $i<=$count; $i++) { ?>
                  <li<?php echo $i;?>>
                    <input type="checkbox" id="no_days" name="no_days[]" />
                    Day <?php echo $i;?>
                    
                  </li>
                    <?php } ?>
                </ul>
                <div class="regArea">
                  <div class="totalFee"> Total Fee: US $3200 </div>
               <?php if($this->payDetails['status'] == '') { ?>
                  <?php if($this->session->gets('ameriaa_user_id') == "") {?>
                  <div class="regBtn">
                    <a class="btn btnBlue" href='<?php echo SITEURL;?>registration'"><i class="icon-user"></i>Register</a>
                  </div>
                  <?php } else { ?>
                  <div class="regBtn">
                    <button type="submit" class="btn btnBlue" onClick="window.location='javascript:void(0)'"><i class="icon-user"></i>Proceed</button>
                  </div>
                  <?php } ?>
               <?php } else { ?>
                 <div class="regBtn">
                    <a class="btn btnBlue" href='javascript:void(0)'><i class="icon-user"></i>Active</a>
                 </div>
               <?php } ?>
                  <div class="clear"></div>
                </div>
              </div>
                <input type="hidden" name="courseid" id="courseId" value="<?php echo $this->courseDetails['course_id'];?>" />
            </form>
            </div>
            <!-- /courseFee -->
            
            <div class="courseInformation wow fadeInDown animated">
              <div id="parentHorizontalTab">
                  
                <ul class="resp-tabs-list hor_1">
                  <li>Course Objectives</li>
                  <?php  $data = unserialize($this->courseDetails['full_desc']);
                    $count = count($data);
                    $j = 0;
                    for($i = 1; $i<=$count; $i++) { ?>
                  <li>Day <?php echo $i;?></li>
                    <?php } ?>
                </ul>
                <div class="resp-tabs-container hor_1">
                  <div class="showTabs">
                      <p><?php echo $this->courseDetails['short_desc'];?></p>
                  </div>

                  <div class="showTabs">
                    <?php  
                     $count = count($data);
                     $j = 0;
                     for($i = 1; $i<=$count; $i++) { ?>
                    <div class="courseInfo">
                        <?php echo $data[$j]; ?>
                    </div>
                  
                    <!-- /courseInfo --> 
                  </div><?php $j++; } ?>
                </div>
              </div>
            </div>
            <!-- /courseInformation --> 
            
          </div>
          <div class="clear"></div>
        </div>
        <!-- /aboutPage --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
  <script>
      $(document).ready(function(){
         $("#successID").fadeOut(5000); 
      });
      </script>
<!--  <script>
      $(document).ready(function(){
        $("#coursefeeID").click(function(){
            var days = $("#no_days").val();
            var userID = <?php //$this->session->gets('ameriaa_user_id'); ?>
            var courseId = $("#courseId").val();
            
            $.ajax({
                type:'post',
                url:'<?php echo SITEURL;?>courses/paycoursefee',
                data:'days='+days+'userID='+userID+'courseId='+courseId,
                success: function(data) {   
                if(data == 1) {
                    document.location = SITEURL + "courses/details/courseId";
                     $("#login_error").show();
                     $("#login_error").css({"color":"green", "margin-bottom": "5px"});
                     $("#login_error").html("registered, successfully for course details");
                } else {
                    $("#login_error").show();
                    $("#login_error").css({"color":"red", "margin-bottom": "5px"});
                    $("#login_error").html("Enter a valid details");
                }
                
               }
            });
            
        });  
      });
      </script>-->