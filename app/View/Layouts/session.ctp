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
   <title>HousingMatters | Making life simpler</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>css/loding_img.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo $webroot_path; ?>assets/css/metro.css" rel="stylesheet" />
	
	<link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style1.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/flash.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style_responsive1.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/uniform/css/uniform.default.css" />
	    <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/jquery-tags-input/jquery.tagsinput.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-datepicker1/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-datetimepicker/css/datetimepicker.css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="<?php echo $webroot_path; ?>assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="<?php echo $webroot_path; ?>assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link href="<?php echo $webroot_path; ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link href="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?php echo $webroot_path; ?>app/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $webroot_path; ?>as/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $webroot_path; ?>as/animate.css" rel="stylesheet" />
<link href="<?php echo $webroot_path; ?>as/demo-styles.css" rel="stylesheet" />
<link href="<?php echo $webroot_path; ?>assets/css/mobile_responsive1.css" rel="stylesheet" />
		<style>
		label.error {
			color: red;
			font-size: 12px;
		}
		label.valid {
		  width: 24px;
		  height: 0px;
		  background: url(as/img/valid.png) center center no-repeat;
		  text-indent: -9999px;
		  position:fixed;
		}
		.dropdown-menu li > a:hover, 
		.dropdown-menu .active > a, 
		.dropdown-menu .active > a:hover {
		  text-decoration: none;
		  background-image: none;
		  background-color: #eee !important;
		  color: #333;
		  filter:none;
		}
		
		</style>
		<style media="print">
		.hide_at_print {
			display:none !important;
		}
		.print_margin {
			margin-left:5%;
			}
			.hide_to_show{
			    display: block !important;
			
			}
		</style>

	
<!-----js--------------->
    <script src="<?php echo $webroot_path; ?>assets/js/shortcut.js"></script> 	
	<script src="<?php echo $webroot_path; ?>assets/js/jquery-1.8.3.min.js"></script>			
	<script src="<?php echo $webroot_path; ?>assets/breakpoints/breakpoints.js"></script>			
	<script src="<?php echo $webroot_path; ?>assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
	<script src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/jquery.blockui.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>	
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/flot/jquery.flot.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/flot/jquery.flot.resize.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/flot/jquery.flot.pie.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/flot/jquery.flot.stack.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/flot/jquery.flot.crosshair.js"></script>
	   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/ckeditor/ckeditor.js"></script>  
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap-fileupload.js"></script>
     <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-datepicker1/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script> 

   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?php echo $webroot_path; ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo $webroot_path; ?>assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
   	<script src="<?php echo $webroot_path; ?>assets/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/jquery.cookie.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>	
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo $webroot_path; ?>assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>	
		<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/js/jquery.pulsate.min.js"></script>	
	  <script src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script> 
 	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/gmaps.js"></script>
	<script src="<?php echo $webroot_path; ?>assets/js/demo.gmaps.js"></script>
		<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/data-tables/jquery.dataTables1.js"></script>
	<script type="text/javascript" src="<?php echo $webroot_path; ?>assets/data-tables/DT_bootstrap.js"></script>
		<script src="<?php echo $webroot_path; ?>assets/js/app.js"></script>		
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage('calendar');
			App.init();
		});
	</script>
	
<script src="<?php echo $webroot_path; ?>as/js/jquery.validate.min.js"></script>
   <script>
	$(document).ready(function() {
		$.ajax({
			url: "<?php echo Router::url(array('controller' => 'Hms', 'action' =>'menus_as_per_user_rights'), true); ?>",
		}).done(function(response) {
			//alert(response);
			$("#menus_area").append(response);
		});
	});
	</script>
   <!-- END JAVASCRIPTS -->    
   
<script>
$(document).ready(function() {
	$(".header_task_bar").on("click",function(){
		$.ajax({
		   url: "<?php echo $webroot_path ; ?>Hms/notifications",
		   success: function(data){
				$("#notification_div").html(data);
		   }
		 });
	})
	
	$(".notification_tab").live("click",function(){
		var notification_id=$(this).attr("notification_id");
		$.ajax({
		   url: "<?php echo $webroot_path ; ?>Hms/seen_notification/"+notification_id,
		   success: function(data){
				
		   }
		 });
	})
	
	$("#mark_all").live("click",function(){
	
		$.ajax({
		   url: "<?php echo $webroot_path ; ?>Hms/mark_all_as_read_notifications",
		   success: function(data){
				//alert(data);
		   }
		 });
	})
	
	
	setInterval(function(){ 
	   $.ajax({
		   url: "<?php echo $webroot_path ; ?>Hms/notifications_count/",
		   success: function(data){
			   if(data!=""){
					var q=$("#notification_signer").html();
					
					if(q<data){
						$('<audio id="chatAudio"><source src="<?php echo $webroot_path ; ?>app/webroot/notification_sound.mp3" type="audio/wav"></audio>').appendTo('body');
						$('#chatAudio')[0].play();
					}
			   }
			   $("#notification_signer").html(data);
		   }
		 });
	}, 1000);
	
	

	$("a[rel='tab']").live('click',function(e){
		e.preventDefault();
		
		$(".nav-collapse").css("height","0");
		$(".nav-collapse").removeClass("in");
		$(".btn-navbar").addClass("collapsed"); 
		$("#loading").show();
		
		pageurl = $(this).attr('href');
		$.ajax({
			url: pageurl,
			}).done(function(response) {
			
			$(".page-content").html(response);
		
			$("#loading").hide();
		
			$("html, body").animate({
				scrollTop:0
			},"slow");
			$('#submit_success').hide();
			});
		
		window.history.pushState({path:pageurl},'',pageurl);
	});
	
	
	
	$("a[role='button']").live('click',function(e){
		e.preventDefault();
	});
	
	$('a[role="button"]').live('click',function(e){
		e.preventDefault();
	});
	
	window.onpopstate = function(s) {
		pageurl = location.pathname;
		$('.page-content').load(pageurl+'?rel=tab');
		
	};
	
	
$("#menus_area>li").live('click',function(e){
	$("li").removeClass("active");
	$(this).addClass("active");
});

});
</script>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

   <!-- BEGIN HEADER -->
   <div class="header navbar navbar-inverse navbar-fixed-top hide_at_print">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
         <div class="container-fluid" style="background-color:#333;">
            <!-- BEGIN LOGO -->
            <a class="brand desktop" href="<?php echo $webroot_path; ?>Hms/Dashboard" style="margin-top: -3px;"> 
            <img src="<?php echo $webroot_path; ?>as/hm/housingmatterslogo.png" alt="HousingMatters" style="height: 30px;" />
            </a>
			<a class="brand mobile" href="<?php echo $webroot_path; ?>Hms/Dashboard" style="margin-top: -3px;padding-left: 0 !important;padding-right: 0 !important;"> 
            <img src="<?php echo $webroot_path; ?>as/hm/housingmattersmobilelogo.png" alt="HousingMatters" style="height: 30px;" />
            </a>
			
			
			<?php
			$s_user_id=$this->Session->read('hm_user_id');
			$user_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_info_via_user_id'), array('pass' => array($s_user_id)));
				$user_type=$user_info[0]["user"]["user_type"]; 
				$name=$user_info[0]["user"]["user_name"];
				$profile_pic=@$user_info[0]["user"]["profile_pic"];
				$g_profile_pic=@$user_info[0]["user"]["g_profile_pic"];
				$f_profile_pic=@$user_info[0]["user"]["f_profile_pic"];
				$da_society_id=@$user_info[0]["user"]["society_id"];
			
			if($user_type=="third_party" or $user_type=="member" or $user_type=="family_member"){
				
				$role_result=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_all_role_via_user_id'), array('pass' => array($s_user_id)));
				
		
			$role_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'default_role_name_via_user_id'), array('pass' => array($s_user_id)));
			
			$s_society_id=$this->Session->read('hm_society_id');
			$society_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'society_name_via_society_id'), array('pass' => array($s_society_id)));
			}
			if($user_type=="hm_child"){
			$role_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'default_role_name_via_user_id'), array('pass' => array($s_user_id))); 
			
			$s_society_id=$this->Session->read('hm_society_id');
			$society_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'society_name_via_society_id'), array('pass' => array($s_society_id)));
			}
		
			if(!empty($society_name)){
			?>
			<a class="btn" href="#" role="button" style="color:white; background-color:#333;font-size: 14px;font-weight: bold;cursor: default;"><?php echo $society_name; ?></a>
			<?php } ?>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="<?php echo $webroot_path; ?>assets/img/menu-toggler.png" alt="" />
            </a>          
            <!-- END RESPONSIVE MENU TOGGLER -->            
            <!-- BEGIN TOP NAVIGATION MENU -->              
            <ul class="nav pull-right">
					<li class="dropdown header_task_bar" id="">
						<a href="#" class="dropdown-toggle header_task_bar" data-toggle="dropdown" >
						<i class="icon-bell header_task_bar"></i>
						<span class="badge header_task_bar" id="notification_signer"></span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li>
								<p><i class="icon-bell"></i> Notifications <span class="pull-right" id="mark_all" style="cursor: pointer;font-size: 12px;"> Mark All</span></p>
								
							</li>
							<div class="scroller" data-height="300px" data-always-visible="1" data-rail-visible="1" id="notification_div">
											
							<div align="center"><br/>Loading...</div>
							
							
							</div>
							<li class="external">
								<a href="<?php echo $webroot_path; ?>Hms/see_all_notifications">See all tasks <i class="m-icon-swapright"></i></a>
							</li>
						</ul>
					</li>
			
			
               <!-- BEGIN USER LOGIN DROPDOWN -->
               <li class="dropdown user" style="margin-right: 10px;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px !important;">
                   <table style="" cellpadding="0" cellspacing="0">
					<tr>
						<td rowspan="2" style="padding: 6px 4px;">
						
						<?php if(!empty($profile_pic) && $profile_pic!="blank.jpg"){ ?>
						<img alt="" src="<?php echo $webroot_path; ?>profile/<?php echo @$profile_pic; ?>"  style="width:28px; height:28px;" />
						<?php }
						elseif(!empty($f_profile_pic)){ ?>
							<img alt="" src="<?php echo $f_profile_pic; ?>"  style="width:28px; height:28px;" />
						<?php }
						elseif(!empty($g_profile_pic)){ ?>
							<img alt="" src="<?php echo $g_profile_pic; ?>"  style="width:28px; height:28px;" />
						<?php }
						else{ ?>
							<img alt="" src="<?php echo $webroot_path; ?>profile/blank.jpg"  style="width:28px; height:28px;" />
						<?php } ?>
						
							
						</td>
						<td style="padding: 1px; font-weight: 600; font-size: 12px;">
							 <table cellpadding="0" cellspacing="0" style="line-height: 14px;">
							  <tr>
								<td style="padding: 1px; font-size: 12px; color: white; font-weight: bold;">
								<?php echo $name; ?>
								</td>
							  </tr>
							  <tr>
								<td style="font-size: 12px;color:white !important;">
								<?php echo @$role_name; ?>
								</td>
							  </tr>
							</table>
						</td>
					</tr>
				   </table>
				  
				 
                  </a>
                  <ul class="dropdown-menu">
                     <li><a href="<?php echo $webroot_path; ?>Hms/profile" rel='tab'><i class="icon-user"></i> My Profile</a></li>
					<?php  if($user_type!='hm'){ if(sizeof(@$role_result)>1){ ?>
                     <li><a href="<?php echo $webroot_path; ?>Hms/change_role_member" rel='tab'><i class="fa fa-exchange"></i> Change Role</a></li>
					 <?php } } ?>
					 <?php 
					 $hms_user_right=@$this->requestAction(array('controller' => 'Fns', 'action' => 'hm_users_right'), array('pass' => array($s_user_id)));
					 if($user_type=="hm_child" && sizeof(@$hms_user_right)>1){ ?>
					 <li><a href="<?php echo $webroot_path; ?>Hms/switch_society" rel='tab'><i class="fa fa-home" aria-hidden="true"></i> Switch Society</a></li>
					 <?php } ?>
					<?php  if(sizeof(@$da_society_id)>1){ ?>
					 <li><a href="<?php echo $webroot_path; ?>Hms/switch_society_member" rel='tab'><i class="fa fa-home" aria-hidden="true"></i> Switch Society </a></li>
					 <?php } ?>
					  <li><a href="<?php echo $webroot_path; ?>Hms/change_new_password" rel='tab'><i class="fa fa-unlock-alt"></i> Change Password</a></li>
                     <li class="divider"></li>
                     <li><a href="<?php echo $webroot_path; ?>Hms/logout" ><i class="icon-key"></i> Log Out</a></li>
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
      <div class="page-sidebar nav-collapse collapse" >
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="clearfix"></div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
         <ul id="menus_area">
            <li class="active">
               <a href="<?php echo $webroot_path; ?>Hms/Dashboard">
               <i class="icon-home"></i> Dashboard               
               </a>              
            </li>
			
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE --> 
 	  
      <div class="page-content" style="background-color:white;">
         
         <!-- BEGIN PAGE CONTAINER-->
		
         <div class="container-fluid" id="ctp_content_area">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row-fluid">
				<div  id="content">
				
					<?php echo $this->fetch('content'); ?>
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
   <div class="footer hide_at_print" >
      HousingMatters
      <div class="span pull-right">
         <span class="go-top"><i class="icon-angle-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
			</div>
		</div>
	</div>
	<script>
	function change_page_automatically(url_page){
		$("#loading").show();
		pageurl = url_page;
		$.ajax({
		url: pageurl,
		}).done(function(response) {
			$(".page-content").html(response);
			$("#loading").hide();
			$("html, body").animate({
				scrollTop:0
			},"slow");
			$('#submit_success').hide();
		});
	}
	</script>
</body>
<!-- END BODY -->
</html>




