<div class="container">
    <div class="titleSection parallax newsTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">News</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a href="<?php echo SITEURL.'about'; ?>">About Us</a></li>
                <li><a class="page-selection">News</a></li>
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
        <div class="newsPage">
          <div class="contentLeft">
		   <?php 
                foreach ($this->newsList as $newslist) {
					$date = strtotime($newslist['created_date']);
					$startdat = date('F j, Y', $date);
					?>
         <a href="<?php echo SITEURL; ?>news/details/<?php echo $newslist['blog_id']; ?>" class="newsPosts">
            <dl class="wow fadeInLeft animated">
			 
             <dt> <img class="img-responsive img-thumbnail" width ="200px" height="87px" src="<?php echo IMAGEURL; ?>uploads/blog/<?php echo $newslist['image'] ?>" ></dt>
              <dd>
                <h3><?php echo $newslist['blog_title']; ?></h3>
                <span><i class="icon-time"></i><?php echo $startdat; ?></span>
                <p><?php echo substr($newslist['short_desc'], 0, 100); ?> </p> 
              </dd>
            </dl>
            </a> 
			<?php } ?>
            
            <!-- /newsPosts -->
            <div class="pagination">
              <ul>
                <li><a href="javascript:void(0)">&laquo; Prev</a></li>
                <li><a class="active" href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)">5</a></li>
                <li><a href="javascript:void(0)">6</a></li>
                <li><a href="javascript:void(0)">7</a></li>
                <li><a href="javascript:void(0)">Next &raquo;</a></li>
              </ul>
            </div>
            <!-- /pagination --> 
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
                  <a href="<?php echo SITEURL;?>testimonials/">Show All <i class="icon-chevron-sign-right"></i></a> </div>
                <div class="testmonialsMulti">
                  <?php foreach($this->testmonialslist as $list){ ?>
				  <div class="item">
				  <dl>
                      <dt><img src="<?php echo IMAGEURL; ?>uploads/testimonials/<?php echo $list['image'] ?>" alt="img-testmonial1" /></dt>
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
  
  <a href="javascript:void(0)" id="btn-scrollup"><i class="icon-angle-up"></i></a> </div>
<!-- /wrapper --> 
<script type="text/javascript" src="js/jquery.easing.min.js"></script> 
<script type="text/javascript" src="js/carousel.min.js"></script> 
<script type="text/javascript" src="js/animate.js"></script> 
<script type="text/javascript" src="js/stickynavigation.js"></script> 
<script type="text/javascript" src="js/menu.js"></script> 
<script type="text/javascript" src="js/all.js"></script> 
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
</body>
</html>
