
  <div class="container">
    <div class="titleSection parallax blogTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Blog</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Blog</a></li>
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
        <div class="blogPgae">
          <div class="blogLeft">
              <?php //echo "<pre>";print_r($this->blogList);exit;
              foreach ($this->bloglist as $blog) { 
                  $date = strtotime($blog['created_date']);
                  $startdat = date('M d, Y', $date);
                  ?>
              
            <div class="blogBox wow fadeInLeft animated">
              <div class="postHeader">
                <h1 class="postTitle"><?php echo $blog['blog_title'];?></h1>
                <div class="postMeta">
                  <ul>
                    <li><i class="icon-user"></i><a rel="author" href="javascript:void(0)"><?php echo $blog['username'];?></a></li>
                    <li><i class="icon-calendar"></i><span><?php echo $startdat;?></span></li>
                    <li><i class="icon-eye-open"></i><span>384 Views</span></li>
                    <li><i class="icon-thumbs-up"></i><a title="Like" href="javascript:void(0)">8</a></li>
                    <li><i class="icon-comment"></i><a href="javascript:void(0)">Leave a comment</a></li>
                  </ul>
                  <div class="clear"></div>
                </div>
              </div>
              <!-- /postHeader -->
              <div class="postMedia"> <a href="<?php echo SITEURL;?>blog/details/<?php echo $blog['blog_id'];?>"><img src="<?php echo IMAGEURL;?>uploads/blog/<?php echo $blog['image'];?>" alt="blog-post1" />
                <div class="mediaOverlay"> <i class="icon-link"></i> </div>
                </a></div>
              <div class="postContent">
                <p><?php echo $blog['short_desc'];?></p>
                <div class="socialLinks">
                  <div class="readmore"><a href="<?php echo SITEURL;?>blog/details/<?php echo $blog['blog_id'];?>" class="btn btnBlue">Read More &raquo;</a></div>
                  <div class="socialIcons"> <a href="javascript:void(0)" target="_blank" title="facebbok" class="fb"><i class="icon-facebook"></i></a> <a href="javascript:void(0)" target="_blank" title="google plus" class="gplus"><i class="icon-google-plus"></i></a> <a href="javascript:void(0)" target="_blank" title="twitter" class="twitter"><i class="icon-twitter"></i></a>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <!-- /postContent --> 
            </div>
              <?php  } ?>
            <!-- /blogBox -->
           
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
            <div class="clear"></div>
          </div>
          <!-- /blogLeft -->
          <div class="aside">
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Recent Posts<span></span></h1>
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem Ipsum Dolor</h4>
                    <span><i class="icon-time"></i>April 21, 2015</span> </dd>
                </dl>
                </a> <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb2.jpg" alt="blog-thumb2" /></dt>
                  <dd>
                    <h4>Morbi sollicitudin justo non odio molestie</h4>
                    <span><i class="icon-time"></i>April 19, 2015</span> </dd>
                </dl>
                </a> 
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb3.jpg" alt="blog-thumb3" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 12, 2015</span> </dd>
                </dl>
                </a> 
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem ipsum dolor</h4>
                    <span><i class="icon-time"></i>April 10, 2015</span> </dd>
                </dl>
                </a> 
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb3.jpg" alt="blog-thumb3" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 06, 2015</span> </dd>
                </dl>
                </a>-->
                <div class="clear"></div>
              </div>
            </div>
            <!-- /rowAside -->
            
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Popular Posts<span></span></h1>
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb2.jpg" alt="blog-thumb2" /></dt>
                  <dd>
                    <h4>Morbi sollicitudin justo non odio molestie</h4>
                    <span><i class="icon-time"></i>April 21, 2015</span> </dd>
                </dl>
                </a> 
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem ipsum dolor</h4>
                    <span><i class="icon-time"></i>April 19, 2015</span> </dd>
                </dl>
                </a> 
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb3.jpg" alt="blog-thumb3" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 12, 2015</span> </dd>
                </dl>
                </a> 
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem ipsum dolor</h4>
                    <span><i class="icon-time"></i>April 10, 2015</span> </dd>
                </dl>
                </a> 
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb2.jpg" alt="blog-thumb2" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 06, 2015</span> </dd>
                </dl>
                </a>-->
                <div class="clear"></div>
              </div>
            </div>
            <!-- /rowAside --> 
            
          </div>
          <div class="clear"></div>
        </div>
        <!-- /blogPgae --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
  