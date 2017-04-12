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
		<link rel="shortcut icon" href="http://www.yoursite.com/favicon.ico?v=2"/>

<!--///////////////////////////////////////-->

<script>
$(window).load(function() {
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

	    $.getJSON('tag-descriptions.json', function(descriptions) {
			console.log(descriptions);

			var obj = JSON.parse(json);
			console.log(obj);

		    if (!(obj.domain)) {
		    	document.getElementById("domain").innerHTML = "";
		    } else {
		    	document.getElementById("domain").innerHTML = "Domain: " + obj.domain;
		    }
			
			if (!(obj.title)) {
				document.getElementById("title").innerHTML = "Sorry, the title of the article is not avaliable";
			} else {
				document.getElementById("title").innerHTML = "Title of article: " + obj.title;
			};

			if (!(obj.author)) {
				document.getElementById("author").innerHTML = "Sorry, we cannot find the author of this article";
			} else {
				document.getElementById("author").innerHTML = "Author: " + obj.author;
			}
			

			if (obj.domainList.fake) {
				document.getElementById("fake").innerHTML = "This article is fake";

				if (obj.domainList.notes.notes) {
				document.getElementById("reasons").innerHTML = obj.domainList.notes.notes;
				}

				document.getElementById("type").innerHTML = "Reasons: ";
				
				if (obj.domainList.notes.type1) {
					document.getElementById("type").innerHTML += obj.domainList.notes.type1;
				}

				if (obj.domainList.notes.type2) {
					document.getElementById("type").innerHTML += ", " + obj.domainList.notes.type2;
				}

				if (obj.domainList.notes.type3) {
					document.getElementById("type").innerHTML += ", " + obj.domainList.notes.type3;
				}

			} else {
				document.getElementById("fake").innerHTML = "This article is not fake";
				document.getElementById("reasons").innerHTML = "";
				document.getElementById("type").innerHTML = "";
			}


	    });
    
    };

    xhr.send();
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
			
			<p>Whilst we try our best to determine the credibility of an article,
				<br>we also recommend that you also do your own independent fact checking. </p>


			<div id="newbox">
				<p id="domain"> </p>
				<p id="title"> </p>
				<p id="author"></p>
				<p id="fake"></p>
				<p id="type"></p>
				<p id="reasons"></p>
			</div>
			

		<!-- Footer -->

		<div id="footer">
		<footer>
Student names or nah?
		</footer>
		</div>
	</div>
	</div>
</body></html>
