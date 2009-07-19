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
        <th scope="row"><?php _e('Force Login?'); ?></th>
        <td><label>
          <input type="radio" id="login_configurator_force_no" name="login_configurator_force" value="off" <?php echo ($this->force == 'off') ? 'checked' : ''; ?> />
          <?php _e('<strong>OFF</strong> - Do not force login on any page.'); ?></label>
          <br>
          <label>
          <input type="radio" id="login_configurator_force_yes" name="login_configurator_force" value="all" <?php echo ($this->force == 'all') ? 'checked' : ''; ?> />
          <?php _e('<strong>ON</strong> - User must log in to see entire site, including home page.'); ?></label>
          <br>
          <label>
          <input type="radio" id="login_configurator_force_inside" name="login_configurator_force" value="inside" <?php echo ($this->force == 'inside') ? 'checked' : ''; ?> />
          <?php _e('<strong>TEASER</strong> - Allow non logged in users to see the home page, but force login on all other pages.'); ?></label>
          <br>
          <label>
          <input type="radio" id="login_configurator_force_posts" name="login_configurator_force" value="posts" <?php echo ($this->force == 'posts') ? 'checked' : ''; ?> />
          <?php _e('<strong>POSTS</strong> - Only force login when a user wants to see a full post.'); ?></label>        </td>
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
          <?php _e('Redirect to the home page'); ?></label>
          <br>
          <input type="text" size="75" id="login_configurator_redirect_url" name="login_configurator_redirect_url" value="<?php echo $this->redirectURL; ?>" <?php echo ($this->redirectHome == true) ? 'readonly' : ''; ?> />        </td>
      </tr>
      <tr align="top">
        <th scope="row"><?php _e('Add Text to Login Form'); ?></th>
        <td><textarea id="login_configurator_form_text" name="login_configurator_form_text" style="width:500px; height:150px;"><?php echo $this->loginFormText; ?></textarea>        </td>
      </tr>
      <tr align="top">
        <th scope="row"><?php _e('Logo URL'); ?></th>
        <td><input type="text" id="login_configurator_logo_url" size="75" name="login_configurator_logo_url" value="<?php echo $this->logoURL; ?>" />
          <br>
          <?php _e('Leave blank to use the default Wordpress Logo.'); ?></td>
      </tr>
      <tr align="top">
        <th scope="row"><?php _e('Logo Link'); ?></th>
        <td><input type="text" id="login_configurator_logo_link" size="75" name="login_configurator_logo_link" value="<?php echo $this->logoLink; ?>" />
          <br>
          <?php _e('Leave blank to use the default Wordpress site.'); ?></td>
      </tr>
      <tr align="top">
        <th scope="row"><?php _e('URLs to ignore (Whitelist)'); ?></th>
        <td><textarea id="login_configurator_whitelistURLs" name="login_configurator_whitelistURLs" style="width:500px; height:150px;"><?php echo $this->whitelistURLs; ?></textarea>
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
    <p class"submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" />
    </p>
  </form>
  <h2>Credits</h2>
  <p>Thank you for trying the Login Configurator plugin - I hope you find it useful. For the latest updates on this plugin, visit the <a href="http://wordpress.grandslambert.com/plugins/login-configurator.html" target="_blank">official site</a>.</p>
  <p>If you have any problems with this plugin, please use our <a href="http://support.grandslambert.com/forum/login-configurator" target="_blank">Support Forum</a>.</p>
  <p>This plugin is &copy;2009 by <a href="http://grandslambert.com" target="_blank">GrandSlambert, Inc.</a> and is released under the <a href="http://www.gnu.org/licenses/gpl.html" target="_blank">GNU General Public License</a>.</p>
  <h2>Donate</h2>
  <p>If you would like to donate to the support of this plugin and the development of future plugins, please visit our <a href="http://wordpress.grandslambert.com/contact/donate.html" target="_blank">donate page</a>.</p>
  <p>We gladly accept cash or gift cards or even just a good pat on the back!</p>
</div>