<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mapjs/prototype.js"></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mapjs/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mapjs/wz_jsgraphics.js"></script>
<script class="javascript" src="<?php echo base_url(); ?>asset/js/mapjs/shCore.js"></script>
<script class="javascript" src="<?php echo base_url(); ?>asset/js/mapjs/shBrushXml.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mapjs/imagemapcreator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>
		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Objek Wisata</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Objek Wisata</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							 <div class="well">
                                <style>
                                    #map {
                                        cursor:crosshair;
                                        position:relative;
                                        text-align: center;
                                        margin: 0px auto;
                                        width:900px; 
                                        height:870px;
                                        background-color:#f0f0f0;
                                        border:1px solid black;
                                        background-repeat:no-repeat;
                                        margin-top:30px;
                                        margin-bottom:30px;
                                        background-image:url("<?php echo base_url(); ?>asset/images/peta_tambah.jpg");
                                    }
                                </style>
                                <div id="map"></div>
                                <a href="" id="delete" style="display:block"></a>
                            </div>    
                            <?php echo form_open('admin/objek_wisata/simpan','class="form-horizontal"'); ?>

                              <div class="control-group">
                                <label class="control-label" for="">Nama Objek Wisata</label>
                                <div class="controls">
                                  <input type="text" name="nama_objek_wisata" value="<?php echo $nama_objek_wisata; ?>">
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="">Jenis</label>
                                <div class="controls">
                                    <select name="jenis">
                                        <?php
                                        $r=''; $a=''; $b=''; $s=''; $ag='';
                                        if($jenis=="religi"){$r='selected'; $a=''; $b=''; $s=''; $ag='';}
                                        else if($jenis=="alam"){$r=''; $a='selected'; $b=''; $s=''; $ag='';}
                                        else if($jenis=="budaya"){$r=''; $a=''; $b='selected'; $s=''; $ag='';}
                                        else if($jenis=="sejarah"){$r=''; $a=''; $b=''; $s='selected'; $ag='';}
                                        else if($jenis=="agro"){$r=''; $a=''; $b=''; $s=''; $ag='selected';}
                                        ?>
                                        <option value="religi" <?php echo $r; ?>>Religi</option>
                                        <option value="alam" <?php echo $a; ?>>Alam</option>
                                        <option value="budaya" <?php echo $b; ?>>Budaya</option>
                                        <option value="sejarah" <?php echo $s; ?>>Sejarah</option>
                                        <option value="agro" <?php echo $ag; ?>>Agro</option>
                                    </select>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="">Koordinat</label>
                                <div class="controls">
                                  <textarea style="width:400px; height150px;" id="code" name="koordinat"><?php echo $koordinat; ?></textarea>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="">Keterangan</label>
                                <div class="controls">
                                  <textarea placeholder="" class="ckeditor" name="keterangan" style="width:400px; height:100px"><?php echo $keterangan; ?></textarea>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="">Alamat</label>
                                <div class="controls">
                                  <textarea placeholder="" class="ckeditor" name="alamat" style="width:400px; height:100px"><?php echo $alamat; ?></textarea>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="">Nama Kelurahan</label>
                                <div class="controls">
                                <select name="id_kelurahan">
                                <?php
                                    foreach($data_kelurahan->result_array() as $dk)
                                    {
                                        if($id_kelurahan==$dk['id_kelurahan'])
                                        {
                                ?>
                                    <option value="<?php echo $dk['id_kelurahan']; ?>" selected="selected"><?php echo $dk['kelurahan']; ?></option>
                                <?php
                                        }
                                        else
                                        {
                                ?>
                                    <option value="<?php echo $dk['id_kelurahan']; ?>"><?php echo $dk['kelurahan']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                                </select>
                                <input type="hidden" name="st-input" value="<?php echo $st; ?>">
                                <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                                </div>
                              </div>
                              <div class="control-group">
                                <div class="controls">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                    <input type="reset" value="Reset" class="btn">
                                </div>
                              </div>
                            <?php echo form_close(); ?>
                        </div>
						</div>
						
					</div>
				</div>
		