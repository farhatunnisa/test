  <!-- /header -->
  <div class="container">
    <div class="titleSection parallax facultyTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Faculty</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Faculty</a></li>
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
          <div class="contentLeft">
            <div class="courseInformation wow fadeInDown animated">
              <div id="parentHorizontalTab">
                <ul class="resp-tabs-list hor_1">
                  <li>USA Faculty</li>
                  <li>International Faculty</li>
                </ul>
                <div class="resp-tabs-container hor_1">
                  <div class="showTabs facDetails">
                    <?php foreach ($this->facultyList as $faculty) {
                        if($faculty['country'] == 'US') { ?>                    
                    <section>
                      <div class="personPic"> <img src="<?php echo IMAGEURL;?>uploads/faculty/thumbs/<?php echo $faculty['image'];?>" alt="images" />
                        <div class="countryPic"><img src="<?php echo THEMEURL;?>images/faculty/flag-usa.jpg" alt="flag-usa" /></div>
                      </div>
                      <div class="facDesc">
                        <h3><?php echo $faculty['faculty_name'];?>, <strong><?php echo $faculty['designation'];?></strong></h3>
                        <span><?php echo $faculty['city'];?>, <?php echo $faculty['country'];?> </span>
                        <div class="facInfo">
                            <p><?php echo substr($faculty['short_desc'],0,130);?></p>
                        </div>
                        <a class="btn btnBlue" href="<?php echo SITEURL?>faculty/details/<?php echo $faculty['faculty_id'];?>"> <i class="icon-chevron-sign-right"></i></a>
                        <div class="clear"></div>
                      </div>
                      <!-- /facDesc --> 
                    </section>
                    <?php } } ?>
                    <div class="clear"></div>
                  </div>
                    
                  <div class="showTabs facDetails">
                      <?php foreach ($this->facultyList as $faculty) {
                        if($faculty['country'] != 'US') { ?>
                    <section>
                      <div class="personPic"> <img src="<?php echo IMAGEURL;?>uploads/faculty/thumbs/<?php echo $faculty['image'];?>" alt="images" />
                        <div class="countryPic"><img src="<?php echo THEMEURL;?>images/faculty/flag-usa.jpg" alt="flag-usa" /></div>
                      </div>
                      <div class="facDesc">
                        <h3><?php echo $faculty['faculty_name'];?>, <strong><?php echo $faculty['designation'];?></strong></h3>
                        <span><?php echo $faculty['city'];?>, <?php echo $faculty['country'];?> </span>
                        <div class="facInfo">
                            <p><?php echo substr($faculty['short_desc'],0,130);?></p>
                        </div>
                        <a class="btn btnBlue" href="<?php echo SITEURL?>faculty/details/<?php echo $faculty['faculty_id'];?>"> <i class="icon-chevron-sign-right"></i></a>
                        <div class="clear"></div>
                      </div>
                      <!-- /facDesc --> 
                    </section>
                    <?php  } } ?>

                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /courseInformation --> 
            
          </div>
<!-- /contentLeft -->
          <div class="aside">
            <div class="rowAside">
              <h1 class="bdrTitle">Aesthetic Courses<span></span></h1>
              <?php foreach($this->courselist as $couserlist) { ?>
	      <ul class="courseLinks">
                <li><a href="<?php echo SITEURL;?>courses/details/<?php echo $couserlist['course_id']; ?>"><i class="icon-circle-blank"></i><span><?php echo($couserlist['course_title']); ?></span></a></li>
              </ul>
	   <?php } ?>
              <div class="clear"></div>
            </div>
            <!-- /rowAside -->
            <div class="rowAside">
              <div class="sideBartestmonials">
                <div class="tileLink">
                  <h1 class="bdrTitle">Testmonials<span></span></h1>
                  <a href="javascript:void(0)">Show All <i class="icon-chevron-sign-right"></i></a> </div>
                <div class="testmonialsMulti">
                  <?php foreach($this->testmonialslist as $list){ ?>
                    <div class="item">
                     <dl>
                      <dt><img src="<?php echo SITEURL; ?>uploads/testimonials/<?php echo $list['image'] ?>" alt="img-testmonial1" /></dt>
                      <dd>
                        <p><?php echo substr($list['description'],0,100);?></p>
                      </dd>
                    </dl>
                    <span><strong><?php echo $list['client_name']; ?></strong> <?php echo $list['location']; ?></span> </div>
                  <?php } ?>
              </div>
              </div>
            </div>
            <!-- /rowAside --> 
            
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
 <a href="javascript:void(0)" id="btn-scrollup"><i class="icon-angle-up"></i></a> </div>
<!-- /wrapper --> 
