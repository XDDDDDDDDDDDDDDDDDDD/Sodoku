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

    table {
      margin:1em auto;
      color:white;
    }
    td {
      height:30px;
      width:30px;
      border:1px solid;
      text-align:center;
    }
    td:first-child {
      border-left:solid;
    }
    td:nth-child(3n) {
      border-right:solid ;
    }
    tr:first-child {
      border-top:solid;
    }
    tr:nth-child(3n) td {
      border-bottom:solid ;
    }

    input.field[type=text]{
      width: 15px;
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
        <a href="Registrieren.php" style="color: white " > Registrieren? </a>
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


  <table>
    <tr>
      <td> <input class="field" type="text" id="1.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="1.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="2.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="2.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="3.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="3.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="4.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="4.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="5.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="5.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="6.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="6.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="7.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="7.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="8.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="8.9" maxlength="1"> </td>
    </tr>
    <tr>
      <td> <input class="field" type="text" id="9.1" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.2" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.3" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.4" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.5" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.6" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.7" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.8" maxlength="1"> </td>
      <td> <input class="field" type="text" id="9.9" maxlength="1"> </td>
    </tr>
  </table>





  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
