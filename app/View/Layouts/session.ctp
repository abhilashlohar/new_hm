<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Metronic | Gallery</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<?php
	echo $this->fetch('meta');
	$webroot_path=$this->requestAction(array('controller' => 'Fns', 'action' => 'webroot_path'));
	?>
	<link href="<?php echo $webroot_path; ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/metro.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/uniform/css/uniform.default.css" />
	<link rel="shortcut icon" href="<?php echo $webroot_path; ?>favicon.ico" />
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
				<img src="<?php echo $webroot_path; ?>assets/img/logo.png" alt="logo" />
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
						<span class="badge">6</span>
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
				<li>
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
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-table"></i> Form Stuff
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="form_layout.html">Form Layouts</a></li>
						<li><a class="" href="form_component.html">Form Components</a></li>
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
				<li class="active">
					<a class="" href="gallery.html"><i class="icon-camera"></i> Gallery
					<span class="selected"></span>
					</a>
				</li>
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
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Gallery
							<small>image gallery manager</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">Gallery</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN GALLERY MANAGER PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i>Gallery Manager</h4>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<!-- BEGIN GALLERY MANAGER PANEL-->
								<div class="row-fluid">
									<div class="span4">
										<h4>Browsing Category 1</h4>
									</div>
									<div class="span8">
										<div class="pull-right">
											<select data-placeholder="Select Category" class="chosen" tabindex="-1" id="inputCategory">
												<option value="0" />
												<option value="1" />All
												<option value="1" />Category 1
												<option value="1" />Category 2
												<option value="1" />Category 3
												<option value="1" />Category 4
											</select>
											<select data-placeholder="Sort By" class="chosen input-small" tabindex="-1" id="inputSort">
												<option value="0" />
												<option value="1" />Date
												<option value="1" />Author
												<option value="1" />Title
												<option value="1" />Hits
											</select>
											<div class="clearfix space5"></div>
											<a href="" class="btn pull-right green"><i class="icon-plus"></i> Upload</a>
										</div>
									</div>
								</div>
								<!-- END GALLERY MANAGER PANEL-->
								<hr class="clearfix" />
								<!-- BEGIN GALLERY MANAGER LISTING-->
								<div class="row-fluid">
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image1.jpg">
												<div class="zoom">
													<img src="assets/img/gallery/image1.jpg" alt="Photo" />							
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image2.jpg">
												<div class="zoom">
													<img src="assets/img/gallery/image2.jpg" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image3.jpg">
												<div class="zoom">
													<img src="assets/img/gallery/image3.jpg" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image4.jpg">
												<div class="zoom">
													<img src="assets/img/gallery/image4.jpg" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image1.png">
												<div class="zoom">
													<img src="assets/img/gallery/image1.png" alt="Photo" />							
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image2.png">
												<div class="zoom">
													<img src="assets/img/gallery/image2.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image3.png">
												<div class="zoom">
													<img src="assets/img/gallery/image3.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image4.png">
												<div class="zoom">
													<img src="assets/img/gallery/image4.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
								</div>
								<div class="space10"></div>
								<div class="row-fluid">
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image5.png">
												<div class="zoom">
													<img src="assets/img/gallery/image5.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image6.png">
												<div class="zoom">
													<img src="assets/img/gallery/image6.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image7.png">
												<div class="zoom">
													<img src="assets/img/gallery/image7.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="assets/img/gallery/image8.png">
												<div class="zoom">
													<img src="assets/img/gallery/image8.png" alt="Photo" />										
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
								</div>
								<div class="space10"></div>
								<div class="row-fluid">
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="assets/img/gallery/image9.png">
												<div class="zoom">
													<img src="assets/img/gallery/image9.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="assets/img/gallery/image10.png">
												<div class="zoom">
													<img src="assets/img/gallery/image10.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="assets/img/gallery/image11.png">
												<div class="zoom">
													<img src="assets/img/gallery/image11.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Phone Preview" href="assets/img/gallery/image12.png">
												<div class="zoom">
													<img src="assets/img/gallery/image12.png" alt="Photo" />		
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
								</div>
								<div class="space10"></div>
								<div class="row-fluid">
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="assets/img/gallery/image13.png">
												<div class="zoom">
													<img src="assets/img/gallery/image13.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="assets/img/gallery/image14.png">
												<div class="zoom">
													<img src="assets/img/gallery/image14.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
										<div class="item">
											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="assets/img/gallery/image15.png">
												<div class="zoom">
													<img src="assets/img/gallery/image15.png" alt="Photo" />	
													<div class="zoom-icon"></div>
												</div>
											</a>
											<div class="details">
												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>
												<a href="#" class="icon"><i class="icon-link"></i></a>
												<a href="#" class="icon"><i class="icon-pencil"></i></a>
												<a href="#" class="icon"><i class="icon-remove"></i></a>		
											</div>
										</div>
									</div>
									<div class="span3">
									</div>
								</div>
								<!-- END GALLERY MANAGER LISTING-->
								<!-- BEGIN GALLERY MANAGER PAGINATION-->
								<div class="row-fluid">
									<div class="span12">
										<div class="pagination pull-right">
											<ul>
												<li><a href="#">«</a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#">»</a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- END GALLERY MANAGER PAGINATION-->
							</div>
						</div>
						<!-- END GALLERY MANAGER PORTLET-->
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
	<script src="<?php echo $webroot_path; ?>assets/breakpoints/breakpoints.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/jquery.blockui.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/respond.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script>	
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/app.js"></script>
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
		});
	</script>	
</body>
<!-- END BODY -->
</html>