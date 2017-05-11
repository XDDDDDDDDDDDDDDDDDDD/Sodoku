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

    div.pic{
      position: absolute;
      top: 22%;
      right: 20%;

    }

	.disabled {
    pointer-events:none; //This makes it not clickable
    opacity:0.6;         //This grays it out to look disabled
	}

  </style>
<body>

<?PHP

	session_start();

	$act;

	if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'])
	{
		include('header/headerLogout.html');
		$act='active';

	}
	else
	{
		include('header/headerLogin.php');
		$act='disabled';

	}



?>


<!-- Include der Navigationbar und des dazu gehörigen Styles -->
  <?php
    include("include/navigationbar.html");
  ?>

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




  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
