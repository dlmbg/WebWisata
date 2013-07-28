		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Berita</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Berita</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/soal/simpan"); ?>
								
								<label for="menu">Jawaban</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="jawaban_polling" name="jawaban_polling" placeholder="Judul" value="<?php echo $jawaban_polling; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="hit">Hit</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="hit" name="hit" placeholder="hit" value="<?php echo $hit; ?>" />
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<input type="hidden" name="id_polling" value="<?php echo $id_polling; ?>" />
								<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		