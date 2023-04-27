<?php
include 'parsedown-1.7.4/Parsedown.php';
session_start();
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true);
$post = $Parsedown->text($_POST['post']);
$i = scandir('posts');
$count = sizeof($i) - 1;
$file = fopen("posts/$count.html", 'a');
$post = '<img src="../uploads/' . $_SESSION['PFP'] . '" height="50px" width="50px">&emsp;<strong><em>' . $_SESSION['USER'] . '</em></strong><hr>' . $post;
fwrite($file, $post, strlen($post));
echo "
	<script>
		alert('Succes');
	</script>
";
header('location:blogs.php');
die();
?>