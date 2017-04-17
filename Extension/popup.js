chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
    chrome.tabs.sendMessage(tabs[0].id, {type: "getContent"}, 

    function(response) {
		document.getElementById("memes").innerHTML += "List of Found Links on current page";
        console.log(response);
			for (var i = 0; i < response.length; i++) {

				//returns the JSON file from backend
				var uri = encodeURIComponent(response[i]);
				var jsonpath = ("http://fake.jdon.uk/url/" + uri);
				
				var link = response[i];

				$.getJSON(jsonpath, function(data){
					if (data.title) {
						document.getElementById("output").innerHTML += "<p id='" + i + "'><a href='" + link + "'>" + data.title + "</a><br>" + link + "</p>";
					}
				});
				
			}
    });
});