<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
	session_start();

	
	//wird vom Logout-Button aufgerufen
	if(isset($_POST['logout']))
	{
		session_destroy();  //Ausloggen
		header('Location: Start.php');  //zurück zum Start
	}

?>


</body>
</html>