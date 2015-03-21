jQuery(document).ready(function($) {
	$(window).on("scroll touchmove", function () {
		$('#header').toggleClass('tiny', $(document).scrollTop() > 0);
		$('#header-logo img').toggleClass('tiny', $(document).scrollTop() > 0);
		$('#header-social').toggleClass('u-remove', $(document).scrollTop() > 0);
		$('#header #searchform').toggleClass('u-remove', $(document).scrollTop() > 0);
		$('#header-main-nav').toggleClass('tiny', $(document).scrollTop() > 0);	
	});
	
	// Get current url
	// Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
	var url = window.location.href;
	$('a[href="'+url+'"]').addClass('active');
});