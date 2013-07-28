<div id="content">
	<?php echo $this->breadcrumb->output(); ?>
	
	<div id="content-left">	
		<div class="cleaner_h20"></div>
			<div id="bg-sidebar">
				<div id="head-sidebar">OUR PRODUCTS</div>
				<div id="content-sidebar">
				<?php echo $menu_kategori; ?>
				</div>
		</div>
		
		<div class="cleaner_h20"></div>
		<div id="bg-sidebar">
			<div id="head-sidebar">CONTACT US</div>
			<div id="content-sidebar">
				<?php echo $_SESSION['site_contact']; ?>
			</div>
		</div>
	</div>