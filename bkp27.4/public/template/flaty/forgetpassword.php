 <div class="container">
    <div class="titleSection parallax register">
      <div class="titlePos">
        <div class="titleAlign">
          <div class="pageWidth">
            <div class="mask"></div>
            <h1 class="wow fadeInLeft animated">ForgetPassword</h1>
            <div class="bredCrumb wow fadeInRight animated">
              <ul>
                <li><a href="<?php echo SITEURL;?>index">Home</a></li>
                <li><a href="<?php echo SITEURL;?>register/signup">Register</a></li>
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
                
      <form name="reset" id="form-forgot" ng-init="isCollapsed=true">
             <?php $failure = $this->session->gets('failure');
                if($failure!='') { 
                ?>
                <div class="success_msg" id="divsuccess">
                    <i class="icon-remove"></i><span class="text-error"><?php echo $failure; ?></span><br>                   
                </div>
                <?php
                $this->session->sets('failure','');
                }
            ?>
            <div class="list-group list-group-sm">
              <div class="list-group-item">
                  <input type="email" placeholder="Email" name="email" id="email" class="form-control no-border" required>
              </div>
                <button type="submit" class="btn btnBlue" >Send</button>
            </div>                    
            
     </form> 

    </div>
    <!-- /innerContent --> 
  </div>
   </div>
  <!-- /container -->
  <style>
  .successmessage {
        display: none;
    }
    </style>
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
                            $("#forgotDiv").hide();
                            $(".successmessage").show();
                            $('#forgot_divsuccess').html("<i style='color:#fff;' class='icon-check'></i>\n\
                                                    <span style='color:#fff;' class='text-success'>Your new Password was Send to Your mail please check it...! </span>")
                            .fadeIn(1000).fadeOut(10000); 
                        } else if(data == 0){
                            $("#error-message").show();
                        }
                    }
                });
            }
        });        
    });
</script>
