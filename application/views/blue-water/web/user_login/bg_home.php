	<div id="content-right">
	<div class="cleaner_h20"></div>
	<h1><?php echo $title; ?></h1>
	<div class="cleaner_h20"></div>
	
	<div id="bg-sidebar-login" style="margin:0px auto;">
		<div id="head-sidebar">LOG IN TO SUPERADMIN PAGES</div>
		<div id="content-sidebar-login">
		<?php echo validation_errors(); ?>
		<p><?php echo $this->session->flashdata("result"); ?></p>
		<?php echo form_open("auth/user_login"); ?>
		<label for="username">USERNAME : </label>
		<input type="text" name="username" id="username" placeholder="Enter username...." value="<?php echo set_value('username'); ?>" />
		<label for="password">PASSWORD : </label>
		<input type="password" name="password" id="password" placeholder="Enter password...." />
		<label for="captcha">CAPTCHA CODE : </label>
		<?php echo $dt_captcha; ?>
		<input type="text" name="captcha" id="captcha" placeholder="Enter captcha code...." />
		<div class="cleaner_h10"></div>	
			<input type="submit" value="LOG IN" />
			<input type="reset" value="RESET" />
		</div>
		<?php echo form_close(); ?>
		<div class="cleaner_h10"></div>	
		</div>
	</div>
	

</div>