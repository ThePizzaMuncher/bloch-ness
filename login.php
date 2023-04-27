<?php
$gebruikersnaam = htmlspecialchars($_POST['usn']);
$wachtwoord = htmlspecialchars($_POST['pw']);
$bestand = fopen("gebruikers", "r");
if(!$bestand) {echo 'Kon het bestand niet openen.';}
while(!feof($bestand)) {
	// $account = fgetcsv($bestand);
	$account = fgets($bestand);
	$account = explode(',', $account);
	print_r($account); echo '<br>';
	if($account[0] == $gebruikersnaam && $account[2] == $wachtwoord) {
		session_start();
		$_SESSION['USER'] = $gebruikersnaam;
		$_SESSION['STATUS'] = 1;
		$_SESSION['ID'] = $_COOKIE['PHPSESSID'];
		$_SESSION['PFP'] = $account[3];
		header('location:blogs.php');
		die();
	}
}
// header('location:welkom.php');
echo "
	<script>
		alert('Wachtwoord of gebruikersnaam ongeldig.');
	</script>
";
header('location:login.html');

?>