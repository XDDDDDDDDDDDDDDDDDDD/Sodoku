<!DOCTYPE html>
<html>
<head>
<body>

	

<?PHP
session_start();

  require_once('dbconfig.php');
  
  
  if(isset($_POST['aendern']))
  {
	   if(isset($_POST['neueMail']))
		{
			$email=htmlspecialchars($_POST['neueMail']);
			
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
			}
			else
			{
	  
	
	
				$statement = $pdo->prepare("UPDATE nutzer SET Mail = :mail, verifiziert = false WHERE Nutzername = :nname");
				$statement->bindParam(':nname', $_SESSION['nutzername']);
				$statement->bindParam(':mail', $email);
	
				$statement->execute();
				
				$_SESSION['email']=$email;
				$_SESSION['verifiziert']=false;
				
				
	
				header('Location: Profil.php');
			}
		}
	
  }
		
  
  ?>
  
</body>
</head>
</html>
