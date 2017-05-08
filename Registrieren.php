<!DOCTYPE html>
<html>
  <style>

    body{
      background-image: url("http://www.commacross.de/www/wp-content/uploads/2015/05/Tafel.jpg");
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
    }

    dd,dt{
    padding: 5px;
    }

    input[type=text]{
      width: auto;
    }

    form.register
	{
	padding: 8px 5px;
	font-size: 24px;
	border: 1px solid rgb(28, 108, 122);
	margin-bottom: 10px;
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
	border-radius: 3px;
	box-shadow:
		0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
		0px 0px 0px 3px rgb(254, 254, 254),
		0px 5px 3px 3px rgb(210, 210, 210);
	transition: all 0.2s linear;
    }
  </style>
  
<head>
</head>
<body>

<?php

require_once('dbconfig.php');
require_once('passwords.php');

if(isset($_POST['register'])) 
{

 $error = false;
 
 $nname= trim($_POST['uname']);
 $name= trim($_POST['name']);
 $email = trim($_POST['mail']);
 $password = $_POST['password'];
 $password2 = $_POST['password_confirm'];
 $gender;
 
 if(isset($_POST['genderm']))
 {
	 $gender=2;
 }
 elseif(isset($_POST['genderw']))
 {
	 $gender=3;
 }
 else
 {
	 $gender=1;
 }
 
 
 

 
 
 
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	}
		
	//Überprüft, ob die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) 
	{ 
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE Mail = :email");
		$result = $statement->execute(array(':email' => $email));
		$mail = $statement->fetch();
 
		if($mail !== false) 
		{
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		} 
	
	} 
	
	if(strlen($name) < 2)
	{
		echo 'Bitte geben sie einen Anzeigenamen an<br>';
		$error=true;
	}
		
	//Überprüft, ob der Anzeigename schon vorhanden ist
	if(!$error) 
	{ 
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE EchterName = :nname");
		$result = $statement->execute(array(':nname' => $nname));
		$user = $statement->fetch();
 
		if($user !== false) 
		{
			echo 'Dieser Nutzername ist bereits vergeben.<br>';
			$error = true;
		}
	}
	
	
	if(strlen($nname) < 3)
	{
		echo 'Bitte geben sie einen Nutzernamen an<br>';
		$error=true;
	}

		
	//Überprüft, ob der Nutzername schon vorhanden ist
	if(!$error) 
	{ 
		
		$statement = $pdo->prepare("SELECT * FROM nutzer WHERE Nutzername = :nname");
		$result = $statement->execute(array('nname' => $nname));
		$user = $statement->fetch();
 
		if($user !== false) 
		{
			echo 'Dieser Nutzername ist bereits vergeben.<br>';
			$error = true;
		}
	}
	
	
	if(strlen($password) <= 6) 
	{
		echo 'Bitte ein Passwort mit einer Mindestlänge von 6 Zeichen angeben<br>';
		$error = true;
	}
 
	if($password != $password2) 
	{
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}

	
	
	
 
	//Keine Fehler, Nutzer wird registriert
	if(!$error) 
	{ 
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		
		$statement = $pdo->prepare("SELECT * FROM nutzer");
		$result = $statement->execute();
		$user = $statement->fetch();
		
		
		
		try
		{
 
		$statement = $pdo->prepare("INSERT INTO nutzer (Nutzername, NutzerPW, EchterName, Mail, Geschlecht) VALUES (:nname, :password, :name, :email, :gender);");
		$statement->bindParam(':email', $email);
		$statement->bindParam(':password', $password_hash);
		$statement->bindParam(':nname', $nname);
		$statement->bindParam(':name', $name);
		$statement->bindParam(':gender', $gender);
		
		
		$statement->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
 
		echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
		
		
	} 
	elseif(isset($_POST['login']))
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
			die('Login erfolgreich. Weiter zum <a href="Start.php">internen Bereich</a>');
		}
	
		else 
		{
			echo "Nutzername oder Passwort war ungültig<br>";
		}
	}
	
}

?>
  
 <header>
    <form action="Start.php" method="POST" style="float:right; margin-top:15px;">
      <label for="uname">Username</label>
      <input type="text" id="uname" name=uname >
      <label for="pw">Password</label>
      <input type="password" id="password" name=password>
      <button type="submit"> Login </button>
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

  <h3 style="color:white; font-size: 150%"> <ins> Registrieren </ins> </h3>

  <article style="float:left; margin-left: 10px">
    <section class="container"style="color: white; font-size: 130%">
      <form class="register"action="registrieren.php" method="POST">
        <table style="width:100%; text-align: left; font-size: 110%">
          <tr>
            <th> <label for="uname" >Username</label> </th>
            <td> <input type="text" id="uname" name=uname float:right> </td>
          </tr>
          <tr>
            <th> <label for="name" >Name   </label> </th>
            <td> <input type="text" id="name" name=name> </td>
          </tr>
          <tr>
            <th> Geschlecht </th>
            <td> <input type="radio" name="genderm" id='genderm' value="männlich"> männlich
                 <input type="radio" name="genderw" id='genderw' value="weiblich"> weiblich</td>
          </tr>
          <tr>
            <th> <label for="name" >Mail-Adresse </label> </th>
            <td> <input type="text" id="mail" name=mail> </td>
          </tr>
          <tr>
            <th> <label for="password" >Passwort </label> </th>
            <td> <input type="text" id="password" name=password> </td>
          </tr>
          <tr>
            <th> <label for="password_confirm" >Passwort wiederholen </label> </th>
            <td> <input type="text" id="password_confirm" name=password_confirm> </td>
          </tr>
        </table>
        <button type="submit" style="margin-left: 200px" id='register' name='register'> Registrieren </button>
     </form>
    </section>
  </article>
  
  


  <footer style="margin-top:36%">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</html>