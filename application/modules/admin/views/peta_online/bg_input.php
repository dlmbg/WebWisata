<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "Kawasan Bencana";
var judulx = new Array();
var desx = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    var koor = new google.maps.LatLng(-8.287599,122.854614);
    var petaoption = {
        zoom: 14,
        center: koor,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
}

$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&judul="+judul+"&des="+des+"&jenis="+jenis,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#judul").val("");
                $("#deskripsi").val("");
                ambildatabase('akhir');
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

function set_icon(jenisnya){
    switch(jenisnya){
        case "Kawasan Bencana":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/1.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                desx[i] = msg.wilayah.petak[i].deskripsi;

                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksjudul").html(judulx[nomor]);
        $("#teksdes").html(desx[nomor]);
    });
}
</script>
		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Peta Online</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Peta Online</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							 <div class="well">
                                <div>
                                        <div id="petaku" style="width:100%; height:500px"></div>
                                </div>
                                <p></p>
                                <?php echo form_open('admin/peta_online/simpan','class="form-horizontal"'); ?>
                                  <div class="control-group">
                                    <label class="control-label" for="">Jenis</label>
                                    <div class="controls">
                                      <input type=text id="jenis" name="jenis" value="<?php echo $jenis; ?>">
                                    </div>
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="">Longitude</label>
                                    <div class="controls">
                                     <input type=text id="x" name="lat" value="<?php echo $lat; ?>">
                                    </div>
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="">Latitude</label>
                                    <div class="controls">
                                      <input type=text id="y" name="long" value="<?php echo $long; ?>">
                                    </div>
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="">Judul</label>
                                    <div class="controls">
                                      <input type="text" style="width:400px; height150px;" id="code" name="judul" value="<?php echo $judul; ?>">
                                    </div>
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="">Keterangan</label>
                                    <div class="controls">
                                      <textarea placeholder="" class="ckeditor" name="keterangan" style="width:400px; height:100px"><?php echo $keterangan; ?></textarea>
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
                                    <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
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
				</div>
		