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

	table {
	background-color: #fff;
	}

#binny .box-table {
	border: 0 solid #fff;
	border-spacing: 0;
	}

#binny td, .rand {
	border: 1px solid black;
	}

#binny table {
	border: 0 solid white;
	background-color: #fff;
	}

#binny .linie {
	border: 0 solid white;
	background-color: #fff;
	}

#binny .cell {
	
	background-color: #fff;
	font: 2em bold;
	width: 1.3em;
	border: 0 solid #fff;
	vertical-align: middle;
	text-align: center;
	}

#binny .dl {
	line-height: 1.5em;
	font-weight: bold;
	}

#binny .dl a {
	text-decoration: none;
	}

#binny .dl a:hover {
	text-decoration: underline;
	}

#binny .line-v {
	background-color: #ff6600;
	}

#binny .line-h {
	background-color: #006633;
	}


#binny .control-button {
	width: 10em;
	margin: 5px 0;
	}

#binny hr {
	padding: 0;
	margin: 0;
	line-height: 2px;
	}

#binny ul {
	margin: -1em 0;
	
	}

#binny li {
	margin-left: 1em;
	}

#binny .jshw {
	color: red;
	font-weight: bold;
	}


  </style>
<body>

 <script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 


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
			
		}
		
		$feld = str_split($sudoku->OutputString());
		
		
		
		
		
  ?>
  
<div id="binny">
<form name="form" action="Spiel.php" method="POST">

<table class="rand">
<tbody><tr>
<td class="linie">
<table class="root-table">
<tbody><tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c11" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[0]!=0){echo 'value="'.$feld[0].'" style="color:green" readonly';} ?>></td>
<td><input id="c12" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[1]!=0){echo 'value="'.$feld[1].'" style="color:green" readonly';} ?>></td>
<td><input id="c13" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[2]!=0){echo 'value="'.$feld[2].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c14" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[9]!=0){echo 'value="'.$feld[9].'" style="color:green" readonly';} ?>></td>
<td><input id="c15" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[10]!=0){echo 'value="'.$feld[10].'" style="color:green" readonly';} ?>></td>
<td><input id="c16" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[11]!=0){echo 'value="'.$feld[11].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c17" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[18]!=0){echo 'value="'.$feld[18].'" style="color:green" readonly';} ?>></td>
<td><input id="c18" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[19]!=0){echo 'value="'.$feld[19].'" style="color:green" readonly';} ?>></td>
<td><input id="c19" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[20]!=0){echo 'value="'.$feld[20].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c21" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[3]!=0){echo 'value="'.$feld[3].'" style="color:green" readonly';} ?>></td>
<td><input id="c22" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[4]!=0){echo 'value="'.$feld[4].'" style="color:green" readonly';} ?>></td>
<td><input id="c23" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[5]!=0){echo 'value="'.$feld[5].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c24" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[12]!=0){echo 'value="'.$feld[12].'" style="color:green" readonly';} ?>></td>
<td><input id="c25" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[13]!=0){echo 'value="'.$feld[13].'" style="color:green" readonly';} ?>></td>
<td><input id="c26" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[14]!=0){echo 'value="'.$feld[14].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c27" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[21]!=0){echo 'value="'.$feld[21].'" style="color:green" readonly';} ?>></td>
<td><input id="c28" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[22]!=0){echo 'value="'.$feld[22].'" style="color:green" readonly';} ?>></td>
<td><input id="c29" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[23]!=0){echo 'value="'.$feld[23].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c31" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[6]!=0){echo 'value="'.$feld[6].'" style="color:green" readonly';} ?>></td>
<td><input id="c32" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[7]!=0){echo 'value="'.$feld[7].'" style="color:green" readonly';} ?>></td>
<td><input id="c33" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[8]!=0){echo 'value="'.$feld[8].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c34" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[15]!=0){echo 'value="'.$feld[15].'" style="color:green" readonly';} ?>></td>
<td><input id="c35" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[16]!=0){echo 'value="'.$feld[16].'" style="color:green" readonly';} ?>></td>
<td><input id="c36" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[17]!=0){echo 'value="'.$feld[17].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c37" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[24]!=0){echo 'value="'.$feld[24].'" style="color:green" readonly';} ?>></td>
<td><input id="c38" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[25]!=0){echo 'value="'.$feld[25].'" style="color:green" readonly';} ?>></td>
<td><input id="c39" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[26]!=0){echo 'value="'.$feld[26].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c41" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[27]!=0){echo 'value="'.$feld[27].'" style="color:green" readonly';} ?>></td>
<td><input id="c42" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[28]!=0){echo 'value="'.$feld[28].'" style="color:green" readonly';} ?>></td>
<td><input id="c43" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[29]!=0){echo 'value="'.$feld[29].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c44" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[36]!=0){echo 'value="'.$feld[36].'" style="color:green" readonly';} ?>></td>
<td><input id="c45" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[37]!=0){echo 'value="'.$feld[37].'" style="color:green" readonly';} ?>></td>
<td><input id="c46" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[38]!=0){echo 'value="'.$feld[38].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c47" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[45]!=0){echo 'value="'.$feld[45].'" style="color:green" readonly';} ?>></td>
<td><input id="c48" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[46]!=0){echo 'value="'.$feld[46].'" style="color:green" readonly';} ?>></td>
<td><input id="c49" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[47]!=0){echo 'value="'.$feld[47].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c51" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[30]!=0){echo 'value="'.$feld[30].'" style="color:green" readonly';} ?>></td>
<td><input id="c52" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[31]!=0){echo 'value="'.$feld[31].'" style="color:green" readonly';} ?>></td>
<td><input id="c53" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[32]!=0){echo 'value="'.$feld[32].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c54" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[39]!=0){echo 'value="'.$feld[39].'" style="color:green" readonly';} ?>></td>
<td><input id="c55" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[40]!=0){echo 'value="'.$feld[40].'" style="color:green" readonly';} ?>></td>
<td><input id="c56" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[41]!=0){echo 'value="'.$feld[41].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c57" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[48]!=0){echo 'value="'.$feld[48].'" style="color:green" readonly';} ?>></td>
<td><input id="c58" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[49]!=0){echo 'value="'.$feld[49].'" style="color:green" readonly';} ?>></td>
<td><input id="c59" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[50]!=0){echo 'value="'.$feld[50].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c61" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[33]!=0){echo 'value="'.$feld[33].'" style="color:green" readonly';} ?>></td>
<td><input id="c62" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[34]!=0){echo 'value="'.$feld[34].'" style="color:green" readonly';} ?>></td>
<td><input id="c63" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[35]!=0){echo 'value="'.$feld[35].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c64" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[42]!=0){echo 'value="'.$feld[42].'" style="color:green" readonly';} ?>></td>
<td><input id="c65" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[43]!=0){echo 'value="'.$feld[43].'" style="color:green" readonly';} ?>></td>
<td><input id="c66" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[44]!=0){echo 'value="'.$feld[44].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c67" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[51]!=0){echo 'value="'.$feld[51].'" style="color:green" readonly';} ?>></td>
<td><input id="c68" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[52]!=0){echo 'value="'.$feld[52].'" style="color:green" readonly';} ?>></td>
<td><input id="c69" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[53]!=0){echo 'value="'.$feld[53].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c71" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[54]!=0){echo 'value="'.$feld[54].'" style="color:green" readonly';} ?>></td>
<td><input id="c72" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[55]!=0){echo 'value="'.$feld[55].'" style="color:green" readonly';} ?>></td>
<td><input id="c73" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[56]!=0){echo 'value="'.$feld[56].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c74" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[63]!=0){echo 'value="'.$feld[63].'" style="color:green" readonly';} ?>></td>
<td><input id="c75" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[64]!=0){echo 'value="'.$feld[64].'" style="color:green" readonly';} ?>></td>
<td><input id="c76" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[65]!=0){echo 'value="'.$feld[65].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c77" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[72]!=0){echo 'value="'.$feld[72].'" style="color:green" readonly';} ?>></td>
<td><input id="c78" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[73]!=0){echo 'value="'.$feld[73].'" style="color:green" readonly';} ?>></td>
<td><input id="c79" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[74]!=0){echo 'value="'.$feld[74].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c81" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[57]!=0){echo 'value="'.$feld[57].'" style="color:green" readonly';} ?>></td>
<td><input id="c82" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[58]!=0){echo 'value="'.$feld[58].'" style="color:green" readonly';} ?>></td>
<td><input id="c83" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[59]!=0){echo 'value="'.$feld[59].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c84" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[66]!=0){echo 'value="'.$feld[66].'" style="color:green" readonly';} ?>></td>
<td><input id="c85" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[67]!=0){echo 'value="'.$feld[67].'" style="color:green" readonly';} ?>></td>
<td><input id="c86" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[68]!=0){echo 'value="'.$feld[68].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c87" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[75]!=0){echo 'value="'.$feld[75].'" style="color:green" readonly';} ?>></td>
<td><input id="c88" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[76]!=0){echo 'value="'.$feld[76].'" style="color:green" readonly';} ?>></td>
<td><input id="c89" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[77]!=0){echo 'value="'.$feld[77].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="c91" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[60]!=0){echo 'value="'.$feld[60].'" style="color:green" readonly';} ?>></td>
<td><input id="c92" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[61]!=0){echo 'value="'.$feld[61].'" style="color:green" readonly';} ?>></td>
<td><input id="c93" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[62]!=0){echo 'value="'.$feld[62].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c94" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[69]!=0){echo 'value="'.$feld[69].'" style="color:green" readonly';} ?>></td>
<td><input id="c95" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[70]!=0){echo 'value="'.$feld[70].'" style="color:green" readonly';} ?>></td>
<td><input id="c96" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[71]!=0){echo 'value="'.$feld[71].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="c97" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[78]!=0){echo 'value="'.$feld[78].'" style="color:green" readonly';} ?>></td>
<td><input id="c98" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[79]!=0){echo 'value="'.$feld[79].'" style="color:green" readonly';} ?>></td>
<td><input id="c99" class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[80]!=0){echo 'value="'.$feld[80].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<tr>
<td> <button type="submit" name='fertig' id="fertig">Fertig!</button> 
<button type="reset" name='neu' id="neu">Neu Generieren</button> </td>
</tr>
</td>








  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
