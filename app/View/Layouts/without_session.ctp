<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php
$webroot_path=$this->requestAction(array('controller' => 'Fns', 'action' => 'webroot_path'));
?>
  <meta charset="utf-8" />
  <title>HousingMatters | Making Life Simpler</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/metro.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style1.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style_responsive1.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/uniform/css/uniform.default.css" />
  <link rel="shortcut icon" href="<?php echo $webroot_path; ?>favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
label.valid {
  width: 24px;
  height: 0px;
  background: url(as/img/valid.png) center center no-repeat;
  text-indent: -9999px;
  position:fixed;
}
label.error {
	font-style: italic;
	color: red;
	padding: 2px 8px;
	font-size: 12px;
}
.login .content .input-icon{

}
.login .content .m-wrap{
border-left:auto;
}
</style>
 <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo $webroot_path; ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script> 
  <script src="<?php echo $webroot_path; ?>assets/js/jquery.blockui.js"></script>
  <script src="<?php echo $webroot_path; ?>assets/js/app.js"></script>
  <script src="<?php echo $webroot_path; ?>as/js/jquery.validate.js"></script> 
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <?php echo $this->fetch('content'); ?>  
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    HousingMatters
  </div>
  <!-- END COPYRIGHT -->
 
</body>
<!-- END BODY -->
</html>