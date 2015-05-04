<div class="container">
    <div class="titleSection parallax fpwTitle">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">Forgot Password?</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a class="page-selection">Forgot Password</a></li>
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
        <div class="aboutPage">
          <div class="contentLeft">
            <form class="fpwForm" id="form-forgot">
				<label>Enter your email ID</label>
                <input type="email"  id="email" name="email" placeholder="Enter your email ID">
                <button type="submit" value="" class="btn btnBlue">Send new password</button>
			</form>
			  <div id="divsuccess"></div>
		  </div>
          <!-- /contentLeft -->
          <div class="aside">
            <div class="rowAside">
              <h1 class="bdrTitle">Aesthetic Courses<span></span></h1>
              <ul class="courseLinks">
                <?php foreach($this->courselist as $couserlist) { ?>
			  <ul class="courseLinks">
                <li><a href="<?php echo SITEURL;?>courses/details/<?php echo $couserlist['course_id']; ?>"><i class="icon-circle-blank"></i><span><?php echo($couserlist['course_title']); ?></span></a></li>
              </ul>
			  <?php } ?>
              </ul>
              <div class="clear"></div>
            </div>
            <!-- /rowAside -->
            <div class="rowAside">
              <div class="sideBartestmonials">
                <div class="tileLink">
                  <h1 class="bdrTitle">Testmonials<span></span></h1>
                  <a href="javascript:void(0)">Show All <i class="icon-chevron-sign-right"></i></a> </div>
                <div class="testmonialsMulti">
                   <?php foreach($this->testmonialslist as $list){ ?>
				  <div class="item">
				  <dl>
                      <dt><img src="<?php echo IMAGEURL; ?>uploads/testimonials/<?php echo $list['image'] ?>" alt="img-testmonial1" /></dt>
                      <dd>
                        <p><?php echo substr($list['description'],0,100);?></p>
                      </dd>
                    </dl>
                    <span><strong><?php echo $list['client_name']; ?></strong> <?php echo $list['location']; ?></span> </div>
					<?php } ?>
                </div>
              </div>
            </div>
            <!-- /rowAside --> 
          </div>
          <div class="clear"></div>
        </div>
        <!-- /aboutPage --> 
      </div>
    </div>
    <!-- /innerContent --> 
  </div>
  <!-- /container -->
  
  <!-- /footer --> 
  <style>
  #divsuccess {
		display : none;
     }
	</style>
 
  <script type="text/javascript">
$(document).ready(function () {
//menu
	jQuery('header nav').meanmenu();
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        
        // forgot password validation
        $("#form-forgot").validate({
            rules: {
                email: {
                    required : true,
                    email:true,
                    remote: { 
                        type:'post',
                        url:'<?php echo SITEURL; ?>forgetpassword/checkEmail',
                        async:false 
                    }
                },
            },
            messages: {
                email: {
                    required: "* Please enter email", 
                    email:"* Please enter valid email",
                    remote: "Invalid email"
                },
            },
            submitHandler: function() {
				
                $.ajax({
                    type: "POST",
                    url: "<?php echo SITEURL;?>forgetpassword/forgetPassword",
                    data: $("#form-forgot").serialize(),
                    success: function(data) {
					  if(data == 1){
							$("#divsuccess").html("<span style='color:#006400;'>Your new Password was Send to Your mail please check it...!</span>");
                            $("#divsuccess").show().delay( 4000 );
							$("#divsuccess").fadeOut(3000);
                            $("#form-forgot")[0].reset();
							
                        } else if(data == 0){
							$("#divsuccess").html("<span style='color:#FF0000;'>sorry due to some error process not completed</span>");
                            $("#divsuccess").show().delay( 4000 );
							$("#divsuccess").fadeOut(3000);
                            $("#form-forgot")[0].reset();
							
                        }
                    }
                });
            }
        });        
    });
</script>
</script>

