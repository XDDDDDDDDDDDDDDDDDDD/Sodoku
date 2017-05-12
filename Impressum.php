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


    .disabled {
      pointer-events:none; //This makes it not clickable
      opacity:0.6;         //This grays it out to look disabled
	}

  </style>
<body>

<!-- Die Abfrage überprüft ob ein Nutzer angemeldet ist. Ist dies der Fall so kann er auf der Navigationbar sein Profil aufrufen, andernfalls
       wird der Reiter "Profil" disabled. -->
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

<!-- Ausgabe der Betriebsinformationen -->
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

<!-- Ausgabe der Fußzeile, in der Unternehmensinformationen enthalten sind. -->
  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
