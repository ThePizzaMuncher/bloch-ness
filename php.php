<?php
	$bestand = fopen("gebruikers","r");
	while(!feof($bestand)) {
		$account = fgetcsv($bestand);
		foreach($account as $i) {
			echo $i . ' | ';
		}
		echo '<br/>';
	}
	fclose($bestand);
?>