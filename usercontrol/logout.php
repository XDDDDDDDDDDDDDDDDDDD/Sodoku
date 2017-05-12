<!DOCTYPE html>
<!-- In dieser Datei wird der Logout von der Seite abgebildet.-->
<html>
<head>
</head>
<body>

<?php
	session_start();

	if(isset($_POST['logout']))
	{
		session_destroy();
		header('Location: Start.php');
	}

?>


</body>
</html>
