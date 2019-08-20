//alert(2+"10");  

/*
2+2 (сложение) => 4
"2"+"2" (конкатенация или слияние) => "22"
2+"2" => "22"
*/

$(document).ready(function(){
	$(".number").removeClass("number");
	$(".header > div:first-child").addClass("number");
	
	//alert($(".number").css("color"));
	$(".number").css("color","#f00");
	//alert($(".number").css("color"));
	//$(".header .link-button").fadeOut(5000); //5000мс скрытие через прозрачность
	//alert(2);
	//$(".header .link-button").fadeIn(5000);
	$(".header .link-button").hide(5000); //скрытие через размер+прозрачность
	//alert(2);
	$(".header .link-button").show(5000);
	
	
	/*$(".slides").fadeOut(5000);
	alert(2);
	$(".slides").fadeIn(5000);*/
	//$(".slides").hide(5000);
	//alert(3);
	//$(".slides").show(5000);
	//alert(parseInt($(".featured-top .images img:nth-child(2)").css("width"))*2);
	$(".featured-top .images img").css("width",
	function(){		
		return parseInt($(this).css("width"))*2;
	});
	
	$(".work, .deliver").css("position","absolute");
	$(".work, .deliver").css("top","62px");
	$(".work, .deliver").css("left","0px");
	
	colorh1 = $("h1").css("color");
	$("h1").css("color", $(".featured-top h2").css("color"));
	$(".featured-top h2").css("color", colorh1);
	
	text1 = ($('.flickr h2').html()) + ", " + ($('.featured-clients h2').html()) + ", " + ($('.our-friends h2').html()) + ", " + ($('.pages h2').html());
	$('.last-post').html(text1);
	
	/*if($(...).css('') > 100)
	{
		alert();
		alert();
	}*/
	
	
	max = parseInt($(".menu li:first-child").css("width"));
	
	for(i = 2; i < 6; i++)
	{
		if(parseInt($(".menu li:nth-child("+i+")").css("width")) > max)
		{
			max = parseInt($(".menu li:nth-child("+i+")").css("width"));
			//alert(min);
		}
	}
	for(i = 1; i < 6; i++)
	{
		if(parseInt($(".menu li:nth-child("+i+")").css("width")) == max)
			$(".menu li:nth-child("+i+") a").css("color", "green");
	}
	
	//hover mouseenter mouseout mouseover
	
	$('.check-in .link-button').click(function(peremennaya){
		
		var colors = $(".featured-bottom h2").css("color").slice(4).split(',');
		//alert(parseInt(colors[2])+10);
		
		//rgb(142, 68, 35)
		$(".featured-bottom h2").css("color", "rgb("+(parseInt(colors[0])+10)+", "+(parseInt(colors[1])+10)+", "+(parseInt(colors[2])+10)+")");
		//alert ($(".featured-bottom h2").css("color"));
		peremennaya.preventDefault(); //снимает html действия
	});
	
	$('.text-near-image p').html('');
	
	$('.img_featured-bottom').mouseover(function(){
		$('.text-near-image p').append('A');
	});
	
	
	$('.arrows_slides.rightbutton').click(function(peremennaya){
		
	if(parseInt($(".content-of-slides > div:first-child").css("left"))<-2){
		/*$(".content-of-slides > div").css("opacity", function(){
		if((parseInt($(this).css("left"))>-250) && (parseInt($(this).css("left"))<300))
			return "1";
		else
			return "0";
		});*/
		$(".content-of-slides > div").css("left", function(){
			return parseInt($(this).css("left"))+264+"px";
		});
	}
	//parseInt($(".content-of-slides > div").css("left"))+264+"px"
	//peremennaya.preventDefault(); //снимает html действия
	});
	
	$('.arrows_slides.leftbutton').click(function(peremennaya){
		if(parseInt($(".content-of-slides > div:nth-child(6)").css("left"))>530){
		

		$(".content-of-slides > div").css("left", function(){
			return parseInt($(this).css("left"))-264+"px";
		});
		
		/*$(".content-of-slides > div").css("opacity", function(){
		if((parseInt($(this).css("left"))>-250) && (parseInt($(this).css("left"))<300))
			return "1";
		else
			return "0";
		});*/
	
	}
	//parseInt($(".content-of-slides > div").css("left"))+264+"px"
	//peremennaya.preventDefault(); //снимает html действия
	});
	

		
	
});



