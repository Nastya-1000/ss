$(document).ready(function(){
	 
	$("body" ).on( "click", ".search", function(){
		
		 //$(".search").css("color", "blue");
		$(".search").hide(400); //скрытие через размер+прозрачность
		 
		$(".field_for_search").show(400);
			
	});
	
	$('.post_comment').click(function(){
		
		$.post( "add-comment.php", 
		{ 
			comment: $('.makeItGhotic').val(), 
			ID_article: $('.articleIDforComment').val()
		} 
		).done(function(data){
			//alert(data);
			
			$(".comments").append(data);
			$(".makeItGhotic").val("");
			
		});
		return false;
		
	});
	
	
	$('.field_for_search').keydown(function(event){
		if (event.which == 13) {
		
			$.get( "search.php", 
			{ 
				textForSearch: $('.input_for_search').val(), 
				ID_article: $('.articleIDforComment').val()
			} 
			).done(function(data){
				//alert(data);
				$(".articleText").html(data);
				
			});
			return false;
		}
	});
	
	
	$('.search-button').click(function(){
		
		//alert($('.input_for_search').val());
		
		
		if ($('.input_for_search').val().length != 0 ) {
			 alert('sdfsd');
			$.get( "search.php",  
			{ 
				textForSearch: $('.input_for_search').val(), 
				ID_article: $('.articleIDforComment').val()
			} 
			).done(function(data){
				//alert(data);
				$(".articleText").html(data);
				
			});
			
			}
		
		return false;
	});
		 
		/*$('.search').click(function(){
			
			if ($('.field_for_search').val() != '') {
			
			$.get( "search.php",  
			{ 
				textForSearch: $('.input_for_search').val(), 
				ID_article: $('.articleIDforComment').val()
			} 
			).done(function(data){
				//alert(data);
				$(".articleText").html(data);
				
			});
			return false;
			}
		});*/
	
	/*$('.field_for_search').keydown(function(event){
		if (event.which == 13) {
		
			$.get( "search.php", 
			{ 
				textForSearch: $('.input_for_search').val(), 
				ID_article: $('.articleIDforComment').val()
			} 
			).done(function(data){
				//alert(data);
				$(".articleText").html(data);
				
			});
			return false;
		}
	});*/
	
	

	  
});  