chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
    chrome.tabs.sendMessage(tabs[0].id, {type: "getContent"}, 

    function(response) {
		document.getElementById("memes").innerHTML += "List of fake articles on current page";
			for (let i = 0; i < response.length; i++) {

				//returns the JSON file from backend
				var uri = encodeURIComponent(response[i]);
				var jsonpath = ("http://fake.jdon.uk/url/" + uri);
				

				$.getJSON(jsonpath, function(data){
					if (data.domainList.fake) {
						var link = "http://fake.shanney.co.uk/index.php/" + response[i]
						document.getElementById("output").innerHTML += "<p id='" + i + "'><a href='" + link + "' target='_blank'>" + data.title + "</a></p>";
					}
				});
				
			}
    });
});
