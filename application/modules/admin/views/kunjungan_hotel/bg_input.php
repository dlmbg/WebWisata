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
								
								<label for="tanggal">Tanggal</label>
								<div class="cleaner_h5"></div>
								<input type="date" style="width:90%;" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="jk">Jenis Kelamin</label>
								<div class="cleaner_h5"></div>
								<?php
									$l=''; $p='';
									if($jk=="Wanita"){$l=''; $p='selected';}
									else if($jk=="Pria"){$l='selected'; $p='';}
								?>
								<select name="jk">
									<option value="Pria" <?php echo $l; ?>>Pria</option>
									<option value="Wanita" <?php echo $p; ?>>Wanita	</option>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="menu">Asal</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="asal" name="asal" placeholder="asal" value="<?php echo $asal; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="total">Total</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="total" name="total" placeholder="total" value="<?php echo $total; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="lama_inap">Lama Inap</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="lama_inap" name="lama_inap" placeholder="lama_inap" value="<?php echo $lama_inap; ?>" />
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
		