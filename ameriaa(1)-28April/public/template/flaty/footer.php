<footer>
    <div class="pageWidth">
      <div class="footerTop">
        <div class="aboutCont wow fadeIn animated">
          <h2 class="bdrTitle">About Us<span></span></h2>
          <dl>
            <dt><img src="<?php echo THEMEURL;?>images/logo-footer.png" alt="logo-footer" /></dt>
            <dd>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin justo non odio molestie, Lorem ipsum dolor sit amet.</p>
            </dd>
          </dl>
        </div>
        <div class="updates wow fadeIn animated">
          <h2 class="bdrTitle">Get More Updates<span></span></h2>
          <form id="subscribeId" method="post" action="<?php echo SITEURL;?>index/newsletter">
            <input type="text" name="email" id="email" placeholder="Enter Email" />
            <button type="submit" value="" class="btn btnBlue">Subscribe</button>
          </form>
        </div>
        <div class="clear"></div>
      </div>
      <!-- /footerTop -->
      <div class="footerMid">
        <div class="footSec1">
          <div class="contactInfo wow fadeInUp animated">
            <div class="contactList">
              <h2 class="bdrTitle">Keep In Touch<span></span></h2>
              <ul>
                <li> <i class="icon-map-marker"></i> </li>
                <li>American Aesthetic Association<br />
                  100 Overlook Center,<br />
                  Second floor, Suite 2021,<br />
                  Princeton, NJ 08540, USA </li>
              </ul>
              <ul>
                <li> <i class="icon-phone"></i></li>
                <li> Wanna talk?<br />
                  Call us at <strong>+ 1(609)228-5103</strong> </li>
              </ul>
              <ul>
                <li> <i class="icon-envelope"></i></li>
                <li> Not a big talker?<br />
                  Email us at <strong><a href="mailto:info@ameriaa.com">info@ameriaa.com</a></strong> </li>
              </ul>
            </div>
            <!-- /contactList -->
            <ul class="media">
              <li> <a class="tooltips facebook" target="_blank" href="https://www.facebook.com/"> <i class="icon-facebook facebook"></i>
                <div>Facebook<span></span></div>
                </a> <a class="tooltips twitter" target="_blank" href="https://twitter.com"> <i class="icon-twitter twitter"></i>
                <div>Twitter<span></span></div>
                </a><a class="tooltips gplus" target="_blank" href="https://plus.google.com/"> <i class="icon-google-plus gplus"></i>
                <div>Google Plus<span></span></div>
                </a> <a class="tooltips linkedin" target="_blank" href="https://www.linkedin.com"> <i class="icon-linkedin linkedin"></i>
                <div>Linkded In<span></span></div>
                </a> <a class="tooltips youtube" target="_blank" href="http://www.youtube.com/"> <i class="icon-youtube youtube"></i>
                <div>Youtube<span></span></div>
                </a> </li>
            </ul>
          </div>
          <div class="contact wow fadeInDown animated">
            <h2 class="bdrTitle">Quick Contact<span></span></h2>
            <form id="contact_form" class="contactForm" action="<?php echo SITEURL;?>index/contact">
              <ul>
                <li>
                  <div>
                    <input type="text" name="contactName" id="contactName" placeholder="Name" />
                  </div>
                  <div>
                    <input type="text" name="contactEmail" id="contactEmail" placeholder="Email" />
                  </div>
                </li>
                <li>
                  <textarea name="contactMessage" id="contactMessage" placeholder="Message"></textarea>
                </li>
                <li>
                  <div>
                    <input type="text" name="contactMobile" id="contactMobile" placeholder="Mobile Number" />
                  </div>
                  <div>
                    <input type="text" name="captcha" placeholder="Enter Below Code" />
                    <span class="captcha"><img src="<?php echo THEMEURL;?>images/captcha.png" alt="captcha" /></span> </div>
                </li>
              </ul>
              <button type="submit" value="" class="btn btnBlue">Submit</button>
              <div class="clear"></div>
              <div class="successmessage">Contact form submited successfully</div><div class="clear"></div>
            </form><div class="clear"></div>
          </div>
        </div>
        <!-- /footSec1 -->
        <div class="footSec2 wow fadeInUp animated">
          <h2 class="bdrTitle">Twitter Widget<span></span></h2>
          <div class="tweets"> <i class="icon-twitter"></i> <span class="tweetArrow"></span>
            <p>@Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit.</p>
            <strong>17hours ago...</strong> </div>
          <div class="tweets"> <i class="icon-twitter"></i> <span class="tweetArrow"></span>
            <p>@Morbi sollicitudin justo non odio molestie, Lorem ipsum dolor sit amet.</p>
            <strong>2days ago...</strong> </div>
        </div>
        <!-- /footSec2 -->
        <div class="clear"></div>
      </div>
      <!-- /footerMid -->
      
      <div class="clear"></div>
    </div>
    <div class="footerBot">
      <div class="pageWidth">
        <p>&copy; 2015 American Aesthetic Association</p>
        <a href="http://siriinnovations.com/" target="_blank"><img alt="siri" title="siri innovations" src="<?php echo THEMEURL;?>images/siri.png"></a>
        <div class="clear"></div>
      </div>
    </div>
    <!-- /footerBot --> 
  </footer>
 <a href="javascript:void(0)" id="btn-scrollup"><i class="icon-angle-up"></i></a> </div>
<!-- /wrapper --> 
<script type="text/javascript">
	$(document).ready(function() {		
    $("#contact_form").validate({
	rules: {
            contactName: {
                required:true
            },
            contactMobile: {
                required: true,
                number: true,
            },
            contactEmail: {
                required: true,
                email: true
            },			
	},		
	messages: {
            contactName: {
                required:"Please enter your name"
            },
            contactMobile: {
                 required:"Please enter your mobile number"
            },
            contactEmail: {
                required:"Please enter your email Id "
            },
			
        },
        submitHandler: function() {
            $.ajax({
                type:'post',
                url: $("#contact_form").attr('action'),
                data: $("#contact_form").serialize(),
                success: function(result){
                        if(result == "1") {
                            $(".successmessage").show().delay( 4000 );
                            $(".successmessage").html("Contact form submited successfully");
                            $("#contact_form")[0].reset();
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



<script type="text/javascript" src="<?php echo THEMEURL;?>js/jquery.easing.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/masterslider.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/animate.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/formwizard.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/stickynavigation.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/carousel.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/menu.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/all.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL;?>js/jquery.validate.min.js"></script> 

<script type="text/javascript">
$(document).ready(function () {
//menu
	jQuery('header nav').meanmenu();
	$("#SignupForm").formToWizard({ submitButton: 'SaveAccount' })
});

//owl carousel
$(document).ready(function() {
      $("#tesmonials").owlCarousel({
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
	  pagination:false,
	  autoHeight:true

      });
    });	

</script>
<script type="text/javascript">
jQuery(document).ready(function () {
//masterslider
	var slider = new MasterSlider();
		slider.setup('masterslider' , {
		width:1170,
		height:380,
		//space:100,
		fullwidth:false,
		centerControls:false,
		speed:40,
		loop:true,
		autoplay:'true',
		view:'slide'
	});
	
	//slider.control('arrows' ,{autohide:false});	
	slider.control('bullets' ,{autohide:false});	
	
});
</script>
<script>
     $("#subscribeId").validate({        
        rules: {
           'email' : {
             required:true,
             email: true
           },
           
        },
        messages: {  
            email:"please enter correct mailid"
        }
   });
      </script>
      
</body>
</html>
