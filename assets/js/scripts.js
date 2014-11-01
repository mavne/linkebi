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
	$('.star').click(function(){
		var wi = $( this ).data('addfavourite');
		var cl = $( this );
		$.get( "http://links.404.ge/addFavorites", { wid: wi, form_type: "ajax_favourite" }, function( data ) {
			if(data=="added")
			{
				cl.attr("class","star active");
			}
			else
			{
				cl.attr("class","star");
			}
		});
		return false;
	});

	$('.links-column').click(function(){
		//alert("test");
		var a = $( this ).data('slug');
		var b = $( this ).data('goto');
		var wi = $( this ).data('wi');
		if(a){
			location.href = "categories/"+a;
		}
		else if(b){
			//location.href = b; 
			var form = document.createElement("form");
		    var element = document.createElement("input");  
		    var element2 = document.createElement("input");  

		    form.method = "POST";
		    form.action = "/counter"; 
		    form.target = "_blank"; 
		    form.id = "vis";
		    element.value=wi;
		    element.name="website_id";
		    element2.value="counter";
		    element2.name="form_type";
		    form.appendChild(element); 
		    form.appendChild(element2); 
		    document.body.appendChild(form);
		    form.submit();			
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


	$("#submit_addwebsite").click(function(){
		$(".addwebsite_form").submit();
	});

	$("#submit_feedback").click(function(){
		$("#feedback_form").submit();
	});

	$("#saerch_submit").click(function(){
		var key = $("#search-key").val();
		var u = "/search/keyword/"+key;
		location.href=u;
	});


	$('.tr-goto').click(function(){
		//alert("test");
		var b = $( this ).data('goto');
		var wi = $( this ).data('wi');
		if(b){
			//location.href = b; 
			var form = document.createElement("form");
		    var element = document.createElement("input");  
		    var element2 = document.createElement("input");  

		    form.method = "POST";
		    form.action = "/counter"; 
		    form.target = "_blank"; 
		    form.id = "vis";
		    element.value=wi;
		    element.name="website_id";
		    element2.value="counter";
		    element2.name="form_type";
		    form.appendChild(element); 
		    form.appendChild(element2); 
		    document.body.appendChild(form);
		    form.submit();			
		}
	});

});


