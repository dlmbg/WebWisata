		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Contact</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Contact</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/contact/simpan"); ?>
								
								<label for="menu">Nama</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Email</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="email" name="email" placeholder="email" value="<?php echo $email; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="asal">Asal</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="asal" name="asal" placeholder="asal" value="<?php echo $asal; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="no_telpon">Telepon</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="no_telpon" name="no_telpon" placeholder="Telepon" value="<?php echo $no_telpon; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="pesan">Pesan</label>
								<div class="cleaner_h5"></div>
								<textarea name="pesan" class="ckeditor" cols="50" rows="6"><?php echo $pesan; ?></textarea>
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		