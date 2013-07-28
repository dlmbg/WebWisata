		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Kecamatan</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Kecamatan</a></h5>
							</div>
							<div class="widget-content nopadding">
							
								<div class="well">
									<?php echo $data_retrieve; ?>
								</div>							
							</div>
						</div>
						
					</div>
				</div>
		