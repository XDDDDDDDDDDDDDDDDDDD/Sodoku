<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>


  <style>
  

    body{
       background-image: url("pictures/Tafel.jpg");
    }

    header{
      color: white;
      width: 1910px;
      border-bottom: 2px solid white;
    }

    footer{
      color: white;
    }

    input{
      width: auto;
    }

    .button{
      width: 120px;
      margin-top: 5px;
      display: block;
    }
	  
    td, th {
    padding: 5px;
    }

    dd,dt{
    padding: 5px;
    }
		
  </style>
  
  <body>
  
  <?PHP  //header
  if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'])
	{
		include('header/headerLogout.html');

		if($_SESSION['verifiziert']==false)
		{
			include('header/headerVeri.html');
		}

	}
	else
	{
		include('header/headerLogin.php');
	}


	include("navigationbar.html");
	
	
	

  ?>
	  
	  
	  <!--  Gibt Anzahl der gewonnenen Spiele, die Zeit und den schwierigkeitsgrad aus -->
  <table style="color:white; font-size:120% ">
    <tr> <br><br>
      <td> Zeit </td>
      <td> Schwierigkeitsgrad </td>
	  <td> gelöste Sudokus</td>
      <td> gelöste Sudokus insgesamt</td>
    </tr>
    <tr>
      <td> <?PHP echo $_SESSION['time'] ?> s </td>
      <td> <?PHP switch($_SESSION['diff']){case 1: echo "Leicht";break; case 2: echo "Mittel";break; case 3: echo "Schwer"; break; case 4: echo "Extrem";break;} ?> </td>
	  <td> <?PHP if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt']){switch($_SESSION['diff']){case 1: echo $_SESSION['gewSpieleLeicht'];break; case 2: echo $_SESSION['gewSpieleMittel'];break; case 3: echo $_SESSION['gewSpieleSchwer']; break; case 4: echo $_SESSION['gewSpieleExtrem'];break;}}else{echo "0";} ?> + 1</td>
      <td> <?PHP if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt']){echo $_SESSION['gewSpiele'];}else{echo "0";} ?> + 1</td>
	</tr>
	<tr>
	
		
  
  <?PHP
  
  require_once('include/dbconfig.php');
  
  
  if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'])
	{
		$_SESSION['gewSpiele']=$_SESSION['gewSpiele']+1;
		switch($_SESSION['diff'])
		{
			case 1: 	//Leicht
						$_SESSION['gewSpieleLeicht']=$_SESSION['gewSpieleLeicht']+1;
						
						$statement = $pdo->prepare("UPDATE spiele SET gewSpieleLeicht = :gew WHERE SpielerID = :sid"); //Schreibt neue Anzahl gewonnener Spiele des schwierigkeitsgrads in die DB
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':gew', $_SESSION['gewSpieleLeicht']);
						$statement->execute();
						
					if($_SESSION['time']<$_SESSION['zeitLeicht'])
					{
						echo "<td> Neuer Rekord!</td>";
						
						$statement = $pdo->prepare("UPDATE spiele SET zeitLeicht = :zeit WHERE SpielerID = :sid");   //schreibt Rekordzeit in die DB
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':zeit', $_SESSION['time']);
						$statement->execute();
						
					}
					break; 
			case 2: //mittel
						$_SESSION['gewSpieleMittel']=$_SESSION['gewSpieleMittel']+1;
						
						$statement = $pdo->prepare("UPDATE spiele SET gewSpieleMittel = :gew WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':gew', $_SESSION['gewSpieleMittel']);
						$statement->execute();
			
					if($_SESSION['time']<$_SESSION['zeitMittel'])
					{
						echo "<td> Neuer Rekord!</td>";
						
						$statement = $pdo->prepare("UPDATE spiele SET zeitMittel = :zeit WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':zeit', $_SESSION['time']);
						$statement->execute();
					}
					
					break; 
			case 3:  //schwer
						$_SESSION['gewSpieleSchwer']=$_SESSION['gewSpieleSchwer']+1;
						
						$statement = $pdo->prepare("UPDATE spiele SET gewSpieleSchwer = :gew WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':gew', $_SESSION['gewSpieleSchwer']);
						$statement->execute();
			
					if($_SESSION['time']<$_SESSION['zeitSchwer'])
					{
						echo "<td> Neuer Rekord!</td>";
						
						$statement = $pdo->prepare("UPDATE spiele SET zeitSchwer = :zeit WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':zeit', $_SESSION['time']);
						$statement->execute();
					}
					
					break; 
			case 4:  //extrem
						$_SESSION['gewSpieleExtrem']=$_SESSION['gewSpieleExtrem']+1;
						
						$statement = $pdo->prepare("UPDATE spiele SET gewSpieleExtrem = :gew WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':gew', $_SESSION['gewSpieleExtrem']);
						$statement->execute();
			
					if($_SESSION['time']<$_SESSION['zeitExtrem'])
					{
						echo "<td> Neuer Rekord!</td>";
						
						$statement = $pdo->prepare("UPDATE spiele SET zeitExtrem = :zeit WHERE SpielerID = :sid");
						$statement->bindParam(':sid', $_SESSION['spielerid']);
						$statement->bindParam(':zeit', $_SESSION['time']);
						$statement->execute();
					}
					
					break;
		}
		
		$statement = $pdo->prepare("UPDATE spiele SET gewSpiele = :gew WHERE SpielerID = :sid"); //Schreibt neue Anzahl gewonnener Spiele in die DB
		$statement->bindParam(':sid', $_SESSION['spielerid']);
		$statement->bindParam(':gew', $_SESSION['gewSpiele']);
		$statement->execute();
		
		unset($_SESSION['sudoku']);  //löscht die Session-Variablen
		unset($_SESSION['diff']);
		unset($_SESSION['lösung']);
		unset($_SESSION['time']);
		
		echo "<td><a href='Start.php' style='color:white'>Neues Spiel?</a></td>";    //Zum Hauptbildschirm
		
	}
	else  //nicht eingeloggt
	{
		echo "<td>Du bist nicht angemeldet!</td>";             //links zum registrieren & anmelden
		echo "<td><a href='Registrieren.php' style='color:white'>Zum Registrieren</a></td>";
		echo "<td><a href='Start.php' style='color:white'>Zum Anmelden</a></td>";
	}
	
	?>
	
  </tr>
  </table>
  
  



  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
