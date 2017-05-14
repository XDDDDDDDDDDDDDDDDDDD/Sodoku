<!DOCTYPE html>
<!-- In dieser Datei wird die Profilbesucher-Seite erzeugt. -->
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

<?PHP   //header

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
	
	if(isset($_GET['u']))   //Bekommt den Anzeigenamen übergeben
	{
		$name=$_GET['u'];
		
		$statement = $pdo->prepare("SELECT * FROM nutzer, spiele WHERE nutzer.SpielerID=spiele.SpielerID AND EchterName=:name");     //Sucht den passenden Eintrag in der Datenbank
		$statement->bindParam(':name', $name);
		$statement->execute();
		$user = $statement->fetch();

	}
	
  ?>

  <h3 style="color:white; font-size: 150%"> <ins> Profil </ins> </h3>
<!-- Zeigt die Persönlichen Daten des Spielers (abzuglich der Daten, durch die die Sicherheit des Accounts gefährdet werde könnte)an -->
  <article style="float:left; margin-left: 10px">
    <h3 style="color:green; font-size:120%"> <ins> Persönliche Daten </ins>
    </h3>
    <section style="color: white; ">
      <table style="width:100%; text-align: left; font-size: 110%">
        <tr>
          <th> Name </th>
          <td> <?php echo htmlspecialchars($name); ?> </td>
        </tr>
        <tr>
          <th> Geschlecht </th>
          <td> <?php echo utf8_encode($user['Geschlecht']); ?> </td>
        </tr>
        <tr>
          <th> Status </th>
          <td> <?php echo htmlspecialchars($user['Status']); ?> </td>
        </tr>

      </table>
    </section>
  </article>

<!-- Zeigt die Spielerstatistiken an -->
  <article style="float:right; margin-right: 600px">
    <h3 style="color:green; font-size:120%">
       <ins> Spieler Statistik </ins>
    </h3>
<!-- Zeigt Elo und Rang des Spielers an -->
    <section style="color: white; font-size:110% ">
      <p> Aktiv seit <?php echo $user['RegistriertSeit']; ?>. </p>
      <table style="width:100%; text-align:left">
        <tr>
          <th> ELO: </th>
          <td> <?php echo $user['Elo']; ?> </td>
        </tr>
        <tr>
          <th> Rang: </th>
          <td>  </td>
        </tr>
      </table>
<!-- Zeigt die Anzahl der gewonnenen Spiele in den einzelnen Schwierigkeitsgraden an. -->
      <dl>
        <dt> Gewonnene Spiele: </dt>
        <dd>
          <table style="width:100%; text-align:left">
            <tr>
              <th> leicht </th>
              <td> <?php echo $user['gewSpieleLeicht']; ?> </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> <?php echo $user['gewSpieleMittel']; ?> </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> <?php echo $user['gewSpieleSchwer']; ?> </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> <?php echo $user['gewSpieleExtrem']; ?> </td>
            </tr>
          </table>
        </dd>
      </dl>

<!-- Zeigt die Durchschnittszeiten des Spielers in den einzelnen Schwierigkeitsgraden an. -->
      <dl>
        <dt> Beste Zeiten: </dt>
        <dd>
          <table style="width:100%; text-align:left">
            <tr>
              <th> leicht </th>
              <td> <?php echo $user['zeitLeicht']; ?> </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> <?php echo $user['zeitMittel']; ?> </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> <?php echo $user['zeitSchwer']; ?> </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> <?php echo $user['zeitExtrem']; ?> </td>
            </tr>
          </table>
        </dd>
      </dl>
    </section>
  </article>

<!-- Ausgabe der Fußzeile, in der Unternehmensinformationen enthalten sind. -->
  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
