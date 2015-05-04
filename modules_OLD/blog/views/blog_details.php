
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
            <div class="blogBox wow fadeInLeft animated">
              <div class="postHeader">
                <h1 class="postTitle"><?php echo $this->blogDetails['blog_title'];?></h1>
                <div class="postMeta">
                  <ul>
                    <li><i class="icon-user"></i><a rel="author" href="#author"><?php echo $this->blogDetails['username'];?></a></li>
                    <li><i class="icon-calendar"></i><span><?php $date = strtotime($this->blogDetails['created_date']);echo date('M d, Y', $date);?></span></li>
                    <li><i class="icon-eye-open"></i><span>384 Views</span></li>
                    <li><i class="icon-thumbs-up"></i><a title="Like" href="javascript:void(0)">8</a></li>
                    <li><i class="icon-comment"></i><a href="#comments">Leave a comment</a></li>
                  </ul>
                  <div class="clear"></div>
                </div>
              </div>
              <!-- /postHeader -->
              <div class="postMediaa"><img src="<?php echo IMAGEURL;?>uploads/blog/<?php echo $this->blogDetails['image'];?>" alt="blog-post1" /> </div>
              <div class="postContent">
                <p><?php echo $this->blogDetails['full_desc'];?></p>
<!--            <ul>
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                  <li>Aenean vestibulum diam sit amet leo tristique vehicula. Ut ullamcorper nulla eu magna tincidunt consectetur.</li>
                  <li>Nunc feugiat, erat ut vehicula vehicula, tellus quam pulvinar porttitor vel posuere laoreet.</li>
                  <li>Morbi sollicitudin justo non odio molestie.  Nulla elementum gravida suscipit.</li>
                  <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</li>
                  <li>Sed euismod suscipit auctor. Suspendisse sapien sapien, porttitor vel posuere laoreet, vulputate non elit.</li>
                </ul>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie. Aenean vestibulum diam sit amet leo tristique vehicula. Ut ullamcorper nulla eu magna tincidunt consectetur. Nulla elementum gravida suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed euismod suscipit auctor. Suspendisse sapien sapien, porttitor vel posuere laoreet, vulputate non elit. Nunc feugiat, erat ut vehicula vehicula, tellus quam pulvinar porttitor vel posuere laoreet...</p>-->
                <div class="socialLinks">
                  <div class="socialIcons"> <a href="javascript:void(0)" target="_blank" title="facebbok" class="fb"><i class="icon-facebook"></i></a> <a href="javascript:void(0)" target="_blank" title="google plus" class="gplus"><i class="icon-google-plus"></i></a> <a href="javascript:void(0)" target="_blank" title="twitter" class="twitter"><i class="icon-twitter"></i></a>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <!-- /postContent -->
              
              <div class="postAuthor" id="author">
                <h2 class="bdrTitle">About the autor<span></span></h2>
                <dl class="blogStyle">
                  <dt><img src="<?php echo THEMEURL;?>images/100X100.jpg" alt="100X100" /></dt>
                  <dd>
                    <h3>Lorem ipsum dolor</h3>
                    <p>Morbi sollicitudin justo non odio molestie. Aenean vestibulum diam sit amet leo tristique vehicula. Ut ullamcorper nulla eu magna tincidunt consectetur. Nulla elementum gravida suscipit. Pellentesque habitant morbi tristique senectus et netus.</p>
                  </dd>
                </dl>
              </div>
              <!-- postAuthor -->
              
              <div class="prevNext"> <a href="#">&laquo; Previous Post</a> <a href="#">Next Post &raquo;</a> </div>
              <!-- prevNext -->
              <div class="commentsArea" id="comments">
                <h2 class="bdrTitle">Comments<span></span></h2>
                <?php if(count($this->commentslist) != '') {
                    foreach ($this->commentslist as $comment) { ?>
                
                <div class="comments">
                  <dl class="blogStyle">
                    <dt><img src="<?php echo THEMEURL;?>images/100X100.jpg" alt="100X100" /></dt>
                    <dd>
                      <h3><?php echo $comment['username']?></h3>
                      <div class="blogPublish">
                        <ul>
                          <li><span><i class="icon-time"></i><?php $cdate = strtotime($comment['created_on']);echo date('M d, Y', $cdate);?></span></li>
                          <li><a href="#leaveComment"><i class="icon-reply"></i> Reply</a></li>
                        </ul>
                      </div>
                      <p><?php echo $comment['description'];?></p>
                    </dd>
                  </dl>
                </div>
                <?php } }else {
                    echo "<div>";
                     echo "No comments";
                    echo "</div>";
                 } ?>
<!--                <div class="comments commentsReply">
                  <dl class="blogStyle">
                    <dt><img src="<?php echo THEMEURL;?>images/100X100.jpg" alt="100X100" /></dt>
                    <dd>
                      <h3>Lorem ipsum dolor</h3>
                      <div class="blogPublish">
                        <ul>
                          <li><span><i class="icon-time"></i>23 May 2014</span></li>
                          <li><a href="#leaveComment"><i class="icon-reply"></i> Reply</a></li>
                        </ul>
                      </div>
                      <p>Morbi sollicitudin justo non odio molestie. Aenean vestibulum diam sit amet leo tristique vehicula.</p>
                    </dd>
                  </dl>
                </div>-->
<!--                <div class="comments">
                  <dl class="blogStyle">
                    <dt><img src="<?php echo THEMEURL;?>images/100X100.jpg" alt="100X100" /></dt>
                    <dd>
                      <h3>Aenean vestibulum diam sit</h3>
                      <div class="blogPublish">
                        <ul>
                          <li><span><i class="icon-time"></i>23 May 2014</span></li>
                          <li><a href="#leaveComment"><i class="icon-reply"></i> Reply</a></li>
                        </ul>
                      </div>
                      <p>Morbi sollicitudin justo non odio molestie. Aenean vestibulum diam sit amet leo tristique vehicula. Ut ullamcorper nulla eu magna tincidunt consectetur. Nulla elementum gravida suscipit.</p>
                    </dd>
                  </dl>
                </div>-->
              </div>
              <!-- commentsArea -->
              
              <div class="leaveComment" id="leaveComment">
                <h2 class="bdrTitle">Leave a comment<span></span></h2>
                <form id="mailForm" class="contactForm">
                  <ul>
                    <li>
                      <div>
                        <label>Name<span>*</span></label>
                        <input type="text" name="contactName" id="contactName">
                      </div>
                      <div>
                        <label>Email ID<span>*</span></label>
                        <input type="text" name="contactEmail" id="contactEmail">
                      </div>
                    </li>
                    <li>
                      <div>
                        <label>Mobile Number<span>*</span></label>
                        <input type="text" name="contactMobile">
                      </div>
                      <div>
                        <label>Website</label>
                        <input type="text" name="contactSub" id="contactSub">
                      </div>
                    </li>
                    <li>
                      <label>Comments<span>*</span></label>
                      <textarea name="contactComments" id="contactComments"></textarea>
                    </li>
                  </ul>
                  <button class="btn btnBlue" value="" type="submit">Submit</button>
                </form>
              </div>
            </div>
            <!-- /blogBox -->
            
            <div class="clear"></div>
          </div>
          <!-- /blogLeft -->
          <div class="aside">
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Recent Posts<span></span></h1>
                <?php foreach ($this->postList as $post) { ?> 
                    
               
                <a href="javascript:void(0)">
                <dl>
                  <dt><img src="<?php echo IMAGEURL;?>uploads/blog/<?php echo $post['image'];?>" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4><?php echo $post['blog_title'];?></h4>
                    <span><i class="icon-time"></i><?php $date = strtotime($post['created_date']);echo date('M d, Y', $date);?></span> </dd>
                </dl>
                </a> 
                <?php } ?>
                <div class="clear"></div>
              </div>
            </div>
            <!-- /rowAside -->
            
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Popular Posts<span></span></h1>
                <a href="blog-inner.html">
                    <dl>
                      <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb2.jpg" alt="blog-thumb2" /></dt>
                      <dd>
                        <h4>Morbi sollicitudin justo non odio molestie</h4>
                        <span><i class="icon-time"></i>April 21, 2015</span> 
                      </dd>
                    </dl>
                </a> 
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem ipsum dolor</h4>
                    <span><i class="icon-time"></i>April 19, 2015</span> 
                  </dd>
                </dl>
                </a> -->
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb3.jpg" alt="blog-thumb3" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 12, 2015</span> 
                  </dd>
                </dl>
                </a> -->
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb1.jpg" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4>Lorem ipsum dolor</h4>
                    <span><i class="icon-time"></i>April 10, 2015</span> 
                  </dd>
                </dl>
                </a> -->
<!--                <a href="blog-inner.html">
                <dl>
                  <dt><img src="<?php echo THEMEURL;?>images/inner/blog-thumb2.jpg" alt="blog-thumb2" /></dt>
                  <dd>
                    <h4>Pellentesque habitant morbi tristique senectus</h4>
                    <span><i class="icon-time"></i>April 06, 2015</span> 
                  </dd>
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
  