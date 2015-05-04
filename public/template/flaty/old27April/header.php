<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>American Aesthetic Association, Medicine Board Training Europe</title>
<link rel="shortcut icon" href="<?php echo THEMEURL;?>images/favicon.ico" type="image/x-icon" >
<link rel="stylesheet" href="<?php echo THEMEURL;?>css/masterslider.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL;?>css/carousel.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL;?>css/mastersliderLayer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL;?>css/ameriaa.css" type="text/css" />
<!--[if gte IE 7]>
<script type="text/javascript" src="js/html5shiv.js"></script>
<link rel="stylesheet" href="css/fonts-ie7.css">
<link rel="stylesheet" href="css/ie.css">
<![endif]-->
<link rel="stylesheet" href="<?php echo THEMEURL;?>css/ameriaaresponsive.css" type="text/css" />
<script type="text/javascript" src="<?php echo THEMEURL;?>js/jquery-1.9.1.js"></script>
<script type="text/javascript">
    var SITEURL = "<?php echo SITEURL; ?>";
    var THEMEURL = "<?php echo THEMEURL; ?>";
</script>
</head>
<body>
<div class="wrapper"> 
  <!-- header -->
  <header>
    <div class="topSection">
      <div class="pageWidth">
        <div class="headLeft wow fadeInUp animated"><a href="<?php echo SITEURL;?>index"><img src="<?php echo THEMEURL;?>images/logo.png" alt="logo" title="logo -  home" /></a></div>
        <div class="headRight wow fadeInDown animated">
          <ul>
            <?php if($this->session->gets('ameriaa_user_id') == '') { ?>
              <li>
                <button type="submit" value="" class="btn btnBlue dropdown-toggle"><i class="icon-lock"></i><span>Login</span></button>
                <div class="loginForm"> <span class="arrowUp"></span>
                  <form method="post" name="login" id="login_form" >
                    <ul>
                      <li>
                        <input type="text" placeholder="email" id="email" name="email" id="username" />
                      </li>
                      <li>
                        <input type="password" placeholder="Password" id="password" name="password" id="password" />
                      </li> <div class="clear"></div>
                      <div id="login_error" style="display: none; "></div>
                    </ul>
                    <dl>
                      <dt>
                        <button type="submit" value="" class="btn btnBlue">Submit</button>
                      </dt>
                      <dd><a href="javascript:void(0)">Forgot&nbsp;Password?</a></dd>
                    </dl>
                    <div class="clear"></div>
                  </form>
                </div>
              </li>
              <li>
                <button type="submit" value="" class="btn btnCharcol" onClick="window.location='<?php echo SITEURL;?>register/signup'"><i class="icon-user"></i><span>Register</span></button>
              </li>
            <?php } else {  ?>
              <li> 
                <a class="dropdown-toggle" href="javascript:void(0)"> 
                  <img src="<?php echo THEMEURL; ?>images/user.jpg" alt="user"> <span><?php echo $this->session->gets('user_name'); ?></span> 
                  <i class="icon-angle-down"></i>
                  <div class="clear"></div>
                </a>
                <div class="loginForm"> <span class="arrowUp"></span>
                  <div class="dropdownList"> <span class="arrowUp"></span>
                    <ul>
                      <li><a href="<?php echo SITEURL.'members'; ?>"><i class="icon-user"></i>My Profile</a></li>
                      <li><a href="<?php echo SITEURL.'logout'; ?>"><i class="icon-power-off"></i>Logout</a></li>
                    </ul>
                  </div>
                </div>
              </li>
            <?php }?>            
            <div class="clear"></div>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!-- /topSection -->
    <div class="navigation">
      <div class="navigationInner">
        <div class="pageWidth">
          <div class="sticky-navigation">
            <div class="menu">
              <div class="pageWidth">
                <nav> 
                  <span class="logo-small">
                    <a href="<?php echo SITEURL;?>index">
                      <img src="<?php echo THEMEURL;?>images/logo-small.png" alt="logo" title="Logo - Home" />
                    </a>
                    </span>
                  <ul>
                    <li><a class="<?php if($this->getUrl(2) == 'index' || $this->getUrl(2) == ''){ echo 'active'; } ?>" href="<?php echo SITEURL;?>index">Home</a></li>
                    <li><a class="<?php if($this->getUrl(2) == 'about'){ echo 'active'; } ?>" href="<?php echo SITEURL.'about'; ?>">About Us <i class="icon-angle-down"></i></a>
                      <ul class="submenu">
                        <li><a href="<?php echo SITEURL."partners"; ?>">Partners</a></li>
                        <li><a href="<?php echo SITEURL."news"; ?>">News</a></li>
                        <li><a href="<?php echo SITEURL."testimonials"; ?>">Testimonials</a></li>
                      </ul>
                    </li>
                    <li><a class="<?php if($this->getUrl(2) == 'courses'){ echo 'active'; } ?>" href="<?php echo SITEURL; ?>courses">Aesthetic Courses</a></li>
                    <li><a href="javascript:void(0)">Membership</a></li>
                    <li><a class="<?php if($this->getUrl(2) == 'faculty'){ echo 'active'; } ?>" href="<?php echo SITEURL.'faculty'; ?>">Faculty</a></li>
                    <li><a class="<?php if($this->getUrl(2) == 'gallery'){ echo 'active'; } ?>" href="<?php echo SITEURL.'gallery' ; ?>">Gallery</a></li>
                    <li><a class="<?php if($this->getUrl(2) == 'blog') { echo 'active'; } ?>" href="<?php echo SITEURL.'blog' ; ?>">Blog</a></li>
                    <li><a class="<?php if($this->getUrl(2) == 'contact'){ echo 'active'; } ?>" href="<?php echo SITEURL.'contact' ;?>">Contact Us</a></li>
                  </ul>
                  <div class="clear"></div>
                </nav>
              </div>
            </div>
            <!-- menu div end --> 
          </div>
        </div>
      </div>
    </div>
    <!-- navigation -->
    <div class="clear"></div>
  </header>
  <script type="text/javascript">
      $(document).ready(function() {
          $("#login_form").validate({        
            rules: {
               'email' : {
                 required:true,
                 email: true
               },
               'password': {
                 required:true
               }
            },
            messages: {  
              'email' : {
                required:"Please enter email",
                email: "Enter a valid email"
              },
              'password': {
                required: "Please enter password"
              }
            },
            submitHandler: function() {
                var email    = $("#email").val();
                var password = $("#password").val();
                $.ajax({
                      type:'post',
                      url:'<?php echo SITEURL;?>login',
                      data:'email=' + email + '&password=' + password,
                      success: function(data) {                
                        if(data == 1) {
                            document.location = SITEURL + "index";
                        } else {
                            $("#login_error").show();
                            $("#login_error").css({"color":"red", "margin-bottom": "5px"});
                            $("#login_error").html("Enter a valid details");
                        }
                    }
                });
            }
        });
      });     
</script>