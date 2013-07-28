<div id="content">

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "restoran";
var judulx = new Array();
var subjudulx = new Array();
var desx = new Array();
var kelurahan = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    goforit();
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
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});

function set_icon(jenisnya){
    switch(jenisnya){
        case "Kawasan Bencana":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/1.png';
            break;
        case "Sarana Kesehatan":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/2.png';
            break;
        case  "Sarana Keamanan":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/3.png';
            break;
        case  "Instansi Penanggulangan Bencana":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/4.png';
            break;
        case  "Lokasi Evakuasi":
            gambar_tanda = '<?php echo base_url(); ?>asset/icon/5.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "<?php echo base_url(); ?>web/peta_online/ambil_data/1";
    }else{
        url = "<?php echo base_url(); ?>web/peta_online/ambil_data/0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                subjudulx[i] = 'Jenis : '+msg.wilayah.petak[i].subjudul;
                desx[i] = 'Kelurahan : '+msg.wilayah.petak[i].kelurahan+'<br>'+msg.wilayah.petak[i].deskripsi;

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
        $("#teksjudul").html(judulx[nomor]+'<br>'+subjudulx[nomor]);
        $("#teksdes").html(desx[nomor]);
    });
}
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;background-color:#000;color:#fff;display:none;}
</style>

	<table id="jendelainfo" border="0" align="center" cellpadding="5" cellspacing="0" style="width="920px" height="200">
		<tr>
			<td width="920px" bgcolor="#666" height="5"><font color=white><span id="teksjudul"></span></font></td>
			<td width="20" bgcolor="#fff" height="5"><font color="#000"><a style="cursor:pointer" id="tutup"><b><center>X</center></b></a></font></td>
		</tr>
		<tr>
			<td width="290" bgcolor="#000" height="100" valign="top" colspan="2">
			<p align="left"><span id="teksdes"></span></td>
		</tr>
	</table>
	<table border=0 width=1000 cellpadding=0 cellspacing=0>
		<tr>
			<td>
				<div id="petaku" style="width:960px; height:500px"></div>
			</td>
		</tr>
	</table>

