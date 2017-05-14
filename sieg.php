<?PHP session_start(); ?>
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
	  
    td, th {
    padding: 5px;
    }

    dd,dt{
    padding: 5px;
    }
		
  </style>
  
  <body>
  
  <?PHP
  if(isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'])
	{
		include('header/headerLogout.html');

		if($_SESSION['verifiziert']==false)
		{
			include('header/headerVeri.html');
		}

	}
	else
	{
		include('header/headerLogin.php');
	}


	include("include/navigationbar.html");
	
	
	if(isset($_SESSION['zeit']))
	{
		echo $_SESSION['zeit'];
	}

  ?>
	  
  <table style="color:white; font-size:120% ">
    <tr>
      <td> Zeit </td>
      <td> Schwierigkeitsgrad </td>
      <td> gelöste Sudokus </td>
    </tr>
    <tr>
      <td> 1:50:22 </td>
      <td> Extrem </td>
      <td> 250 </td>
  </table>
  
  
  
  



  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
