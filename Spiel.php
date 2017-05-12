<!DOCTYPE html>
<html>
<head>
  <style>

    body{
      background-image: url("pictures/tafel.jpg");
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

	table{ 
	border-collapse: collapse; 
	font-family: Calibri, sans-serif; 
	}
	
	colgroup, tbody{ 
	border: solid medium; 
	}
	
	td{ 
	border: solid thin; 
	height: 2.0em; 
	width: 2.0em; 
	text-align: center; 
	padding: 0; 
	}


  </style>
<body>

 <script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->



<!-- Include der Navigationbar und des dazu gehörigen Styles -->
  
  <?PHP

	session_start();

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
		include_once('SudokuGenerator.php');
		
		
		
		if(isset($_GET['d']))
		{
			$diff=$_GET['d'];
			if($diff==1)
			{
				
				$sudoku = new SudokuGenerator();
				$sudoku->GenerateSudoku( SudokuGenerator::METRIC_EASY );
				
			}
			elseif($diff==2)
			{
				$sudoku = new SudokuGenerator();
				$sudoku->GenerateSudoku( SudokuGenerator::METRIC_MEDIUM );
				
			}
			elseif($diff==3)
			{
				$sudoku = new SudokuGenerator();
				$sudoku->GenerateSudoku( SudokuGenerator::METRIC_HARD );
				
			}
			elseif($diff==4)
			{
				$sudoku = new SudokuGenerator();
				$sudoku->GenerateSudoku( SudokuGenerator::METRIC_EXTREME );
				
			}
			else
			{
				$sudoku = new SudokuGenerator();
				$sudoku->GenerateSudoku( SudokuGenerator::METRIC_EASY );
				
			}
		}
		else
		{
			$sudoku = new SudokuGenerator();
			$sudoku->GenerateSudoku( SudokuGenerator::METRIC_EASY );
		}
		
		echo $sudoku->OutputString();
		
		
  ?>
  
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>

<table style="color:white" id='sudokuFeld'>
  <caption>Sudoku</caption>
  <colgroup ><col><col><col>
  <colgroup><col><col><col>
  <colgroup><col><col><col>
  <tbody >
   <tr> <div> </div> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
  <tbody>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
  <tbody>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
   <tr> <td> <td> <td> <td> <td> <td> <td> <td> <td>
</table>


<script>


var table = document.getElementById("sudokuFeld");
if (table != null) {
    for (var i = 0; i < table.rows.length; i++) {
        for (var j = 0; j < table.rows[i].cells.length; j++)
        table.rows[i].cells[j].onclick = function () 
		{
           tableText(this);
        };
    }
}


function tableText(tableCell) 
{
    
}



</script>





  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
