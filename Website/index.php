<!DOCTYPE html>

	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1">

		<title>Fake News Finders</title>

		<link rel="stylesheet" type="text/css" href="/stylesheet.css">
		<link href="./css/stylesheet" rel="stylesheet" type="text/css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="shortcut icon" href=""/>

<!--///////////////////////////////////////-->

<script>
$(window).load(function(){
    search();
	$('#img').hide();  // hide the loading message (since search() runs on page load).
});


function clear(){
    //Clears page before loading new results
    document.getElementById("domain").innerHTML = "";
    document.getElementById("title").innerHTML = "";
    document.getElementById("author").innerHTML = "";
    document.getElementById("fake").innerHTML = "";
    document.getElementById("type").innerHTML = "";
    document.getElementById("type1").innerHTML = "";
    document.getElementById("type2").innerHTML = "";
    document.getElementById("type3").innerHTML = "";    
}

function search(){
	$('#img').show();  // show the loading message.
    //http://weeklyworldnews.com/headlines/49503/leprechauns-attack/
    //http://www.bbc.co.uk/news/uk-39678863
    clear();
    //Retrieve JSON from backend
    var url = document.getElementById("searchbox").value;
    var uri = encodeURIComponent(url);
    var jsonpath = ("http://fake.jdon.uk/url/" + uri);
    var jsonpath2 = "http://fakenewsfinder.azurewebsites.net/tag-descriptions.json"
    $.getJSON(jsonpath, function(data){
        console.log(data);
        $.getJSON(jsonpath2, function(tags){
            console.log(tags);

            if (data.domain) {
                document.getElementById("domain").innerHTML = "<span class='DomainID'>Wesbite: </span> <br>" + data.domain;
            }
             if (!(data.title)) {
                document.getElementById("title").innerHTML = "Sorry, the title of the article is not avaliable";
            } else {
                document.getElementById("title").innerHTML = "<span class='ArticleID'>Article Title: </span> <br>" + data.title;
            }
            if (data.author) {
                document.getElementById("author").innerHTML = "<span class='AuthorID'>Author: </span> <br>" + data.author;
            } 

            if (data.domainList.fake) {
                document.getElementById("fake").innerHTML = " <span class='FakeID'>FAKE</span> <br> Unfortunately, this article has been flagged based on our checks. <br> Check out our reasoning below. ";

                document.getElementById("type").innerHTML = "<span class='AuthorID'>Reasons: </span>";
                if (data.domainList.notes.type1) {
                    document.getElementById("type1").innerHTML =  tags.tags[data.domainList.notes.type1].description;
                }
                if (data.domainList.notes.type2) {
                    document.getElementById("type2").innerHTML = tags.tags[data.domainList.notes.type2].description;
                }
                if (data.domainList.notes.type3) {
                    document.getElementById("type3").innerHTML = tags.tags[data.domainList.notes.type3].description;
                }
            } else {
                document.getElementById("fake").innerHTML = " <span class='FakeID'>NOT FAKE<br> </span>This article has been deemed not fake based on our checks.";
            }
				$('#img').hide();  // hide it again now
        });
    });
}

</script>

<!--///////////////////////////////////////////////-->
	</head>

	<body>
	<div class="container">
		<header id="header">
			<h1>Fake News Finders</h1>

			<!-- Navigation -->
			<nav>
				<ul id="menu">
					<li><a class="onpage" href="">Home</a></li>
					<li><a href="./aboutus.html">About Us</a></li>
					<li><a href="http://www9.zippyshare.com/v/hIU5oxLZ/file.html
" target="_blank">Extension</a></li>
				</ul>

			</nav>
		</header>

			<div id="check">
					<div class="search">
	<input id="searchbox" value="<?php echo $_GET["url"]?>" type="text">
			<button class= "button" id="searchButton" onload="search()" onclick="search()">►</button>
			<img src=".\2.gif" id="img" style="display:none; inline;"/ >
			<div id="newbox">
				<p id="domain"> </p>
				<p id="title"> </p>
				<p id="author"></p>


			<div id="OutboxFake">
				<p id="fake"> </p>
				</div>
				
			<div id="ty1">
				<p id="type"></p>
				<p id="type1"></p>
				<p id="type2"></p>
				<p id="type3"></p>
				</div>
			</div>
			
			<p> </p>
		<!-- Footer -->

		<div id="footer">
		<footer>
Whilst we try our best to determine the credibility of an article, we also recommend that you also do your own independent fact checking. 
		</footer>
		</div>
	</div>
	</div>
</body></html>
