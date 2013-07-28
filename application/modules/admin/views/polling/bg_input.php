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
								<?php echo form_open_multipart("admin/polling/simpan"); ?>
				
								<label for="soal">Soal Polling</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="soal" name="soal" placeholder="soal" value="<?php echo $soal; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="jk">Aktif</label>
								<div class="cleaner_h5"></div>
								<?php
									$a=''; $t='';
									if($aktif=="1"){$a='selected'; $t='';}
									else if($aktif=="0"){$a=''; $t='selected';}
								?>
								<select name="aktif">
									<option value="1" <?php echo $a; ?>>Aktif</option>
									<option value="0" <?php echo $t; ?>>Tidak	</option>
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
		
