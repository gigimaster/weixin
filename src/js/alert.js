var alertHtml = '<div class="windowAlert" id="windowcenter">'+
	'<div id="title" class="alertTitle">消息提醒<span class="close" id="alertclose"></span></div>'+
	'<div class="alertContent">'+
		'<div id="txt"></div>'+
		'<input type="button" value="确  定" id="windowclosebutton" name="确  定" class="txtbtn">	'+
	'</div>'+
'</div>';
	var alertDialog = function(title, func){
		var alertObj = $(alertHtml);
		$('body').append(alertObj);
		$("#windowclosebutton").click(function () { 
			$("#windowcenter").hide();
			if(func) func();
			alertObj.remove();
		});
		$("#alertclose").click(function () { 
			$("#windowcenter").hide();
			alertObj.remove();
		}); 
		
		var windowHeight; 
		var windowWidth; 
		var popWidth;  
		var popHeight; 
		windowHeight=$(window).height(); 
		windowWidth=$(window).width(); 
		popHeight=$(".windowAlert").height(); 
		popWidth=$(".windowAlert").width(); 
		var popY=(windowHeight-popHeight)/2; 
		var popX=(windowWidth-popWidth)/2; 
		$("#windowcenter").css("top",popY).css("left",popX); 
		$("#windowcenter").show(); 
		$("#txt").html(title);
	} 


