<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();

require_once('dbconfig.php');

	
	
	/* Die Funktion kann nicht realisiert werden, da wir keinen mailserver haben.
	
	$to      = $_SESSION['email'];  //An wen
	$subject = 'Verifikation';      //Titel
	$message = '                    
 
	Vielen Dank für die Erstellung deines Accounts!
	
	Um deine E-Mail Adresse zu verifizieren, musst du nur den folgenden Code 
	
	' . $verify . '	
	
	in dem Feld auf der Website eingeben und den "Bestätigen"- Button drücken.
	
	
	Wir wünschen dir viel Spass eim Rätseln!
	
	-Dein Sudoku-Team
	'; // Nachricht
                     
	$headers = 'From: postmaster@localhost' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Senden
	
	*/
	
	
	
	if(isset($_POST['verify'])) 
	{
		if(isset($_POST['input']))
		{
			$uInput=(int)$_POST['input'];
			
			if($uInput==$_SESSION['verify'])
			{
				$statement = $pdo->prepare("UPDATE nutzer SET verifiziert = true WHERE Nutzername = :nname");
				$result = $statement->execute(array('nname' => $_SESSION['nutzername']));
				
				$_SESSION['verifiziert']=true;
				echo "Deine E-Mail Adresse wurde erfolgreich verifiziert<br>";
				echo '<a href="Start.php">Klicke hier um zurückzukehren</a>';
			}
			else
			{
				
				echo "Der Sicherheitscode ist nicht korrekt!<br>";
					
			}
			
		}
		else
		{
			echo "Bitte den Code eingeben!";
		}
		
	}
	
	
?>


</body>
</html>