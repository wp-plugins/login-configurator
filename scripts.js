// JavaScript Document

function onClickRedirectHome(element)
{
	var field = document.getElementById('login_configurator_redirect_url');
	var url = document.getElementById('home_page_url').value;

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
