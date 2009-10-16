// JavaScript Document

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
