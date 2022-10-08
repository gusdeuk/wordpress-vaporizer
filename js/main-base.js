/*
MAIN JS
*/
jQuery(document).ready(function($) {

	//------------------------------------------------------
	// Buscamos si hay algun submenu seleccionado y
	// si hay uno seleccionado > MARCAMOS COMO SELECCIONADO EL PADRE TAMBIEN
	var mainmenuid= "#menu-main-menu"
	$( mainmenuid + " li .dropdown-menu .active").each(function(index, value){
		//console.log(value)
		$(this).parent().parent().addClass("active");
	});

	//------------------------------------------------------
	// scroll para anchors animado con hashtags
	$(".to-top").click(function(t){     
		t.preventDefault();
		var posicionTo = 0;
		$("html,body").animate({scrollTop:posicionTo},900, function() {
			$('html,body').scrollTop(posicionTo);
		 });
	})

	//------------------------------------------------------
	// RESIZE elements 
	function resizeame(){   
		var responsive_viewport = $(window).width();

		if (responsive_viewport > 975) {
			// FIXES FOOTER BOXES
			// sync footer boxes height
			//console.log("ancho screen "+ responsive_viewport);
			// 975 is equal to 991???
			// clean heights of the boxes
			$(".footer-box").height("auto");

			var footer_height = $("#footer-widgets").height();
			//console.log("footer_height "+ footer_height);
			$(".footer-box").height(footer_height);

		}  else {
			$(".footer-box").height("auto");
		}
	}
	// call function para evento on resize
	$(window).resize(function() {
		resizeame();
	});

	// call al inicio 1 vez
	resizeame();
	//------------------------------------------------------

}); 


	
