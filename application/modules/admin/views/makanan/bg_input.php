		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Makanan</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Makanan</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/makanan/simpan"); ?>
								
								<label for="nama">Nama Makanan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama" name="nama" placeholder="nama makanan" value="<?php echo $nama; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="keterangan">Keterangan</label>
								<div class="cleaner_h5"></div>
								<textarea name="keterangan" class="ckeditor" cols="50" rows="6"><?php echo $keterangan; ?></textarea>
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
		