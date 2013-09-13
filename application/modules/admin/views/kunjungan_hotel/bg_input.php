		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Kunjungan Hotel</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Kunjungan Hotel</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/kunjungan_hotel/simpan"); ?>
								
								<label for="tanggal">Hotel</label>
								<div class="cleaner_h5"></div>
								<select name="id_hotel">
									<?php
										foreach($hotel->result_array() as $h)
										{
											if($id_hotel==$h['id_hotel'])
											{
											?>
												<option value="<?php echo $h['id_hotel']; ?>" selected><?php echo $h['nama_hotel']; ?></option>
											<?php
											}
											else
											{
											?>
												<option value="<?php echo $h['id_hotel']; ?>"><?php echo $h['nama_hotel']; ?></option>
											<?php
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="tanggal">Bulan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="bulan" name="bulan" placeholder="bulan" value="<?php echo $bulan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Tahun</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun" name="tahun" placeholder="tahun" value="<?php echo $tahun; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="total">Jumlah Pria</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="pria" name="pria" placeholder="pria" value="<?php echo $pria; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="total">Jumlah Wanita</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="wanita" name="wanita" placeholder="wanita" value="<?php echo $wanita; ?>" />
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
		