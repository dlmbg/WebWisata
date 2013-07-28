		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Sanggar</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Sanggar</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/sanggar/simpan"); ?>
								
								<label for="tanggal">Kelurahan</label>
								<div class="cleaner_h5"></div>
								<select name="id_kelurahan">
									<?php
										foreach($kelurahan->result_array() as $h)
										{
											if($id_kelurahan==$h['id_kelurahan'])
											{
											?>
												<option value="<?php echo $h['id_kelurahan']; ?>" selected><?php echo $h['kelurahan']; ?></option>
											<?php
											}
											else
											{
											?>
												<option value="<?php echo $h['id_kelurahan']; ?>"><?php echo $h['kelurahan']; ?></option>
											<?php
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="nama_sanggar">Nama Sanggar</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_sanggar" name="nama_sanggar" placeholder="Nama Sanggar" value="<?php echo $nama_sanggar; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="alamat">alamat</label>
								<div class="cleaner_h5"></div>
								<textarea name="alamat" class="ckeditor" cols="50" rows="6"><?php echo $alamat; ?></textarea>
								<div class="cleaner_h10"></div>
								
								<label for="keterangan">keterangan</label>
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
		