		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">System Settings</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>System Settings</a></h5>
							</div>
							<div class="widget-content nopadding">
							
								<div class="well">
								<?php echo form_open_multipart("admin/sistem/simpan"); ?>
				
								<label for="title">Setting System</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="title" name="title" placeholder="Nama Pengaturan" value="<?php echo $title; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="tipe">Type</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tipe" name="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" readonly="true" />
								<div class="cleaner_h10"></div>
								
								<label for="content_setting">Content of Setting</label>
								<div class="cleaner_h5"></div>
								<textarea name="content_setting" class="ckeditor"><?php echo $content_setting; ?></textarea>
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
		
