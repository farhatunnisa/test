<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login - ameriaa Admin</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--base css styles-->
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/bootstrap/dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/font.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/app.css" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="<?php echo THEMEURL ; ?>assets/jquery/jquery-2.0.3.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/angular/angular.js"></script>

</head>
<body>
    
    <div class="app app-header-fixed  ">
        <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
            <a href class="navbar-brand block m-t">Ameriaa forget password</a>
            <!-- failure message indication -->
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
            <div class="m-b-lg" id="forgotDiv">
                <div class="wrapper text-center">
                  <strong>Input your email to reset your password</strong>
                </div>
                <form name="reset" id="form-forgot" ng-init="isCollapsed=true">
                  <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <input type="email" placeholder="Email" name="email" id="email" class="form-control no-border" required>
                    </div>
                  </div>                    
                  <button type="submit" class="btn btn-lg btn-primary btn-block" >Send</button>
                </form>                
            </div>
            <div collapse="isCollapsed" class="m-t successmessage">
                <div class="alert alert-success">
                  <p>A reset password sent to your email address, <br>please check it . 
                      <a href="<?php echo SITEURL; ?>" class="btn btn-sm btn-success">Login</a></p>
                </div>
            </div>
            <div collapse="isCollapsed" class="m-t error-message">
                <div class="alert ">
                    <p><strong>Error..! </strong>Sorry due to some error process not completed.</p>                      
                </div>
            </div>
        </div>
    </div>
<!--basic scripts-->
<style>
    .error, .success_msg {
        color: rgb(255, 0, 0);
    }
    .forget-error {
        display: none;
        margin-bottom: 10px;
        padding: 5px;
        margin-top: -10px;
        color: #b94a48;
        background-color: #f2dede;
        border-color: #eed3d7;
    }
    .successmessage {
        display: none;
    }
    .error-message {
        color: #DD1900;
        background-color: #F0D4D4;
        border-color: #D36161;
        display: none;
    }
</style>
<script src="<?php echo THEMEURL ; ?>js/jquery.validate.min.js"></script>
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
</body>
</html>