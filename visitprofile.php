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

<!-- Include der Navigationbar und des dazu gehörigen Styles -->
  <?php
    include("include/navigationbar.html");
  ?>

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
