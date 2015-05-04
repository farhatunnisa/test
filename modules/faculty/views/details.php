  <div class="container">
    <div class="titleSection parallax facultyTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Faculty Information</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a href="<?php echo SITEURL;?>faculty">Faculty</a></li>
                <li><a class="page-selection">Faculty Information</a></li>
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
        <div class="facultyPageInner">
          <div class="contentLeft">
            <div class="facTitle wow fadeInLeft animated">
              <h1><?php echo $this->facultyDetails['faculty_name'];?>, <strong><?php echo $this->facultyDetails['designation'];?></strong></h1>
              <span><?php echo $this->facultyDetails['city'];?></span> </div>
            <!-- facTitle -->
            <div class="desc wow fadeInRight animated"> <img src="<?php echo IMAGEURL;?>uploads/faculty/<?php echo $this->facultyDetails['image'];?>" alt="neil-large" class="imgLeft boxShadow wow fadeInUp animated" />
                <p><?php echo $this->facultyDetails['full_desc'];?></p>
            </div>
            <!-- /desc --> 
          </div>
          <!-- /contentLeft -->
          <div class="aside facultyInner">
            <div class="rowAside wow fadeInRight animated">
              <div class="blogAside">
                <h1 class="bdrTitle">Related Faculties<span></span></h1>
                <?php foreach ($this->OtherFacultyList as $otherfaculty) { ?>               
                    <a href="javascript:void(0)">
                    <dl>
                      <dt><img src="<?php echo IMAGEURL;?>uploads/faculty/<?php echo $otherfaculty['image'];?>" alt="ayman" /></dt>
                      <dd>
                        <h4><?php echo $otherfaculty['faculty_name'];?>, <strong><?php echo $otherfaculty['designation'];?></strong></h4>
                        <span><?php echo $otherfaculty['city'];?>, <?php echo $otherfaculty['country'];?></span>
                        <p><?php echo substr($otherfaculty['short_desc'],0,60);?></p>
                      </dd>
                    </dl>
                    </a> 
                <?php } ?>
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
  