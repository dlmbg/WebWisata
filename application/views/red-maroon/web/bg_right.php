<div id="content-right">

<div class="cleaner_h20"></div>

<?php
        if($this->session->userdata("logged_in")!="")
        {
      ?>
      <div id="bg-sidebar">
<div id="head-sidebar">PANEL USER</div>
<div id="content-sidebar">
      <table width="100%" cellpadding="3">
      <tr><td colspan="2"><div style="font-size:13px;">Welcome, <strong><?php echo $this->session->userdata('nama_user_login'); ?>.</strong></div></td></tr>
      <tr><td><div class="border-photo-profil"><div class="hide-photo-profil-medium">
        <img src="<?php echo tampil_gravatar($this->session->userdata("gbr")); ?>" width="90" /></div></div> </td><td>
      <table>
        <tr><td><div id="btn-poll">
        <a href="<?php echo base_url(); ?>global/profil"><div class="link-tombol" style="width:70px; text-align:center;">Profil</div></a>
        <a href="<?php echo base_url(); ?>global/foto_profil" class="group3"><div class="link-tombol" style="width:70px; text-align:center;">Ganti Foto</div></a>
        <a href="<?php echo base_url(); ?>login/login/logout"><div class="link-tombol" style="width:70px; text-align:center;">Log Out</div></a>
      </div></td></tr>
      </table>
      </td></tr>
      <tr><td colspan="2">
      
      <table cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
            <div id="btn-poll">
              <a href="<?php echo base_url(); ?>global/password" class="group"><div class="link-tombol" style="width:178px; text-align:center;">Password</div></a>
              
              <a href="<?php echo base_url(); ?>forum/post_new"><div class="link-tombol" style="width:178px; text-align:center;">Post New</div></a>
              <a href="<?php echo base_url(); ?>forum/my_thread"><div class="link-tombol" style="width:178px; text-align:center;">My Post Thread</div></a>
              <a href="<?php echo base_url(); ?>forum/my_reply"><div class="link-tombol" style="width:178px; text-align:center;">History Reply Post</div></a>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
          <div class="cleaner_h10"></div>
          <div class="line-grey"></div>
          <div class="cleaner_h5"></div>
          </td>
        </tr>
        <?php
          if($this->session->userdata('level')=="admin")
          {
            ?>
        <tr>
          <td>
            <div id="btn-poll">
              <a href="<?php echo base_url(); ?>admin"><div class="link-tombol" style="width:178px; text-align:center;">Dashboard Admin</div></a>
            </div>
          </td>
        </tr>
            <?php
          }
        ?>
      </table>
      
      </td></tr>
    </table>
    </div>
</div>

<div class="cleaner_h20"></div>	
    <?php } ?>

<div id="bg-sidebar">
<div id="head-sidebar">JAJAK PENDAPAT</div>
<div id="content-sidebar">
	<?php
		$get = $this->db->get_where("dlmbg_polling",array("aktif" => 1))->row();
		$get_jwb = $this->db->get_where("dlmbg_jawaban_polling",array("id_polling" => $get->id_polling));
	?>
<strong><?php echo $get->soal; ?></strong>
<div class="cleaner_h5"></div>

<?php echo form_open("web/polling"); ?>
	<?php
		foreach($get_jwb->result() as $g)
		{
			echo '<input type="radio" name="id_jawaban_polling" value="'.$g->id_jawaban_polling.'" />'.$g->jawaban_polling.'<div class="cleaner_h5"></div>';
		}
	?>
	<input type="hidden" name="id_polling" value="<?php echo $get->id_polling; ?>">
<input type="image" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/kirim.png" /> 
<a href="<?php echo base_url(); ?>web/polling/hasil"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/lihat.png" /></a>
<?php echo form_close(); ?>
</div>
</div>

<div class="cleaner_h20"></div>	

<div id="bg-sidebar">
<div id="head-sidebar">STATISTIK KUNJUNGAN</div>
<div id="content-sidebar">
<ul>
    <li class="konten-kiri-li">Dikunjungi oleh : <b><?php echo $counter_pengunjung; ?> user</b></li>
    <li class="konten-kiri-li">Browser : <b><?php echo $browser; ?></b></li>
    <li class="konten-kiri-li">OS : <b><?php echo $os; ?></b></li>
    <li class="konten-kiri-li">IP address : <b><?php echo $_SERVER['REMOTE_ADDR']; ?></b></li>
</ul>
</div>
</div>

</div>
