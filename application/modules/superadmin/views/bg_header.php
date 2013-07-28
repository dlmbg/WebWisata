
<doctype html>
<html>
<head>
	<title><?php echo $_SESSION['site_title']; ?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/main.js"></script>
	<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js" type="text/javascript"></script>
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top m-header">
		<div class="navbar-inner m-inner">
		
			<div class="container-fluid">
				<a target="_blank" class="brand m-brand" href="<?php echo base_url(); ?>"><?php echo $_SESSION['site_title']; ?><h4><?php echo $_SESSION['site_quotes']; ?></h4></a>
		        
				<div class="nav-collapse collapse">
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user"); ?>
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/profil"><i class="icon-map-marker"></i> User Profil</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/password"><i class="icon-folder-open"></i> User Password</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>auth/user_login/logout"><i class="icon-off"></i> Log Out</a></li>
				        </ul>
			      	</div>
	
					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-cog"></i> Configuration
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="<?php echo base_url(); ?>superadmin/user"><i class="icon-leaf"></i> User Management</a></li>
							
	 		 				<li class="divider"></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/routing_pages"><i class="icon-refresh"></i> Routing Pages</a></li>
			          		<li><a href="<?php echo base_url(); ?>superadmin/sistem"><i class="icon-fire"></i> Sistem</a></li>
				        </ul>
			      	</div>
				
					<div class="btn-group pull-right">
							<a class="btn" href="<?php echo base_url(); ?>superadmin">
								<i class="icon-home"></i> Dashboard
							</a>
					</div>
	          	</div>
			</div>
		</div>
	</div>
	<div class="m-top"></div>
	<aside class="sidebar">
		<ul class="nav nav-tabs nav-stacked">

			<li class="<?php echo $aktif_slide_banner; ?>">
				<a href="<?php echo base_url(); ?>superadmin/slide_banner">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-slider.png">
						</div>
						<div class="title">
							SLIDE BANNER
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_category; ?>">
				<a href="<?php echo base_url(); ?>superadmin/category">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-category.png">
						</div>
						<div class="title">
							 CATEGORY
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="<?php echo $aktif_product; ?>">
				<a href="<?php echo base_url(); ?>superadmin/product">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-product.png">
						</div>
						<div class="title">
							PRODUCT
						</div>
					</div>
					<div class="arrow">
						<div class="bubble-arrow-border"></div>
						<div class="bubble-arrow"></div>
					</div>
				</a>
			</li>

			<li class="">
				<a href="#" id="btn-more">
					<div>
						<div class="ico">
							<img src="<?php echo base_url(); ?>asset/admin/images/ico-more.png">
						</div>
						<div class="title">
							MORE
						</div>
					</div>
				</a>

			</li>
	    </ul>
	</aside>
	<div class="m-sidebar-collapsed">
		<ul class="nav nav-pills">
			
		</ul>

		<div class="arrow-border">
			<div class="arrow-inner"></div>
		</div>
	</div>