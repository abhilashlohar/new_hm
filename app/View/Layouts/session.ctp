<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php
echo $this->fetch('meta');
$webroot_path=$this->requestAction(array('controller' => 'Fns', 'action' => 'webroot_path'));
?>
   <meta charset="utf-8" />
   <title>Metronic | Form Stuff - Form Components</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/css/metro.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/css/style.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/css/style_responsive.css" rel="stylesheet" />
   <link href="<?php echo $webroot_path; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/jquery-tags-input/jquery.tagsinput.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="<?php echo $webroot_path; ?>assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="<?php echo $webroot_path; ?>assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/uniform/css/uniform.default.css" />
   <link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
         <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="index.html">
            <img src="assets/img/logo.png" alt="logo" />
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="assets/img/menu-toggler.png" alt="" />
            </a>          
            <!-- END RESPONSIVE MENU TOGGLER -->            
            <!-- BEGIN TOP NAVIGATION MENU -->              
            <ul class="nav pull-right">
               <!-- BEGIN NOTIFICATION DROPDOWN -->   
               <li class="dropdown" id="header_notification_bar">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-warning-sign"></i>
                  <span class="badge">9</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                     <li>
                        <p>You have 14 new notifications</p>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-success"><i class="icon-plus"></i></span>
                        New user registered. 
                        <span class="time">Just now</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-important"><i class="icon-bolt"></i></span>
                        Server #12 overloaded. 
                        <span class="time">15 mins</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-warning"><i class="icon-bell"></i></span>
                        Server #2 not respoding.
                        <span class="time">22 mins</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-info"><i class="icon-bullhorn"></i></span>
                        Application error.
                        <span class="time">40 mins</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-important"><i class="icon-bolt"></i></span>
                        Database overloaded 68%. 
                        <span class="time">2 hrs</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="label label-important"><i class="icon-bolt"></i></span>
                        2 user IP blocked.
                        <span class="time">5 hrs</span>
                        </a>
                     </li>
                     <li class="external">
                        <a href="#">See all notifications <i class="m-icon-swapright"></i></a>
                     </li>
                  </ul>
               </li>
               <!-- END NOTIFICATION DROPDOWN -->
               <!-- BEGIN INBOX DROPDOWN -->
               <li class="dropdown" id="header_inbox_bar">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-envelope-alt"></i>
                  <span class="badge">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                     <li>
                        <p>You have 12 new messages</p>
                     </li>
                     <li>
                        <a href="#">
                        <span class="photo"><img src="./assets/img/avatar2.jpg" alt="" /></span>
                        <span class="subject">
                        <span class="from">Lisa Wong</span>
                        <span class="time">Just Now</span>
                        </span>
                        <span class="message">
                        Vivamus sed auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>  
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="photo"><img src="./assets/img/avatar3.jpg" alt="" /></span>
                        <span class="subject">
                        <span class="from">Richard Doe</span>
                        <span class="time">16 mins</span>
                        </span>
                        <span class="message">
                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>  
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="photo"><img src="./assets/img/avatar1.jpg" alt="" /></span>
                        <span class="subject">
                        <span class="from">Bob Nilson</span>
                        <span class="time">2 hrs</span>
                        </span>
                        <span class="message">
                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh
                        auctor nibh...
                        </span>  
                        </a>
                     </li>
                     <li class="external">
                        <a href="#">See all messages <i class="m-icon-swapright"></i></a>
                     </li>
                  </ul>
               </li>
               <!-- END INBOX DROPDOWN -->
               <!-- BEGIN TODO DROPDOWN -->
               <li class="dropdown" id="header_task_bar">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-tasks"></i>
                  <span class="badge">5</span>
                  </a>
                  <ul class="dropdown-menu extended tasks">
                     <li>
                        <p>You have 12 pending tasks</p>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">New release v1.2</span>
                        <span class="percent">30%</span>
                        </span>
                        <span class="progress progress-success ">
                        <span style="width: 30%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">Application deployment</span>
                        <span class="percent">65%</span>
                        </span>
                        <span class="progress progress-danger progress-striped active">
                        <span style="width: 65%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">Mobile app release</span>
                        <span class="percent">98%</span>
                        </span>
                        <span class="progress progress-success">
                        <span style="width: 98%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">Database migration</span>
                        <span class="percent">10%</span>
                        </span>
                        <span class="progress progress-warning progress-striped">
                        <span style="width: 10%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">Web server upgrade</span>
                        <span class="percent">58%</span>
                        </span>
                        <span class="progress progress-info">
                        <span style="width: 58%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <span class="task">
                        <span class="desc">Mobile development</span>
                        <span class="percent">85%</span>
                        </span>
                        <span class="progress progress-success">
                        <span style="width: 85%;" class="bar"></span>
                        </span>
                        </a>
                     </li>
                     <li class="external">
                        <a href="#">See all tasks <i class="m-icon-swapright"></i></a>
                     </li>
                  </ul>
               </li>
               <!-- END TODO DROPDOWN -->
               <!-- BEGIN USER LOGIN DROPDOWN -->
               <li class="dropdown user">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img alt="" src="assets/img/avatar1_small.jpg" />
                  <span class="username">Bob Nilson</span>
                  <i class="icon-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                     <li><a href="#"><i class="icon-calendar"></i> My Calendar</a></li>
                     <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                     <li class="divider"></li>
                     <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                  </ul>
               </li>
               <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU --> 
         </div>
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar nav-collapse collapse">
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="slide hide">
            <i class="icon-angle-left"></i>
         </div>
         <form class="sidebar-search" />
            <div class="input-box">
               <input type="text" class="" placeholder="Search" />
               <input type="button" class="submit" value=" " />
            </div>
         </form>
         <div class="clearfix"></div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
         <ul>
            <li class="">
               <a href="index.html">
               <i class="icon-home"></i> Dashboard               
               </a>              
            </li>
            <li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-bookmark-empty"></i> UI Features
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="ui_general.html">General</a></li>
                  <li><a class="" href="ui_buttons.html">Buttons</a></li>
                  <li><a class="" href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
                  <li><a class="" href="ui_typography.html">Typography</a></li>
               </ul>
            </li>
            <li class="has-sub active">
               <a href="javascript:;" class="">
               <i class="icon-table"></i> Form Stuff
               <span class="arrow open"></span>               
               <span class="selected"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="form_layout.html">Form Layouts</a></li>
                  <li class="active"><a class="" href="form_component.html">Form Components</a></li>
                  <li><a class="" href="form_wizard.html">Form Wizard</a></li>
                  <li><a class="" href="form_validation.html">Form Validation</a></li>
               </ul>
            </li>
            <li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-th-list"></i> Data Tables
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="table_basic.html">Basic Tables</a></li>
                  <li><a class="" href="table_managed.html">Managed Tables</a></li>
               </ul>
            </li>
            <li><a class="" href="grids.html"><i class="icon-th"></i> Grids & Portlets</a></li>
            <li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-map-marker"></i> Maps
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="maps_google.html">Google Maps</a></li>
                  <li><a class="" href="maps_vector.html">Vector Maps</a></li>
               </ul>
            </li>
            <li><a class="" href="charts.html"><i class="icon-bar-chart"></i> Visual Charts</a></li>
            <li><a class="" href="calendar.html"><i class="icon-ok"></i> Calendar</a></li>
            <li><a class="" href="gallery.html"><i class="icon-camera"></i> Gallery</a></li>
            <li class="has-sub">
               <a href="javascript:;" class="">
               <i class="icon-briefcase"></i> Extra
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li><a class="" href="extra_pricing_table.html">Pricing Tables</a></li>
                  <li><a class="" href="extra_404.html">404 Page</a></li>
                  <li><a class="" href="extra_500.html">500 Page</a></li>
                  <li><a class="" href="extra_blank.html">Blank Page</a></li>
               </ul>
            </li>
            <li><a class="" href="login.html"><i class="icon-user"></i> Login Page</a></li>
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <div id="portlet-config" class="modal hide">
            <div class="modal-header">
               <button data-dismiss="modal" class="close" type="button"></button>
               <h3>portlet Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN STYLE CUSTOMIZER-->
                  <div class="styler-panel hidden-phone">
                     <i class="icon-cog"></i>
                     <i class="icon-remove"></i>
                     <span class="settings">
                     <span class="text">Style:</span>
                     <span class="colors">
                     <span class="color-default" data-style="default"></span>
                     <span class="color-blue" data-style="blue"></span>
                     <span class="color-light" data-style="light"></span>     
                     </span>
                     <span class="layout">
                     <label class="hidden-phone">
                     <input type="checkbox" class="header" checked="" value="" />Fixed Header
                     </label>                   
                     </span>
                     </span>
                  </div>
                  <!-- END STYLE CUSTOMIZER-->    
                  <h3 class="page-title">
                     Form Components
                     <small>form components and widgets</small>
                  </h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Home</a> 
                        <span class="icon-angle-right"></span>
                     </li>
                     <li>
                        <a href="#">Form Stuff</a>
                        <span class="icon-angle-right"></span>
                     </li>
                     <li><a href="#">Form Components</a></li>
                  </ul>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM PORTLET-->   
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Sample Form</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Input</label>
                              <div class="controls">
                                 <input type="text" class="span6 m-wrap" />
                                 <span class="help-inline">Some hint here</span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Disabled Input</label>
                              <div class="controls">
                                 <input class="span6 m-wrap" type="text" placeholder="Disabled input here..." disabled="" />
                                 <span class="help-inline">Some hint here</span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Readonly Input</label>
                              <div class="controls">
                                 <input class="span6 m-wrap" type="text" placeholder="Readonly input here..." disabled="" />
                                 <span class="help-inline">Some hint here</span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Input with Popover</label>
                              <div class="controls">
                                 <input type="text" class="span6 m-wrap popovers" data-trigger="hover" data-content="Popover body goes here. Popover body goes here." data-original-title="Popover header" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Input with Tooltip</label>
                              <div class="controls">
                                 <input type="text" class="span6 m-wrap tooltips" data-trigger="hover" data-original-title="Tooltip text goes here. Tooltip text goes here." />                       
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Auto Complete</label>
                              <div class="controls">
                                 <input type="text" class="span6 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" />
                                 <p class="help-block">Start typing to auto complete!. E.g: California</p>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Email Address Input</label>
                              <div class="controls">
                                 <div class="input-prepend">
                                    <span class="add-on">@</span><input class="m-wrap " type="text" placeholder="Email Address" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Email Address Input</label>
                              <div class="controls">
                                 <div class="input-icon left">
                                    <i class="icon-envelope"></i>
                                    <input class="m-wrap " type="text" placeholder="Email Address" />    
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Currency Input</label>
                              <div class="controls">
                                 <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class="m-wrap " type="text" /><span class="add-on">.00</span>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Default Dropdown</label>
                              <div class="controls">
                                 <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="" />Select...
                                    <option value="Category 1" />Category 1
                                    <option value="Category 2" />Category 2
                                    <option value="Category 3" />Category 5
                                    <option value="Category 4" />Category 4
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Default Dropdown(Multiple)</label>
                              <div class="controls">
                                 <select class="span6 m-wrap" multiple="multiple" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="Category 1" />Category 1
                                    <option value="Category 2" />Category 2
                                    <option value="Category 3" />Category 5
                                    <option value="Category 4" />Category 4
                                    <option value="Category 3" />Category 6
                                    <option value="Category 4" />Category 7
                                    <option value="Category 3" />Category 8
                                    <option value="Category 4" />Category 9
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Custom Dropdown</label>
                              <div class="controls">
                                 <select class="span6 chosen" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="" />
                                    <option value="Category 1" />Category 1
                                    <option value="Category 2" />Category 2
                                    <option value="Category 3" />Category 5
                                    <option value="Category 4" />Category 4
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Grouped Custom Dropdown</label>
                              <div class="controls">
                                 <select data-placeholder="Your Favorite Football Team" class="chosen span6" tabindex="-1" id="selS0V">
                                    <option value="" />
                                    <optgroup label="NFC EAST">
                                       <option />Dallas Cowboys
                                       <option />New York Giants
                                       <option />Philadelphia Eagles
                                       <option />Washington Redskins
                                    </optgroup>
                                    <optgroup label="NFC NORTH">
                                       <option />Chicago Bears
                                       <option />Detroit Lions
                                       <option />Green Bay Packers
                                       <option />Minnesota Vikings
                                    </optgroup>
                                    <optgroup label="NFC SOUTH">
                                       <option />Atlanta Falcons
                                       <option />Carolina Panthers
                                       <option />New Orleans Saints
                                       <option />Tampa Bay Buccaneers
                                    </optgroup>
                                    <optgroup label="NFC WEST">
                                       <option />Arizona Cardinals
                                       <option />St. Louis Rams
                                       <option />San Francisco 49ers
                                       <option />Seattle Seahawks
                                    </optgroup>
                                    <optgroup label="AFC EAST">
                                       <option />Buffalo Bills
                                       <option />Miami Dolphins
                                       <option />New England Patriots
                                       <option />New York Jets
                                    </optgroup>
                                    <optgroup label="AFC NORTH">
                                       <option />Baltimore Ravens
                                       <option />Cincinnati Bengals
                                       <option />Cleveland Browns
                                       <option />Pittsburgh Steelers
                                    </optgroup>
                                    <optgroup label="AFC SOUTH">
                                       <option />Houston Texans
                                       <option />Indianapolis Colts
                                       <option />Jacksonville Jaguars
                                       <option />Tennessee Titans
                                    </optgroup>
                                    <optgroup label="AFC WEST">
                                       <option />Denver Broncos
                                       <option />Kansas City Chiefs
                                       <option />Oakland Raiders
                                       <option />San Diego Chargers
                                    </optgroup>
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Custom Dropdown Multiple Select</label>
                              <div class="controls">
                                 <select data-placeholder="Your Favorite Football Teams" class="chosen span6" multiple="multiple" tabindex="6">
                                    <option value="" />
                                    <optgroup label="NFC EAST">
                                       <option />Dallas Cowboys
                                       <option />New York Giants
                                       <option />Philadelphia Eagles
                                       <option />Washington Redskins
                                    </optgroup>
                                    <optgroup label="NFC NORTH">
                                       <option selected="" />Chicago Bears
                                       <option />Detroit Lions
                                       <option />Green Bay Packers
                                       <option />Minnesota Vikings
                                    </optgroup>
                                    <optgroup label="NFC SOUTH">
                                       <option />Atlanta Falcons
                                       <option selected="" />Carolina Panthers
                                       <option />New Orleans Saints
                                       <option />Tampa Bay Buccaneers
                                    </optgroup>
                                    <optgroup label="NFC WEST">
                                       <option />Arizona Cardinals
                                       <option />St. Louis Rams
                                       <option />San Francisco 49ers
                                       <option />Seattle Seahawks
                                    </optgroup>
                                    <optgroup label="AFC EAST">
                                       <option />Buffalo Bills
                                       <option />Miami Dolphins
                                       <option />New England Patriots
                                       <option />New York Jets
                                    </optgroup>
                                    <optgroup label="AFC NORTH">
                                       <option />Baltimore Ravens
                                       <option />Cincinnati Bengals
                                       <option />Cleveland Browns
                                       <option />Pittsburgh Steelers
                                    </optgroup>
                                    <optgroup label="AFC SOUTH">
                                       <option />Houston Texans
                                       <option />Indianapolis Colts
                                       <option />Jacksonville Jaguars
                                       <option />Tennessee Titans
                                    </optgroup>
                                    <optgroup label="AFC WEST">
                                       <option />Denver Broncos
                                       <option />Kansas City Chiefs
                                       <option />Oakland Raiders
                                       <option />San Diego Chargers
                                    </optgroup>
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Custom Dropdown Diselect</label>
                              <div class="controls">
                                 <select data-placeholder="Your Favorite Type of Bear" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
                                    <option value="" />
                                    <option />American Black Bear
                                    <option />Asiatic Black Bear
                                    <option />Brown Bear
                                    <option />Giant Panda
                                    <option selected="" />Sloth Bear
                                    <option />Sun Bear
                                    <option />Polar Bear
                                    <option />Spectacled Bear
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Radio Buttons</label>
                              <div class="controls">
                                 <label class="radio">
                                 <input type="radio" name="optionsRadios1" value="option1" />
                                 Option 1
                                 </label>
                                 <label class="radio">
                                 <input type="radio" name="optionsRadios1" value="option2" checked="" />
                                 Option 2
                                 </label>  
                                 <label class="radio">
                                 <input type="radio" name="optionsRadios1" value="option2" />
                                 Option 3
                                 </label>  
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Radio Buttons</label>
                              <div class="controls">
                                 <label class="radio line">
                                 <input type="radio" name="optionsRadios2" value="option1" />
                                 Option 1
                                 </label>
                                 <label class="radio line">
                                 <input type="radio" name="optionsRadios2" value="option2" checked="" />
                                 Option 2
                                 </label>  
                                 <label class="radio line">
                                 <input type="radio" name="optionsRadios2" value="option2" />
                                 Option 3
                                 </label>  
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Checkbox</label>
                              <div class="controls">
                                 <label class="checkbox">
                                 <input type="checkbox" value="" /> Checkbox 1
                                 </label>
                                 <label class="checkbox">
                                 <input type="checkbox" value="" /> Checkbox 2
                                 </label>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Checkbox</label>
                              <div class="controls">
                                 <label class="checkbox line">
                                 <input type="checkbox" value="" /> Checkbox 1
                                 </label>
                                 <label class="checkbox line">
                                 <input type="checkbox" value="" /> Checkbox 2
                                 </label>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Textarea</label>
                              <div class="controls">
                                 <textarea class="span6 m-wrap" rows="3"></textarea>
                              </div>
                           </div>
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Submit</button>
                              <button type="button" class="btn">Cancel</button>
                           </div>
                        </form>
                        <!-- END FORM-->           
                     </div>
                  </div>
                  <!-- END SAMPLE FORM PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box purple">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Tags Input</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default</label>
                              <div class="controls">
                                 <input id="tags_1" type="text" class="m-wra tags" value="foo,bar,baz,roffle" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Fixed Width</label>
                              <div class="controls">
                                 <input id="tags_2" type="text" class="m-wra tags medium" value="tag1,tag2" />
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>File Upload</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default</label>
                              <div class="controls">
                                 <input type="file" class="default" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Advanced</label>
                              <div class="controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                       <div class="uneditable-input">
                                          <i class="icon-file fileupload-exists"></i> 
                                          <span class="fileupload-preview"></span>
                                       </div>
                                       <span class="btn btn-file">
                                       <span class="fileupload-new">Select file</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" class="default" />
                                       </span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Without input</label>
                              <div class="controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <span class="btn btn-file">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" />
                                    </span>
                                    <span class="fileupload-preview"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"></a>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Image Upload</label>
                              <div class="controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                       <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" class="default" /></span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                 </div>
                                 <span class="label label-important">NOTE!</span>
                                 <span>
                                 Attached image thumbnail is
                                 supported in Latest Firefox, Chrome, Opera, 
                                 Safari and Internet Explorer 10 only
                                 </span>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box green">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Color Pickers</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default</label>
                              <div class="controls">
                                 <input type="text" class="colorpicker-default m-wrap" value="#8fff00" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">RGBA</label>
                              <div class="controls">
                                 <input type="text" class="colorpicker-rgba m-wrap" value="rgb(0,194,255,0.78)" data-color-format="rgba" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">As Component</label>
                              <div class="controls">
                                 <div class="input-append color colorpicker-default" data-color="#3865a8" data-color-format="rgba">
                                    <input type="text" class="m-wrap" value="#3865a8" readonly="" />
                                    <span class="add-on"><i style="background-color: #3865a8;"></i></span>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box red">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Time Pickers</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default Timepicker</label>
                              <div class="controls">
                                 <div class="input-append bootstrap-timepicker-component">
                                    <input class="m-wrap m-ctrl-small timepicker-default" type="text" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">24hr Timepicker</label>
                              <div class="controls">
                                 <div class="input-append bootstrap-timepicker-component">
                                    <input class="m-wrap m-ctrl-small timepicker-24" type="text" />
                                    <span class="add-on"><i class="icon-time"></i></span>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>
                           Clockface Time Pickers
                        </h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Input</label>
                              <div class="controls">
                                 <input type="text" id="clockface_1" value="2:30 PM" data-format="hh:mm A" class="m-wrap small" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Button</label>
                              <div class="controls">
                                 <div class="input-append">
                                    <input type="text" id="clockface_2" value="14:30" class="m-wrap small" readonly="" />
                                    <button class="btn" type="button" id="clockface_2_toggle-btn">
                                    <i class="icon-time"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Inline</label>
                              <div class="controls">
                                 <div id="clockface_3" class="well" style="padding: 0; float: left"></div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box grey">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Date Pickers</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default datepicker</label>
                              <div class="controls">
                                 <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="12-02-2012" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Starts with years view</label>
                              <div class="controls">
                                 <div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                    <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="12-02-2012" /><span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Limit the view mode to months</label>
                              <div class="controls">
                                 <div class="input-append date date-picker" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                                    <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="02/2012" /><span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box yellow">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Date Range Pickers</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Default Date Ranges</label>
                              <div class="controls">
                                 <div class="input-prepend">
                                    <span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="m-wrap m-ctrl-medium date-range" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Advance Date Ranges</label>
                              <div class="controls">
                                 <div id="form-date-range" class="btn">
                                    <i class="icon-calendar"></i>
                                    &nbsp;<span></span> 
                                    <b class="caret"></b>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN EXTRAS PORTLET-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Extras</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                           <div class="control-group">
                              <label class="control-label">Right Action Input</label>
                              <div class="controls">
                                 <div class="input-append">
                                    <input class="m-wrap medium" type="text" />
                                    <div class="btn-group">
                                       <button class="btn dropdown-toggle" data-toggle="dropdown">
                                       Action <span class="caret"></span>
                                       </button>
                                       <ul class="dropdown-menu">
                                          <li><a href="#">Action</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Separated link</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Left Action Input</label>
                              <div class="controls">
                                 <div class="input-prepend">
                                    <div class="btn-group">
                                       <button class="btn dropdown-toggle" data-toggle="dropdown">
                                       Action 
                                       <span class="caret"></span>
                                       </button>
                                       <ul class="dropdown-menu">
                                          <li><a href="#">Action</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Separated link</a></li>
                                       </ul>
                                    </div>
                                    <!-- /btn-group -->
                                    <input class="m-wrap medium" type="text" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Basic Toggle Button</label>
                              <div class="controls">
                                 <div class="basic-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Toggle Buttons with Text</label>
                              <div class="controls">
                                 <div class="text-toggle-button">
                                    <input type="checkbox" class="toggle" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Styled Toggle Button</label>
                              <div class="controls">
                                 <div class="danger-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                                 <div class="info-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                                 <div class="success-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                                 <div class="warning-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Height Toggle Button</label>
                              <div class="controls">
                                 <div class="height-toggle-button">
                                    <input type="checkbox" class="toggle" checked="checked" />
                                 </div>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">WYSIWYG Editor</label>
                              <div class="controls">
                                 <textarea class="span12 wysihtml5 m-wrap" rows="6"></textarea>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">CKEditor</label>
                              <div class="controls">
                                 <textarea class="span12 ckeditor m-wrap" name="editor1" rows="6"></textarea>
                              </div>
                           </div>
                           <div class="form-actions">
                              <button type="submit" class="btn blue">Submit</button>
                              <button type="button" class="btn">Cancel</button>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END EXTRAS PORTLET-->
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      2013 &copy; Metronic by keenthemes.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-angle-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo $webroot_path; ?>assets/js/jquery-1.8.3.min.js"></script>    
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/ckeditor/ckeditor.js"></script>  
   <script src="<?php echo $webroot_path; ?>assets/breakpoints/breakpoints.js"></script>       
   <script src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>   
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="<?php echo $webroot_path; ?>assets/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="assets/js/excanvas.js"></script>
   <script src="assets/js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script src="<?php echo $webroot_path; ?>assets/js/app.js"></script>     
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <script type="text/javascript">
     var _gaq = _gaq || [];
     _gaq.push(['_setAccount', 'UA-37564768-1']);
     _gaq.push(['_setDomainName', 'keenthemes.com']);
     _gaq.push(['_setAllowLinker', true]);
     _gaq.push(['_trackPageview']);
     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>