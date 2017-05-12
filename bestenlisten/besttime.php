<!DOCTYPE html>

<!-- In dieser Datei wird die Seite erstellt, auf der die User mit den am schnellsten gelösten Sudokus ausgegeben werden. -->
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

  <h1 style="color:white; text-align: center"> Bestenliste Zeit </h1>

<!-- Im Folgenden werden in einzelnen Tabellen, für die jeweiligen Schwierigkeitsgrade (Leicht, Mittel, Schwer, Extrem) ausgegeben.
     Darin enthalten sind der Username und die Bestzeit. -->
  <div class="scroll" style="float:left; margin-left:7%; margin-top:60px">
    <h2> Leicht </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Username </th>
        <td> <?php echo $_SESSION['durchZeitLeicht']; ?> </td>
      </tr>
    </table>
  </div>

  <div class="scroll" style="float:left; margin-left:7%; margin-top:60px">
    <h2> Mittel </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Username </th>
        <td> <?php echo $_SESSION['durchZeitLeicht']; ?> </td>
      </tr>
    </table>
  </div>

  <div class="scroll" style="float:left; display:block; margin-left:7%; margin-top:60px">
    <h2> Schwer </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Username </th>
        <td> <?php echo $_SESSION['durchZeitLeicht']; ?> </td>
      </tr>
    </table>
  </div>

  <div class="scroll" style="float:left ; display:block; margin-left:7%; margin-top:60px">
    <h2> Extrem </h2>
    <table style="width:auto; text-align:left">
      <tr>
        <th> Username </th>
        <td> <?php echo $_SESSION['durchZeitLeicht']; ?> </td>
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