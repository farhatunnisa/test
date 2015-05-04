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
            <a href class="navbar-brand block m-t">Ameriaa admin</a>
            <!-- failure message indication -->
            <?php $failure = $this->session->gets('failure');
                if($failure!='') { 
                ?>
                <div class="error-message" >
                    <?php echo $failure; ?>
                </div>
                <?php
                $this->session->sets('failure','');
                }
            ?>
            <div class="m-b-lg">
                <form name="form" class="form-validation" id="form-login" action="<?php echo SITEURL; ?>login/loginSubmit" method="post">                    
                    <div class="list-group list-group-sm">
                        <div class="list-group-item">
                            <input type="email" placeholder="Email" class="form-control no-border" name="username" id="username" >
                        </div>
                        <div class="list-group-item">
                            <input type="password" placeholder="Password" class="form-control no-border" name="password" id="password" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="loginsubmit">Log in</button>
                    <div class="text-center m-t m-b">
                        <p class="text-center">
                           <label class="i-checks m-b-none">
                               <input type="checkbox" name="check"><i></i>
                          </label>
                            <small>Remember me?</small></p>
                        <a href="<?php echo SITEURL; ?>forgetpassword">Forgot password?</a>
                    </div>
                    <div class="line line-dashed"></div>
                </form>
            </div>
<!--            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                    <small class="text-muted">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
                </p>
            </div>-->
        </div>
    </div>
<!--basic scripts-->
<style>
    .error, .success_msg {
        color: rgb(255, 0, 0);
    }
    .error-message {
        color: #DD1900;
        background-color: #F0D4D4;
        border-color: #D36161;
        padding: 5px;
        margin-bottom: 5px;
    }
</style>
<script src="<?php echo THEMEURL ; ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //login form validation script
        $("#form-login").validate({
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: "required",
            },
            messages: {
                username: {
                    required: "* Please Enter Your Email",
                    email: "* Please enter a valid Email Id"
                },
                password: "* Please enter your password",
            },                
        });
        
        //success or warning message script
        $("#username").keyup(function(){
            $("#divsuccess").slideUp();
        })
    });
</script>
</body>
</html>