  <div class="container">
    <div class="titleSection parallax courseTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Courses</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Courses</a></li>
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
            <div class="findCourse wow fadeInLeft animated">
              <form id="searchCourse">
                <ul>
                  <li><span>Courses</span>
                    <select name="courses">
                      <option>All Courses</option>
                      <?php foreach ($this->courseList as $course) { ?>
                      <option value="<?php echo $course['course_id'];?>"><?php echo $course['course_title'];?></option>
                      <?php } ?>
<!--                      <option>Advanced Course in Aesthetic Medicine</option>
                      <option>Basic Course in Facial FAT Grafting A to Z</option>
                      <option>Advanced Techniques of Platelet Rich Plasma</option>-->
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
          </div>
          <div class="courseRight">
            <h1 class="bdrTitle">Courses<span></span></h1>
            <div class="courseView wow fadeInUp animated">
              <ul>
                <li>View by</li>
                <li>
                  <input type="radio" name="courseview" checked />
                  Country</li>
                <li>
                  <input type="radio" name="courseview" />
                  Course Type</li>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="courseInfo">
              <div class="courseListing wow fadeInLeft animated">
                <div class="heading"><i class="icon-flag"></i>INDIA</div>
                <table class="responsive">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Date</th>
                      <th>Location</th>
                      <th>Fees <span>Member</span></th>
                      <th>Fees <span>Non-Member</span></th>
                      <th>Register</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($this->courseList as $course) {
                          if($course['country'] == 'IN') {?>
                    <tr onClick="window.location='<?php echo SITEURL;?>courses/details/<?php echo $course['course_id'];?>'">
                      <td><?php echo $course['course_title'];?></td>
                      <td><?php echo date('d-m-y',strtotime($course['start_date']));?></td>
                      <td><?php echo $course['location'];?></td>
                      <td>Us<?php echo $course['member_fee'];?></td>
                      <td>Us<?php echo $course['non_member_fee'];?></td>
                      <td>Register</td>
                    </tr>
                      <?php } }?>
                  </tbody>
                </table>
              </div>
              <!-- /courseListing -->
              
              <div class="courseListing wow fadeInRight animated">
                <div class="heading"><i class="icon-flag"></i>USA</div>
                <table class="responsive">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Date</th>
                      <th>Location</th>
                      <th>Fees <span>Member</span></th>
                      <th>Fees <span>Non-Member</span></th>
                      <th>Register</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($this->courseList as $course) {
                          if($course['country'] == 'US') {?>
                    <tr onClick="window.location='<?php echo SITEURL;?>courses/details/<?php echo $course['course_id'];?>'">
                      <td><?php echo $course['course_title'];?></td>
                      <td><?php echo date('d-m-y',strtotime($course['start_date']));?></td>
                      <td><?php echo $course['location'];?></td>
                      <td>Us<?php echo $course['member_fee'];?></td>
                      <td>Us<?php echo $course['non_member_fee'];?></td>
                      <td>Register</td>
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
              </div>
              <!-- /courseListing -->
              
              <div class="courseListing wow fadeInLeft animated">
                <div class="heading"><i class="icon-flag"></i>UK</div>
                <table class="responsive">
                  <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Date</th>
                      <th>Location</th>
                      <th>Fees <span>Member</span></th>
                      <th>Fees <span>Non-Member</span></th>
                      <th>Register</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($this->courseList as $course) {
                          if($course['country'] == 'US') {?>
                    <tr onClick="window.location='<?php echo SITEURL;?>courses/details/<?php echo $course['course_id'];?>'">
                      <td><?php echo $course['course_title'];?></td>
                      <td><?php echo date('d-m-y',strtotime($course['start_date']));?></td>
                      <td><?php echo $course['location'];?></td>
                      <td>Us<?php echo $course['member_fee'];?></td>
                      <td>Us<?php echo $course['non_member_fee'];?></td>
                      <td>Register</td>
                    </tr>
                     <?php } }?>
                  </tbody>
                </table>
              </div>
              <!-- /courseListing --> 
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <!-- /aboutPage --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
  