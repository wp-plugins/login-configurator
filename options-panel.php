<div class="wrap">
	<h2>Login Configurator &raquo; Options</h2>
	<form method="post" action="options.php">
		<?php 
		if (function_exists('wpmu_create_blog'))
			wp_nonce_field('login_configurator-options');
		else
			wp_nonce_field('update-options');
	?>
		<div class="postbox" style="width:49%; float:left">
			<h3 class="handl" style="margin:0;padding:3px;cursor:default;">
				<?php _e('Settings'); ?>
			</h3>
			<div class="table">
				<table class="form-table">
					<tr align="top">
						<th scope="row"><?php _e('Force Login?'); ?></th>
						<td><label>
							<input type="radio" id="login_configurator_force_no" name="login_configurator_force" value="off" <?php echo ($this->force == 'off') ? 'checked' : ''; ?> />
							<?php _e('<strong>OFF</strong> - Do not force login on any page.'); ?>
							</label>
							<br>
							<label>
							<input type="radio" id="login_configurator_force_yes" name="login_configurator_force" value="all" <?php echo ($this->force == 'all') ? 'checked' : ''; ?> />
							<?php _e('<strong>ON</strong> - User must log in to see entire site, including home page.'); ?>
							</label>
							<br>
							<label>
							<input type="radio" id="login_configurator_force_inside" name="login_configurator_force" value="inside" <?php echo ($this->force == 'inside') ? 'checked' : ''; ?> />
							<?php _e('<strong>TEASER</strong> - Allow non logged in users to see the home page, but force login on all other pages.'); ?>
							</label>
							<br>
							<label>
							<input type="radio" id="login_configurator_force_posts" name="login_configurator_force" value="posts" <?php echo ($this->force == 'posts') ? 'checked' : ''; ?> />
							<?php _e('<strong>POSTS</strong> - Only force login when a user wants to see a full post.'); ?>
							</label>
						</td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('Ignore the feed URL?'); ?></th>
						<td><label>
							<input type="radio" id="login_configurator_feed_no" name="login_configurator_feed" value="protected" <?php echo ($this->feed == 'protected') ? 'checked' : ''; ?> />
							<?php _e('<strong>Protected</strong> - Protect the feed URL as well.'); ?>
							</label>
							<br />
							<label>
							<input type="radio" id="login_configurator_feed_yes" name="login_configurator_feed" value="ignore" <?php echo ($this->feed == 'ignore') ? 'checked' : ''; ?> />
							<?php _e('<strong>Ignore</strong> - Do not proted the feed URL on this blog.'); ?>
							</label>
							<br />
							<label></label></td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('Redirect URL'); ?></th>
						<td><label>
							<input type="checkbox" name="login_configurator_redirect_home" id="login_configurator_redirect_home" value="1" onclick='onClickRedirectHome(this)' <?php echo ($this->redirectHome == true) ? 'checked' : ''; ?>  />
							<?php _e('Redirect to the home page'); ?>
							</label>
							<br>
							<input type="text" id="login_configurator_redirect_url" name="login_configurator_redirect_url" value="<?php echo $this->redirectURL; ?>" <?php echo ($this->redirectHome == true) ? 'readonly' : ''; ?> />
						</td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('Add Text to Login Form'); ?></th>
						<td><textarea id="login_configurator_form_text" name="login_configurator_form_text" style="width:400px; height:150px;"><?php echo $this->loginFormText; ?></textarea>
						</td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('Logo URL'); ?></th>
						<td><input type="text" id="login_configurator_logo_url" name="login_configurator_logo_url" value="<?php echo $this->logoURL; ?>" />
							<br>
							<?php _e('Leave blank to use the default Wordpress Logo.'); ?></td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('Logo Link'); ?></th>
						<td><input type="text" id="login_configurator_logo_link" name="login_configurator_logo_link" value="<?php echo $this->logoLink; ?>" />
							<br>
							<?php _e('Leave blank to use the default Wordpress site.'); ?></td>
					</tr>
					<tr align="top">
						<th scope="row"><?php _e('URLs to ignore (Whitelist)'); ?></th>
						<td><textarea id="login_configurator_whitelistURLs" name="login_configurator_whitelistURLs" style="width:400px; height:150px;"><?php echo $this->whitelistURLs; ?></textarea>
							<br />
							<?php _e('List of URLs that are unprotected by this plugin. List each URL on a separate line. '); ?>
						</td>
					</tr>
				</table>
				<input type="hidden" name="action" value="update" />
				<?php if (function_exists('wpmu_create_blog')) : ?>
				<input type="hidden" name="option_page" value="login_configurator" />
				<?php  else : ?>
				<input type="hidden" name="page_options" value="login_configurator_force,login_configurator_feed,login_configurator_redirect_home,login_configurator_redirect_url,login_configurator_form_text,login_configurator_logo_url,login_configurator_logo_link,login_configurator_whitelistURLs" />
				<?php endif;

	?>
				<p class"submit" align="center">
					<input type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" />
				</p>
			</div>
		</div>
	</form>
	<div class="postbox" style="width:49%; float:right">
		<h3 class="handl" style="margin:0; padding:3px;cursor:default;">Login Configurator &raquo; About</h3>
		<div style="padding:5px;">
			<p>This page allows you to configure the settings for this plugin. See the Usage section below for information about the different options.</p>
			<p><span>You are using <strong> <a href="http://wordpress.grandslambert.com/plugins/login-configurator.html" target="_blank">Login Configurator <?php print $this->showVersion(); ?></a></strong> by <a href="http://grandslambert.com" target="_blank">GrandSlambert</a>.</span> </p>
		</div>
	</div>
	<div class="postbox" style="width:49%; height: 175px; float:right;">
		<h3 class="handl" style="margin:0; padding:3px;cursor:default;">Credits</h3>
		<div style="padding:8px;">
			<p>Thank you for trying the Login Configurator plugin - I hope you find it useful. For the latest updates on this plugin, visit the <a href="http://wordpress.grandslambert.com/plugins/login-configurator.html" target="_blank">official site</a>. If you have any problems with this plugin, please use our <a href="http://support.grandslambert.com/forum/login-configurator" target="_blank">Support Forum</a>.</p>
			<p>This plugin is &copy;2009 by <a href="http://grandslambert.com" target="_blank">GrandSlambert, Inc.</a> and is released under the <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GNU General Public License</a>.</p>
		</div>
	</div>
	<div class="postbox" style="width:49%; height: 175px; float:right;">
		<h3 class="handl" style="margin:0; padding:3px;cursor:default;">Donate</h3>
		<div style="padding:8px">
			<p> If you find this plugin useful, please consider supporting our work and the development of  other great <a href="http://wordpress.grandslambert.com/plugins.html" target="_blank">plugins</a>. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=8973705" target="_blank">Donate</a> a few bucks and see what else we can come up with!</p>
			<p style="text-align: center;"><a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=8973705"><img width="122" height="47" alt="paypal_btn_donateCC_LG" src="http://wordpress.grandslambert.com/wp-content/uploads/2009/07/paypal_btn_donateCC_LG.gif" title="paypal_btn_donateCC_LG" class="aligncenter size-full wp-image-174"/></a></p>
		</div>
	</div>
</div>
<div style="clear:both"></div>
