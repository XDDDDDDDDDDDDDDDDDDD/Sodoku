<!DOCTYPE html>
<html>
<head>
  <style>

    body{
      background-image: url("http://www.commacross.de/www/wp-content/uploads/2015/05/Tafel.jpg");
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

    div.pic{
      position: absolute;
      top: 22%;
      right: 20%;

    }







  </style>
<body>

  <header>
    <form style=" float: right; margin-top:15px;">
      <label for="uname">Username</label>
      <input type="text" id="uname" name=uname >
      <label for="pw">Password</label>
      <input type="password" id="pw" name=password>
      <button type="button"> Login </button>
      <article style="display: block">
        <a href="regestrieren" style="color: white " > Registrieren? </a>
        <a href="pwvergessen" style="color: white; margin-left:200px" > Passwort vergessen? </a>
      </article>
    </form>
    <div style="width: 1910px; border-bottom: 2px solid white;">
      <h1> Sudoku Online </h1>
    </div>
  </header>

  <ul>
    <li><a href="Start.php" class="active" href="#Start">Start</a></li>
    <li><a href="Profil.php"class="active" href="#Profil">Profil</a></li>
    <li><a href="Bestenliste"class="active" href="#Bestenliste">Bestenliste</a></li>
    <li><a href="Tutorial.php" class="active" href="#Tutorial">Regeln</a></li>
    <li><a href="Impressum.php" class="active" href="#Impressum">Impressum</a></li>
  </ul>

  <article style="float:left; color: white; width:50%">
    <h1 style="font-size: 220%; text-decoration: underline"> So gehts! </h1>
    <p style="font-size:130%">
      Sudoku ist ein Zahlenrätsel. Das quadratische Spielfeld ist in drei mal drei Blöcke unterteilt.
      Jeder dieser Blöcke besteht wiederum aus 9 Kästchen. Das gesamte Spielfeld besteht somit aus 81
      Kästchen die sich 9 Spalten und 9 Reihen zuordnen lassen. Von diesen 81 Feldern sind typischerweise
      22 bis 36 Felder vorgegeben, in denen Zahlen zwischen 1 bis 9 stehen.
      Das Ziel des Spiels ist, das Spielfeld zu vervollständigen. Dabei sind die vom Spiel vorgegebenen
      Zahlen nicht veränderbar. Die leeren Kästchen müssen mit Ziffern gefüllt werden. Dabei gelten
      folgende drei Regeln:
      In jeder Zeile dürfen die Ziffern von 1 bis 9 nur einmal vorkommen
      In jeder Spalte dürfen die Ziffern von 1 bis 9 nur einmal vorkommen
      In jedem Block dürfen die Ziffern von 1 bis 9 nur einmal vorkommen
      Das Spiel ist beendet, wenn alle Kästchen korrekt gefüllt sind. </p>
  </article>

  <article>
    <div class="pic">
      <h2 style="color:white"> Beispiel: </h2>
      <img src="http://sudoku.at/sudoku-archiv/loesung_sudoku_mittel%20(1703).gif" width="400" height="400">
    </div>
  </article>




  <footer style="margin-top:39%">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>