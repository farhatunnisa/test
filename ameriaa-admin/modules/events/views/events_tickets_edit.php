<!-- BEGIN Content -->
  <div id="main-content"> 
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> <a href="<?php echo SITEURL; ?>dashboard">Home</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li> <a href="<?php echo SITEURL; ?>events">Events</a> <span class="divider"><i class="icon-angle-right"></i></span> </li>
        <li class="active">Edit Event Ticket</li>
      </ul>
    </div>
    <!-- END Breadcrumb --> 
     <?php 
          $eventticketups = $this->session->gets('eventticketups');
          $eventticketupf = $this->session->gets('eventticketupf');
    ?>
    <?php if($eventticketups != ''){ ?>
    <div class="success_msg"> 
        <i class="icon-check"></i><span class="text-success"><?php echo $eventticketups; $this->session->sets('eventticketups', '');  ?></span><br />
        
    </div>
    <?php } else if($eventticketupf != '') { ?>
    <div class="success_msg"> 
       
        <i class="icon-remove"></i><span class="text-error"><?php echo $eventticketupf; $this->session->sets('eventticketupf', '');  ?></span><br />
        
    </div>
    <?php  } ?>
    <!-- BEGIN Main Content --> 
    <!-- form inputs -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-title">
            <h3><i class="icon-reorder"></i>Edit Event Ticket</h3>
            <div class="box-tool"> <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a> </div>
          </div>
          <div class="box-content frms">
            <form name="processuser" autocomplete="off" action="<?php echo SITEURL; ?>events/updateEventTicket" method="post" id="validation-form" class="form-horizontal" enctype="multipart/form-data">
              
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Ticket Name</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Name</strong></span>
                    <input type="text" name="ticket_name" value="<?php echo $this->eventTicket['ticket_name']; ?>" id="ticket_name" class="form-control" data-rule-required="true"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Ticket Description</label>
                <div class="col-lg-12 controls">
                  <div class="input-group"> <span class="input-group-addon" style="vertical-align:top;"><i class="glyphicon glyphicon-user"></i><strong>Ticket Description</strong></span>
                 	<textarea data-rule-minlength="3" rows="5" data-rule-required="true" class="form-control" name="ticket_desc" placeholder="Write Something here..."><?php echo $this->eventTicket['ticket_desc']; ?></textarea>
                  </div>
                </div>
              </div>
                
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Ticket Price</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Ticket Price</strong></span>
                                <input type="text" name="ticket_price" id="ticket_price" value="<?php echo $this->eventTicket['ticket_price']; ?>" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Ticket Price"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Selling Price</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Selling Price</strong></span>
                                <input type="text" name="selling_price" id="selling_price" class="form-control" value="<?php echo $this->eventTicket['selling_price']; ?>" data-rule-required="true" data-rule-number="true" placeholder="Selling Price"/>
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
                                <input type="text" name="ticket_quantity" id="ticket_quantity" class="form-control" data-rule-required="true" value="<?php echo $this->eventTicket['ticket_quantity']; ?>" data-rule-number="true" placeholder="Ticket Quantity"/>
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
                                    <option value="<?php echo $currency['currency_code']; ?>" <?php if($this->eventTicket['ticket_currency'] == $currency['currency_code']){ echo "selected"; }?>><?php echo $currency['currency']; ?></option>
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
                                <input type="text" name="min_perbooking" id="min_perbooking" value="<?php echo $this->eventTicket['min_perbooking']; ?>" class="form-control" data-rule-required="true" data-rule-number="true" placeholder="Min Tickets Per Person"/>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Max Per Person</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Max Per Person</strong></span>
                                <input type="text" name="max_perbooking" id="max_perbooking" class="form-control" value="<?php echo $this->eventTicket['max_perbooking']; ?>" data-rule-required="true" data-rule-number="true" placeholder="Max Tickets Per Person"/>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
              </div>
            <?php 
                list($a, $b) = explode(" ", $this->eventTicket['start_sale']);
                list($c, $d) = explode(" ", $this->eventTicket['end_sale']);                
                $start_sale_date = date("m/d/Y", strtotime($a));
                $start_sale_time = date('H:i A', strtotime($b));                
                $end_sale_date = date("m/d/Y", strtotime($c));
                $end_sale_time = date('H:i A', strtotime($d));
            ?>
              <div class="col-lg-12 eventticketgroup">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Start Dates Of Sales</label>
                            <div class="col-lg-12 controls">
                              <div class="input-group"> <span class="input-group-addon"><i class="icon-user"></i><strong>Start Dates Of Sales</strong></span>
                                  <div style="width:200px;float:left;" class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> 
                                    <input name="start_sale_date" id="start_sale_date" class="form-control date-picker" value="<?php echo $start_sale_date; ?>"  size="16" type="text" value="12-02-2012" />
                                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> 
                                  </div>
                                  <div class="input-group bootstrap-timepicker-component">
                                    <input name="start_sale_time" id="start_sale_time" value="<?php echo $start_sale_time; ?>" class="form-control timepicker-default" type="text" />
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
                                    <input name="end_sale_date" id="end_sale_date" class="form-control date-picker" value="<?php echo $end_sale_date; ?>" size="16" type="text" value="12-02-2012" />
                                    <span class="input-group-addon align"><i class="icon-calendar"></i></span> 
                                  </div>
                                  <div class="input-group bootstrap-timepicker-component">
                                      <input name="end_sale_time" id="end_sale_time" value="<?php echo $end_sale_time; ?>" class="form-control timepicker-default" type="text" />
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
                      <input type="radio" name="status" value="1" <?php if($this->eventTicket['status'] == "1") echo "checked";?> class="regular-radio" id="r1" />
                      <label for="r1"></label>
                      <label>Active</label>
                    </div>
                    <div class="radio-inline">
                      <input type="radio" name="status" value="0" <?php if($this->eventTicket['status'] == "0") echo "checked";?> class="regular-radio" id="r2" />
                      <label for="r2"></label>
                      <label>Inactive</label>
                    </div>
                 </div><!-- rc-div end -->   
                  </div>
                </div>
              </div>
             <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                  <input type="hidden" name="ticket_id" value="<?php echo $this->eventTicket['ticket_id']; ?>" />  
                  <input type="submit" value="Update" class="btn btn-primary">
                  <a class="btn" href="<?php echo SITEURL; ?>events/tickets/<?php echo $this->event_id; ?>">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END Main Content -->