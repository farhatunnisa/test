<?php
$permissions = $this->session->gets('permissions');
?>
<!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md breadcrumb-nav">          
          <ul class="movingrowlinks">	
            <li><a href="<?php echo SITEURL; ?>" title="Home">Home </a></li>		
            <li><a href="<?php echo SITEURL."members"; ?>" title="Members">Members</a></li>
            <li><a title="Edit member" style="cursor: auto;">Edit member</a></li>
          </ul><br>
        </div>
        <!-- success or failure message -->
        <?php
            if($this->session->gets('success') || $this->session->gets('fail') ) {
            ?>
            <div id="divsuccess">
                <?php
                if($this->session->gets('fail')) {
                ?>
                <div class="list-group-item bg-error form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-remove-circle"></i> 
                        <?php 
                            echo $this->session->gets('fail'); $this->session->sets('fail', '');
                        ?>
                    </div>
                </div>                
                <?php } else if($this->session->gets('success')) { ?>
                <div class="list-group-item bg-success form-success">
                    <div class="clear text-center">
                        <i class="glyphicon glyphicon-ok-circle"></i> 
                        <?php 
                            echo $this->session->gets('success'); $this->session->sets('success', '');
                        ?>
                    </div>
                </div>               
                <?php } ?>
            </div>
        <?php } ?>
        <!-- success or failure message end -->
        <div class="wrapper-md">
          <div class="panel panel-default">            
            <div class="panel-heading font-bold">
              Edit member
            </div>
            <div class="panel-body">
              <form id="validation-form" class="form-horizontal" action="<?php echo SITEURL; ?>members/updateMemberDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" data-rule-required="true" 
                           value="<?php echo $this->membersDetails['title']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">First name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->membersDetails['first_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Middle name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name="middle_name" placeholder="Enter middle name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->membersDetails['middle_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Last name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" data-rule-required="true" 
                           data-rule-minlength="3" value="<?php echo $this->membersDetails['family_name']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Title to be printed on certificate</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_on_certificate" name="title_on_certificate" placeholder="Enter certificate title" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['title_on_certificate']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Company/organization </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="company_org" name="company_org" placeholder="Enter company or organization name" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['company_org']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Professional Designation</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="professional_designation" name="professional_designation" placeholder="Enter Professional Designation" 
                           data-rule-required="true" value="<?php echo $this->membersDetails['professional_design']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Medical license number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="license_number" name="license_number" placeholder="Enter license number" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['licence_number']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Expiry date </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="date-range13" name="expiry_date" placeholder="mm/dd/yyyy" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['expiry_date']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Country Issued</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="country_issued" name="country_issued" placeholder="mm/dd/yyyy" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['country_issued']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Field of practice</label>
                  <div class="col-sm-10">
                    <select id="field_of_practice" name="field_of_practice" class="form-control m-b">
                      <option value="Aesthetic Medicine" <?php if($this->membersDetails['field_of_practice'] == 'Aesthetic Medicine') { echo "selected";} ?>>Aesthetic Medicine</option>
                      <option value="Aesthetic Surgery" <?php if($this->membersDetails['field_of_practice'] == 'Aesthetic Surgery') { echo "selected";} ?>>Aesthetic Surgery</option>
                      <option value="Both" <?php if($this->membersDetails['field_of_practice'] == 'Both') { echo "selected";} ?>>Both</option>                        
                    </select>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">If yes, specify no.of years</label>
                  <div class="col-sm-10">
                    <select id="field_of_practice" name="no_of_years" class="form-control m-b">
                      <option value="Less than a year" <?php if($this->membersDetails['practice_experience'] == 'Less than a year') { echo "selected";} ?>>Less than a year</option>
                      <option value="1-5 years" <?php if($this->membersDetails['practice_experience'] == '1-5 years') { echo "selected";} ?>>1-5 years</option>
                      <option value="More than 5 years" <?php if($this->membersDetails['practice_experience'] == 'More than 5 years') { echo "selected";} ?>>More than 5 years</option>                        
                    </select>
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1" >Address</label>
                  <div class="col-sm-10">
                      <textarea id="address" name="address" class="form-control" rows='6'><?php echo $this->membersDetails['address'] ?></textarea>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">City</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter city name" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['city']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">State</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter state name" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['state']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Zip code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter zip code" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['zip_code']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Country</label>
                  <div class="col-sm-10">                      
                    <select ui-jq="chosen" class="form-control m-b" id="country" name="country" data-rule-required="true">
                        <?php
                          $data = json_decode($this->countriesList, true);
                          foreach ($data as $country) { ?>
                          <option value="<?php echo $country['country_code']; ?>" <?php if($country['country_code'] == $this->membersDetails['country']) { echo "selected"; } ?>><?php echo $country['country_name']; ?></option>
                          <?php } ?>
                    </select>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" data-rule-required="true" 
                           data-rule-number="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['phone']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Cell phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" data-rule-required="true" 
                           data-rule-number="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['mobile']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Fax</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax code" data-rule-required="true" 
                           data-rule-number="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['fax']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" 
                           data-rule-email="true" data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['email']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Website</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter Website" 
                           data-rule-required="true" data-rule-minlength="3" value="<?php echo $this->membersDetails['website']; ?>">
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-id-1">Dietary requirements</label>
                  <div class="col-sm-10">                      
                    <select ui-jq="chosen" class="form-control m-b" id="country" name="dietary_req" data-rule-required="true">                        
                      <option value="Vegetarian" <?php if($this->membersDetails['dietary_requirement'] == "Vegetarian") { echo "selected";} ?>>Vegetarian</option>
                      <option value="Non-Vegetarian" <?php if($this->membersDetails['dietary_requirement'] == "Non-Vegetarian") { echo "selected";} ?>>Non-Vegetarian</option>
                      <option value="Kosher" <?php if($this->membersDetails['dietary_requirement'] == "Kosher") { echo "selected";} ?>>Kosher</option>
                    </select>                      
                  </div>
                </div>                  
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="old_image" id="old_image" vavalue="<?php echo $this->membersDetails['image']; ?>" />
                      <input ui-jq="filestyle" type="file" id="image" name="image" data-icon="false" data-classButton="btn btn-default" 
                             data-classInput="form-control inline v-middle input-s"  >                      
                    </div>
                    <div class="col-sm-1">
                        <img src="<?php echo SITEURL."uploads/members/".$this->membersDetails['image']; ?>" alt="" title="" style="width: 30px; height: 30px;" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="gender" value="m" <?php if($this->membersDetails['gender'] == "m"){ echo "checked"; } ?> >
                          <i></i>
                          Male
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="gender" value="f" <?php if($this->membersDetails['gender'] == "f"){ echo "checked"; } ?>>
                          <i></i>
                          Female
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="gender" value="o" <?php if($this->membersDetails['gender'] == "o"){ echo "checked"; } ?>>
                          <i></i>
                          Other
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="1" <?php if($this->membersDetails['status'] == 1){ echo "checked"; } ?> >
                          <i></i>
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label class="i-checks">
                          <input type="radio" name="status" value="0" <?php if($this->membersDetails['status'] == 0){ echo "checked"; } ?>>
                          <i></i>
                          No
                        </label>
                      </div>
                      <div style="clear: both;"></div>
                    </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <input type="hidden" name="member_id" value="<?php echo $this->membersDetails['member_id'];?>" />                     
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" id="cancel" class="btn btn-default">Cancel</button>                    
                  </div>
                </div>
              </form>
                
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- / content -->
  <script type="text/javascript"> 
    // <![CDATA[
    $(document).ready(function () {        
        $("#divsuccess").fadeOut(5000);     // success or failure div hide  
    });
</script>
<script type="text/javascript">
    $(function() {        
        $('#date-range13').dateRangePicker({
            autoClose: true,
            singleDate : true,
            showShortcuts: false 
        });
    });
</script>