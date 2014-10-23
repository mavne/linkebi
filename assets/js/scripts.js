$(document).ready(function(){




	$("#search-key").focus(function(){
		if (this.value == "საკვანძო სიტყვა")
		{
			this.value = "";
		}
	});

	$("#search-key").blur(function(){
		if (this.value == "")
		{
			this.value = "საკვანძო სიტყვა";
		}
	});


	// owl slider
	$("#owl-example").owlCarousel({
			items : 6,
			itemsCustom : false,
			itemsDesktop : [1199,6],
			itemsDesktopSmall : [980,3],
			itemsTablet: [768,2],
			itemsTabletSmall: false,
			itemsMobile : [479,2],
			singleItem : false,
			itemsScaleUp : true,
			//navigation : true,
			//navigationText : ["prev","next"],
			//rewindNav : true,
			autoPlay: true,
			scrollPerPage : true,
			autoHeight : false,
      		pagination : false
	  });


});


// theme
function loadTheme(urlx){
	alert('hey');
	return false;
}