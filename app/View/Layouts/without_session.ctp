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
  <title>Metronic Admin Dashboard Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo $webroot_path; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/metro.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo $webroot_path; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" href="<?php echo $webroot_path; ?>assets/uniform/css/uniform.default.css" />
  <link rel="shortcut icon" href="<?php echo $webroot_path; ?>favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <?php echo $this->fetch('content'); ?>  
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    2013 &copy; Metronic. Admin Dashboard Template.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo $webroot_path; ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo $webroot_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?php echo $webroot_path; ?>assets/uniform/jquery.uniform.min.js"></script> 
  <script src="<?php echo $webroot_path; ?>assets/js/jquery.blockui.js"></script>
  <script src="<?php echo $webroot_path; ?>assets/js/app.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
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