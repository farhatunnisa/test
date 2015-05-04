<?php
$permissions = $this->session->gets('permissions');
?>
<!DOCTYPE html>
<html lang="en" ng-app>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $this->meta['title']; ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--base css styles-->
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/font-awesome/css/font-awesome.min.css">

<!--siri css styles-->
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/bootstrap/dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/font.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/app.css" type="text/css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/siristyles.css" type="text/css" />  

<script>
var THEMEURL = "<?php echo THEMEURL; ?>";
var SITEURL  = "<?php echo SITEURL; ?>";
</script>

<script src="<?php echo THEMEURL; ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo THEMEURL; ?>assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo THEMEURL; ?>js/ui-load.js"></script>
<script src="<?php echo THEMEURL; ?>js/ui-jp.config.js"></script>
<script src="<?php echo THEMEURL; ?>js/ui-jp.js"></script>
<script src="<?php echo THEMEURL; ?>js/ui-nav.js"></script>
<script src="<?php echo THEMEURL; ?>js/ui-toggle.js"></script>
<script src="<?php echo THEMEURL; ?>js/jquery.validate.min.js"></script> 
<script src="<?php echo THEMEURL; ?>js/comman.js"></script>

<?php if($this->datatableAssets) { ?>
<!-- date table assets -->
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/data-tables/bootstrap3/dataTables.bootstrap.js"></script> 
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/data-tables/bootstrap3/dataTables.bootstrap.css" />
<link rel="stylesheet" href="<?php echo THEMEURL; ?>css/mystyle.css" type="text/css">
<?php } ?>

<?php if($this->formAssets) { ?>
<!-- form assets -->
<!--<link href="<?php echo THEMEURL; ?>assets/datepickers/css/datepicker.css" rel="stylesheet">                
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/datepickers/js/bootstrap-datepicker.js"></script>-->
<link rel="stylesheet" href="<?php echo THEMEURL; ?>assets/datepickers/css/daterangepicker.css" />
<script src="<?php echo THEMEURL; ?>assets/datepickers/js/moment.min.js"></script>
<script src="<?php echo THEMEURL; ?>assets/datepickers/js/jquery.daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/editor/scripts/innovaeditor.js"></script>
<?php } ?>
<!-- dropzone assets -->
<?php if($this->dropzoneAssets) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL ; ?>assets/dropzone/dropzone.css" />
<script type="text/javascript" src="<?php echo THEMEURL; ?>assets/dropzone/dropzone.js"></script>
<script src="<?php echo THEMEURL; ?>js/dropzone-codes.js"></script>


<?php } ?>
<!--siri scripts--> 
</head>
<body> <!-- BEGIN Navbar -->
  <div class="app app-header-fixed  ">
    <!-- header -->
    <header id="header" class="app-header navbar" role="menu">
      <!-- navbar header -->
      <div class="navbar-header bg-dark" style="background: #fff;">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">          
            <img src="<?php echo THEMEURL; ?>img/ameriaa_logo.png" alt="." class="" style="max-height: 49px;  margin-top: 5px;">          
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle="show" target="#aside-user">
            <i class="icon-user fa-fw"></i>
          </a>
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <ul class="nav navbar-nav hidden-sm"></ul>
        <!-- / link and dropdown -->

        <!-- search form -->
<!--        <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
          <div class="form-group">
            <div class="input-group">
              <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </form>-->
        <!-- / search form -->

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <i class="icon-bell fa-fw"></i>
              <span class="visible-xs-inline">Notifications</span>
              <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
            </a>
            <!-- dropdown -->
            <div class="dropdown-menu w-xl animated fadeInUp">
              <div class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span>2</span> notifications</strong>
                </div>
                <div class="list-group">
                  <a href class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="<?php echo THEMEURL; ?>img/a0.jpg" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                  </a>
                  <a href class="media list-group-item">
                    <span class="media-body block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                  </a>
                </div>
                <div class="panel-footer text-sm">
                  <a href class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </div>
            </div>
            <!-- / dropdown -->
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php echo THEMEURL; ?>img/a0.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md"><?php echo $this->session->gets('adminuser_name') ?></span> <b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
<!--              <li>
                <a href>
                  <span class="badge bg-danger pull-right">30%</span>
                  <span>Settings</span>
                </a>
              </li>-->
              <li>
                  <a href="<?php echo SITEURL; ?>user/details/<?php echo $this->session->gets('adminuser_id'); ?>">Profile</a>
              </li>
              <li>
                <a href="<?php echo SITEURL; ?>changepassword/changePassword">                  
                  Change password
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo SITEURL; ?>logout">Logout</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
            <!-- / navbar collapse -->
    </header>
    <!-- / header -->
    
    <!-- aside -->
    <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- user left -->
          <div class="clearfix hidden-xs text-center hide" id="aside-user">
            <div class="dropdown wrapper">
                <a href="app.page.profile">
                  <span class="thumb-lg w-auto-folded avatar m-t-sm">
                    <img src="<?php echo THEMEURL; ?>img/a0.jpg" class="img-full" alt="...">
                  </span>
                </a>
                <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                  <span class="clear">
                    <span class="block m-t-sm">
                      <strong class="font-bold text-lt"><?php echo $this->session->gets('adminuser_name') ?></strong> 
                      <b class="caret"></b>
                    </span>
                    <span class="text-muted text-xs block">Admin</span>
                  </span>
                </a>
                <!-- dropdown -->
                <ul class="dropdown-menu animated fadeInRight w hidden-folded">
<!--                  <li>
                    <a href>Settings</a>
                  </li>-->
                  <li>
                    <a href="<?php echo SITEURL; ?>user/details/<?php echo $this->session->gets('adminuser_id'); ?>">Profile</a>
                  </li>
                  <li>
                    <a href="<?php echo SITEURL; ?>changepassword/changePassword">
                      Change password
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="page_signin.html">Logout</a>
                  </li>
                </ul>
                <!-- / dropdown -->
            </div>
            <div class="line dk hidden-folded"></div>
          </div>
          <!-- / user left -->
          
          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
                
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Navigation</span>
              </li>
              
              <li <?php if($this->getUrl(3) == 'dashboard') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>dashboard">                  
                  <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                  <span class="font-bold">Dashboard</span>
                </a>
              </li>

              <li <?php if($this->getUrl(3) == 'course') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>course">
                  <i class="glyphicon glyphicon-stats icon icon-notebook"></i>
                  <span class="font-bold">Course</span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'faculty') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>faculty">
                  <i class="glyphicon glyphicon-stats fa fa-user-md"></i>
                  <span class="font-bold">Faculty</span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'members') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>members">
                  <i class="glyphicon glyphicon-stats icon glyphicon-user"></i>
                  <span class="font-bold">Members</span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'memberships') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>memberships">
                  <i class="glyphicon glyphicon-stats icon icon-credit-card"></i>
                  <span class="font-bold">Memberships</span>
                </a>
              </li>
              
             <li <?php if($this->getUrl(3) == 'partner') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>partner">
                  <i class="glyphicon glyphicon-stats icon icon-credit-card"></i>
                  <span class="font-bold">Partner</span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'gallery') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>gallery">
                  <i class="glyphicon glyphicon-stats fa fa-file-picture-o"></i>
                  <span class="font-bold">Gallery</span>
                </a>
              </li>

              <li <?php if($this->getUrl(3) == 'quiz') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>quiz">
                  <i class="glyphicon glyphicon-stats fa fa-question-circle"></i>
                  <span class="font-bold">Quiz</span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'testimonials') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>testimonials ">
                  <i class="glyphicon glyphicon-stats fa fa-comments"></i>
                  <span class="font-bold">Testimonials </span>
                </a>
              </li>
              
              <li <?php if($this->getUrl(3) == 'blog') echo "class='active'"; ?>>
                <a href="<?php echo SITEURL; ?>blog">
                  <i class="glyphicon glyphicon-stats fa fa-comments"></i>
                  <span class="font-bold">Blog</span>
                </a>
              </li>
              
              <li class="line dk"></li>
              
              <li>
                <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>                  
                  <i class="glyphicon glyphicon-th"></i>
                  <span>Administration</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a href>
                      <span>Administration</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo SITEURL; ?>banners">
                      <span>Banners</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo SITEURL; ?>newsletter">
                      <span>Newsletter</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo SITEURL; ?>user">
                      <span>User</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="<?php echo SITEURL; ?>privileges">
                      <span>Privileges</span>
                    </a>
                  </li>                       
                </ul>
              </li>              
            </ul>
          </nav>
          <!-- nav -->          
        </div>
      </div>
    </aside>
  <!-- / aside -->