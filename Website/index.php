<!DOCTYPE html>

	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1">

		<title>Fake News Finders</title>

		<link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="./css/mobilecss.css">
		<link href="./css/stylesheet" rel="stylesheet" type="text/css">
		<link href="./css/mobcss" rel="stylesheet" type="text/css">
<!-- Dropdown -->
		<script src="./js/jquery.min.js"></script>
		<script src="./js/dropdown.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="shortcut icon" href=""/>

<!--///////////////////////////////////////-->

<script> $(window).load(function() {
    search();
});

function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined") {
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        xhr = null;
    }
    return xhr;
}

function search() {
    var xhr = createCORSRequest('GET', "http://fake.jdon.uk/url/" + encodeURIComponent($("#searchbox").val()));
    if (!xhr) {
        throw new Error('CORS not supported');
    }
    xhr.onload = function(e) {
        if (this.status == 200) {
            var json = this.response;
        }

        document.getElementById("domain").innerHTML = "";
        document.getElementById("title").innerHTML = "";
        document.getElementById("author").innerHTML = "";
        document.getElementById("fake").innerHTML = "";
        document.getElementById("reasons").innerHTML = "";
        document.getElementById("type").innerHTML = "";
        document.getElementById("type1").innerHTML = "";
        document.getElementById("type2").innerHTML = "";
        document.getElementById("type3").innerHTML = "";

        $.getJSON("tag-descriptions.json", function(data) {
            console.log(data);
            var obj = JSON.parse(json);
            console.log(obj);    
            if (obj.domain) {
                document.getElementById("domain").innerHTML = "<span class='DomainID'>Wesbite: </span> <br>" + obj.domain;
            } 

            if (!(obj.title)) {
                document.getElementById("title").innerHTML = "Sorry, the title of the article is not avaliable";
            } else {
                document.getElementById("title").innerHTML = "<span class='ArticleID'>Article Title: </span> <br>" + obj.title;
            };
            if (obj.author) {
                document.getElementById("author").innerHTML = "<span class='AuthorID'>Author: </span> <br>" + obj.author;
            } 
            
            if (obj.domainList.fake) {
                document.getElementById("fake").innerHTML = " <span class='FakeID'>FAKE</span> <br> Unfortunately, this article has been flagged based on our checks. <br> Check out our reasoning below. ";

                document.getElementById("type").innerHTML = "<span class='AuthorID'>Reasons: </span> <br>";
                if (obj.domainList.notes.type1) {
                    document.getElementById("type1").innerHTML = data.tags[obj.domainList.notes.type1].description;
                }
                if (obj.domainList.notes.type2) {
                    document.getElementById("type2").innerHTML = data.tags[obj.domainList.notes.type2].description;
                }
                if (obj.domainList.notes.type3) {
                    document.getElementById("type3").innerHTML = data.tags[obj.domainList.notes.type3].description;
                }
            } else {
                document.getElementById("fake").innerHTML = " <span class='FakeID'>NOT FAKE<br> </span>This article has been deemed not fake based on our checks.";
            }
        });
    };
    xhr.send();
} </script>

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
				</ul>



			<!-- Nav for mobile/tablet -->
			<div class="dropdown">
				<a class="dropdownmenu" href="./index.html#">☰</a>
					<ul class="dropdownbox">
						<li><a class="onpage" href="./index.html">Home</a></li>
						<li><a href="./aboutus.html">About Us</a></li>
					</ul>
			</div>
			</nav>
		</header>

			<div id="check">
					<div class="search">
	<input id="searchbox" value="<?php echo ltrim($_SERVER['PATH_INFO'], '/https:/'); ?>" type="text">
			<button class="button" onload="search()" onclick="search()">►</button>
			
			<div id="newbox">
				<p id="domain"> </p>
				<p id="title"> </p>
				<p id="author"></p>
				<p id="fake"> </p>
				<p id="reasons"></p>
				<p id="type"></p>
				<p id="type1"></p>
				<p id="type2"></p>
				<p id="type3"></p>
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
