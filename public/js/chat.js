var state = true;
$("#minimize").click(function(){
	if(state){
		minimize();
	}else{
		maximaize();
	}	
})

function maximaize(){
	$("#chat-window").css("bottom", "0px");
	$("#minimize").text("-");
	state = true;
}

function minimize(){
	$("#chat-window").css("bottom", "-370px");
	$("#minimize").text("^");
	state = false;
}

minimize();

function addMsg(type, text){
	if(type==="user"){
		$("#chat-messages").append('<div class="message message-mine">'+text+'</div>');
	}else if(type==="bot"){
		$("#chat-messages").append('<div class="message message-bot">'+text+'</div>');
	}
}


$("#chat-text-box").keydown(function(e){
	if(e.keyCode === 13){
		addMsg("user", $("#chat-text-box").val()); //add to message		

		$.ajax({
			"url":"/api/ai",
			"method": "POST",
			"data":{
				"question": $("#chat-text-box").val()
			},
			"success":function(data){
				//show returned messages
				addMsg("bot", data);
				$("#chat-text-box").val("");//clear box
				autoScroll();
			}
		})
	}
})


function autoScroll() {
    $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
}