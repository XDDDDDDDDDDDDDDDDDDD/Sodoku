<!--  Zum ausgeben der Bestenliste (gewonnene Spiele)       -->
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
    padding: 15px;
    border-right: 2px solid white;
    border-bottom:  2px solid white;
    }

    div.scroll{
      color:white;
      overflow: scroll;
      width: 250px;
      height: 500px;
    }
	
	.disabled {
    pointer-events:none; 
    opacity:0.6;         
	}

  </style>
<body>

<?PHP  //überprüft, welcher Header gewählt werden soll (je nachdem ob man eingeloggt ist oder nicht)

	session_start();

 require_once('include/dbconfig.php');

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

  <!--  Überschrift  -->
  <h1 style="color:white; text-align: center"> Bestenliste Gelößte Spiele </h1>



  <!-- generiert die Bestenliste durch Datenbankabfrage und erstellt dann generisch die Tabelle -->
  <div class="scroll" style="float:left; margin-left:2%; margin-top:60px">
    <h2> Gesamt</h2>
    <table style="width:auto; text-align:center">
	<tr>
        <th> Name </th>
        <th> Anzahl </th>
    </tr>
	  <?PHP
			 //Anzahl aller gewonnenen Spiele
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.gewSpiele FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND spiele.gewSpiele ORDER BY spiele.gewSpiele desc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row) //Ausgabe in HTML
			{
				echo "<tr>";
				echo '<td><a style="color:white" href="visitprofile.php?u=' . $row["EchterName"] . '">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["gewSpiele"] . '</td>';
				echo "</tr>";
			}
	  ?>
    </table>
  </div>
  
  <!-- wie oben -->
  <div class="scroll" style="float:left; margin-left:7%; margin-top:60px">
    <h2> Leicht </h2>
    <table style="width:auto; text-align:left">
	<tr>
        <th> Name </th>
        <th> Anzahl </th>
    </tr>
	  <?PHP
			//Anzahl gewonnener Spiele mit dem Schwierigkeitsgrad leicht
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.gewSpieleLeicht FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID ORDER BY spiele.gewSpieleLeicht desc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)  //Ausgabe in HTML
			{
				echo "<tr>";
				echo '<td><a style="color:white" href="visitprofile.php?u=' . $row["EchterName"] . '">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["gewSpieleLeicht"] . '</td>';
				echo "</tr>";
			}
	  ?>
    </table>
  </div>

  <div class="scroll" style="float:left; margin-left:7%; margin-top:60px">
    <h2> Mittel </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Name </th>
        <th> Anzahl </th>
    </tr>
	  <?PHP    //Anzahl gewonnener Spiele mit dem Schwierigkeitsgrad mittel
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.gewSpieleMittel FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID ORDER BY spiele.gewSpieleMittel desc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)  //Ausgabe in HTML
			{
				echo "<tr>";
				echo '<td><a style="color:white" href="visitprofile.php?u=' . $row["EchterName"] . '">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["gewSpieleMittel"] . '</td>';
				echo "</tr>";
			}
	  ?>
    </table>
  </div>

  <div class="scroll" style="float:left; display:block; margin-left:7%; margin-top:60px">
    <h2> Schwer </h2>
    <table style="width:auto; text-align:left">
     <tr>
        <th> Name </th>
        <th> Anzahl </th>
    </tr>
	  <?PHP   //Anzahl gewonnener Spiele mit dem Schwierigkeitsgrad schwer
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.gewSpieleSchwer FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID ORDER BY spiele.gewSpieleSchwer desc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a style="color:white" href="visitprofile.php?u=' . $row["EchterName"] . '">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["gewSpieleSchwer"] . '</td>';
				echo "</tr>";
			}
	  ?>
    </table>
  </div>

  <div class="scroll" style="float:left ; display:block; margin-left:7%; margin-top:60px">
    <h2> Extrem </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Name </th>
        <th> Anzahl </th>
    </tr>
	  <?PHP
			//Anzahl gewonnener Spiele mit dem Schwierigkeitsgrad extrem
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.gewSpieleExtrem FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID ORDER BY spiele.gewSpieleExtrem desc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a style="color:white" href="visitprofile.php?u=' . $row["EchterName"] . '">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["gewSpieleExtrem"] . '</td>';
				echo "</tr>";
			}
	  ?>
    </table>
  </div>


  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
