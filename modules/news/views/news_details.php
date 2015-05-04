<div class="container">
    <div class="titleSection parallax blogTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">News</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a href="<?php echo SITEURL.'news'; ?>">News</a></li>
                <li><a class="page-selection">News Inner</a></li>
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
          <div class="blogLeft">
            <div class="blogBox wow fadeInLeft animated">
              <div class="postHeader">
                <h1 class="postTitle"><?php echo $this->newsDetails['blog_title']; ?></h1>
                <div class="postMeta">
                  <ul>
                    <li><i class="icon-user"></i><a rel="author" href="#author"><?php echo $this->newsDetails['username']; ?></a></li>
                    <li><i class="icon-calendar"></i><span><?php    $date = strtotime($this->newsDetails['created_date']); 
					 $startdat = date('M d, Y', $date); echo $startdat; ?> </span></li>
                  </ul>
                  <div class="clear"></div>
                </div>
              </div>
              <!-- /postHeader -->
              <div class="postContent"> <img src="<?php echo IMAGEURL; ?>uploads/blog/<?php echo ($this->newsDetails['image']); ?>" alt="blog-post1" class="imgLeft" />
                <p><?php echo($this->newsDetails['full_desc']); ?></p>
              </div>
              <!-- /postContent --> 
            </div>
            <!-- /blogBox -->
            <div class="clear"></div>
          </div>
          <!-- /blogLeft -->
          <div class="aside">
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Related News<span></span></h1>
				<?php  foreach ($this->relatedNews as $newsRelated) {
					 $date = strtotime($newsRelated['created_date']);
					 $startdat = date('F j, Y', $date);
				  ?>
                <a href="<?php echo SITEURL; ?>news/details/<?php echo $newsRelated['blog_id']; ?>">
                <dl>
                  <dt><img src="<?php echo SITEURL; ?>uploads/blog/<?php echo $newsRelated['image']; ?>" alt="blog-thumb1" /></dt>
                  <dd>
                    <h4><?php echo $newsRelated['blog_title']; ?> </h4>
                    <span><i class="icon-time"></i><?php echo $startdat; ?> </span> </dd>
                </dl>
				</a>
				<?php } ?>
                <div class="clear"></div>
              </div>
            </div>
            <!-- /rowAside -->
            
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Popular News<span></span></h1>
				<?php  foreach ($this->popularNews as $newspopular) {
					 $date = strtotime($newspopular['created_date']);
					 $startdat = date('M d, Y', $date);
				  ?>
                <a href="<?php echo SITEURL; ?>news/details/<?php echo $newspopular['blog_id']; ?>">
                <dl>
                  <dt><img src="<?php echo SITEURL; ?>uploads/blog/<?php echo $newspopular['image']; ?>" /></dt>
                  <dd>
                    <h4><?php echo $newspopular['blog_title']; ?> </h4>
                    <span><i class="icon-time"></i><?php echo $startdat; ?></span> </dd>
                </dl>
                </a> <a href="blog-inner.html">
				<?php } ?>
            <!-- /rowAside --> 
          </div>
          <div class="clear"></div>
        </div>
        <!-- /blogPgae --> 
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
          