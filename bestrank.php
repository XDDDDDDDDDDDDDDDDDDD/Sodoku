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
    border-right: 1px solid white;
    border-bottom:  1px solid white;
    }

    div.scroll{
      color:white;
      overflow: scroll;
      width: 300px;
      height: 600px;
    }
	
	.disabled {
    pointer-events:none; 
    opacity:0.6;         
	}

  </style>
<body>

<?PHP

	session_start();

 require_once('include/dbconfig.php');

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


	include("navigationbar.html");
	
  ?>

  <h1 style="color:white; text-align: center"> Bestenlisten ELO und Rang (WIP)</h1>



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




  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
