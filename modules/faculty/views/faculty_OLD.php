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
              <ul class="courseLinks">
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Basic Course in Aesthetic Medicine</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Facial FAT Grafting A to Z</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Advanced Techniques of Platelet Rich Plasma</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Master Course on Vaginal Rejuvenation</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Basic Course in Aesthetic Medicine</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Master Course in Mesotherapy</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Basic Course in Hair Transplant</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Advanced Course in Aesthetic Medicine</span></a></li>
                <li><a href="javascript:void(0)"><i class="icon-circle-blank"></i><span>Master Course on Aesthetic Genital and Gender Reassignment Surgery</span></a></li>
              </ul>
              <div class="clear"></div>
            </div>
            <!-- /rowAside -->
            <div class="rowAside">
              <div class="sideBartestmonials">
                <div class="tileLink">
                  <h1 class="bdrTitle">Testmonials<span></span></h1>
                  <a href="javascript:void(0)">Show All <i class="icon-chevron-sign-right"></i></a> </div>
                <div class="testmonialsMulti">
                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo THEMEURL;?>images/home/img-testmonial1.jpg" alt="img-testmonial1" /></dt>
                      <dd>
                        <p>I would like to thank the American Aesthetic Association for a wonderful basic and Advanced Aesthetic Medicine training courses. It was an exceptional experience. </p>
                      </dd>
                    </dl>
                    <span><strong>Douha Sabouni</strong> MD FACOG</span> </div>
                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo THEMEURL;?>images/home/img-testmonial2.jpg" alt="img-testmonial2" /></dt>
                      <dd>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie Lorem ipsum dolor.</p>
                      </dd>
                    </dl>
                    <span><strong>Lorem Ipsum Dolor</strong> consectetur</span> </div>
                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo THEMEURL;?>images/home/img-testmonial3.jpg" alt="img-testmonial3" /></dt>
                      <dd>
                        <p>I would like to thank the American Aesthetic Association for a wonderful basic and Advanced Aesthetic Medicine training courses. </p>
                      </dd>
                    </dl>
                    <span><strong>Douha Sabouni</strong> MD FACOG</span> </div>
                </div>
              </div>
            </div>
            <!-- /rowAside --> 
            
          </div>
          <div class="clear"></div>
        </div>
        <!-- /aboutPage --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
 