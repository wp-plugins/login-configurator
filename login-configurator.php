<?php
/*
Plugin Name: Login Configurator
Plugin URI: http://www.grandslambert.com/wordpress/login-configurator
Description: Change the way your login functions work including forcing users to log in, changing the URL they go to when the login is successful, adding text to the login form, and change the logo and link on the login form.
Version: 0.6.1
Author: GrandSlambert
Author URI: http://www.grandslambert.com/
*/

class gsLoginConfigurator
{
	var $force = false;
	var $redirectHome = false;
	var $redirectURL;
	var $loginURL;
	var $loginFormText;
	var $logoURL;
	var $logoLink;

	// Options page name
	var $optionsName = "login_configurator_options";
	var $optionsPageName = "login_configurator-options";

	/**
	 * Plugin Constructor. Adds actions and filters
	 */
	function gsLoginConfigurator()
	{
		$this->pluginPath = WP_CONTENT_DIR . "/plugins/" . plugin_basename(dirname(__FILE__));
		
		// Get Options
		$this->force = get_option('login_configurator_force');
		$this->redirectHome = get_option('login_configurator_redirect_home');
		$this->redirectURL = get_option('login_configurator_redirect_url');
		$this->loginURL = get_option('login_configurator_login_url');

		// Add Options Pages and Links
		add_action('admin_menu', array(&$this, "addAdminPages"));
		add_filter('plugin_action_links', array(&$this, "addConfigureLink"), 10, 2);
		add_filter('whitelist_options', array(&$this, 'whitelistOptions'));

		// Login form filters
		$this->loginFormText = get_option('login_configurator_form_text');
		if ($this->logoURL = get_option('login_configurator_logo_url') )
			add_action('login_head', array($this, 'add_css'));
		if ( $this->logoLink = get_option('login_configurator_logo_link') );
			add_filter('login_headerurl', array($this, 'get_logo_link'));
	}
	
	/**
 	 * Action to add CSS to change the logo on the login pages.
	 */
	function add_css()
	{
		?>
<style>
h1 a {background: url(<?php echo $this->logoURL;?>) no-repeat center;}
.lc_form_text {	margin-bottom: 10px;}
</style>
<?
	}

	/**
	 * Filter to change the link for the logo on the login page
	 */
	function get_logo_link()
	{
		return $this->logoLink;
	}

	/**
	 * Add all options to the whitelist for the NONCE
	 * Required for Wordpress MU support
	 */
	function whitelistOptions($whitelist)
	{
		if (is_array($whitelist))
		{
			$option_array = array('login_configurator' => array('login_configurator_force', 'login_configurator_redirect_home', 'login_configurator_redirect_url', 'login_configurator_form_text', 'login_configurator_logo_url', 'login_configurator_logo_link'));
			$whitelist = array_merge($whitelist, $option_array);
		}

		return $whitelist;
	}

	/**
	 * Sets the redirect for the login form and adds any extra text.
	 *
	 * If a redirect is present in the URL it will not override that redirect.
	 * Text will be added below the password field and above the Login button.
	 */
	function lc_login_form()
	{
		global $redirect_to;
		
		if ( $this->redirectURL and !$_GET['redirect_to'] )
			$redirect_to = $this->redirectURL;

		if ( $this->loginFormText )
			printf ('<p class="lc_form_text">%1s</p>', $this->loginFormText);
	}

	/**
	 * Check if login is forced.
	 *
	 * If the login is forced, it will send users to the login screen based on the
	 * rules you have set in the admin panel for this plugin.
	*/
	function lc_force_login()
	{
		/*
		Skip the check if a user is logged in or on a login page
		Note: We don't need to check if they are on an admin page because they
		would have to be logged in, so is_user_logged_in() covers that.
		*/
		if ( is_user_logged_in() or eregi('login', $_SERVER['REQUEST_URI']) )
		{
			return;
		}

		// Redirect to login based on the rules set in the admin
		if (
			$this->force == 'all' 
			or ($this->force == 'inside' and is_home() == false )
			or ($this->force == 'posts' and is_single() == true )
		) 
		{
			if (function_exists(wp_login_url))
				wp_safe_redirect(wp_login_url($_SERVER['REQUEST_URI']));
			else
			{
				$url = get_option('siteurl').'/wp-login.php?redirect_to=' . $_SERVER['REQUEST_URI'];
				wp_safe_redirect($url);
			}
		}
	}

	/**
	 * Outputs the options sub panel
	 */
	function outputOptionsSubpanel()
	{
		// Include options panel
		include($this->pluginPath . "/options-panel.php");
	}

	/**
	 * Adds Disclaimer options tab to admin menu
	 */
	function addAdminPages()
	{
		global $wp_version;
		$pageName = add_options_page("Login Configurator Options", "Login Configurator", 8, $this->optionsPageName, array(&$this, "outputOptionsSubpanel"));

		// Use the bundled jquery library if we are running WP 2.5 or above
		if (version_compare($wp_version, "2.5", ">=")) {
			wp_enqueue_script("jquery", false, false, "1.2.3");
		}
	}

	/**
	 * Adds a settings link next to Login Configurator on the plugins page
	 */
	function addConfigureLink($links, $file)
	{
		static $this_plugin;

		if (!$this_plugin) 
		{
			$this_plugin = plugin_basename(__FILE__);
		}

		if ($file == $this_plugin) 
		{
			$settings_link = '<a href="options-general.php?page=' . $this->optionsPageName . '">' . __('Settings') . '</a>';
			array_unshift($links, $settings_link);
		}

		return $links;
	}
}

// Pre 2.6 Compatibility
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

$GSLC = new gsLoginConfigurator;
add_action('login_form', array($GSLC, 'lc_login_form'));
add_action('wp', array($GSLC, 'lc_force_login'));

?>