
  <div class="container">
    <div class="titleSection parallax membershipTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Membership</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Membership</a></li>
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
        <div class="membershipPage">
          <div class="contentLeft">
            <h1 class="bdrTitle">Membership<span></span></h1>
            <div class="rowSpace2 wow fadeInLeft animated">
              <h2><i class="icon-info-sign"></i> Membership Information</h2>
              <p>The American Aesthetic Association is devoted to the teaching of Aesthetic Medicine to physicians who have a fascination in exploring the Aesthetic medical field. The American Aesthetic Association is determined to enhance your medical practice with various course options.</p>
            </div>
            <div class="rowSpace2 wow fadeInRight animated">
              <h2><i class="icon-credit-card"></i> Membership Benefits?</h2>
              <p> American Aesthetic Association`s goal is to provide superior education in order to expand your facilities clinical skills in Aesthetic Medicine. American Aesthetic Association not only has annual seminars, we also provide hands-on training courses and workshops throughout the globe. Currently we have courses held in the United States, Europe, Asia, Middle East and Africa.</p>
              <p>Our association`s clinical trained practitioners are well qualified with up to date expertise, pharmaceuticals, technologies and programs that specifically focus on Aesthetic Medicine and Surgery.</p>
            </div>
            <div class="rowSpace2">
              <h2 class="wow fadeInRight animated"><i class="icon-money"></i> Some of the Benefits Members of American Aesthetic Association enjoy:</h2>
              <ul class="benfits">
                <li class="wow fadeInRight animated"><img src="<?php echo THEMEURL;?>images/home/icon3.png" alt="icon3" /><span>Membership Certificate</span></li>
                <li class="wow fadeInLeft animated"><img src="<?php echo THEMEURL;?>images/home/icon2.png" alt="icon2" /><span>Registration discount of $200 off of all American Aesthetic Association Courses</span></li>
                <li class="wow fadeInRight animated"><img src="<?php echo THEMEURL;?>images/home/icon1.png" alt="icon1" /><span>Self assessment tests</span></li>
                <li class="wow fadeInLeft animated"><img src="<?php echo THEMEURL;?>images/home/icon4.png" alt="icon4" /><span>Frequent updates on upcoming courses</span></li>
              </ul>
            </div>
            <div class="rowSpace2 wow fadeInLeft animated">
              <h1 class="bdrTitle">MEMBERSHIP CATEGORIES<span></span></h1>
              <div class="rowSpace1">
              <div class="accordion" id="section1">Associated Member: $150<span></span></div>
              <div class="container_accord">
                <div class="content_accord">
                  <p>Opened to qualified Licensed Medical Doctors regardless of specialty</p>
                </div>
              </div>
              </div><div class="rowSpace1">
              <div class="accordion" id="section2">Fellow Member: $350<span></span></div>
              <div class="container_accord">
                <div class="content_accord">
                  <p>In order to obtain Fellow member status, Member must be Associate member for two years and complete Step 1 Course in Aesthetic Medicine and Step 2 Course in Aesthetic Medicine.</p>
                </div>
              </div>
              </div>
              <div class="rowSpace1">
              <div class="accordion" id="section3">Residents: $100<span></span></div>
              <div class="container_accord">
                <div class="content_accord">
                 <p>Opened to residents and Medical School/College diplomats.</p>
                </div>
                </div>
              </div>
              <div class="rowSpace1">
              <div class="accordion" id="section3">Member: $75<span></span></div>
              <div class="container_accord">
                <div class="content_accord">
                 <p>Opened to licensed nurses, aesthetic nurses, licensed aestheticians, hair technicians, surgical assistants, physician assistants, nurses practitioners.</p>
                </div>
                </div>
              </div>
            </div>
            <div class="memberBtn"> <a href="<?php echo SITEURL;?>registration" class="btn btnRed"><i class="icon-user"></i>Become a Member</a> </div>
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
                  <a href="<?php echo SITEURL;?>testimonials">Show All <i class="icon-chevron-sign-right"></i></a> </div>
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
          <div class="clear"></div>
        </div>
        <!-- /aboutPage --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
  