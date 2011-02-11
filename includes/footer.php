<?php
if ( preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']) ) {
     die('You are not allowed to call this page directly.');
}
/**
 * footer.php - View for the footer on all plugin pages.
 *
 * @package Login Configurator
 * @subpackage includes
 * @author GrandSlambert
 * @copyright 2009-2011
 * @access public
 * @since 1.6
 */
?>

<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;">
          <?php _e('Plugin Information', 'login-configurator'); ?>
     </h3>
     <div style="padding:5px;">
          <p><?php _e('This page sets the defaults for the plugin. Each of these settings can be overridden when you add an index to your page.', 'login-configurator'); ?></p>
          <p><span><?php _e('You are using', 'login-configurator'); ?> <strong> <a href="http://plugins.grandslambert.com/plugins/login-configurator.html" target="_blank"><?php echo $this->pluginName; ?> <?php echo $this->version; ?></a></strong> by <a href="http://grandslambert.com" target="_blank">GrandSlambert</a>.</span> </p>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;">
          <?php _e('Usage', 'login-configurator'); ?>
     </h3>
     <div style="padding:5px;">
          <p><?php printf(__('See the %2s for this plugin for more details on what each of these settings does.', 'login-configurator'),
                  '<a href="http://docs.grandslambert.com/wiki/Login_Configurator" target="_blank">' . __('Documentation Page', 'login-configurator') . '</a>'); ?></p>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;">
          <?php _e('Recent Contributors', 'login-configurator'); ?>
     </h3>
     <div style="padding:5px;">
          <p><?php _e('GrandSlambert would like to thank these wonderful contributors to this plugin!', 'login-configurator'); ?></p>
          <?php $this->contributor_list(); ?>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;"><?php _e('Credits', 'login-configurator'); ?></h3>
     <div style="padding:8px;">
          <p>
               <?php
               printf(__('Thank you for trying the %1$s plugin - I hope you find it useful. For the latest updates on this plugin, vist the %2$s. If you have problems with this plugin, please use our %3$s or check out the %4$s.', 'login-configurator'),
                       $this->pluginName,
                       '<a href="http://plugins.grandslambert.com/plugins/login-configurator.html" target="_blank">' . __('official site', 'login-configurator') . '</a>',
                       '<a href="http://support.grandslambert.com/forum/login-configurator" target="_blank">' . __('Support Forum', 'login-configurator') . '</a>',
                       '<a href="http://docs.grandslambert.com/wiki/Login_Configurator" target="_blank">' . __('Documentation Page', 'login-configurator') . '</a>'
               );
               ?>
          </p>
          <p>
               <?php
               printf(__('This plugin is &copy; %1$s by %2$s and is released under the %3$s', 'login-configurator'),
                       '2009-' . date("Y"),
                       '<a href="http://grandslambert.com" target="_blank">GrandSlambert, Inc.</a>',
                       '<a href="http://www.gnu.org/licenses/gpl.html" target="_blank">' . __('GNU General Public License', 'login-configurator') . '</a>'
               );
               ?>
          </p>
     </div>
</div>
<div class="postbox">
     <h3 class="handl" style="margin:0; padding:3px;cursor:default;"><?php _e('Donate', 'login-configurator'); ?></h3>
     <div style="padding:8px">
          <p>
               <?php printf(__('If you find this plugin useful, please consider supporting this and our other great %1$s.', 'login-configurator'), '<a href="http://plugins.grandslambert.com/" target="_blank">' . __('plugins', 'login-configurator') . '</a>'); ?>
               <a href="http://plugins.grandslambert.com/login-configurator-donate" target="_blank"><?php _e('Donate a few bucks!', 'login-configurator'); ?></a>
          </p>
          <p style="text-align: center;"><a target="_blank" href="http://plugins.grandslambert.com/login-configurator-donate"><img width="122" height="47" alt="paypal_btn_donateCC_LG" src="http://grandslambert.com/paypal.gif" title="paypal_btn_donateCC_LG" class="aligncenter size-full wp-image-174"/></a></p>
     </div>
</div>
