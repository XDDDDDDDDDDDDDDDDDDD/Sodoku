<!DOCTYPE html>
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
<?PHP

	$nn='';
	$txt='';
	if(isset($_GET['n']))
	{
		$nn=$_GET['n'];
		$txt='Der Nutzername oder das Passwort war falsch!';
	}

?>
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
        <a href="pwvergessen" style="color: white; margin-left:200px" > Passwort vergessen? </a>
      </article>
    </form>
    <div style="width: 1910px; border-bottom: 2px solid white;">
      <h1> Sudoku Online </h1>
    </div>
  </header>
  
</body>
</head>
</html>
