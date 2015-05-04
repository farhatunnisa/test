
  <div class="dashboardPage">
    <div class="pageWidth dashboard">
      <div class="sidebar">
        <ul class="userAccount">
        <li><a>
          <div><img src="<?php if($this->session->gets('image') == '') { echo THEMEURL."images/user.jpg"; } else {
              echo IMAGEURL."uploads/members/".$this->session->gets('image') ; } ?>" alt="user" /></div>
          <h2><?php echo ucwords($this->memberDetails['first_name']." ".$this->memberDetails['middle_name']." ".$this->memberDetails['family_name']); ?></h2>
          <span><?php echo $this->memberDetails['field_of_practice']; ?></span> 
          <span><?php echo ucwords($this->memberDetails['state'].", ".$this->memberDetails['city']); ?></span> </a> 
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
          <li><a href="<?php echo SITEURL;?>members"><i class="icon-user"></i>My Profile</a></li>
          <li><a href="<?php echo SITEURL;?>members/editdetails"><i class="icon-pencil"></i>Edit Profile</a></li>
          <li><a href="<?php echo SITEURL;?>members/changepassword"><i class="icon-key"></i>Change Password</a></li>
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
          <h1 class="bdrTitle">Change Password <span></span></h1>
          <form id="editPassword" method="post" action="<?php echo SITEURL;?>members/updatepassword">
            <div class="regsterDiv dashDetails cpw">
              <div class="title"><i class="icon-key"></i>Change your password</div>
              <ul>
                <li>
                  <div>Old Password<span>*</span></div>
                  <div>
                    <input type="password" class="textBox" name="oldpwd" id="oldpwd" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>New Password<span>*</span></div>
                  <div>
                    <input type="password" class="textBox" name="newpwd" id="newpwd" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Confirm Password<span>*</span></div>
                  <div>
                    <input type="password" class="textBox" name="confirmpwd" id="confirmpwd" />
                  </div>
                </li>
              </ul>
              <button type="submit" class="btn btnBlue" value=""><i class="icon-ok"></i>Save</button>
              <button type="button" class="btn btnRed" value="" onclick="javascript:window.location='<?php echo SITEURL;?>members';"><i class="icon-remove"></i>Cancel</button>
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
  <script>
      $(document).ready(function() {
          $("#editPassword").validate({
              rules:{
                  newpwd: {
                      required:true,
                      minlegth:6
                  },
                  confirmpwd: {
                      required:true,
                      equalTo: "#newpwd"
                  }
              },
              message : {
                  newpwd :'please enter new password',
                  confirmpwd: 'Enter cofirm password same as password '   
                  
                  }
          });
          
      });
      </script>
