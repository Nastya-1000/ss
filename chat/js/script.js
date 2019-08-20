
function updateMesseges(gg) {
	//return false;
	$.post( "update-messages.php", 
			{  
				startTime: $('.startTime').val()
			} 
			).done(function(data){
				//alert(data);
				
				$(".field_for_messages").html(data);
				//$(".comment").val("");
				
			});
	/*if (gg==0) {		
		var wtf = $('.field_for_messages');
		var height = wtf[0].scrollHeight;
		wtf.scrollTop(height);
		gg=1;
	}*/
	something();
			//alert ("return");
			return false;
}

var something = (function() {
    var executed = false;
    return function() { 
        if (!executed) {
            executed = true;
			//alert('#');
            var wtf = $('.field_for_messages');
			var height = wtf[0].scrollHeight;
			
			$(".field_for_messages").animate({ scrollTop: 400 }, "slow");
			//wtf.scrollTop(height);
			
        }
    };
})();


$(document).ready(function(){
	
	var a =0;

	
	//.scrollTop(500, 400);
	
	setInterval(function() { updateMesseges(a); }, 1000);
	
	$('.comment').click(function(){
		
		$(".comment").css("text-align", "left"); 
		$(".comment").attr("placeholder","");
	});
	$('.backDiv').click(function(){ 
		
		$(".comment").css("text-align", "center"); 
		$(".comment").attr("placeholder","Write something...");
	});
	$('.comment').keydown(function(event){
		//alert ("post");
		if (event.which == 13) {
			// alert ("post");
			$.post( "add-message.php", 
			{  
				message: $('.comment').val(), 
				user: $('.userName').val()
			}
			).done(function(data){
				//alert(data);
				
				$(".field_for_messages").append(data);
				$(".comment").val("");
				
			});
			$(".field_for_messages").animate({ scrollTop: 400 }, "slow");
			//alert ("return");
			return false;
			//alert ("end");
		}
	});
	
	

	  
});  