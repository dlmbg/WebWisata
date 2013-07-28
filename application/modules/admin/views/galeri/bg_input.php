		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Album</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Album</a></h5>
							</div>
							<div class="widget-content nopadding">
							
								<div class="well">
								<?php echo form_open_multipart("admin/galeri/simpan"); ?>
				
								<label for="album">Judul</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="judul" name="judul" placeholder="judul" />
								<div class="cleaner_h10"></div>
				
								<label for="album">File</label>
								<div class="cleaner_h5"></div>
								<input type="file" style="width:90%;" id="file" name="userfile" placeholder="file" />
								<div class="cleaner_h10"></div>
								
								
								<input type="hidden" name="id_album" value="<?php echo $id_album; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
								</div>							
							</div>
						</div>
						
					</div>
				</div>
		
