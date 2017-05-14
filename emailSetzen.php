<!DOCTYPE html>
<html>
<head>
<body>

	

<?PHP                     //Wird vom Button des Modals aufgerufen, Ändert die E-Mail Adresse des Nutzers
session_start();

  require_once('dbconfig.php');
  
  
  if(isset($_POST['aendern']))
  {
	   if(isset($_POST['neueMail']))
		{
			$email=htmlspecialchars($_POST['neueMail']);   //Zur sicherheit
			
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))  //Ungültige E-Mail Adresse
			{
				echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
			}
			else
			{
	  
	
				//E-Mail wird in die Datenbank geschrieben
				$statement = $pdo->prepare("UPDATE nutzer SET Mail = :mail, verifiziert = false WHERE Nutzername = :nname");
				$statement->bindParam(':nname', $_SESSION['nutzername']);
				$statement->bindParam(':mail', $email);
	
				$statement->execute();
				
				$_SESSION['email']=$email;
				$_SESSION['verifiziert']=false;   //Neu verifizieren erforderlich
				
				
	
				header('Location: Profil.php');
			}
		}
	
  }
		
  
  ?>
  
</body>
</head>
</html>
