
var srcArray = [];
	$("a").each(function(){
		srcArray.push($(this).attr('data-expanded-url'));
	});
	srcArray = srcArray.filter(function(n){ return n != null }); 


chrome.runtime.onMessage.addListener(function (message, sender, sendResponse) {
    switch(message.type){
        case "getContent":
            console.log(srcArray);//this never gets logged
            sendResponse(srcArray);
            break;
        default:
            console.error("unexpected message: ", message);
    }
});