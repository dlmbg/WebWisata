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
								<h5>Kelurahan</a></h5>
							</div>
							<div class="widget-content nopadding">
							
								<div class="well">
								<?php echo form_open_multipart("admin/kelurahan/simpan"); ?>
				
								<label for="nama_kelurahan">Nama Kelurahan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_kelurahan" name="nama_kelurahan" placeholder="Nama Kelurahan" value="<?php echo $nama_kelurahan; ?>" />
								<div class="cleaner_h10"></div>
				
								<label for="nama_kelurahan">Nama Kelurahan</label>
								<div class="cleaner_h5"></div>
								<select name="id_kecamatan" style="width:80%;">
								<?php 
								foreach($kecamatan->result_array() as $k)
								{
									if($id_kecamatan==$k['id_kecamatan'])
									{
									?>
										<option value="<?php echo $k['id_kecamatan']; ?>" selected><?php echo $k['nama_kecamatan']; ?></option>
									<?php
									}
									else 
									{
									?>
										<option value="<?php echo $k['id_kecamatan']; ?>"><?php echo $k['nama_kecamatan']; ?></option>
									<?php
									}
								}
								?>
								</select>
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
		
