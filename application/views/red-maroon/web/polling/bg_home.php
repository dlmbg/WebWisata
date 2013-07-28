<div style="width:715px; float:right;">
	<?php echo $this->breadcrumb->output(); ?>
	<div class="cleaner_h10"></div>
</div>


<div id="content-center">
<div id="title-news">HASIL POLLING</div>

	<?php
		$get = $this->db->get_where("dlmbg_polling",array("aktif" => 1))->row();
		$get_jwb = $this->db->get_where("dlmbg_jawaban_polling",array("id_polling" => $get->id_polling));
		$jum = $this->db->query("select SUM(hit) as hasil from dlmbg_jawaban_polling where id_polling='".$get->id_polling."'")->row();
	?>
<strong><?php echo $get->soal; ?></strong>
<div class="cleaner_h5"></div>

	<?php
		foreach($get_jwb->result() as $g)
		{
			$panjang = ($g->hit/$jum->hasil)*300;
			echo $g->jawaban_polling .' - '. $g->hit.' suara';
			echo '<div class="cleaner_h0"></div>';
			echo '<div style="width:'.$panjang.'px; height:20px; background-color:#000;"></div>';
			echo '<div class="cleaner_h10"></div>';
		}
	?>

<div class="cleaner_h5"></div>

</div>