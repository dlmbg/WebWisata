<?php if($this->session->userdata("logged_in")!="") { ?>
<ul id="dock">
    <li id="links">
        <ul class="map_buttons">
            <li class="header">
              Online Chat
              <a href="#" class="dock">+ Dock</a><a href="#" class="undock">- Undock</a></li>
            <div id="pane3" class="scroll-pane">
              <?php
                $where['kode_user'] = $this->session->userdata("kode_user");
                $get = $this->db->where_not_in("kode_user",$where)->get("dlmbg_user");
                foreach($get->result() as $g)
                {
              ?>
                    <li><a href='javascript:void(0)' onClick="javascript:chatWith('<?php echo $g->username; ?>')"><?php echo $g->nama_user; ?></a></li>
              <?php } ?>
            </div>
        </ul>
    </li>
</ul>
<?php } ?>


<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" id="MainContent">
  <tr>
    <td width="260" valign="top" class="LeftBg">
	<div id="LeftContent">
<div class="TabBgLeft"><span class="YellowTxt">SAMAS&nbsp;</span><span class="WhiteTxt">FORUM</span></div>
<div id="LeftContent"><div style="font-size:12px; text-align:center; position:relative; padding:15px;">Silahkan manfaatkan fasilitas forum untuk berdiskusi dengan sesama anggota<br />
    <br />
    <a href="<?php echo base_url(); ?>forum"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/join-btn.gif" alt="join forum komunitas sepeda bali" width="157" height="47" border="0" /></a><br /></div>
	    <div class="TabBgLeft"><span class="YellowTxt">LOGIN&nbsp;</span><span class="WhiteTxt">ANGGOTA</span></div>
    <div class="PaddingLeftCont">
      <?php
        if($this->session->userdata("logged_in")!="")
        {
      ?>
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
      <tr><td colspan="2"><div style="font-size:13px;">Your privilages as, <strong><?php echo $this->session->userdata('level'); ?>.</strong></div></td></tr>
      <tr><td colspan="2"><div style="font-size:13px;">Your username , <strong><?php echo $this->session->userdata('username'); ?>.</strong></div></td></tr>
        <tr>
          <td colspan="2">
          <div class="cleaner_h10"></div>
          <div class="line-grey"></div>
          <div class="cleaner_h5"></div>
          </td>
        </tr>
      <tr><td colspan="2">
      
      <table cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
            <div id="btn-poll">
              <a href="<?php echo base_url(); ?>global/inbox"><div class="link-tombol" style="width:178px; text-align:center;">Pesan</div></a>
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
    <?php } else { ?>
      <form id="form1" name="form1" method="post" action="<?php echo base_url(); ?>login/login/act">
        <div class="label">Username</div>
        <input name="username" type="text" class="fieldset" id="username" placeholder="Username..." />
        <div class="label">Password</div>
        <input name="password" type="password" class="fieldset" id="password" placeholder="Password..." />
        <div class="label">Hak Akses</div>
        <select data-placeholder="Level Access..." class="chzn-select" style="width:220px;" tabindex="2" name="st" id="st" required>
            <option value="admin">Admin</option>
            <option value="dosen">Dosen</option>
            <option value="asesor">Asesor</option>
            <option value="dekan">Dekan</option>
            <option value="rektor">Rektor</option>
          </select>
		<div style="width:100%; height:5px; clear:left;"></div>
        <div class="button2"><input name="" type="reset" class="login-btn" value="Hapus" /></div>
        <div class="button2"><input name="" type="submit" class="login-btn2" value="Login" /></div>
        </form>
    <?php } ?>
      </div>
		
  </div>
	<div class="cleaner_h40"></div>
  </div>
  	</td>

  