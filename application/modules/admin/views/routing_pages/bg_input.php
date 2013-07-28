		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Routing Pages</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Routing Pages</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/routing_pages/simpan"); ?>
				
								<label for="menu">Judul Menu</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="menu" name="menu" placeholder="Judul Menu" value="<?php echo $menu; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="url_route">URL Route </label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="url_route" name="url_route" placeholder="URL Route" value="<?php echo $url_route; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="content">Content</label>
								<div class="cleaner_h5"></div>
								<textarea name="content" class="ckeditor" cols="50" rows="6"><?php echo $content; ?></textarea>
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>	
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		