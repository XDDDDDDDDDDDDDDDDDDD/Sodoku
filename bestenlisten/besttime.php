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
    padding: 20px;
    border-right: 2px solid white;
    border-bottom:  2px solid white;
    }

    div.scroll{
      color:white;
      overflow: scroll;
      width: 300px;
      height: 500px;
    }

  </style>
<body>

<?PHP

	session_start();

 require_once('dbconfig.php');

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


	include("include/navigationbar.html");
	
  ?>

  <h1 style="color:white; text-align: center"> Bestenliste Zeit </h1>



  <div class="scroll" style="float:left; margin-left:7%; margin-top:60px">
    <h2> Leicht </h2>
    <table style="width:auto; text-align:left">
	<tr>
        <th> Name </th>
        <th> Zeit </th>
    </tr>
	  <?PHP
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.zeitLeicht FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND spiele.zeitLeicht<999999 ORDER BY spiele.zeitLeicht asc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a href="visitprofile.php?u="'.$row["EchterName"].'" style="color:white">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["zeitLeicht"] . '</td>';
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
        <th> Zeit </th>
    </tr>
	  <?PHP
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.zeitMittel FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND spiele.zeitMittel<999999 ORDER BY spiele.zeitLeicht asc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a href="visitprofile.php?u="'.$row["EchterName"].'" style="color:white">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["zeitMittel"] . '</td>';
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
        <th> Zeit </th>
    </tr>
	  <?PHP
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.zeitSchwer FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND spiele.zeitSchwer<999999 ORDER BY spiele.zeitLeicht asc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a href="visitprofile.php?u="'.$row["EchterName"].'" style="color:white">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["zeitSchwer"] . '</td>';
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
        <th> Zeit </th>
    </tr>
	  <?PHP
			
			$statement = $pdo->prepare("SELECT nutzer.EchterName, spiele.zeitExtrem FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND spiele.zeitExtrem<999999 ORDER BY spiele.zeitLeicht asc");
			$result = $statement->execute();
			$liste = $statement->fetchAll();
			
			
			foreach($liste as $row)
			{
				echo "<tr>";
				echo '<td><a href="visitprofile.php?u="'.$row["EchterName"].'" style="color:white">'. $row["EchterName"] . '</a></td>';
				echo '<td>'. $row["zeitExtrem"] . '</td>';
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
