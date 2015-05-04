  <div class="container">
    <div class="titleSection parallax galleryTitleIn">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Gallery Album Name</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a href="<?php echo SITEURL;?>gallery">Gallery</a></li>
                <li><a class="page-selection">Gallery Album</a></li>
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
            <ul class="gallery gallery-inner">
                <?php foreach ($this->GalleryDetails as $gallery) { ?>               
              <li>
                <div class="bder"> <a href="<?php echo IMAGEURL;?>uploads/eventsphotos/<?php echo $gallery['gallery_id'];?>/<?php echo $gallery['image_file'];?>" data-gal="prettyPhoto[gallery1]">
                  <div class="hoverDiv"> <img src="<?php echo IMAGEURL;?>uploads/eventsphotos/<?php echo $gallery['gallery_id'];?>/<?php echo $gallery['image_thumb'];?>" alt="pic2-thumb">
                    <div class="moreContent"> </div>
                  </div>
                  </a> 
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
  $(document).ready(function() {
     $(".gallery:first a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal', animation_speed:'normal',slideshow:3000, autoplay_slideshow: false});
  });
  </script>
