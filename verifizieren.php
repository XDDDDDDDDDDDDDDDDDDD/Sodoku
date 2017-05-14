<!DOCTYPE html>
<!-- In dieser Datei wird die Seite erstellt, auf der man nach seiner Registrierung seine Mailadresse verifizieren kann. -->
<html>
<head>
	<style>

		body{
			background-image: url("pictures/Tafel.jpg");
		}

		header{
			color: white;
		}

		footer{
			color: white;
		}

		input{
			width: auto;
		}

		.button{
			width: 120px;
			margin-left: 65px;
			margin-top: 5px;
			display: block;
		}

		.disabled {
			pointer-events:none;
			opacity:0.6;
		}


	</style>
</head>
<body>
<?php
session_start();

include('header/headerLogout.html');
require_once('include/dbconfig.php');
include("navigationbar.html");


?>



<h2 style="color: white; margin-left:12%"> Code: <?php echo $_SESSION['verify']; ?> </h2>

<!-- Ausgabe vom EIngabefeld für den Verifizierungscode. -->
<article style="float:left; margin-left: 20px;">
    <section class="container"style="color: white; font-size: 130%; margin-top: 10px">
      <form class="register"action="verifizieren.php" method="POST">
        <table style="width:100%; text-align: left; font-size: 110%">
          <tr>
            <th> <label for="input" > Verifikationscode </label> </th>
            <td> <input type="text" id="input" name=input float:right> </td>
			<td> <button type="submit" style="margin-left: 50px" id='verify' name='verify'> Code verifizieren </button> </td>
          </tr>
        </table>
     </form>
    </section>
  </article>

  <?php


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

	$Text='	';

//Ausgabe des Verifizierungscode und Abfrage ob der Code korrekt eingegeben wurde.
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
				$Text='Deine E-Mail wurde erfolgreich verifiziert';
				echo "<br>";
				echo "<br>";
				echo '<h2 style="color: green;text-align:left">' . $Text . '</h2>';
				echo '<a href="Start.php" style="color:green">Klicke hier um zurückzukehren</a>';
			}
			else  //inkorrekter Code 
			{
				$Text='Der eingegebene Sicherheitscode war inkorrekt.';
				echo "<br>";
				echo "<br>";
				echo '<h2 style="color: red;text-align:left">' . $Text . '</h2>';

			}

		}

	}





?>



<!-- Ausgabe der Fußzeile, in der Unternehmensinformationen enthalten sind. -->
  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</html>
