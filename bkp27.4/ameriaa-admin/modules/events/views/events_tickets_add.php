<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Add Event Ticket</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
    
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Add Event Ticket</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <form name="processuser" autocomplete="off" action="<?php echo SITEURL; ?>events/addEventTicket" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
              
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Ticket Name</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Name</strong></span>
                    <input type="text" name="ticket_name" id="ticket_name" class="form-control" data-rule-required="true"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Ticket Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Ticket Description</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" name="ticket_desc" placeholder="Write Something here..."></textarea>
                  </div>
                </div>
              </div>
                
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Ticket Price</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Price</strong></span>
                                <input type="text" name="ticket_price" id="ticket_price" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Ticket Price"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Selling Price</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Selling Price</strong></span>
                                <input type="text" name="selling_price" id="selling_price" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Selling Price"/>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Ticket Quantity</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Quantity</strong></span>
                                <input type="text" name="ticket_quantity" id="ticket_quantity" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Ticket Quantity"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Ticket Currency</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Currency</strong></span>
                                <select name="ticket_currency" class="form-control chosen select-search" data-placeholder="Choose Language" tabindex="1" data-rule-required="true">
                                    <option value="">Select Currency</option>
                                    <?php foreach ($this->currency as $currency) { ?>
                                    <option value="<?php echo $currency['currency_code']; ?>"><?php echo $currency['currency']; ?></option>
                                    <?php } ?>
                                </select>                                  
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Min Per Person</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Min Per Person</strong></span>
                                <input type="text" name="min_perbooking" id="min_perbooking" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Min Tickets Per Person"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Max Per Person</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Max Per Person</strong></span>
                                <input type="text" name="max_perbooking" id="max_perbooking" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Max Tickets Per Person"/>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Start Dates Of Sales</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Start Dates Of Sales</strong></span>
                                  <div style="width:200px;float:left;" class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> 
                                    <input name="start_sale_date" id="start_sale_date" class="form-control date-picker" size="16" type="text" value="12-02-2012" />
                                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> 
                                  </div>
                                  <div class="input-group bootstrap-timepicker-component">
                                    <input name="start_sale_time" id="start_sale_time" class="form-control timepicker-default" type="text" />
                                    <span class="input-group-addon align"><i class="icon-time"></i></span> 
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">End Dates Of Sales</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>End Dates Of Sales</strong></span>
                                  <div style="width:200px;float:left;" class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> 
                                    <input name="end_sale_date" id="end_sale_date" class="form-control date-picker" size="16" type="text" value="12-02-2012" />
                                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> 
                                  </div>
                                  <div class="input-group bootstrap-timepicker-component">
                                      <input name="end_sale_time" id="end_sale_time" class="form-control timepicker-default" type="text" />
                                      <span class="input-group-addon align"><i class="icon-time"></i></span> 
                                  </div>
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
                  <a class="btn"href="<?php echo SITEURL; ?>events/tickets/<?php echo $this->event_id; ?>">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->