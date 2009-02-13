<script type="text/javascript">

function onClickRedirectHome(element)
{
	var field = document.getElementById('login_configurator_redirect_url');
	var url = "<?php echo get_option('siteurl'); ?>";

	if (element.checked)
	{
		field.value = url;
		field.readOnly = true;
	}
	else
	{
		field.readOnly = false;
	}
}
</script>
<div class="wrap">
	<h2>Login Configurator Options</h2>

	<form method="post" action="options.php">
	<?php 
	if (function_exists('wpmu_create_blog'))
		wp_nonce_field('login_configurator-options');
	else
		wp_nonce_field('update-options');
	?>

	<table class="form-table">
		<tr align="top">
			<th scope="row">Force Login?</th>
			<td>
				<label><input type="radio" id="login_configurator_force_no" name="login_configurator_force" value="off" <?php echo ($this->force == 'off') ? 'checked' : ''; ?> />
				<strong>OFF</strong> - Do not force login on any page.</label><br>
				<label><input type="radio" id="login_configurator_force_yes" name="login_configurator_force" value="all" <?php echo ($this->force == 'all') ? 'checked' : ''; ?> />
				<strong>ON</strong> - User must log in to see entire site, including home page.</label><br>
				<label><input type="radio" id="login_configurator_force_inside" name="login_configurator_force" value="inside" <?php echo ($this->force == 'inside') ? 'checked' : ''; ?> />
				<strong>TEASER</strong> - Allow non logged in users to see the home page, but force login on all other pages.</label><br>
				<label><input type="radio" id="login_configurator_force_inside" name="login_configurator_force" value="posts" <?php echo ($this->force == 'posts') ? 'checked' : ''; ?> />
				<strong>POSTS</strong> - Only force login when a user wants to see a full post.</label>
			</td>
		</tr>
		<tr align="top">
			<th scope="row">Redirect URL</th>
			<td>
				<label><input type="checkbox" name="login_configurator_redirect_home" id="login_configurator_redirect_home" value="1" onclick='onClickRedirectHome(this)' <?php echo ($this->redirectHome == true) ? 'checked' : ''; ?>  />
				Redirect to the home page</label><br>
				<input type="text" size="75" id="login_configurator_redirect_url" name="login_configurator_redirect_url" value="<?php echo $this->redirectURL; ?>" <?php echo ($this->redirectHome == true) ? 'readonly' : ''; ?> />
			</td>
		</tr>
		<tr align="top">
			<th scope="row">Add Text to Login Form</th>
			<td>
				<textarea id="login_configurator_form_text" name="login_configurator_form_text" style="width:500px; height:150px;"><?php echo $this->loginFormText; ?></textarea>
			</td>
		</tr>
		<tr align="top">
			<th scope="row">Logo URL</th>
			<td>
				<input type="text" id="login_configurator_logo_url" size="75" name="login_configurator_logo_url" value="<?php echo $this->logoURL; ?>" /><br>
				Leave blank to use the default Wordpress Logo.
			</td>
		</tr>
		<tr align="top">
			<th scope="row">Logo Link</th>
			<td>
				<input type="text" id="login_configurator_logo_link" size="75" name="login_configurator_logo_link" value="<?php echo $this->logoLink; ?>" /><br>
				Leave blank to use the default Wordpress site.
			</td>
		</tr>
	</table>

	<input type="hidden" name="action" value="update" />
	<?php
		if (function_exists('wpmu_create_blog')) : ?>
		<input type="hidden" name="option_page" value="login_configurator" />
		<?php  else : ?>
		<input type="hidden" name="page_options" value="login_configurator_force,login_configurator_redirect_home,login_configurator_redirect_url,login_configurator_form_text,login_configurator_logo_url,login_configurator_logo_link" />
		<?php endif;
	?>
	<p class"submit">
		<input type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" />
	</p>
	</form>

	<h2>Credits</h2>
	<p>Thank you for trying the Login Configurator plugin - I hope you find it useful.</p>
	<p>If you have comments or suggestions, please feel free to share them on our <a href="http://www.grandslambert.com/support/login-configurator/comments" target="_blank">Comment Board</a>.</p>
	<p>If you have any problems with this plugin, please use our <a href="http://www.grandslambert.com/support/login-configurator/support" target="_blank">Support Forum</a>.</p>
	<p>This plugin is &copy;2009 by <a href="http://www.grandslambert.com">GrandSlambert, Inc.</a> and is released under the <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GNU General Public License</a>.</p>
	<h2>Donate</h2>
	<p>If you would like to donate to the support of this plugin and the development of future plugins, please visit our <a href="http://www.grandslambert.com/contribute" target="_blank">contribution page</a>.</p>
	<p>We gladly accept cash or gift cards or even just a good pat on the back!</p>
</div>
