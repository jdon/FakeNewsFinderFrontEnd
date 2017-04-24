chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
    chrome.tabs.sendMessage(tabs[0].id, {type: "getContent"}, 

    function(response) {
    	console.log(response);
		document.getElementById("memes").innerHTML += "Here are all the links we found on the page, you can find out if they are fake or not by clicking them:";
			for (let i = 0; i < response.length; i++) {

				//returns the JSON file from backend
				var uri = encodeURIComponent(response[i]);
				var jsonpath = ("http://fake.jdon.uk/url/" + uri);
				

				$.getJSON(jsonpath, function(data){
					if (data.title) {
						var link = "http://fakenewsfinder.azurewebsites.net/test.php?url=" + response[i]
						document.getElementById("output").innerHTML += "<p id='" + i + "'><a href='" + link + "' target='_blank'>" + data.title + "</a></p>";
					}
				});
				
			}
    });
});
