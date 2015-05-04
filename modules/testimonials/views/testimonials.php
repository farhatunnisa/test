<div class="container">
    <div class="titleSection parallax testimonialsTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Testimonials</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?Php SITEURL;?>">Home</a></li>
                <li><a href="<?Php SITEURL;?>about">About Us</a></li>
                <li><a class="page-selection">Testimonials</a></li>
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
		  <?Php foreach($this->testimonialsList as $testimonialsList) {?>
            <div class="testimonials">
              <div class="quoteBox"> <i class="icon-quote-left"></i>
                <p><?php echo substr($testimonialsList['description'],0,230); ?></p>
              </div>
              <div class="quoteInfo">
                <div class="quoteArrow"></div>
                <a href="#inlineContent<?php echo $testimonialsList['testimonial_id'];?>" data-name="prettyPhoto" class="mobileView"><img src="<?php echo IMAGEURL;?>uploads/testimonials/<?php echo $testimonialsList['image']; ?>" alt="ayman" class="photo"/>
                <h3><?php echo $testimonialsList['client_name']; ?></h3>
                <span><?php echo $testimonialsList['location']; ?></span></a></div>
		  </div><?php } ?>
            <div class="clear"></div>
			<!-- popup content -->
			<?Php foreach($this->testimonialsList as $testimonialsList) {?>
           <div id="inlineContent<?php echo $testimonialsList['testimonial_id'];?>" class="hide contentPop"> <img src="<?php echo IMAGEURL;?>uploads/testimonials/<?php echo $testimonialsList['image']; ?>" alt="carolyn" class="imgLeft boxShadow"/>
              <h2><?php echo $testimonialsList['client_name']; ?></h2>
              <span class="designation">President, Founder</span>
              <p><?php echo $testimonialsList['description']; ?></p>
            </div><?php } ?>
            <!-- /popup content -->
			<div class="clear"></div>
             <!-- <div class="pagination">
              <ul>
                <li><a href="javascript:void(0)">« Prev</a></li>
                <li><a href="javascript:void(0)" class="active">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)">5</a></li>
                <li><a href="javascript:void(0)">6</a></li>
                <li><a href="javascript:void(0)">7</a></li>
                <li><a href="javascript:void(0)">Next »</a></li>
              </ul>
            </div> -->
          </div>
        </div>
      <!-- /contentLeft -->
		 <div class="aside">
            <div class="rowAside">
              <h1 class="bdrTitle">Aesthetic Courses<span></span></h1>
              <ul class="courseLinks"><?php foreach($this->courselist as $couserlist) { ?>
                <li><a href="<?php echo SITEURL;?>courses/details/<?php echo $couserlist['course_id']; ?>"><i class="icon-circle-blank"></i><span><?php echo($couserlist['course_title']); ?></span></a></li>
              <?php } ?>
			  </ul>
			 <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
      </div>
      <!-- /aboutPage --> 
     </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
 <!--<a href="javascript:void(0)" id="btn-scrollup"><i class="icon-angle-up"></i></a> -->
<!-- /wrapper --> 
<script type="text/javascript">
    $(document).ready(function () {
	
    //gallery pretty photo
    $("a[data-name^='prettyPhoto']").prettyPhoto({hook: 'data-name', animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
    $('a.mobileView').on('click', function(){
        $('.pp_default').addClass('mobiVersion');
    });

});
</script>
