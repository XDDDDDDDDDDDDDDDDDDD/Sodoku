<!DOCTYPE html>
<html>
<head>
<body>

	

<?PHP
session_start();  //Wird von dem Button im Modal aufgerufen

  require_once('include/dbconfig.php');
  
  
  if(isset($_POST['aendern']))
  {
	$_SESSION['status']=htmlspecialchars($_POST['statusText']);   //Zur sicherheit
	
	//Eintragen in die Datenbank
	$statement = $pdo->prepare("UPDATE nutzer SET Status = :status WHERE Nutzername = :nname");
	$statement->bindParam(':nname', $_SESSION['nutzername']);
	$statement->bindParam(':status', $_SESSION['status']);
	
	$statement->execute();
	
	header('Location: Profil.php');   //Zurück zum Profil
	
  }
		
  
  ?>
  
</body>
</head>
</html>
