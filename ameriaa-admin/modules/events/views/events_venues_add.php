<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Add Event Venue</li>
      </ul>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Add Event Venue</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <form name="processuser" autocomplete="off" action="<?php echo SITEURL; ?>events/addEventVenue" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
              
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Venue Name</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Venue Name</strong></span>
                                <input type="text" name="venues" id="venues" class="form-control" data-rule-required="true" placeholder="Venue Name"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                    <label class="col-sm-3 col-lg-2 control-label">Country</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>Country</strong></span>
                                <select name="country" id="country" class="form-control chosen select-search" data-placeholder="Country" tabindex="1" data-rule-required="true">
                                    <option value="">Select Country</option>
                                    <?php foreach ($this->country as $country) { ?>
                                    <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country']; ?></option>
                                    <?php } ?>
                                </select>                            
                              </div>
                            </div>
                        </div>
                        <script>
                        $("#country").change(function() {
                            var countryID = $("#country").val();
                                  $.ajax({
                                      type: 'POST',
                                      url: '<?php echo SITEURL; ?>events/getStateNames',
                                      data: 'country='+ countryID,
                                      dataType:'json',
                                      success:function(result){

                                          var html = '';
                                          $.each(result, function(key, value) {                                   
                                              html += '<option value="'+value.state_id+'">'+value.state_name+'</option>';
                                          });
                                          $('#state').html(html);
                                          $('#state').trigger("liszt:updated");
                                     }
                                  });
                          });
                        </script>
                    </div>
                    <div class="clearfix"></div>
              </div>
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Venue Area</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Venue Area</strong></span>
                                <input type="text" name="areas" id="ticket_quantity" class="form-control" data-rule-required="true"  placeholder="Venue Area"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">State</label>
                            <div class="col-lg-12 controls">
                     <div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>State</strong></span>
                    <select name="state" data-placeholder="Select State" id="state"   class="form-control chosen select-search"  data-rule-required="true">
                    <option value=""></option>
                    </select>
                    </div>
                    </div>
                        </div>
                    </div>
                   <script>
                    $("#state").change(function() {
                      var stateID = $("#state").val();                      
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo SITEURL; ?>events/getCityNames',
                                data: 'state='+ stateID,
                                dataType:'json',
                                success:function(result){ 
                                    var html = '';
                                    if(result != 0){
                                        $.each(result, function(key, value) {                                   
                                            html += '<option value="'+value.city_id+'">'+value.city_name+'</option>';
                                        });
                                        $('#city').html(html);
                                        $('#city').trigger("liszt:updated");
                                    } else {
                                        $('#ifothercity').hide().remove();
                                        $("#othercity").show();
                                    }
                               }
                            });
                    });
                  </script>                   
                    <div class="clearfix"></div>
              </div>
                
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Venue Street</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Venue Street</strong></span>
                                <input type="text" name="streets" id="selling_price" class="form-control" data-rule-required="true" placeholder="Venue Street"/>
                              </div>
                            </div>
                     </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" id="ifothercity">
                            <label class="col-sm-3 col-lg-2 control-label">City</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>City</strong></span>
                                <select name="city" data-placeholder="Select city" id="city"  class="form-control chosen select-search" data-rule-required="true">
                                <option value=""></option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="form-group" id="othercity" style="display: none;">
                            <label class="col-sm-3 col-lg-2 control-label">City</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-search"></i><strong>City</strong></span>
                                <input type="text" name="city" class="form-control" data-rule-required="true" placeholder="Enter city" /> 
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
                
                 <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Zipcode</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Zipcode</strong></span>
                                <input type="text" name="zip_code" id="zip_code" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Zipcode"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Phone No</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Phone No</strong></span>
                                <input type="text" name="ven_phno"  id="ven_phno" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Phone No"/>
                              </div>
                            </div>
                        </div>
                    </div>
                     <div class="clearfix"></div>
              </div>
              <div class="col-lg-12 eventticketgroup">
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Venue Url</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-link"></i><strong>Venue Url </strong></span>
                                <input type="text" name="ven_url"  id="ven_url" class="form-control" data-rule-required="true" data-rule-url="true" placeholder="Ex: http://google.com"/>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Status</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"><span class="input-group-addon hide-span"><i class="icon-circle"></i><strong>Status</strong></span>
                  <div class="rc-div">
                    <div class="radio-inline">
                      <input type="radio" name="status" value="1" class="regular-radio" id="r1" />
                      <label for="r1"></label>
                      <label>Active</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" name="status" value="0" class="regular-radio" id="r2" />
                      <label for="r2"></label>
                      <label>Inactive</label>
                    </div>
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                  <input type="hidden" name="event_id" value="<?php echo $this->event_id; ?>" />  
                  <input type="submit" value="Submit" class="btn btn-primary">
                  <a class="btn"href="<?php echo SITEURL; ?>events/venues/<?php echo $this->event_id; ?>">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->