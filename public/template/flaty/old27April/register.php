 <div class="container">
    <div class="titleSection parallax register">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Member Registration</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>index">Home</a></li>
                <li><a class="page-selection">Register</a></li>
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
        <div class="registration">
          <form id="SignupForm" method="post" action="<?php echo SITEURL;?>register/registerdetails" enctype="multipart/form-data">
            <ul id="steps">
              <li id="stepDesc0"><i class="icon-user"></i> <span>Personal Information</span><strong></strong></li>
              <li id="stepDesc1"><i class="icon-group"></i> <span>Professional Information</span> <strong></strong></li>
              <li id="stepDesc2"><i class="icon-file-text-alt"></i><span>Registration Information</span><strong></strong></li>
              <li id="stepDesc3"><i class="icon-credit-card"></i><span>Payment</span><strong></strong></li>
            </ul>
            <div class="hrLine"><img src="<?php echo THEMEURL;?>images/inner/hr-line.png" alt="hr-line" /></div>
            <div class="displayDiv">
              <div class="title"><i class="icon-user"></i>Personal Information</div>
              <div class="regsterDiv">
                <ul>
                  <li>
                    <div>Title<span>*</span></div>
                    <div>
                      <select class="selectBox" id="title" name="title">
                        <option name="Dr">Dr.</option>
                        <option name="Miss">Miss.</option>
                        <option name="Mrs">Mrs.</option>
                        <option name="Mr">Mr.</option>
                      </select>
                    </div>
                  </li>
                  <li>
                    <div>First Name<span>*</span></div>
                    <div>
                      <input type="text" class="textBox" id="firstname" name="firstname"/>
                    </div>
                  </li>
                </ul>
                <ul>
                  <li>
                    <div>Middle Name</div>
                    <div>
                      <input type="text" class="textBox" id="mname" name="middle_name" />
                    </div>
                  </li>
                  <li>
                    <div>Family Name<span>*</span></div>
                    <div>
                      <input type="text" class="textBox" id="fname" name="family_name" />
                    </div>
                  </li>
                </ul>
                <ul>
                  <li>
                    <div>Gender</div>
                    <div>
                      <select class="selectBox" id="gender" name="gender">
                        <option name="m">Male</option>
                        <option name="f">Female</option>
                        <option name="o">Other</option>
                      </select>
                    </div>
                  </li>
                  <li>
                    <div>Street Address<span>*</span></div>
                    <div>
                      <input type="text" class="textBox" id="saddress" name="street_address" />
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
                        <option name="india">India</option>
                        <option name="china">China</option>
                        <option name="america">America</option>
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
              </div>
              <p id="step0commands"><a class="next" id="step0Next" href="#">Next <span>Professional Information</span><i class="icon-chevron-sign-right"></i></a></p>
            </div>
            <!-- /displayDiv -->
            <div class="displayDiv">
              <div class="title"><i class="icon-group"></i>Professional Information</div>
              <div class="regsterDiv">
                <ul>
                  <li>
                    <div>Title to be printed on certificate <span>*</span></div>
                    <div>
                      <input type="text" class="textBox" id="printcert" name="print_certificate"/>
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
                    <div>Company/Organization<span>*</span></div>
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
                      <input type="text" class="textBox" id="license" name="license_number" />
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
                        <option name="india">India</option>
                        <option name="china">China</option>
                        <option name="america">America</option>
                      </select>
                    </div>
                  </li>
                  <li>
                    <div>Attach medical license
                      <label>(max upload size 64Mb)</label>
                    </div>
                    <div>
                      <input type="file" class="fileBox" id="medicalLicense" name="file" />
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
                      <input type="text" class="textBox" id="username1" name="username"/>
                    </div>
                  </li>
                </ul>
                <ul>
                  <li>
                    <div>Password<span>*</span></div>
                    <div>
                      <input type="password" class="textBox" id="password1" name="password"/>
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
                      <select class="selectBox" name="dietary_requirements" id="practiceYear">
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Non-Vegetarian">Non-Vegetarian</option>
                        <option value="kosher">Kosher</option>
                      </select>
                    </div>
                  </li>

                </ul>
                <ul>
                  <li class="checkBoxes">
                    <div>How did you hear about us</div>
                    <div>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="Internet research" >
                        Internet research </label>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="email" >
                        AAA email </label>
                      <br>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="Facebook" >
                        Facebook </label>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="LinkedIn" >
                        LinkedIn </label>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="Advertisement" >
                        Advertisement </label>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="Colleague referral" >
                        Colleague referral </label>
                      <label class="inlineLbl">
                        <input type="checkBox" name="list[]" value="Other" >
                        Other </label>
                    </div>
                  </li>
                  <li class="capthcaDiv">
                    <div>Security Code</div>
                    <div>
                      <input type="text" class="textBox" id="captcha" name="captcha" />
                      <span><img src="<?php echo THEMEURL;?>images/captcha.png" alt="captcha" /></span> 
                    </div>
                  </li>
                </ul>
              </div>
              <p id="step1commands"> <a class="next" id="step1Next" href="#">Next <span>Registration Information</span><i class="icon-chevron-sign-right"></i></a> <a class="prev" id="step1Prev" href="#">Back <span>Personal Information</span><i class="icon-chevron-sign-left"></i></a> </p>
            </div>
            <!-- /displayDiv -->
            
            <div class="displayDiv">
              <div class="title"><i class="icon-file-text-alt"></i>Registration Information - Select Membership Categories</div>
              <div class="regInfo">
                <ul>
                  <li>
                    <h3>Associated Member</h3>
                    <p>Opened to qualified Licensed Medical Doctors regardless of specialty.</p>
                    <h4>Membership Fees: <strong>$150</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                  <li>
                    <h3>Fellow Member</h3>
                    <p>In order to obtain Fellow member status, Member must be Associate member for two years and complete Step 1 Course in Aesthetic Medicine and Step 2 Course in Aestheic Medicine. </p>
                    <h4>Membership Fees: <strong>$350</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                </ul>
                <ul>
                  <li>
                    <h3>Residents</h3>
                    <p>Opened to residents and Medical School/College diplomats.</p>
                    <h4>Membership Fees: <strong>$100</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                  <li>
                    <h3>Member</h3>
                    <p>Opened to licesed nurses, aesthetic nurses, licensed aestheticians, hair technicians, surgical assistants, physician assistants, nurses practitioners.</p>
                    <h4>Membership Fees: <strong>$75</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                </ul>
                <ul>
                  <li>
                    <h3>Associated Member</h3>
                    <p>Opened to qualified Licensed Medical Doctors regardless of specialty.</p>
                    <h4>Membership Fees: <strong>$150</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                  <li>
                    <h3>Fellow Member</h3>
                    <p>In order to obtain Fellow member status, Member must be Associate member for two years and complete Step 1 Course in Aesthetic Medicine and Step 2 Course in Aestheic Medicine. </p>
                    <h4>Membership Fees: <strong>$350</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                </ul>
                <ul>
                  <li>
                    <h3>Residents</h3>
                    <p>Opened to residents and Medical School/College diplomats.</p>
                    <h4>Membership Fees: <strong>$100</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                  <li>
                    <h3>Member</h3>
                    <p>Opened to licesed nurses, aesthetic nurses, licensed aestheticians, hair technicians, surgical assistants, physician assistants, nurses practitioners.</p>
                    <h4>Membership Fees: <strong>$75</strong></h4>
                    <label>Pay Now
                      <input type="radio" name="paynow">
                    </label>
                  </li>
                </ul>
              </div>
              <button type="submit" class="btn btnCharcol"><i class="icon-ok"></i>Submit</button>
<!--              <p id="step2commands"> <a class="next" id="step2Next" href="#">Next <span>Payment</span><i class="icon-chevron-sign-right"></i></a> <a class="prev" id="step2Prev" href="#">Back <span>Professional Information</span><i class="icon-chevron-sign-left"></i></a></p>-->
              <p id="step2commands"> <a class="prev" id="step3Prev" href="#">Back <span>Registration Information</span><i class="icon-chevron-sign-left"></i></a></p>
            </div>
            <!-- /displayDiv -->
            
<!--            <div class="displayDiv">
              <div class="title"><i class="icon-credit-card"></i>Payment</div>
              <div class="payment">
                <h4>Your Total Amount: $150</h4>
                <dl>
                  <dt>
                    <input type="radio" name="radio" />
                    <img src="<?php echo THEMEURL;?>images/inner/img-visa.png" alt="img-visa" />
                    <label> Visa Credit Card</label>
                  </dt>
                  <dd>
                    <input type="radio" name="radio" />
                    <img src="<?php echo THEMEURL;?>images/inner/img-paypal.png" alt="img-paypal" />
                    <label>Visa Paypal</label>
                  </dd>
                </dl>
              </div>
              <button type="submit" class="btn btnCharcol"><i class="icon-ok"></i>Submit</button>
              <div class="clear"></div>
              <p id="step3commands"> <a class="prev" id="step3Prev" href="#">Back <span>Registration Information</span><i class="icon-chevron-sign-left"></i></a></p>
            </div>-->
            <!-- /displayDiv -->
            
          </form>
          <div class="clear"></div>
        </div>
        <!-- /registration --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->

