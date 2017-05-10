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

  <header>
    <form action="logout.php" method="POST" style=" float: right; margin-top:5px; margin-right:20px">
      <button type="submit" name=logout id=logout> Logout </button>
    </form>
    <div style="width: 1900px; border-bottom: 2px solid white;">
      <h1> Sudoku Online </h1>
      <p  style="text-align: right; margin-top:-55px; margin-right:75px; font-size:120%"> Hallo <?php echo $_SESSION['name']; ?> !</p>
    </div>
  </header>

  <ul>
    <li><a href="Start.php" class="active" href="#Start">Start</a></li>
    <li><a href="Profil.php"class="active" href="#Profil">Profil</a></li>
    <li><a href="Bestenliste"class="active" href="#Bestenliste">Bestenliste</a></li>
    <li><a href="Tutorial.php" class="active" href="#Regeln">Regeln</a></li>
    <li><a href="Impressum.php" class="active" href="#Impressum">Impressum</a></li>
  </ul>

  <h1 style="color:white; text-align: center"> Bestenliste Gelöste Spiele </h1>



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



  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
