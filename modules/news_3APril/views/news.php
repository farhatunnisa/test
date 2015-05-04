<div class="dashboardPage">
  <div class="pageWidth dashboard">
    
      <div id="SecondMenu">
        <div class="MenuHeading"><i class="icon-gears"></i>Dashboard Settings</div>
      </div>
      <!-- /sideBar -->
      
      <div class="dashboardInfo">
        <div class="dashboardInner">
          <h1 class="bdrTitle">News list<span></span></h1><br>
            <?php 
                //echo "<pre>";
                //print_r($this->blogList);
                foreach ($this->newsList as $newslist) { ?>
              <div>
                  <h2><?php echo $newslist['blog_title']; ?></h2>
                  <p><strong>Short description: </strong><?php echo $newslist['short_desc']; ?></p>
                  <p><strong>Full description: </strong><?php echo $newslist['full_desc']; ?></p>
                  <p><strong>Posted by: </strong><?php echo $newslist['posted_by']; ?></p>
                  <p><strong>Created date: </strong><?php echo $newslist['created_date']; ?></p>
                  <a href="<?php echo SITEURL."news/details/".$newslist['blog_id']; ?>" class="btn btnCharcol" title="">View full details</a>
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