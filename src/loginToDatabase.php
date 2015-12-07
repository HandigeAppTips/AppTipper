<?php

  /* LET OP: DE VARIABELEN MOGEN NIET VERANDERD WORDEN! */

	// Declareer variabelen
	$gebruiker = 'stefbej144_kijk';
	$wachtwoord = '12345';
	$host = '185.13.227.161:3306';
	$dbName = 'stefbej144_apps';

	// Verbind met de host
	mysql_connect($host, $gebruiker, $wachtwoord) 
		or die('Kon geen verbinding maken: ' . mysql_error());
	echo 'Status: <strong>verbonden!</strong>';

	// Selecteer database
	mysql_select_db($dbName);

	// Wat regels overslaan
	echo '<br><br>';
	
	// Hier wordt het aantal records berekend. Dit wordt opgeslagen in de variabele aantalRijen
	$indexGegevens = mysql_query("SELECT * FROM appdatabase")
		or die('Kon de gegevens niet tellen: ' . mysql_error());
	$aantalRijen = mysql_num_rows($indexGegevens);
	
	// While loop die kijkt of q kleiner of gelijk is aan aantalRijen
	$q = 1;
	while ($q <= $aantalRijen) {
		// Voer een query uit met de variabele q
		$resultaten = mysql_query("SELECT * FROM appdatabase WHERE id = '$q'") 
			or die('Kon de gevraagde gegevens niet ophalen: ' . mysql_error());

		// While loop die de gegevens omzet en weergeeft
		while ($row = mysql_fetch_array($resultaten, MYSQL_NUM)) {
			printf("De naam is: %s.<br> De uitgever is: %s.<br> Korte beschrijving: %s<br>", $row[1], $row[2], $row[3]);
		}

		echo "=======================================<br>";

		$q++; 
	}
?>
