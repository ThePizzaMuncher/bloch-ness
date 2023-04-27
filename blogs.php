<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/blogs.css">
</head>
<body>
<?php
include 'parsedown-1.7.4/Parsedown.php';
session_start();
$sessie = session_id();
if(isset($_SESSION['ID']) && $_SESSION['ID'] == $sessie) {
	echo '<img src="uploads/' . $_SESSION['PFP'] . '" class="pfp">&emsp;' . $_SESSION['USER'] . '<hr>';
	echo '
		<ul>
			<li><a href="schrijven.php">Blogpost maken</a></li>
			|
			<li><a href="uitloggen.php">Uitloggen</a></li>
		</ul>
	';
} else {
	echo '<h2>Je bekijkt deze pagina nu als gast. <a href="login.html">Inloggen</a></h2>';
}
?>

<!-- <ul>
	<li><a href="schrijven.php">Blogpost maken</a></li>
	|
	<li><a href="uitloggen.php">Uitloggen</a></li>
</ul> -->


<hr>

<?php
$blogs = scandir('posts');
foreach(array_reverse($blogs) as $blog) {
	if($blog == '.' || $blog == '..') continue;
	echo "<br><iframe src='posts/$blog' height='300px' width='600px'></iframe><br>";
}
?>
</body>
</html>