		<div id="content">
			<div id="content-header">
				<h1><?php echo $GLOBALS['site_title']; ?></h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">User Management</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>User Management</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/user/simpan"); ?>
								
								<label for="menu">Nama</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_user" name="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Username</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Password</label>
								<div class="cleaner_h5"></div>
								<input type="password" style="width:90%;" id="password" name="password" placeholder="Password" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Level</label>
								<div class="cleaner_h5"></div>
								<?php
									$a=''; $m='';
									if($level=="admin"){$a='selected'; $m='';}
									else if($level=="member"){$a=''; $m='selected';}
								?>
									<select name="level">
										<option value="admin" <?php echo $a; ?>>Admin</option>
										<option value="member" <?php echo $m; ?>>Member</option>
									</select>
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		