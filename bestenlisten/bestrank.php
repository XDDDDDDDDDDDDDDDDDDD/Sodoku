<!DOCTYPE html>

<!-- In dieser Datei wird die Seite erzeugt, den ELO des Spielers anzeigt. -->
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
    border-right: 1px solid white;
    border-bottom:  1px solid white;
    }

    div.scroll{
      color:white;
      overflow: scroll;
      width: 300px;
      height: 600px;
    }

  </style>
<body>

<?PHP

	session_start();
	
?>

<!-- In dem Header wird der Name der Seite angezeigt und die Möglichkeit geboten sich auszuloggen. -->
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

  <h1 style="color:white; text-align: center"> Bestenlisten ELO und Rang </h1>

<!-- Ausgabe des Usernames, dem dazugehörigen ELO, sowie dem Rang des Spielers, in einer Tabelle. -->
  <div class="scroll" style="float:left; margin-left:40%; margin-top:60px">
    <h2> ELO </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Username </th>
        <td> ELO </td>
        <td> Rang   </td>
      </tr>
    </table>
  </div>

<!-- Ausgabe der Fußzeile, in der Unternehmensinformationen enthalten sind. -->
  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
