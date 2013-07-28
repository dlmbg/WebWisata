<div id="content">
<td valign="top" bgcolor="#FFFFFF"><div id="RightContent">
      <div style="width:100%; float:right;">
	<ul id="crumbs">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li><a href="<?php echo base_url(); ?>forum">Forum</a></li>
		<li>Indexs Forum</li>
	</ul>
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
</div>
	<div class="cleaner_h10"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
		<td>
      <table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
        <tr>
          <td bgcolor="#d4e5a1" class="bg-gowesip" colspan="2"><strong><span class="tittle-forum2">KATEGORI</span></strong> <span class="tittle-forum"><strong> - FORUM</strong></span></td>
        </tr>
		
		<tr>
          <td bgcolor="#cbe6ff" width="100%">
		  	<?php
		  		$kategori = $this->db->get("dlmbg_kategori");
				foreach($kategori->result() as $kat)
				{
		  		$post = $this->db->get_where("dlmbg_thread_forum",array("id_kategori"=>$kat->id_kategori))->num_rows();
					?>
		  			<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
							<a href="<?php echo base_url(); ?>forum/kategori/set/<?php echo $kat->id_kategori; ?>">
								Kategori <?php echo $kat->nama_kategori; ?><span style="float:right;"><b><?php echo $post; ?></b> Postingan</span></a>
								
						  </td>
						</tr>
      				</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#cbe6ff">
				<td>
            		<div class="line-grey"></div>
				</td>
				</tr>
			</table>
					<?php
				}
			?>
		  </td>
		  
        </tr>
		  </td>
        </tr>
		</table>
	<div class="cleaner_h20"></div>


		    <table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
		        <tr>
		          <td bgcolor="#d4e5a1" class="bg-gowesip" colspan="2"><strong><span class="tittle-forum2">LAST</span></strong> <span class="tittle-forum"><strong> UPDATED</strong></span></td>
		        </tr>
		
				<tr>
		          <td bgcolor="#cbe6ff" width="100%">
				  	<?php echo $last_update; ?>
				  </td>
				  
		        </tr>
			</table>

	<div class="cleaner_h20"></div>

		    <table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
		        <tr>
		          <td bgcolor="#d4e5a1" class="bg-gowesip" colspan="2"><strong><span class="tittle-forum2">NEW </span></strong> <span class="tittle-forum"><strong>THREAD</strong></span></td>
		        </tr>
		
				<tr>
		          <td bgcolor="#cbe6ff" width="100%">
				  	<?php echo $new_update; ?>
				  </td>
				  
		        </tr>
			</table>
		  </td>
        </tr>
		</table>
		
<br />
</div></td>
    </tr>
  </table>