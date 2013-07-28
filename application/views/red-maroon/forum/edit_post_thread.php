<div id="content">
<script type="text/javascript" src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>
<td valign="top" bgcolor="#FFFFFF"><div id="RightContent">
      <div style="width:100%; float:right;">
	<ul id="crumbs">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li><a href="<?php echo base_url(); ?>forum">Forum</a></li>
		<li>Post New Thread</li>
	</ul>
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
</div>
	<div class="cleaner_h10"></div>


<table width="100%" border="0" cellspacing="1" cellpadding="10" bgcolor="#D4E5A1">
	<tr>
	  <td class="bg-gowesip" colspan="2"><span class="tittle-forum"><strong>POST NEW THREAD</strong></span><span class="tittle-forum2"></span></td>
	</tr>
</table>
	
<form method="post" action="<?php echo base_url(); ?>forum/forum/save_edit_thread">
<table  width="100%" bgcolor="#cbe6ff" cellspacing="0" border="0" cellpadding="10">
<tr>
<td colspan="2"><input type="text" size="50" name="judul" style="width:95%; padding:5px; font-size:12px;" placeholder="Ketikkan judul thread..." required value="<?php echo $judul; ?>" /></td>
</tr>
<tr>
<td>Pilih Kategori : </td><td>
<select name="id_kategori" required>
<?php
	$get = $this->db->get("dlmbg_kategori");
	foreach($get->result() as $g)
	{
		if($id_kategori==$g->id_kategori)
		{
		?>
			<option value="<?php echo $g->id_kategori; ?>" selected><?php echo $g->nama_kategori; ?></option>
		<?php
		}
		else
		{
		?>
			<option value="<?php echo $g->id_kategori; ?>"><?php echo $g->nama_kategori; ?></option>
		<?php
		}
	}
?>
</select>
</td>
</tr>
<tr>
<td colspan="2">
<textarea class="ckeditor" cols="40" name="isi" style="width:660px; height:220px; resize:none; outline:none; font-family:Arial; background-color:#FFFFFF; font-size:12px;" placeholder="Ketikkan isi thread..."><?php echo $isi; ?></textarea>
<input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
</td>
</tr>
<tr>
	<td></td>
	<td><input type="reset" value="HAPUS" class="input-button" /><input type="submit" value="KIRIM" class="input-button" /></td>
</tr>
</table>
</form>

  </table>
</div>  
  