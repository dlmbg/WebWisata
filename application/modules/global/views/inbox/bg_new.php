

<td valign="top" bgcolor="#FFFFFF"><div id="RightContent">
      <div style="width:700px; float:right;">
	<ul id="crumbs">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li>Indexs Pesan</li>
	</ul>
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
		<td>
      
	<div class="cleaner_h20"></div>

	<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
        <tr>
          <td bgcolor="#d4e5a1" class="bg-gowesip" colspan="2"><strong><span class="tittle-forum2">INDEXS</span></strong> <span class="tittle-forum"><strong> PESAN</strong></span></td>
        </tr>
		<?php echo '<div id="form_balas" style="display:none; ">
							'.form_open("global/inbox/kirim_new").'
							<table  width="700" bgcolor="#ECF5CF" cellspacing="0" border="0" cellpadding="10">
							<tr>
							<td>
							<textarea class="ckeditor" name="isi_pesan"></textarea>
							</td>
							</tr>
							<tr>
								<td>
								<input type="submit" value="KIRIM PESAN" class="btn btn-primary" />
								<input type="hidden" name="id_penerima" value="'.$id_penerima.'" />
								</td>
							</tr>
							</table>
							'.form_close().'
						</div>'; ?>
	</table>
		    

	<div class="cleaner_h20"></div>

		    
		
<br />
</div></td>
    </tr>
  </table>