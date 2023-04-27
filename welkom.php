<?php
session_start();
$sessie = session_id();
if(isset($_SESSION['ID']) && $_SESSION['ID'] == $sessie) {
	echo '<h3>Welkom, ' . $_SESSION['USER'] . '</h3>';
} else {
	echo '<br>Je moet eerst inloggen!<br>';
}
?>
<a href='uitloggen.php'><input type='button' name='terug' value=' Uitloggen ' /></a><a href="blogs.php"><button>Blogs</button></a>