$(document).ready(function(){
	$("#note, #down").hide();
	$("#notice").click(function(){
		if($("#note").show()){
			$("#notice").css("background", "#EDE9DE");
			$("#last_news").css("background", "#fff");
			$("#download").css("background", "#fff");
		}
		$("#news, #down").hide();
	});
	$("#last_news").click(function(){
		if($("#news").show()){
			$("#notice").css("background", "#fff");
			$("#last_news").css("background", "#EDE9DE");
			$("#download").css("background", "#fff");
		}
		$("#note, #down").hide();
	});
	$("#download").click(function(){
		if($("#down").show()){
			$("#notice").css("background", "#fff");
			$("#last_news").css("background", "#fff");
			$("#download").css("background", "#EDE9DE");
		}
		$("#note, #news").hide();
	});
});


/*dropdown menu */
$("document").ready(function(){
	$(".header_menu ul li.has-children > a").click(function(){
		$(this).parent().siblings().find("ul").fadeOut(300);
		$(this).next().stop(true, false, true).fadeToggle(300);
	});
});

// left_container click
$("document").ready(function(){
	$(".stm").hide();
	
	$(".left_conteinner ul li.has-children> a").click(function(){
	     var statuscol = 1; 			
		 if($(this).parent().children("ul").stop(true, false, true).slideToggle(0)){
			 	var topValue = $(this).parent().children("ul").css("display");
                 if(topValue == "block"){
			  	 $(this).children(".stm").show();
			     $(this).children(".stp").hide();
				  statuscol = 2;
			 }
			 else{
				  $(this).children(".stp").show();
				  $(this).children(".stm").hide();
				  statuscol = 1;
			 } 
			 	
		 }
		return false;
	});
	
	//calendar
	
	$("#calendar").click(function(){
		alert("hi");
	});
});




// function myFunction(url,str,displayid) {
        // var xmlhttp = new XMLHttpRequest();
        // xmlhttp.onreadystatechange = function() {
            // if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // document.getElementById(displayid).innerHTML = xmlhttp.responseText;
            // }
        // }
        // xmlhttp.open("GET", url + str, true);
        // xmlhttp.send();
// }

function createUrl(url){
	window.location.href= url;
}


