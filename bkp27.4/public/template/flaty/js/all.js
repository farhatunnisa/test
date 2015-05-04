
//---------------- Go Top Button -------------//
$(window).scroll(function(){
	if ($(this).scrollTop() > 100) {
		$('#btn-scrollup').fadeIn();
	} else {
		$('#btn-scrollup').fadeOut();
	}
});
$('#btn-scrollup').click(function(){
	$("html, body").animate({ scrollTop: 0 }, 600);
	return false;
});


//--------------- dropdown -----------------//
$(document).ready(function () {
		$('.dropdown-toggle').click(function(e){
		$(".loginForm").toggle();
		$(".dropdown-toggle").toggleClass('open');
		e.stopPropagation();		
	});
});
$(document).click(function(e) {
		if (!$(e.target).is('.loginForm, .loginForm *')) {
		$(".loginForm").hide();
		$(".dropdown-toggle").removeClass('open');
	}
});
// -------------- /dropdown ---------------//