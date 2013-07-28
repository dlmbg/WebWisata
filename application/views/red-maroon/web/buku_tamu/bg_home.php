<div style="width:715px; float:right;">
	<?php echo $this->breadcrumb->output(); ?>
	<div class="cleaner_h10"></div>
</div>


<div id="content-center">
<div id="title-news">BUKU TAMU</div>

<?php echo form_open("web/buku_tamu/simpan"); ?>
<?php echo $this->session->flashdata('result_login'); ?>
<table cellpadding="5" cellspacing="0">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" class="input" size="40" required /></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" class="input" size="40" required /></td>
	</tr>
	<tr>
		<td>Asal</td>
		<td>:</td>
		<td><input type="text" name="asal" class="input" size="40" required /></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
			<select name="jk" required>
				<option value="Pria">Pria</option>
				<option value="Wanita">Wanita</option>
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Pesan</td>
		<td valign="top">:</td>
		<td><textarea name="pesan" rows="5" class="input" style="font-family:Arial;" cols="45" required></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
		<input type="submit" class="button" value="Kirim Data" />
		<input type="reset" class="button" value="Hapus" />
		</td>
	</tr>
</table>
<?php echo form_close(); ?>


<div class="cleaner_h20"></div>
<?php echo $data_retrieve; ?>
<div class="cleaner_h5"></div>

</div>