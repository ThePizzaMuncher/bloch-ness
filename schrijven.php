<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
<?php
session_start();
$sessie = session_id();
while(1) {
	if(isset($_SESSION['ID']) && $_SESSION['ID'] == $sessie) {
		echo '<img src="uploads/' . $_SESSION['PFP'] . '" class="pfp">&emsp;' . $_SESSION['USER'];
		break;
	} else {
		echo '<br>Je moet eerst inloggen!<br>';
		echo '<a href="login.html"><button>Inlogpagina</button></a>';
		die();
	}
}
?>

<h1>Voer hier uw blogpost in.</h1>
<p>
	De post kan worden opgemaakt met Markdown.
</p>
<form action="upload.php" method="post">
	<textarea id="post" name="post" rows="20" cols="100" placeholder='Een enorm diepe blogpost'></textarea><br>
	<input type="submit" value="Plaats post">
</form>
<a href="blogs.php"><button>Blogs</button></a>
</body>
</html>