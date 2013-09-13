<div id="content">


<script src="<?php echo base_url(); ?>asset/js/mobilymap.js" type="text/javascript"></script>
<script type="text/javascript">
    
    $(function(){
    
        $('.europe_map').mobilymap({
            position: 'center',
            popupClass: 'bubble',
            markerClass: 'point',
            popup: true,
            cookies: false,
            caption: false,
            setCenter: true,
            navigation: true,
            navSpeed: 1000,
            navBtnClass: 'navBtn',
            outsideButtons: '.map_buttons a',
            onMarkerClick: function(){},
            onPopupClose: function(){},
            onMapLoad: function(){}
        });
        
    });

</script>
    <script type="text/javascript">
        $(document).ready(function(){
            var docked = 0;
            
            $("#dock li ul").height($(window).height());
            
            $("#dock .dock").click(function(){
                $(this).parent().parent().addClass("docked").removeClass("free");
                
                docked += 1;
                var dockH = ($(window).height()) / docked
                var dockT = 0;               
                
                $("#dock li ul.docked").each(function(){
                    $(this).height(dockH).css("top", dockT + "px");
                    dockT += dockH;
                });
                $(this).parent().find(".undock").show();
                $(this).hide();
            });
            
             $("#dock .undock").click(function(){
                $(this).parent().parent().addClass("free").removeClass("docked")
                    .animate({left:"-180px"}, 200).height($(window).height()).css("top", "0px");
                
                docked = docked - 1;
                var dockH = ($(window).height()) / docked
                var dockT = 0;               
                
                $("#dock li ul.docked").each(function(){
                    $(this).height(dockH).css("top", dockT + "px");
                    dockT += dockH;
                });
                $(this).parent().find(".dock").show();
                $(this).hide();
            });

            $("#dock li").hover(function(){
                $(this).find("ul").animate({left:"40px"}, 200);
            }, function(){
                $(this).find("ul.free").animate({left:"-180px"}, 200);
           });
        }); 
    </script>
<style type="text/css">
    .mapNav {
        display:none;
    }
    .europe_map {
        width:960px;
        height:600px;

    }
</style>

        <a href="http://localhost/web-gis/app_front_peta_bencana/zoom" id="boxshow" class="iframe">Zoom Peta</a>
    <div class="europe_map">
        <img src="<?php echo base_url(); ?>asset/images/peta_kecil.jpg" alt="" width="1920" height="1855" />
        <?php
            foreach ($dt->result_array() as $d) {
                $hasil = explode(",",$d['koordinat']);
        ?>

        <div class="point" id="p-<?php echo $hasil[0]*2+30; ?>-<?php echo $hasil[1]*2; ?>">
            <h3><?php echo $d['kelurahan']; ?> - <?php echo $d['nama_objek_wisata']; ?></h3>
            <p><b><?php echo $d['nama_objek_wisata']; ?></b></p>
            <p><b>Jenis : <?php echo $d['jenis']; ?></b></p>
            <p><b>Koordinat : <?php echo $hasil[0]*2; ?>,<?php echo $hasil[1]*2; ?></b></p>
            <p><?php echo $d['keterangan']; ?></p>
        </div>

        <?php
            }
        ?>
    </div>
    
    <ul id="dock">
        <li id="links">
            <ul class="map_buttons">
                <li class="header">
                    Objek Wisata
                    <a href="#" class="dock">+ Dock</a><a href="#" class="undock">- Undock</a></li>
                <div id="pane3" class="scroll-pane">
                <?php
                    foreach ($dt->result_array() as $d) 
                    {
                        $hasil = explode(",",$d['koordinat']);
                        ?>
                        <li><a href="#" rel="p-<?php echo $hasil[0]*2+30; ?>-<?php echo $hasil[1]*2; ?>"><?php echo $d['kelurahan'].' - '.$d['nama_objek_wisata']; ?></a></li>
                        <?php
                    }
                ?>
                </div>
            </ul>
        </li>
    </ul>

