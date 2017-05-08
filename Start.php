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

    article {

    }





  </style>
<body>

<?PHP
	
	session_start();

	
	require_once('dbconfig.php');
	require_once('passwords.php');
	
	if(isset($_POST['login']))
	{
		$nutzername = $_POST['uname'];
		$password = $_POST['password'];
 
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE Nutzername = :nname");
		$result = $statement->execute(array('nname' => $nutzername));
		$user = $statement->fetch();
 
		//Überprüfung des Passworts
		if ($user !== false && password_verify($password, $user['NutzerPW'])) 
		{
			$_SESSION['userid'] = $user['NutzerID'];
			$_SESSION['nutzername']=utf8_encode($user['Nutzername']);
			$_SESSION['name']=utf8_encode($user['EchterName']);
			$_SESSION['geschlecht']=utf8_encode($user['Geschlecht']);
			$_SESSION['email']=utf8_encode($user['Mail']);
			$_SESSION['status']=utf8_encode($user['Status']);
			$_SESSION['datum']=$user['RegistriertSeit'];
			die('Login erfolgreich. Weiter zu <a href="Profil.php">internen Bereich</a>');
		}
	
		else 
		{
			echo "Nutzername oder Passwort war ungültig<br>";
		}
	}
  
?> 


  <header>
    <form action="Start.php" method="POST" style="float:right; margin-top:15px;">
      <label for="uname">Username</label>
      <input type="text" id="uname" name=uname >
      <label for="pw">Password</label>
      <input type="password" id="password" name=password>
      <button type="submit" name=login id=login> Login </button>
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
    <li><a href="Regeln" class="active" href="#Regeln">Regeln</a></li>
    <li><a href="Impressum" class="active" href="#Impressum">Impressum</a></li>
  </ul>

  <article style="float:left; margin-left:30%; margin-top:60px">
    <div class="difficulty">
      <a target="_blank" href="Leicht">
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRsOUswpN22OQbjuhfnP-SZb4-B4zam9kVu1Al1T5QDie4ItXTH" alt="Trolltunga Norway" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Leicht</div>
    </div>
  </article>

  <article style="float:right; margin-right:30%; margin-top:60px">
    <div class="difficulty">
      <a target="_blank" href="Mittel">
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRsOUswpN22OQbjuhfnP-SZb4-B4zam9kVu1Al1T5QDie4ItXTH" alt="Forest" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Mittel</div>
    </div>
  </article>

  <article style="float:left; display:block; margin-left:30%; margin-top:20px">
    <div class="difficulty">
      <a target="_blank" href="Schwer">
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRsOUswpN22OQbjuhfnP-SZb4-B4zam9kVu1Al1T5QDie4ItXTH" alt="Northern Lights" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Schwer</div>
    </div>
  </article>

  <article style="float:right; display:block; margin-right:30%; margin-top:20px">
    <div class="difficulty">
      <a target="_blank" href="Extrem">
        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRsOUswpN22OQbjuhfnP-SZb4-B4zam9kVu1Al1T5QDie4ItXTH" alt="Mountains" width="400" height="400">
      </a>
      <div class="desc" style="color:white">Extrem</div>
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
