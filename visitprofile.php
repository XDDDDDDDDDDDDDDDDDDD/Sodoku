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

    td, th {
    padding: 5px;
    }

    dd,dt{
    padding: 5px;
    }

  </style>
<body>

<?PHP

	session_start();



?>

  <header>
    <form action="logout.php" method="POST" style=" float: right; margin-top:5px; margin-right:20px">
      <button type="submit" name=logout id=logout> Logout </button>
    </form>
    <div style="width: 1900px; border-bottom: 2px solid white;">
      <h1> Sudoku Online </h1>
      <p  style="text-align: right; margin-top:-55px; margin-right:75px; font-size:120%"> Hallo <?php echo $_SESSION['name']; ?> !</p>
    </div>
  </header>

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

  <h3 style="color:white; font-size: 150%"> <ins> Profil </ins> </h3>
<!-- Zeigt die Persönlichen Daten des Spielers an -->
  <article style="float:left; margin-left: 10px">
    <h3 style="color:green; font-size:120%"> <ins> Persönliche Daten </ins>
    </h3>
    <section style="color: white; ">
      <table style="width:100%; text-align: left; font-size: 110%">
        <tr>
          <th> Name </th>
          <td> <?php echo htmlspecialchars($_SESSION['name']); ?> </td>
        </tr>
        <tr>
          <th> Username </th>
          <td> <?php echo htmlspecialchars($_SESSION['nutzername']); ?> </td>
        </tr>
        <tr>
          <th> Geschlecht </th>
          <td> <?php echo $_SESSION['geschlecht']; ?> </td>
        </tr>
        <tr>
          <th> Status </th>
          <td> <?php echo htmlspecialchars($_SESSION['status']); ?> </td>
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
      <p> Aktiv seit <?php echo $_SESSION['datum']; ?>. </p>
      <table style="width:100%; text-align:left">
        <tr>
          <th> ELO: </th>
          <td> <?php echo $_SESSION['Elo']; ?> </td>
        </tr>
        <tr>
          <th> Rang: </th>
          <td> 30 </td>
        </tr>
      </table>
<!-- Zeigt die Anzahl der gewonnenen Spiele in den einzelnen Schwierigkeitsgraden an. -->
      <dl>
        <dt> Gewonnene Spiele: </dt>
        <dd>
          <table style="width:100%; text-align:left">
            <tr>
              <th> leicht </th>
              <td> <?php echo $_SESSION['gewSpieleLeicht']; ?> </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> <?php echo $_SESSION['gewSpieleMittel']; ?> </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> <?php echo $_SESSION['gewSpieleSchwer']; ?> </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> <?php echo $_SESSION['gewSpieleExtrem']; ?> </td>
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
              <td> <?php echo $_SESSION['durchZeitLeicht']; ?> </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> <?php echo $_SESSION['durchZeitMittel']; ?> </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> <?php echo $_SESSION['durchZeitSchwer']; ?> </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> <?php echo $_SESSION['durchZeitExtrem']; ?> </td>
            </tr>
          </table>
        </dd>
      </dl>


    </section>
  </article>


  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
