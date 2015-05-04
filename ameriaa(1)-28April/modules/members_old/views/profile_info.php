<div class="dashboardPage">
  <div class="pageWidth dashboard">
    <div class="sidebar">
      <ul class="userAccount">
        <li><a>
          <div><img src="<?php if($this->session->gets('image') == '') { echo THEMEURL."images/user.jpg"; } else {
              echo SITEURL."uploads/members/".$this->session->gets('image') ; } ?>" alt="user" /></div>
          <h2>Lorem ipsum dolor</h2>
          <span>Aesthetic Medicine</span> <span>Alexandria, Egypt</span> </a> 
        </li>
      </ul>
      <ul class="accountBdr acoountBdrChild">
        <li></li>
      </ul>
      <ul class="accountList">
          <li>
            <h2 class="bdrTitle">My Account<span></span></h2>
          </li>
          <li><a href="javascript:void(0)"><i class="icon-dashboard"></i>Dashboard</a></li>
          <li><a class="<?php if($this->getUrl(2) == 'members') { echo "active"; } ?>" href="<?php echo SITEURL.'members'; ?>"><i class="icon-user"></i>My Profile</a></li>
          <li><a class="" href="<?php echo SITEURL.'members/editdetails';?>">
                  <i class="icon-pencil"></i>Edit Profile</a>
          </li>
          <li><a href="<?php echo SITEURL.'members/changepassword'; ?>"><i class="icon-key"></i>Change Password</a></li>
      </ul>
      <ul class="accountBdr">
          <li></li>
      </ul>
      <ul class="accountList">
          <li>
            <h2 class="bdrTitle">My Quiz<span></span></h2>
          </li>
          <li><a href="javascript:void(0)"><i class="icon-shield"></i>Take Quiz</a></li>
          <li><a href="javascript:void(0)"><i class="icon-file-text"></i>Register Quiz</a></li>
      </ul>
      </div>
      <div id="SecondMenu">
        <div class="MenuHeading"><i class="icon-gears"></i>Dashboard Settings</div>
      </div>
      <!-- /sideBar -->
      
      <div class="dashboardInfo">
        <div class="dashboardInner">
          <h1 class="bdrTitle">My Profile<span></span></h1>
          <form id="myprofile">
            <div class="dashDetails regsterDiv profileInfo rowSpace">
              <div class="title"><i class="icon-user"></i>Personal Information</div>
              <ul>
                <li>
                  <div>Title:</div>
                  <div> <?php echo $this->memberDetails['title']; ?> </div>
                </li>
                <li>
                  <div>First Name:</div>
                  <div> <?php echo $this->memberDetails['first_name']; ?> </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Middle Name:</div>
                  <div> <?php echo $this->memberDetails['middle_name']; ?> </div>
                </li>
                <li>
                  <div>Family Name:</div>
                  <div> <?php echo $this->memberDetails['family_name']; ?> </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Gender:</div>
                  <div> 
                    <?php if($this->memberDetails['gender'] == 'm') {
                            echo "Male";
                          } else if($this->memberDetails['gender'] == 'f') {
                            echo "Female";  
                          } else if($this->memberDetails['gender'] == 'o') {
                            echo "Other";
                          }
                    ?> </div>
                  
                </li>
                <li>
                  <div>Street Address:</div>
                  <div> <?php echo $this->memberDetails['address']; ?> </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>State:</div>
                  <div> <?php echo $this->memberDetails['state']; ?> </div>
                </li>
                <li>
                  <div>City:</div>
                  <div> <?php echo $this->memberDetails['city']; ?> </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Zip Code:</div>
                  <div> <?php echo $this->memberDetails['zip_code']; ?> </div>
                </li>
                <li>
                  <div>Country:</div>
                  <div> <?php echo $this->memberDetails['country']; ?> </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Mobile:</div>
                  <div> <?php echo $this->memberDetails['mobile']; ?> </div>
                </li>
                <li>
                  <div>Fax:</div>
                  <div> <?php echo $this->memberDetails['fax']; ?> </div>
                </li>
              </ul>
            </div>
            <div class="regsterDiv dashDetails profileInfo rowSpace">
              <div class="title"><i class="icon-group"></i>Professional Information</div>
              <ul>
                <li>
                  <div>Title to be printed on certificate:</div>
                  <div> <?php echo $this->memberDetails['title_on_certificate']; ?> </div>
                </li> 
                <li>
                  <div>Organization:</div>
                  <div> <?php echo $this->memberDetails['company_org']; ?> </div>
                </li>
              </ul>
              <ul>                
                <li>
                  <div>Professional Designation:</div>
                  <div> <?php echo $this->memberDetails['professional_design']; ?> </div>
                </li>
                <li>
                  <div>Medical License Number:</div>
                  <div><?php echo $this->memberDetails['licence_number']; ?></div>
                </li>
              </ul>
              <ul>                
                <li>
                  <div>Expiry Date:</div>
                  <div> <?php echo $this->memberDetails['expiry_date']; ?> </div>
                </li>
                <li>
                  <div>Country Issued:</div>
                  <div> <?php echo $this->memberDetails['country_issued']; ?> </div>
                </li>
              </ul>
              <ul>                
                <li>
                  <div>Attach medical license:</div>
                  <div><a href="<?php echo SITEURL."members/"; ?>" title="" >
                         <?php echo $this->memberDetails['attach_licence']; ?> <div> <i class="icon-download"></i> </div></a>
                  </div>
                </li>
                <li>
                  <div>Field of practice:</div>
                  <div> <?php echo $this->memberDetails['country_issued']; ?> </div>
                </li>
              </ul>
              <ul>                
                <li>
                  <div>Practice experience:</div>
                  <div> <?php echo $this->memberDetails['practice_experience']; ?> </div>
                </li>
                <li>
                  <div>Email:</div>
                  <div> <?php echo $this->memberDetails['email']; ?> </div>
                </li>
              </ul>              
              <ul>
                <li>
                  <div>Website:</div>
                  <div> <?php echo $this->memberDetails['website']; ?> </div>
                </li>
                <li>
                  <div>Dietary Requirements:</div>
                  <div> <?php echo $this->memberDetails['dietary_requirement']; ?> </div>
                </li>
              </ul>
            </div>
          </form>
        </div>
      </div>
      <!-- /dashboardInfo -->
      <div class="clear"></div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /dashboard -->