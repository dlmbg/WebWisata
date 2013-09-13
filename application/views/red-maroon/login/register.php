<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
		
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/signin.css" rel="stylesheet" type="text/css" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="account-container">
	
	<div class="content clearfix">
		
			<h1><?php echo $GLOBALS['site_title']; ?></h1>		
			
			<div class="well">
			<?php echo form_open_multipart("login/act_register"); ?>
			
			<label for="menu">Nama</label>
			<div class="cleaner_h5"></div>
			<input type="search" style="width:90%;" id="nama_user" name="nama_user" placeholder="Nama User" required />
			<div class="cleaner_h10"></div>
			
			<label for="menu">Username</label>
			<div class="cleaner_h5"></div>
			<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" required />
			<div class="cleaner_h10"></div>
			
			<label for="menu">Password</label>
			<div class="cleaner_h5"></div>
			<input type="password" style="width:90%;" id="password" name="password" placeholder="Password" required />
			<div class="cleaner_h10"></div>
			
			<div class="cleaner_h10"></div>
			<input type="submit" class="btn btn-info" value="SIMPAN" />
			<?php echo form_close(); ?>
		</div>
				<p align="center"><?php echo $GLOBALS['site_footer']; ?></p>
			
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript"> 
		$(".chzn-select").chosen();
	</script>

</body>
</html>
