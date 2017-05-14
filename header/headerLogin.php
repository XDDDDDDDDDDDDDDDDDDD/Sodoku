<!DOCTYPE html>
<!-- Diese Datei dient dazu, um sich über die Felder im Header einloggen zu können -->
<html>
<head>
  <style>
  
    header{
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
	
	div.desc {
    padding: 15px;
    text-align: center;
    }
	
	article {

    }

   
  </style>
<body>
<!-- Abfrage ob die Logindaten korrekt sin. -->
<?PHP

	$nn='';
	$txt='';
	if(isset($_GET['n']))
	{
		$nn=$_GET['n'];
		$txt='Der Nutzername oder das Passwort war falsch!';
	}

?>
<!-- Ausgabe des Headers, in dem man sich einloggen kann, sich registrieren kann oder auch das Passwort zurücksetzen kann. -->
  <header>
  <label style="float:right;color: red;"><?PHP echo $txt;?></label><br>
    <form action="login.php" method="POST" style="float:right; margin-top:15px;">
      <label for="uname">Username</label>
      <input type="text" id="uname" name=uname value="<?php echo htmlspecialchars($nn); ?>">
      <label for="pw">Password</label>
      <input type="password" id="password" name=password>
      <button type="submit" name=login id=login> Login </button>
      <article style="display: block;">
        <a href="Registrieren.php" style="color: white " > Registrieren? </a>
      </article>
    </form>
    <div style="width: 1910px; border-bottom: 2px solid white;">
      <h1> Sudoku Online </h1>
    </div>
  </header>
  
</body>
</head>
</html>
