define(['jquery','echo','wow','bootstrap','bootstrap_dropdown','browser_selector','html5shiv','jquery_migrate','jquery_select','jquery_easing','jquery_validate','respond'], function($,echo)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			$(document).ready(function () {
				new WOW().init();

				$('.top-drop-menu').change(function() {
					var loc = ($(this).find('option:selected').val());
					window.location = loc;
				});

				echo.init({
					offset: 100,
					throttle: 250,
					unload: false
				});
			});
		};
	};
});