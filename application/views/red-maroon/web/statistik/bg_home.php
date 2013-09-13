


<div id="content">
<div id="title-news">STATISTIK KUNJUNGAN</div>


<div class="cleaner_h20"></div>
<?php echo $data_retrieve; ?>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/RGraph.common.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/RGraph.common.effects.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/RGraph.common.tooltips.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/RGraph.common.dynamic.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/RGraph.bar.js"></script>

<h1>Grafik Statistik Kunjungan</h1>
<hr />
<div class="cleaner_h10"></div>
    <canvas id="cvs" width="950" height="450">[No canvas support]</canvas>
    <?php
    $w = $this->db->query("SELECT sum(wanita) as tot_wanita, sum(pria) as tot_pria, (sum(wanita)+sum(pria)) as total_bulanan, bulan, tahun FROM `dlmbg_kunjungan` group by bulan, tahun");
		
	$jumlah = "";
	$label = "";
	foreach($w->result() as $h)
	{
		$jumlah .= $h->total_bulanan.",";
		$label .= "'".$h->bulan."',";
	}
	?>
    <script>
        window.onload = function ()
        {
            var bar = new RGraph.Bar('cvs', [[<?php echo $jumlah; ?>]]);
            bar.Set('chart.labels', [<?php echo $label; ?>]);
            bar.Set('chart.tooltips.event', 'onmousemove');
            bar.Set('chart.linewidth', 2);
            bar.Set('chart.shadow', true);
            bar.Set('chart.shadow.offsetx', 0);
            bar.Set('chart.shadow.offsety', 0);
            bar.Set('chart.shadow.blur', 2);
            bar.Set('chart.hmargin.grouped', 2);
            bar.Set('chart.title', 'Grafik Statistik Kunjungan');
            bar.Set('chart.gutter.bottom', 20);
            bar.Set('chart.gutter.left', 40);
            bar.Set('chart.gutter.right', 15);
            bar.Set('chart.colors', ['red', 'green', 'blue','grey', 'lime', 'orange','yellow', 'black']); 
            bar.Set('chart.background.grid.autofit.numhlines', 5);
            bar.Set('chart.background.grid.autofit.numvlines', 4);
            
            RGraph.Effects.Fade.In(bar, {'duration': 250});        
        }
    </script>

<div class="cleaner_h5"></div>
