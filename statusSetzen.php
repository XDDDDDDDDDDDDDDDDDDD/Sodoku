<!DOCTYPE html>
<html>
<head>
<body>

	

<?PHP
session_start();

  require_once('dbconfig.php');
  
  
  if(isset($_POST['aendern']))
  {
	$_SESSION['status']=htmlspecialchars($_POST['statusText']);
	
	
	$statement = $pdo->prepare("UPDATE nutzer SET Status = :status WHERE Nutzername = :nname");
	$statement->bindParam(':nname', $_SESSION['nutzername']);
	$statement->bindParam(':status', $_SESSION['status']);
	
	$statement->execute();
	
	header('Location: Profil.php');
	
  }
		
  
  ?>
  
</body>
</head>
</html>
