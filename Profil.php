<!DOCTYPE html>
<html>
<head>
  <style>

    body{
      background-image: url("http://www.commacross.de/www/wp-content/uploads/2015/05/Tafel.jpg");
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
    <form style=" float: right; margin-top:5px; margin-right:20px">
      <button type="button" onclick="Start.php"> Logout </button>
    </form>
    <div>
      <h1> Sudoku Online </h1>
      <p  style="text-align: right; margin-top:-43px; margin-right:100px; font-size:120%"> Hallo <?php echo $_SESSION['name']; ?> !</p>
    </div>
  </header>

  <ul>
    <li><a href="Start.php" class="active" href="#Start">Start</a></li>
    <li><a href="Profil.php"class="active" href="#Profil">Profil</a></li>
    <li><a href="Bestenliste"class="active" href="#Bestenliste">Bestenliste</a></li>
    <li><a href="Regeln" class="active" href="#Regeln">Regeln</a></li>
    <li><a href="Impressum" class="active" href="#Impressum">Impressum</a></li>
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
          <td> <?php echo $_SESSION['name']; ?> </td>
        </tr>
        <tr>
          <th> Username </th>
          <td> <?php echo $_SESSION['nutzername']; ?> </td>
        </tr>
        <tr>
          <th> Geschlecht </th>
          <td> <?php echo $_SESSION['geschlecht']; ?> </td>
        </tr>
        <tr>
          <th> Mail Adresse </th>
          <td> <?php echo $_SESSION['email']; ?> </td>
        </tr>
        <tr>
          <th> Status </th>
          <td> <?php echo $_SESSION['status']; ?> </td>
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
      <p> Du spielst seit <?php echo $_SESSION['datum']; ?>. </p>
      <table style="width:100%; text-align:left">
        <tr>
          <th> ELO: </th>
          <td> 1000 </td>
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
              <td> 500 </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> 1000 </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> 10 </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> 0 </td>
            </tr>
          </table>
        </dd>
      </dl>

<!-- Zeigt die besten Zeiten des Spielers in den einzelnen Schwierigkeitsgraden an. -->
      <dl>
        <dt> Beste Zeiten: </dt>
        <dd>
          <table style="width:100%; text-align:left">
            <tr>
              <th> leicht </th>
              <td> 0:05:31 </td>
            </tr>
            <tr>
              <th> mittel </th>
              <td> 0:07:01 </td>
            </tr>
            <tr>
              <th> schwer </th>
              <td> 0:10:49 </td>
            </tr>
            <tr>
              <th> extrem </th>
              <td> 0:30:22 </td>
            </tr>
          </table>
        </dd>
      </dl>


    </section>
  </article>


  <footer style="margin-top:36%">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
