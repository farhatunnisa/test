<div class="topPlugins">
    <div class="master-slider ms-skin-black-2 round-skin" id="masterslider">
      <div class="ms-slide slide-1" style="z-index: 10" data-delay="7"> <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/slide1.jpg" alt="slide1"/>
        <h1 class="ms-layer bold-title"  style="left:50px; top:50px"
				       		data-effect="top(300)"
				        	data-ease="easeOutQuint"
				        >Member Ship Benefits</h1>
        <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/icon1.png" alt="icon1" class="ms-layer" style="left:60px; top:110px;"
                            data-effect="left(200)"
                            data-duration="2000"
                            data-delay="300"
                            data-type="image"/>
        <p class="ms-layer normal-desc" style="left:100px; top:106px" 
				        	data-effect="right(200)"
				        	data-duration="2000"
				        	data-delay="500"
				        	data-ease="easeOutQuint"
				        >Access to self assessment tests </p>
        <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/icon2.png" alt="icon2" class="ms-layer" style="left:60px; top:165px;"
                            data-effect="left(200)"
                            data-duration="2000"
                            data-delay="600"
                            data-type="image"/>
        <p class="ms-layer normal-desc" style="left:100px; top:160px" 
				        	data-effect="right(200)"
				        	data-duration="2000"
				        	data-delay="1000"
				        	data-ease="easeOutQuint"
				        >Discount of $200 on all courses </p>
        <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/icon3.png" alt="icon3" class="ms-layer" style="left:60px; top:220px;"
                            data-effect="left(200)"
                            data-duration="2000"
                            data-delay="900"
                            data-type="image"/>
        <p class="ms-layer normal-desc" style="left:100px; top:216px" 
				        	data-effect="right(200)"
				        	data-duration="2000"
				        	data-delay="1500"
				        	data-ease="easeOutQuint"
				        >Membership Certificate </p>
        <div class="ms-layer more-link" style="left:115px; top:280px" 
				        	data-effect="fade()"
				        	data-duration="2000"
				        	data-delay="2500"
				        	data-ease="easeOutQuint"
				        ><a href="javascript:void(0)" class="btn btnBlue">view more benefits</a></div>
      </div>
      <div class="ms-slide slide-2" style="z-index: 10" data-delay="7"> <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/slide2.jpg" alt="slide2"/>
        <h1 class="ms-layer bold-title bold-desc"  style="left:50px; top:50px" 
				       		data-effect="front(800)"
				        	data-ease="easeOutQuint"
				        >Excellence in Aesthetic medicine &amp; surgery education</h1>
        <p class="ms-layer normal-desc para-desc" style="left:50px; top:100px" 
				        	data-effect="front(800)"
				        	data-duration="1000"
				        	data-delay="500"
				        	data-ease="easeOutQuint"
				        >The American Aesthetic Association consists of diverse Board Certified Faculty specializing in the fields of Aesthetic Medicine and Surgery. </p>
        <div class="ms-layer more-link" style="left:66px; top:190px" 
				        	data-effect="front(800)"
				        	data-duration="1500"
				        	data-delay="1000"
				        	data-ease="easeOutQuint"
				        ><a href="javascript:void(0)" class="btn btnBlue">view more</a></div>
      </div>
      <div class="ms-slide slide-3" style="z-index: 10" data-delay="7"> <img src="<?php echo THEMEURL;?>images/blank.gif" data-src="<?php echo THEMEURL;?>images/home/slide3.jpg" alt="slide3"/>
        <h1 class="ms-layer bold-title bold-desc"  style="left:50px; top:50px" 
				       		data-effect="skewleft(18,35|100)"
				        	data-ease="easeOutQuint"
				        >Excellence in Aesthetic medicine &amp; surgery education</h1>
        <p class="ms-layer normal-desc para-desc" style="left:50px; top:100px" 
				        	data-effect="skewright(18,35|100)"
				        	data-duration="1000"
				        	data-delay="500"
				        	data-ease="easeOutQuint"
				        >ur world class faculty shares their expertise in their respective field. This allows our courses to be recognized in not only the United States, but also around the globe.</p>
        <div class="ms-layer more-link" style="left:66px; top:190px" 
				        	data-effect="skewbottom(18,35|100)"
				        	data-duration="1500"
				        	data-delay="1000"
				        	data-ease="easeOutQuint"
				        ><a href="javascript:void(0)" class="btn btnBlue">view more</a></div>
      </div>
    </div>
  </div>
  <!-- /topPlugins -->
  <div class="findCourse rowSpace">
    <div class="pageWidth">
      <form method="post" action="<?php echo SITEURL;?>index/search" autocomplete="off">
        <ul>
          <li>
            <h2>Find a Course:</h2>
          </li>
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
            <input type="text" name="date" placeholder="mm/y"/>
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
            <button type="submit" value="" class="btn btnBlue btnIconRight">Search <i class="icon-search"></i></button>
          </li>
        </ul>
      </form>
    </div>
  </div>
  <!-- /findCourse -->
  <div class="upcomingCourses rowSpace">
    <div class="pageWidth">
      <h1 class="bdrTitle">Upcoming Courses<span></span></h1>
      <?php            
              $i = 0;
              $div1  = '';
              $div2  = '';
              $class = '';
              foreach ($this->coursesList as $data){
                if ($i % 2 == 0) {                      
                  $div1  = "<ul>";
                  $div2  = "";
                  $class = "fadeInLeft";
                } else {
                  $div1 = "";
                  $div2 = "</ul>";
                  $class = "fadeInRight";
                }
                echo $div1; ?>
                <li class="wow <?php echo $class; ?>  animated">
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
  <div class="homeContent parallax parallax-1 rowSpace">
    <div class="pageWidth">
      <div class="leftContent wow fadeInLeft animated">
        <div class="leftContInner">
          <h1>WELCOME TO AMERICAN AESTHETIC  ASSOCIATION</h1>
          <p>Welcome to the American Aesthetic Association. Our association is dedicated to educating physicians and medical professionals who are interested in practice and aesthetic dimension. Here at American Aesthetic Association our prestigious faculty will help instruct our members with science, art, techniques and procedures of Aesthetic Medicine and Surgery. American Aesthetic Association provides outstanding education, information and hands-on training that correlate with the latest advancements in Aesthetic Medicine worldwide.</p>
          <p>The American Aesthetic Association consists of diverse Board Certified Faculty specializing in the fields of Aesthetic Medicine and Surgery. Our world class faculty shares their expertise in their respective field. This allows our courses to be recognized in not only the United States, but also around the globe.</p>
          <a class="btn btnBlue btnIconRight rightAlign " href="javascript:void(0)">Read more <i class="icon-chevron-sign-right"></i></a>
          <div class="clear"></div>
        </div>
      </div>
      <div class="rightContent wow fadeInRight animated">
        <iframe src="https://www.youtube.com/embed/zWYx3HYsshs"></iframe>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!-- /homeContent -->
  <div class="twoColumnArea rowSpace">
    <div class="pageWidth">
      <div class="news  wow fadeInUp animated">
        <div class="tileLink">
          <h1 class="bdrTitle">Latest News<span></span></h1>
          <a href="javascript:void(0)">Show All <i class="icon-chevron-sign-right"></i></a> </div>
        <div class="newsInner">
          <?php foreach($this->newsList as $news) { 
              $date = strtotime($news['created_date']);
              $dat = date('d M', $date);
              $year = date ('Y', $date);?>
          <ul>
            <li><img src="<?php echo IMAGEURL;?>uploads/blog/<?php echo $news['image'];?>" alt="img-news1" /></li>
            <li> <a href="javascript:void(0)">
              <h4><?php echo $news['blog_title']; ?></h4>
              </a> <span> <i class="icon-calendar"></i><?php echo $dat." ". $year;?></span> <span><a href="javascript:void(0)"><i class="icon-facebook-sign"></i>13</a></span> <span><a href="javascript:void(0)"><i class="icon-twitter-sign"></i>25</a></span>
              <div class="clear"></div>
              <p><?php echo substr($news['short_desc'],0,100);?></p>
              <a href="javascript:void(0)" class="continueLink">Continue Reading...</a> </li>
          </ul>
          <?php } ?>
<!--          <ul>
            <li><img src="<?php echo THEMEURL;?>images/home/img-news2.jpg" alt="img-news2" /></li>
            <li> <a href="javascript:void(0)">
              <h4>Computational tool identifies 800 risk factors for PTSD</h4>
              </a> <span><i class="icon-calendar"></i>25 DEC 2013 </span> <span><a href="javascript:void(0)"><i class="icon-facebook-sign"></i>13</a></span> <span><a href="javascript:void(0)"><i class="icon-twitter-sign"></i>25</a></span>
              <div class="clear"></div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie Lorem ipsum dolor sit amet, consectetur</p>
              <a href="javascript:void(0)" class="continueLink">Continue Reading...</a> </li>
          </ul>-->
        </div>
      </div>
        
    <!-- Testimonials --->
      <div class="testmonials wow fadeInDown animated">
        <div class="tileLink">
          <h1 class="bdrTitle">Testmonials<span></span></h1>
          <a href="javascript:void(0)">Show All <i class="icon-chevron-sign-right"></i></a> </div>
        <div class="testmonialInner">
          <ul id="tesmonials">
            <?php foreach ($this->testimonialsList as $testimonial) { ?>
            <li> <i class="icon-quote-left"></i>
              <p><?php echo $testimonial['description'];?></p>
              <span><img src="<?php echo THEMEURL;?>images/arrow-curved.png" alt="arrow-curved" /></span>
              <div class="userImg"> <img src="<?php echo IMAGEURL;?>uploads/testimonials/<?php echo $testimonial['image'];?>" alt="img-testmonial1" /> <a href="#"><?php echo $testimonial['client_name'];?></a> <i><?php echo $testimonial['location'];?></i> </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!-- /news and testmonials -->
  <div class="homeBlog">
    <div class="pageWidth">
      <h1 class="bdrTitle">Recent Blog<span></span></h1>
      <ul>
        <?php foreach ($this->blogList as $blog) { 
            $date = strtotime($blog['created_date']);
            $dat = date('d M', $date);
            $year = date ('Y', $date);
            
            ?>
          
        <li class="wow fadeInLeft animated">
          <div class="date">
            <p><?php echo $dat;?></p>
            <h4><?php echo $year;?></h4>
            <span></span> </div>
          <div class="blogInfo">
            <p><a href="javascript:void(0)"><?php echo substr($blog['short_desc'],0,100);?></a></p>
            <dl>
              <dt><strong>Published by:</strong> <a href="javascript:void(0)"><?php echo $blog['username'];?></a></dt>
              <dd><strong>Comments:</strong> <a href="javascript:void(0)">25</a></dd>
            </dl>
          </div>
        </li>
        <?php   } ?>
<!--        <li class="wow fadeInRight animated">
          <div class="date">
            <p>02 Mar</p>
            <h4>2015</h4>
            <span></span> </div>
          <div class="blogInfo">
            <p><a href="javascript:void(0)">Consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
            <dl>
              <dt><strong>Published by:</strong> <a href="javascript:void(0)">Admin</a></dt>
              <dd><strong>Comments:</strong> <a href="javascript:void(0)">25</a></dd>
            </dl>
          </div>
        </li>-->
      </ul>
<!--      <ul>
        <li class="wow fadeInLeft animated">
          <div class="date">
            <p>12 Mar</p>
            <h4>2015</h4>
            <span></span> </div>
          <div class="blogInfo">
            <p><a href="javascript:void(0)">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie Lorem ipsum dolor sit.</a></p>
            <dl>
              <dt><strong>Published by:</strong> <a href="javascript:void(0)">Admin</a></dt>
              <dd><strong>Comments:</strong> <a href="javascript:void(0)">25</a></dd>
            </dl>
          </div>
        </li>
        <li class="wow fadeInRight animated">
          <div class="date">
            <p>15 April</p>
            <h4>2015</h4>
            <span></span> </div>
          <div class="blogInfo">
            <p><a href="javascript:void(0)">Consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
            <dl>
              <dt><strong>Published by:</strong> <a href="javascript:void(0)">Admin</a></dt>
              <dd><strong>Comments:</strong> <a href="javascript:void(0)">25</a></dd>
            </dl>
          </div>
        </li>
      </ul>-->
    </div>
  </div>
  <!-- /homeBlog -->
