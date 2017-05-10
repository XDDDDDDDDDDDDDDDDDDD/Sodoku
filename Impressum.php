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
		include('logoutHeader.php');
		$act='active';
		
	}
	else
	{
		include('loginHeader.php');
		$act='disabled';
		
	}

	
  
?> 
  


  <ul>
    <li><a href="Start.php" class="active" href="#Start">Start</a></li>
    <li><a href="Profil.php"class=<?PHP echo $act; ?> href="#Profil">Profil</a></li>
    <li><a href="Bestenliste"class="active" href="#Bestenliste">Bestenliste</a></li>
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



  <footer style="margin-top:39%">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
