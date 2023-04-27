<?php
$fotoNaam = basename($_FILES["pfp"]["name"]);
global $uploadsMap;
function upload() {
	global $uploadsMap;
	$uploadsMap = "uploads/";
	$uploadsMap = $uploadsMap . basename($_FILES["pfp"]["name"]);
	$fotoType = pathinfo($uploadsMap, PATHINFO_EXTENSION);
	if(file_exists($uploadsMap)) {
		echo "Deze foto bestaat al.";
		return false;
	}

	if($_FILES["pfp"]["size"] > 500000) {
		echo "Deze foto is te groot.";
		return false;
	}

	if ($fotoType != "jpg" &&
		$fotoType != "png" &&
		$fotoType != "jpeg" &&
		$fotoType != "gif") {
			echo "Foto moet jp(e)g, png of gif zijn.";
			return false;
	}
	return true;
}

if(upload()) {
	if (move_uploaded_file($_FILES["pfp"]["tmp_name"], $uploadsMap)) {
		echo "Foto is geüpload.";
		$bestand = fopen("gebruikers","ab");
		if(!$bestand)
			echo "Kon geen bestand openen.";
		$naam = htmlspecialchars($_POST["usn"]);
		$email = htmlspecialchars($_POST["email"]);
		$wachtwoord = htmlspecialchars($_POST["pw"]);
		// $profiel = json_encode(array('name'=>$naam, 'email'=>$email, 'pw'=>$wachtwoord, 'pfp'=>$fotoNaam));
		
		$profiel = "$naam,$email,$wachtwoord,$fotoNaam\n";
		fwrite($bestand, $profiel, strlen($profiel));
		if(fclose($bestand))
			echo "Account is gemaakt :).";
		else
			echo "Probleem";
	}
}
?>
<a href="login.html"><input type="button" name="terug" value=" Inloggen " /></a>