  <div class="container">
    <div class="titleSection parallax galleryTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Gallery</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Gallery</a></li>
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
        <div class="galleryPage">
          <div class="contentLeft">
            <ul class="gallery">
                <?php foreach ($this->galleryList as $gallery) { ?>
              <li>
                <div class="bder">
                  <div class="hoverDiv"> <img src="<?php echo IMAGEURL;?>uploads/eventsphotos/thumbnail/<?php echo $gallery['thum_image'];?>" alt="pic1-thumb">
                    <div class="moreContent">
                      <div class="buttonAlign">
                        <div class="links"> <span><a href="<?php echo SITEURL;?>gallery/details/<?php echo $gallery['gallery_id'];?>"><i class="icon-link"></i></a></span> <span> <a href="<?php echo IMAGEURL;?>uploads/eventsphotos/thumbnail/<?php echo $gallery['thum_image'];?>" data-gal="prettyPhoto[gallery1]"> <i class="icon-search"></i></a></span> </div>
                      </div>
                    </div>
                  </div>
                  <div class="galInfo">
                    <h4><?php echo $gallery['gallery_title'];?></h4>
                    <p><?php $date = strtotime($gallery['created']);echo $dat = date('M d, Y', $date);?></p>
                  </div>
                </div>
              </li>
              <?php } ?>

            </ul>
          </div>
          <!-- /contentLeft -->
          <div class="aside">
            <div class="rowAside">
              <h1 class="bdrTitle">Aesthetic Courses<span></span></h1>
              <ul class="courseLinks">
                <?php foreach ($this->courselist as $course) { ?>               
                <li><a href="<?php echo SITEURL;?>courses/details/<?php echo $course['course_id']; ?>"><i class="icon-circle-blank"></i><span><?php echo($course['course_title']); ?></span></a></li>
                 <?php } ?>
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
                 <?php foreach ($this->testmonialslist as $testimonials) { ?>                  
                  <div class="item">
                    <dl>
                      <dt><img src="<?php echo SITEURL; ?>uploads/testimonials/<?php echo $testimonials['image'] ?>" alt="img-testmonial1" /></dt>
                       <dd>
                         <p><?php echo substr($testimonials['description'],0,100);?></p>
                       </dd>
                    </dl>
                    <span><strong><?php echo $testimonials['client_name']; ?></strong> <?php echo $testimonials['location']; ?></span> 
                  </div>
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
  <script>
    $(document).ready(function(){
       $(".gallery:first a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal', animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
   });
</script>