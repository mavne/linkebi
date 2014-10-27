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
			autoPlay: true,
			scrollPerPage : true,
			autoHeight : false,
      		pagination : false
	  });

	$('.links-column').click(function(){
		//alert("test");
		var a = $( this ).data('slug');
		var b = $( this ).data('goto');
		if(a){
			location.href = "categories/"+a;
		}
		else if(b){
			//location.href = b;
			window.open(b, "_blank");
		}
	});

	$('.commerce-url').click(function(){
		//alert("test");
		var a = $( this ).data('url');		
		//location.href = b;
		window.open(a, "_blank");
	});

	$(".links-logo").click(function(){
		location.href = "/home";
	});

	$("#submit_reg").click(function(){
		$("#registration").submit();
	});

	$("#submit_auth").click(function(){
		$("#authorition").submit();
	});

});