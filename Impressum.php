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



  <ul>
    <li><a href="Start.php" class="active" href="#Start">Start</a></li>
    <li><a href="Profil.php"class=<?PHP echo $act; ?> href="#Profil">Profil</a></li>
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



  <article style="color:white">
    <h1 style="text-decoration: underline"> Impressum </h1>
    <p style="font-size:130%"> SudokuOnline ist ein Produkt der FürDummies GmbH. </p>
    <p style="font-size: 120%"> Verantwortlich: <br/>
      FürDummies GmbH <br/>
      Am Stockhof 2 <br/>
      31785 Hameln </p>
    <p style="font-size: 120%"> Vorstand: <br/>
      Jan Getschmann <br/>
      Christian Kracht <br/>
      Carolin Kuessner </p>

  </article>



  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
