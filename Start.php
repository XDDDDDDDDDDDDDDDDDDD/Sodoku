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
<body>

<?PHP

	session_start();

	$act;

	if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'])
	{
		include('header/headerLogout.html');
		$act='active';

		if($_SESSION['verifiziert']==false)
		{
			include('header/headerVeri.html');
		}

	}
	else
	{
		include('header/headerLogin.php');
		$act='disabled';

	}

?>


<!-- Include der Navigationbar und des dazu gehörigen Styles -->
  <?php
    include("navigationbar.html");
  ?>

  <article style="float:left; margin-left:30%; margin-top:60px">
    <div class="difficulty">
      <a href="Spiel.php?d=1">
        <img src="pictures/Leicht.png" alt="Trolltunga Norway" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Schwierigkeitsgrad: Leicht</div>
    </div>
  </article>

  <article style="float:right; margin-right:30%; margin-top:60px">
    <div class="difficulty">
      <a href="Spiel.php?d=2">
        <img src="pictures/Mittel.png" alt="Forest" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Schwierigkeitsgrad: Mittel</div>
    </div>
  </article>

  <article style="float:left; display:block; margin-left:30%; margin-top:20px">
    <div class="difficulty">
      <a href="Spiel.php?d=3">
        <img src="pictures/Schwer.png" alt="Northern Lights" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Schwierigkeitsgrad: Schwer</div>
    </div>
  </article>

  <article style="float:right; display:block; margin-right:30%; margin-top:20px">
    <div class="difficulty">
      <a href="Spiel.php?d=4">
        <img src="pictures/Extrem.png" alt="Mountains" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Schwierigkeitsgrad: Extrem</div>
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
