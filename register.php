<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();

require_once('include/dbconfig.php');
require_once('include/passwords.php');

if(isset($_POST['register'])) 
{

 $error = false;
 
 $nname= trim($_POST['uname']);
 $name= trim($_POST['name']);
 $email = trim($_POST['mail']);
 $password = $_POST['password'];
 $password2 = $_POST['password_confirm'];
 $gender;
 
 if(isset($_POST['genderm']))
 {
	 $gender=2;
 }
 elseif(isset($_POST['genderw']))
 {
	 $gender=3;
 }
 else
 {
	 $gender=1;
 }
 
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	}
		
	//Überprüft, ob die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) 
	{ 
		$statement = $pdo->prepare("SELECT * FROM nutzer, spiele WHERE Mail = :email");
		$result = $statement->execute(array(':email' => $email));
		$mail = $statement->fetch();
 
		if($mail !== false) 
		{
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		} 
	
	} 
	
	if(strlen($name) < 2)
	{
		echo 'Bitte geben sie einen Anzeigenamen an<br>';
		$error=true;
	}
		
	//Überprüft, ob der Anzeigename schon vorhanden ist
	if(!$error) 
	{ 
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE EchterName = :nname");
		$result = $statement->execute(array(':nname' => $nname));
		$user = $statement->fetch();
 
		if($user !== false) 
		{
			echo 'Dieser Nutzername ist bereits vergeben.<br>';
			$error = true;
		}
	}
	
	
	if(strlen($nname) < 3)
	{
		echo 'Bitte geben sie einen Nutzernamen an<br>';
		$error=true;
	}

		
	//Überprüft, ob der Nutzername schon vorhanden ist
	if(!$error) 
	{ 
		
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE Nutzername = :nname");
		$result = $statement->execute(array('nname' => $nname));
		$user = $statement->fetch();
 
		if($user !== false) 
		{
			echo 'Dieser Nutzername ist bereits vergeben.<br>';
			$error = true;
		}
	}
	
	
	if(strlen($password) <= 6) 
	{
		echo 'Bitte ein Passwort mit einer Mindestlänge von 6 Zeichen angeben<br>';
		$error = true;
	}
 
	if($password != $password2) 
	{
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}

	
	
	
 
	//Keine Fehler, Nutzer wird registriert
	if(!$error) 
	{ 
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("SELECT * FROM nutzer");
		$result = $statement->execute();
		$user = $statement->fetch();
		
		
		
		try
		{
 
		$statement = $pdo->prepare("INSERT INTO nutzer (Nutzername, NutzerPW, EchterName, Mail, Geschlecht) VALUES (:nname, :password, :name, :email, :gender);");
		$statement->bindParam(':email', $email);
		$statement->bindParam(':password', $password_hash);
		$statement->bindParam(':nname', $nname);
		$statement->bindParam(':name', $name);
		$statement->bindParam(':gender', $gender);
		
		
		$statement->execute();
		
		
		
		$statement2 = $pdo->prepare("SELECT * FROM nutzer, spiele WHERE Nutzername = :nname AND nutzer.SpielerID = spiele.SpielerID");
		$result = $statement2->execute(array('nname' => $nname));
		$user = $statement2->fetch();
		
		
		if ($user !== false) 
		{
		
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
			$_SESSION['gewSpiele']=$user['gewSpiele'];
			$_SESSION['gewSpieleLeicht']=$user['gewSpieleLeicht'];
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
		}
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		
	} 
	
}

?>

 <meta http-equiv="refresh" content="0;URL=Start.php" />
  
</body>
</html>