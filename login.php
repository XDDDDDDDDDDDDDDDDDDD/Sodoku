<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();

require_once('include/passwords.php');
require_once('include/dbconfig.php');


	//wird aufgerufen, wenn der Einlogbutton im Header betätigt wird
	if(isset($_POST['login']))
	{
		$nutzername = $_POST['uname'];
		$password = $_POST['password'];
 
		
		$statement = $pdo->prepare("SELECT * FROM nutzer, spiele WHERE Nutzername = :nname AND nutzer.SpielerID = spiele.SpielerID");
		$result = $statement->execute(array('nname' => $nutzername));
		$user = $statement->fetch();
 
		//Überprüfung des Passworts
		if ($user !== false && password_verify($password, $user['NutzerPW']))   //Passwort ist korrekt
		{
			
			//Setzt die Session- Variablen die gebraucht werden, um die Datenbank zu entlasten
			$_SESSION['eingeloggt']=true;
			$_SESSION['userid'] = $user['NutzerID'];
			$_SESSION['spielerid'] = $user['SpielerID'];
			$_SESSION['nutzername']=utf8_encode($user['Nutzername']);
			$_SESSION['name']=utf8_encode($user['EchterName']);
			$_SESSION['geschlecht']=utf8_encode($user['Geschlecht']);
			$_SESSION['email']=utf8_encode($user['Mail']);
			$_SESSION['status']=utf8_encode($user['Status']);
			$_SESSION['datum']=$user['RegistriertSeit'];
			
			$_SESSION['verifiziert']=$user['verifiziert'];
			$_SESSION['verify'] = rand(10000,99999);
			$_SESSION['gewSpiele']=$user['gewSpieleLeicht'];
			$_SESSION['gewSpieleLeicht']=$user['gewSpiele'];
			$_SESSION['gewSpieleMittel']=$user['gewSpieleMittel'];
			$_SESSION['gewSpieleSchwer']=$user['gewSpieleSchwer'];
			$_SESSION['gewSpieleExtrem']=$user['gewSpieleExtrem'];
			
			$_SESSION['zeitLeicht']=$user['zeitLeicht'];
			$_SESSION['zeitMittel']=$user['zeitMittel'];
			$_SESSION['zeitSchwer']=$user['zeitSchwer'];
			$_SESSION['zeitExtrem']=$user['zeitExtrem'];
			
			$_SESSION['Elo']=$user['Elo'];
			$_SESSION['duelleGew']=$user['duelleGew'];
			$_SESSION['duelleGes']=$user['duelleGes'];
			header('Location: Start.php');   //Zurück zum Start
		}
		else 
		{
			header('Location: Start.php?n=' . $nutzername);  //Fehler ist aufgetreten, der Nutzername wird übergeben und in das Feld zurückgeschrieben
		}
	}
	
?>


</body>
</html>