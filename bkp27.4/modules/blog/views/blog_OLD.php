<div class="dashboardPage">
  <div class="pageWidth dashboard">
    
      <div id="SecondMenu">
        <div class="MenuHeading"><i class="icon-gears"></i>Dashboard Settings</div>
      </div>
      <!-- /sideBar -->
      
      <div class="dashboardInfo">
        <div class="dashboardInner">
          <h1 class="bdrTitle">Blog list<span></span></h1><br>
            <?php 
                //echo "<pre>";
                //print_r($this->blogList);
                foreach ($this->blogList as $bloglist) { ?>
              <div>
                  <h2><?php echo $bloglist['blog_title']; ?></h2>
                  <p><strong>Short description: </strong><?php echo $bloglist['short_desc']; ?></p>
                  <p><strong>Full description: </strong><?php echo $bloglist['full_desc']; ?></p>
                  <p><strong>Posted by: </strong><?php echo $bloglist['posted_by']; ?></p>
                  <p><strong>Created date: </strong><?php echo $bloglist['created_date']; ?></p>
                  <a href="<?php echo SITEURL."blog/details/".$bloglist['blog_id']; ?>" class="btn btnCharcol" title="">View full details</a>
              </div>
              <?php } ?>
              
        </div>
      </div>
      <!-- /dashboardInfo -->
      <div class="clear"></div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /dashboard -->