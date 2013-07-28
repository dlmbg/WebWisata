<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Srikandi Aquarium</title>
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/menu.css" rel="stylesheet" type="text/css" /> 
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/menu.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery-ui.min.js" ></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.ticker.js"></script> 
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/site.js"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/slideshow.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/utilities.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.jcarousel.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/bootstrap-carousel.js" type="text/javascript"></script>
	
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/css/jquery.treeview.css" />
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.treeview.js" type="text/javascript"></script>

<script type="text/javascript"> 
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
		$("#browser").treeview({
		animated:"fast",
		persist: "cookie"
	});
		 $('#myCarousel').carousel();

	});
</script> 
</head>

<body onload="goforit();">
<div id="first-top-menu">
	<div style="float:left; width:560px; padding-top:6px; text-shadow:1px 1px #000;">
	<b>Welcome user... </b>| <script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/clock.js" type="text/javascript"></script><span id="clock"></span>
	</div>
	
	<div style="float:right; width:400px;">
	<?php echo form_open("web/produk/set",'class="quick_search"'); ?>
	<input type="text" name="cari" placeholder="Search our product here......" value="<?php echo $this->session->userdata("search_product"); ?>">
	<input type="submit" value="SEARCH" />
	<?php echo form_close(); ?>
	</div>
	<div class="cleaner_h0"></div>
</div>
<div id="inner-main-menu">
	<div id="MainMenu"><div id="Menu">
	  <div class="suckertreemenu">
	  		<?php echo $menu_top; ?>
		</div>
	</div>
	</div>
	</div>
</div>

<div class="cleaner_h10"></div>
<div class="cleaner_h5"></div>