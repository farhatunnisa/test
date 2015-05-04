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
          <form id="editProf" method="post" action="<?php echo SITEURL;?>members/updatedetails" enctype="multipart/form-data">
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
                    <input type="text" class="textBox" id="familyname" name="fname" value="<?php echo $this->memberDetails['family_name']; ?>" />
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
                    <input type="text" class="textBox" id="saddress" name="saddress" value="<?php echo $this->memberDetails['address']; ?>" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Country<span>*</span></div>
                  <div>
                    <select class="selectBox" name="country" id="country">
                      <option >-- Select country --</option>
                      <?php foreach ($this->countrieslist as $countrylist) { ?>
                      <option value="<?php echo $countrylist['country_code']; ?>" <?php if($countrylist['country_code'] == $this->memberDetails['country']){ echo "selected";} ?> ><?php echo $countrylist['country_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </li>
                <li>
                  <div>State</div>
                  <div>
                    <input type="text" class="textBox" id="state" name="state" value="<?php echo $this->memberDetails['state'];?>" />
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>City<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="city" name="city" value="<?php echo $this->memberDetails['city'];?>"/>
                  </div>
                </li>
                <li>
                  <div>Zip Code<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="zipcode" name="zipcode" value="<?php echo $this->memberDetails['zip_code'];?>"/>
                  </div>
                </li>
                
              </ul>
              <ul>
                <li>
                  <div>Mobile<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="mobile" name="mobile"  value="<?php echo $this->memberDetails['mobile']; ?>"/>
                  </div>
                </li>
                <li>
                  <div>Fax</div>
                  <div>
                    <input type="text" class="textBox" id="fax" name="fax" value="<?php echo $this->memberDetails['fax']; ?>"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li class="sepSpace">
                  <div>Upload Profile Image</div>
                  <div>
                    <input type="file" class="fileBox" id="uploadimage" name="image" />
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
                    <input type="text" class="textBox" id="printcert" name="printcert" value="<?php echo $this->memberDetails['title_on_certificate']; ?>"/>
                  </div>
                </li>
                <li>
                  <div>Title to be printed on certificate confirmation <span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="printCertConfirm" name="printCertConfirm" value="<?php echo $this->memberDetails['title_on_certificate']; ?>"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Organization<span>*</span></div>
                  <div>
                    <input type="text" class="textBox" id="organization" name="organization" value="<?php echo $this->memberDetails['company_org']; ?>" />
                  </div>
                </li>
                <li>
                  <div>Professional Designation <span>*</span></div>
                  <div>
                    <select class="selectBox" name="profDesignation" id="profDesignation">
                      <option value="DR" <?php if($this->memberDetails['professional_design'] == 'DR') echo 'selected';?>>DR</option>
                      <option value="MD" <?php if($this->memberDetails['professional_design'] == 'MD') echo 'selected';?>>MD</option>
                      <option value="LPN" <?php if($this->memberDetails['professional_design'] == 'LPN') echo 'selected';?>>LPN</option>
                      <option value="ESTH" <?php if($this->memberDetails['professional_design'] == 'ESTH') echo 'selected';?>>ESTH</option>
                      <option value="DDS" <?php if($this->memberDetails['professional_design'] == 'DDS') echo 'selected';?>>DDS</option>
                      <option value="DO" <?php if($this->memberDetails['professional_design'] == 'DO') echo 'selected';?>>DO</option>
                      <option value="RN" <?php if($this->memberDetails['professional_design'] == 'RN') echo 'selected';?>>RN</option>
                      <option value="LVN" <?php if($this->memberDetails['professional_design'] == 'LVN') echo 'selected';?>>LVN</option>
                      <option value="NP" <?php if($this->memberDetails['professional_design'] == 'NP') echo 'selected';?>>NP</option>
                      <option value="PA" <?php if($this->memberDetails['professional_design'] == 'PA') echo 'selected';?>>PA</option>
                      <option value="DMD" <?php if($this->memberDetails['professional_design'] == 'DMD') echo 'selected';?>>DMD</option>
                      <option value="N/A" <?php if($this->memberDetails['professional_design'] == 'N/A') echo 'selected';?>>N/A</option>
                    </select>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Medical License Number </div>
                  <div>
                    <input type="text" class="textBox" id="license" name="license"  value="<?php echo $this->memberDetails['licence_number']; ?>"/>
                  </div>
                </li>
                <li>
                  <div>Expiry Date</div>
                  <div>
                    <input type="text" class="textBox" id="date-range13" name="expDate" value="<?php echo $this->memberDetails['expiry_date']; ?>"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Country Issued </div>
                  <div>
                    <select class="selectBox" name="countryIssued" id="countryIssued">
                      <option >-- Select country --</option>
                      <?php foreach ($this->countrieslist as $countrylist) { ?>
                      <option value="<?php echo $countrylist['country_code']; ?>" <?php if($countrylist['country_code'] == $this->memberDetails['country_issued']){ echo "selected";} ?> ><?php echo $countrylist['country_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </li>
                <li>
                  <div>Attach medical license
                    <label>(max upload size 64Mb)</label>
                  </div>
                  <div>
                    <input type="file" class="fileBox" id="medicalLicense" name="licence_attach"/>
                  </div>
                </li>
              </ul>
              <ul>
                <li>
                  <div>Field of practice</div>
                  <div>
                    <select class="selectBox" name="pracitce" id="pracitce">
                      <option value="Aesthetic Medicine" <?php if($this->memberDetails['field_of_practice'] == 'Aesthetic Medicine') echo 'selected';?>>Aesthetic Medicine</option>
                      <option value="Aesthetic Surgery" <?php if($this->memberDetails['field_of_practice'] == 'Aesthetic Surgery') echo 'selected';?>>Aesthetic Surgery</option>
                      <option value="Both" <?php if($this->memberDetails['field_of_practice'] == 'Both') echo 'selected';?>>Both</option>
                    </select>
                  </div>
                </li>
                <li>
                  <div>If yes, specify practicing for no. of years</div>
                  <div>
                    <select class="selectBox" name="practiceYear" id="practiceYear">
                      <option value="Less than a year" <?php if($this->memberDetails['practice_experience'] == 'Less than a year') echo 'selected';?>>Less than a year</option>
                      <option value="1-5 years" <?php if($this->memberDetails['practice_experience'] == '1-5 years') echo 'selected';?>>1-5 years</option>
                      <option value="More than 5 years" <?php if($this->memberDetails['practice_experience'] == 'More than 5 years') echo 'selected';?>>More than 5 years</option>
                    </select>
                  </div>
                </li>
              </ul>
              
              <ul>
                <li>
                  <div>Website</div>
                  <div>
                    <input type="text" class="textBox" id="website" name="website" value="<?php echo $this->memberDetails['website']; ?>"/>
                  </div>
                </li>
                <li>
                  <div>Dietary Requirements</div>
                  <div>
                    <select class="selectBox" name="dietary_requirements" id="dietary_requirements">
                        <option value="Vegetarian" <?php if($this->memberDetails['dietary_requirement'] == 'Vegetarian') echo 'selected';?>>Vegetarian</option>
                        <option value="Non-Vegetarian" <?php if($this->memberDetails['dietary_requirement'] == 'Non-Vegetarian') echo 'selected';?>>Non-Vegetarian</option>
                        <option value="kosher" <?php if($this->memberDetails['dietary_requirement'] == 'kosher') echo 'selected';?>>Kosher</option>
                      </select>
                  </div>
                </li>
              </ul>
            </div>
            <button type="submit" class="btn btnBlue" value=""><i class="icon-ok"></i>Save</button>
            <a href="<?php echo SITEURL;?>members"class="btn btnRed" value=""><i class="icon-remove"></i>Cancel</a>
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
      $(document).ready(function(){
          //alert("hii");
          $("#editProf").validate({
              
             rules : {
                title: {
                  required:true  
                }, 
                firstname: {
                    required:true 
                },
                familyname: {
                    required:true 
                },
                saddress: {
                    required:true 
                },
                city: {
                    required:true 
                },
                email: {
                    required:true ,
                    email:true
                },
                zipcode: {
                    required:true 
                },
                country: {
                    required:true 
                },
                mobile: {
                    required:true,
                    number:true
                },
                printcert:{
                    required:true 
                },
                printCertConfirm:{
                    required:true ,
                    equalTo : "#printcert"
                }
 
             },
             message: {
                 title: {
                     required:"please enter title"
                 },
                 firstname: {
                     required:"please enter first name"
                 },
                 familyname: {
                     required:"please enter family name"
                 },
                 saddress: {
                     required:"please enter address"
                 },
                 city: {
                     required:"please enter city"
                 },
                 email: {
                     required:"please enter email"
                 },
                 zipcode: {
                     required:"please enter zipcode"
                 },
                 country: {
                     required:"please enter country"
                 },
                 mobile: {
                     requied:"please enter mobile"
                 }
                 
             }
              
          });
          
      });
      </script>
<link rel="stylesheet" href="<?php echo BACKTHEMEURL; ?>assets/datepickers/css/daterangepicker.css" />
<script src="<?php echo BACKTHEMEURL; ?>assets/datepickers/js/moment.min.js"></script>
<script src="<?php echo BACKTHEMEURL; ?>assets/datepickers/js/jquery.daterangepicker.js"></script>
<script type="text/javascript">
    $(function() {        
        $('#date-range13').dateRangePicker({
            autoClose: true,
            singleDate : true,
            showShortcuts: false 
        });
    });
</script>