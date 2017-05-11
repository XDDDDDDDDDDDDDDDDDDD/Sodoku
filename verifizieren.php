<!DOCTYPE html>
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

		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
		
		    .dropdown-content {
      display: none;
      position: absolute;
      /*background-color: #f9f9f9;*/
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {background-color: black}

    .dropdown:hover .dropdown-content {
      display: block;
    }

		div.difficulty {
			margin: 5px;
			border: 1px solid #ccc;
			margin-left: 40%;
			width: 180px;
		}

		div.difficulty:hover {
			border: 1px solid #777;
		}

		div.difficulty img {
			width: 100%;
			height: auto;
		}

		div.desc {
			padding: 15px;
			text-align: center;
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
require_once('dbconfig.php');
?>



<ul>
	<li><a href="Start.php" class="active" href="#Start">Start</a></li>
	<li><a href="Profil.php"class="active" href="#Profil">Profil</a></li>
    <li class="dropdown">
      <a href="Bestenliste"class="active" >Bestenliste</a>
      <div class="dropdown-content">
        <a href="besttime.php"> Bestenliste Zeiten </a>
        <a href="bestgames.php"> Bestenliste Spiele </a>
        <a href="bestrank.php"> Bestenliste ELO </a>
      </div>
    </li>
	<li><a href="Tutorial.php" class="active" href="#Regeln">Regeln</a></li>
	<li><a href="Impressum.php" class="active" href="#Impressum">Impressum</a></li>
</ul>


<h2 style="color: white; margin-left:12%"> Code: <?php echo $_SESSION['verify']; ?> </h2>


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
			else
			{
				$Text='Der eingegebene Sicherheitscode war inkorrekt.';
				echo "<br>";
				echo "<br>";
				echo '<h2 style="color: red;text-align:left">' . $Text . '</h2>';
					
			}
			
		}
		
	}





?>




	<footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</html>
