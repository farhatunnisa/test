
  <div class="container">
    <div class="titleSection parallax contactTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Contact Us</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>">Home</a></li>
                <li><a class="page-selection">Contact Us</a></li>
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
        <div class="contactPage">
          <div class="geninTouch wow fadeInUp animated">
            <h2 class="bdrTitle">Get In Touch<span></span></h2>
            <form id="mailForm" class="contactForm" action="<?php echo SITEURL;?>index/contact">
              <ul>
                <li>
                  <div>
                    <label>Name<span>*</span></label>
                    <input type="text" name="contactName" id="contactName" placeholder="Name">
                  </div>
                  <div>
                    <label>Email ID<span>*</span></label>
                    <input type="text" name="contactEmail" id="contactEmail" placeholder="Email">
                  </div>
                </li>
                <li>
                  <div>
                    <label>Mobile Number<span>*</span></label>
                    <input type="text" name="contactMobile" placeholder="Mobile Number">
                  </div>
                  <div>
                    <label>Subject<span>*</span></label>
                    <input type="text" name="contactSub" id="contactSub" placeholder="Subject">
                  </div>
                </li>
                <li>
                  <div>
                    <label>Security Code<span>*</span></label>
                    <input type="text" name="contactSecurity" id="contactSecurity" placeholder="security code">
                  </div>
                  
                  <div class="captcha"><label>&nbsp;</label> <img src="<?php echo THEMEURL; ?>images/captcha.png" alt="captcha" > </div>
                </li>
                <li>
                  <label>Message / Comments<span>*</span></label>
                  <textarea name="contactMessage" id="contactMessage" placeholder="Message"></textarea>
                </li>
              </ul>
              <button class="btn btnBlue" value="" type="submit">Submit</button>
              <div class="successmessage">Contact form submited successfully</div>
            </form>
          </div>
          <div class="contactAdd wow fadeInDown animated">
           <h2 class="bdrTitle">Contact Address<span></span></h2>
          	<div class="contactList">
              <ul>
                <li> <i class="icon-map-marker"></i> </li>
                <li><strong>American Aesthetic Association</strong><br>
                  100 Overlook Center,<br>
                  Second floor, Suite 2021,<br>
                  Princeton, NJ 08540, USA </li>
              </ul>
              <ul>
                <li> <i class="icon-phone"></i></li>
                <li> + 1(609)375-8219 / + 1(609)228-5103 </li>
              </ul>
              <ul>
                <li> <i class="icon-envelope"></i></li>
                <li> <a href="mailto:info@ameriaa.com">info@ameriaa.com</a></strong> </li>
              </ul>
            </div>          
          </div>
          <div class="map wow fadeInRight animated">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3041.7944549105455!2d-74.64830189999999!3d40.32471909999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3dd5aa9e6e5a5%3A0xbddd98902252e751!2s100+Overlook+Center%2C+Princeton%2C+NJ+08540%2C+USA!5e0!3m2!1sen!2sin!4v1428996947160"></iframe>
          </div>
          <div class="clear"></div>
        </div>
        
        <!-- /contactUs --> 
        
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->

<script type="text/javascript">
$(document).ready(function() {		
    $("#mailForm").validate({
	rules: {
            contactName: {
                required:true
            },
            contactSub: {
                required:true
            },
            contactMobile: {
                required: true,
                number: true ,
                maxlength:15
            },
            contactEmail: {
                required: true,
                email: true
            },
	    contactSecurity: {
                required: true
            },
            contactMessage: {
                required: true
            },
			
	},		
	messages: {
            contactName: {
                required:"Please enter your name"
            },
            contactSub: {
                required:"Please enter your subject"
            },
            contactMobile: {
                 required:"Please enter your mobile number"
            },
            contactEmail: {
                required:"Please enter your email Id "
            },
            contactSecurity: {
                required: "This field is required"
            },
            contactMessage: {
                required: "This field is required"
            },			
        },
        submitHandler: function() {
            $.ajax({
                type:'post',
                url: $("#mailForm").attr('action'),
                data: $("#mailForm").serialize(),
                success: function(result){				
                    if(result == "1") {
                        $(".successmessage").show().delay( 4000 );
                        $(".successmessage").html("Contact form submited successfully");
                        $("#mailForm")[0].reset();
                        $(".successmessage").fadeOut(3000);							
                    } else {
                        $(".successmessage").show().delay( 4000 );
                        $(".successmessage").addClass("failmessage");
                        $(".successmessage").html("Contact form not submited");							
                        $(".successmessage").fadeOut(3000);
                    }
                }
                
            });
        }
    });	
});
</script>
<style>
	.successmessage{
		display:none;
		float: left;
		line-height: 35px;
		color: #45BA2C;
		font-size: 15px;
	}
	.failmessage {
		color: #E76A4C !important;
	}
	.loader{
		float:left;	
	}
</style>
