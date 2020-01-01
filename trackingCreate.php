<?php
if(isset($_POST['id'])) {
	$email = $_POST['email'];
	$idList = "" . $_POST['id'] . " = " . $_POST['email'] . "\n";
	$textDocument = fopen("" . $_POST['id'] . ".txt", "w");
	$phpDocument = fopen("" . $_POST['id'] . ".php", "w");
	$trackingIDS = fopen('trackingIDS.ini', 'a');
	fwrite($phpDocument, '<?php  if(isset($_GET["edit"])){if(isset($_POST["update"])){file_put_contents("' . $_POST['id'] . '.txt", "" . date("m/d/Y") . " at " . date("h:i:s A") . "\n" . $_POST["update"].PHP_EOL.PHP_EOL , FILE_APPEND | LOCK_EX); header("Location: https://landon.pw/tracking/' . $_POST['id'] . '"); die();}else {echo("<center><p>Post an update...</p></center>");}}else {$content=file_get_contents("' . $_POST['id'] . '.txt");echo(nl2br(htmlentities($content)));die();}?> <!DOCTYPE html><html><head><title>Post an update...</title><style>textarea{width:100%; height:75%;}</style><body><form action="#" id="form" method="post"><textarea rows="4" cols="50" form="form" name="update" id="update"></textarea> <center><input type="submit" value="Post Update"></center></form></body>');
	fwrite($textDocument, "" . date("m/d/Y") . " at " . date("h:i:s A") . ":\nTracking ID created. Thanks for purchasing! Email sent to " . $email ."\n\n");
	fwrite($trackingIDS, $idList);
	fclose($textDocument);
	fclose($phpDocument);
	fclose($trackingIDS);
	
	$to      = $email;
	$subject = "Tracking ID Created - " . $_POST['id'] . "";
	$message = "Hello! This is an automatic email informing you that this email was used as the client of a project provided by https://landon.pw. You can view the status of your project using the online Tracking System. Simply visit https://landon.pw/tracking and enter the following ID: '" . $_POST['id'] . "'. If you did not recently purchase any services, you can safely ignore this email.";
	$headers = 'From: tracking@landon.pw';
	mail($to, $subject, $message, $headers);
	header("Location: /tracking/" . $_POST['id'] . "");
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Landon.pw | Order Tracking</title>
<style>
body {
	#background:linear-gradient(to right,#56ccf2,#2f80ed) fixed;
	background-color: white;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
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
} 
</style>

</head>
<body onload="generateId()">
<center>
<h1>Create New Project</h1>
<h3>Create a new trackable project.</h3>
<form action="#" method="post" id="form">
<input class="search" type="text" placeholder="Randomly Generated ID" name="id" id="id"/><br><br>
<input class="search" type="email" placeholder="Client Email" name="email" id="email"/><br><br>
<input type="submit"/>

<script>

function generateId() {
	var gen1 = (Math.floor(Math.random() * 10000) + 10000).toString().substring(1);
	var gen2 = (Math.floor(Math.random() * 10000) + 10000).toString().substring(1);
	var gen3 = (Math.floor(Math.random() * 10000) + 10000).toString().substring(1);
	var gen4 = (Math.floor(Math.random() * 10000) + 10000).toString().substring(1);
	var id = gen1 + "-" + gen2 + "-" + gen3 + "-" + gen4;
	document.getElementById("id").value = id;
	changeBackground();
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
