<div class="container">
    <div class="titleSection parallax aboutTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">About Us</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">About Us</a></li>
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
        <div class="aboutPage">
          <div class="contentLeft">
            <h1>Welcome to the American Aesthetic Association</h1>
            <img src="<?php echo THEMEURL; ?>images/inner/img-aboutus-small.jpg" alt="img-aboutus-small" class="imgLeft" />
            <p>Our association is dedicated to educating physicians and medical professionals who are interested in including aesthetic medicine dimension to their practice.  Here at American Aesthetic Association our prestigious faculty members will help instruct our members with science, art, techniques and procedures of Aesthetic Medicine and Surgery. The American Aesthetic Association provides outstanding education, information and hands-on training to which correlates with the latest advancements in Aesthetic Medicine worldwide. The American Aesthetic Association consists of diverse Board certified faculty members specialized in the field of Aesthetic Medicine and surgery.</p>
            <p>At the American Aesthetic Association, our world class faculty shares their expertise in their respective field. This allows our courses to be recognized in not only the United States, but also around the globe. Our courses are currently held in multiple cities in Europe, the Middle East, Asia and Africa. Through our Board certification courses, members will gain universal education and technical training in the advancement of science in Aesthetic Medicine. The American Aesthetic Association is strictly an educational and training association; any completion of our courses does not exhibit member to constitute a license to practice.</p>
            <div class="aboutInfo">
              <section class="wow fadeInUp animated">
                <h2 class="bdrTitle">Vision<span class="bdrSpace"></span></h2>
                <p>Our vision is "Excellence in Aesthetic Medicine and Surgery Education."</p>
                <h2 class="bdrTitle">Mission Statement<span></span></h2>
                <p>Our Mission is to be a leader in the Field of Aesthetic Medicine and Surgery. The American Aesthetic Association provides quality medical education for physicians and healthcare professionals who share the same passion. Our word renowned faculty of US trained and licensed aesthetic physicians and surgeons provide superb educational experience in helping both novice as well as physicians who would like to advance their field in aesthetic practice.</p>
              </section>
              <section class="wow fadeInDown animated">
                <div class="obj">
                  <h2 class="bdrTitle">Objectives<span></span></h2>
                  <ul class="courseLinks">
                    <li><i class="icon-circle-blank"></i><span>Providing professional and educational development opportunities and training for doctors.</span></li>
                    <li><i class="icon-circle-blank"></i><span>To maintain optimum professional standards while practicing Aesthetic Medicine during clinical practice and patient care.</span></li>
                    <li><i class="icon-circle-blank"></i><span>To provide study materials and conduct examinations in Aesthetic Medicine.</span></li>
                    <li><i class="icon-circle-blank"></i><span>Advancement in the effective, ethical and safe practice of Aesthetic Medicine.</span></li>
                    <li><i class="icon-circle-blank"></i><span>To provide informative guidance and expertise in relationship to Aesthetic Medicine and other associated health issues.</span></li>
                    <li><i class="icon-circle-blank"></i><span>To fraternize academic, medical and other institutions around the globe for the developmental practice of Aesthetic Medicine and Surgery Education.</span></li>
                    <li><i class="icon-circle-blank"></i><span>Educating physicians to build and develop their aesthetic practice.</span></li>
                  </ul>
                  <div class="clear"></div>
                </div>
              </section>
              <div class="clear"></div>
            </div>
            <!-- /aboutInfo --> 
            
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
<!--                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo THEMEURL; ?>images/home/img-testmonial2.jpg" alt="img-testmonial2" /></dt>
                      <dd>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie Lorem ipsum dolor.</p>
                      </dd>
                    </dl>
                    <span><strong>Lorem Ipsum Dolor</strong> consectetur</span> 
                  </div>
                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo THEMEURL; ?>images/home/img-testmonial3.jpg" alt="img-testmonial3" /></dt>
                      <dd>
                        <p>I would like to thank the American Aesthetic Association for a wonderful basic and Advanced Aesthetic Medicine training courses. </p>
                      </dd>
                    </dl>
                    <span><strong>Douha Sabouni</strong> MD FACOG</span> 
                  </div>-->
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
<script type="text/javascript">
$(document).ready(function () {
//menu
	jQuery('header nav').meanmenu();
});

//owl carousel
$(document).ready(function() {
      $(".testmonialsMulti").owlCarousel({
      navigation : false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
	  pagination:true,
	  autoHeight:true,
	  autoPlay:10000
      });
});
	  
</script>