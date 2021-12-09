<?php
if (isset($_POST['id'])) {
	$string = file_get_contents('trackingIDS.ini');
	$check = "" . $_POST['id'] . " =";
	if (strpos($string, $check) !== false) {
		header("Location: https://projects.landon.pw/tracking/" . $_POST['id'] . "");
		die();
    } else {
    	echo "<center><p>That tracking ID is invalid.</p></center>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Landon.pw | Order Tracking</title>
<style>
body {
	background-color: white;
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	position:fixed;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	font-family:Roboto, sans-serif;

} .search {
  border-radius: 25px;
  border: 2px;
  box-shadow: 2px 2px 8px #888888;
  padding: 10px;
  width: 400px;
  font-size: 25px;
} input#image-button{
    background: url('http://www.mmcgeorgia.org/wp-content/uploads/2018/05/Very-Basic-Search-icon.png') no-repeat top left;
}
</style>

</head>
<body onload="changeBackground()">
<center>
<h1>Enter Tracking ID</h1>
<h3>Find out the current status of your order.</h3>
<form action="#" method="post" id="form">
<input class="search" type="text" placeholder="1571-1657-5717-4925" name="id" id="id"></input>
<br>
<br>
<br>
<a href="#" onclick="setBackground()">Change Background</a>

<script>
function setBackground() {
	var background = prompt("Please enter a direct image URL");
	document.cookie = "background=" + background + "; expires=Thu, 18 Dec 2019 12:00:00 UTC";
	window.location = "https://landon.pw/tracking"
}

function changeBackground() {
	var background2 = readCookie('background');
	document.body.style.backgroundImage = "url('" + background2 + "')";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
</script>
</center>
</body>
</html>
