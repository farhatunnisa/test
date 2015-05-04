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
          <li><a class="<?php if($this->getUrl(2) == 'members' && $this->getUrl(3) == '') { echo "active"; } ?>" href="<?php echo SITEURL.'members'; ?>"><i class="icon-user"></i>My Profile</a></li>
          <li><a class="<?php if($this->getUrl(3) == 'editdetails') { echo "active"; } ?>" href="<?php echo SITEURL.'members/editdetails';?>">
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
          <h1 class="bdrTitle">Edit Profile<span></span></h1>
          <form id="editProf">
            <div class="regsterDiv dashDetails rowSpace">
              <div class="title"><i class="icon-user"></i>Personal Information</div>
              <ul>
                <li>
                  <div>Title<span>*</span></div>
                  <div>
                    <select class="selectBox" id="title" name="title">
                      <option value="Dr" <?php if($this->memberDetails['title'] == "Dr") { echo "selected"; } ?>>Dr.</option>
                      <option value="Miss" <?php if($this->memberDetails['title'] == "Miss") { echo "selected"; } ?>>Miss.</option>
                      <option value="Mrs" <?php if($this->memberDetails['title'] == "Mrs") { echo "selected"; } ?>>Mrs.</option>
                      <option value="Mr" <?php if($this->memberDetails['title'] == "Mr") { echo "selected"; } ?>>Mr.</option>
                    </select>
                  </div>
                </li>
                <li>
                  <div>First Name<span>*</span></div>
                  <div>
                      <input type="text" class="textBox" id="firstname" name="firstname" value="<?php echo $this->memberDetails['first_name']; ?>"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Middle Name</div>
                  <div>
                    <input type="text" class="textBox" id="mname" name="mname" value="<?php echo $this->memberDetails['middle_name']; ?>" />
                  </div>
                </li>
                <li>
                  <div>Family Name<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="fname" name="fname" value="<?php echo $this->memberDetails['family_name']; ?>" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Gender</div>
                  <div>
                    <select class="selectBox" id="gender" name="gender">
                      <option value="m" <?php if($this->memberDetails['gender'] == "m") { echo "selected"; } ?>>Male</option>
                      <option value="f" <?php if($this->memberDetails['gender'] == "f") { echo "selected"; } ?>>Female</option>
                      <option value="o" <?php if($this->memberDetails['gender'] == "o") { echo "selected"; } ?> >Other</option>
                    </select>
                  </div>
                </li>
                <li>
                  <div>Street Address<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="saddress" name="saddress" value="<?php echo $this->memberDetails['family_name']; ?>" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>State</div>
                  <div>
                    <input type="text" class="textBox" id="state" name="state" />
                  </div>
                </li>
                <li>
                  <div>City<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="city" name="city" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Zip Code<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="zipcode" name="zipcode" />
                  </div>
                </li>
                <li>
                  <div>Country<span>*</span></div>
                  <div>
                    <select class="selectBox" name="country" id="country">
                      <option>India</option>
                      <option>China</option>
                      <option>America</option>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Mobile<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="mobile" name="mobile" />
                  </div>
                </li>
                <li>
                  <div>Fax</div>
                  <div>
                    <input type="text" class="textBox" id="fax" name="fax" />
                  </div>
                </li>
              </ul>
              <ul>
                <li class="sepSpace">
                  <div>Upload Image</div>
                  <div>
                    <input type="file" class="fileBox" id="uploadimage" name="uploadimage" />
                  </div>
                </li>
              </ul>
            </div>
            <div class="regsterDiv dashDetails rowSpace">
              <div class="title"><i class="icon-group"></i>Professional Information</div>
              <ul>
                <li>
                  <div>Title to be printed on certificate <span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="printcert" name="printcert"/>
                  </div>
                </li>
                <li>
                  <div>Title to be printed on certificate confirmation <span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="printCertConfirm" name="printCertConfirm"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Organization<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="organization" name="organization" />
                  </div>
                </li>
                <li>
                  <div>Professional Designation <span>*</span></div>
                  <div>
                    <select class="selectBox" name="profDesignation" id="profDesignation">
                      <option value="DR">DR</option>
                      <option value="MD">MD</option>
                      <option value="LPN">LPN</option>
                      <option value="ESTH">ESTH</option>
                      <option value="DDS">DDS</option>
                      <option value="DO">DO</option>
                      <option value="RN">RN</option>
                      <option value="LVN">LVN</option>
                      <option value="NP">NP</option>
                      <option value="PA">PA</option>
                      <option value="DMD">DMD</option>
                      <option value="N/A">N/A</option>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Medical License Number </div>
                  <div>
                    <input type="text" class="textBox" id="license" name="license" />
                  </div>
                </li>
                <li>
                  <div>Expiry Date</div>
                  <div>
                    <input type="text" class="textBox" id="expDate" name="expDate" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Country Issued </div>
                  <div>
                    <select class="selectBox" name="countryIssued" id="countryIssued">
                      <option>India</option>
                      <option>China</option>
                      <option>America</option>
                    </select>
                  </div>
                </li>
                <li>
                  <div>Attach medical license
                    <label>(max upload size 64Mb)</label>
                  </div>
                  <div>
                    <input type="file" class="fileBox" id="medicalLicense" name="medicalLicense" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Field of practice</div>
                  <div>
                    <select class="selectBox" name="pracitce" id="pracitce">
                      <option value="Aesthetic Medicine">Aesthetic Medicine</option>
                      <option value="Aesthetic Surgery">Aesthetic Surgery</option>
                      <option value="Both">Both</option>
                    </select>
                  </div>
                </li>
                <li>
                  <div>If yes, specify practicing for no. of years</div>
                  <div>
                    <select class="selectBox" name="practiceYear" id="practiceYear">
                      <option value="Less than a year">Less than a year</option>
                      <option value="1-5 years">1-5 years</option>
                      <option value="More than 5 years">More than 5 years</option>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Email<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="email" name="email"/>
                  </div>
                </li>
                <li>
                  <div>Username<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="username1" name="username1"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Password<span>*</span></div>
                  <div>
                    <input type="password" class="textBox" id="password1" name="password1"/>
                  </div>
                </li>
                <li>
                  <div>Confirm Password<span>*</span></div>
                  <div>
                    <input type="password" class="textBox" id="Cpassword" name="Cpassword"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Website</div>
                  <div>
                    <input type="text" class="textBox" id="website" name="website" />
                  </div>
                </li>
                <li>
                  <div>Dietary Requirements</div>
                  <div>
                    <input type="text" class="textBox" id="dietaryRequirements" name="dietaryRequirements" />
                  </div>
                </li>
              </ul>
            </div>
            <button type="submit" class="btn btnBlue" value=""><i class="icon-ok"></i>Save</button>
            <button type="submit" class="btn btnRed" value=""><i class="icon-remove"></i>Cancel</button>
          </form>
        </div>
      </div>
      <!-- /dashboardInfo -->
      <div class="clear"></div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /dashboard -->