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


  <?PHP

	session_start();

	const EASY = 50;
	const MEDIUM = 37;
	const HARD = 25;
	const EXTREME = 17;



	if(isset($_POST['fertig']))
	{
		$feld=$_SESSION['sudoku'];
		$feldArray=str_split($feld);
		$userSet='';

		for($i=0;$i<=80;$i++)
		{
			if(!empty($_POST[$i]))
			{
				$userSet .=$_POST[$i];
			}
			else
			{
				$userSet .="0";
			}
		}

		$userField=str_split($userSet);

		if($userSet==$_SESSION['lösung'])   //SIEG
		{
			$post=microtime(true);
			$time=$post-$_SESSION['pre'];
			unset($_SESSION['pre']);
			$_SESSION['time']=intval($time);

			header('Location: sieg.php');

		}
		else   //Da war was falsch
		{
			$userSetFields=array_diff_assoc($userField, $feldArray);
			$setField=true;
		}


	}
	elseif(isset($_POST['neu']))
	{
		$help=$_SESSION['diff'];
		unset($_SESSION['sudoku']);
		unset($_SESSION['diff']);
		unset($_SESSION['lösung']);
		unset($_SESSION['pre']);
		header('Location: Spiel.php?d='.$help);

	}
	else
	{

		include('spielfeld.php');


		if(isset($_GET['d']))
		{
			$string="000000000";
			$array[0]=$reihe1=str_split($string);
			$array[1]=$reihe2=str_split($string);
			$array[2]=$reihe3=str_split($string);
			$array[3]=$reihe4=str_split($string);
			$array[4]=$reihe5=str_split($string);
			$array[5]=$reihe6=str_split($string);
			$array[6]=$reihe7=str_split($string);
			$array[7]=$reihe8=str_split($string);
			$array[8]=$reihe9=str_split($string);

			for($i=1;$i<9;$i++)
			{
				$x=rand(0,8);
				$y=rand(0,8);
				if($array[$y][$x]==0)
				{
					$array[$y][$x]=$i;
				}
				else
				{
					$i--;
				}
			}
			$puzzle="";

			for($c=0;$c<8;$c++)
			{
				for($r=0;$r<8;$r++)
				{
					$puzzle .= $array[$c][$r];
				}
			}


			$sudoku = new Sudoku();
			$lösung= $sudoku->solve($puzzle);
			$_SESSION['lösung']=$lösung;

			$verarbeiten=str_split($lösung);


			$diff=$_GET['d'];
			$_SESSION['diff']=$diff;
			if($diff==1)
			{
				for($z=80;$z>EASY;$z--)
				{
					do{
						$weg=rand(0,80);
					}
					while($verarbeiten[$weg]==0);
					$verarbeiten[$weg]=0;

				}

			}
			elseif($diff==2)
			{
				for($z=80;$z>MEDIUM;$z--)
				{
					do{
						$weg=rand(0,80);
					}
					while($verarbeiten[$weg]==0);
					$verarbeiten[$weg]=0;

				}

			}
			elseif($diff==3)
			{
				for($z=80;$z>HARD;$z--)
				{
					do{
						$weg=rand(0,80);
					}
					while($verarbeiten[$weg]==0);
					$verarbeiten[$weg]=0;

				}

			}
			elseif($diff==4)
			{
				for($z=80;$z>EXTREME;$z--)
				{
					do{
						$weg=rand(0,80);
					}
					while($verarbeiten[$weg]==0);
					$verarbeiten[$weg]=0;

				}

			}
			else
			{
				for($z=80;$z>EASY;$z--)
				{
					do{
						$weg=rand(0,80);
					}
					while($verarbeiten[$weg]==0);
					$verarbeiten[$weg]=0;

				}

			}
		}
		else
		{

		}

		$feld = implode($verarbeiten);

		$_SESSION['sudoku']=$feld;

	}

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

	$_SESSION['pre']=microtime(true);

  ?>

<div id="binny" style="margin-left:35%; margin-top:5%">
<form name="form" action="Spiel.php" method="POST">
<table class="rand">
<tbody><tr>
<td class="linie">
<table class="root-table">
<tbody><tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="0" name='0' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[0]!=0){echo 'value="'.$feld[0].'" style="color:green" readonly';} ?>></td>
<td><input id="1" name='1' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[1]!=0){echo 'value="'.$feld[1].'" style="color:green" readonly';} ?>></td>
<td><input id="2" name='2' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[2]!=0){echo 'value="'.$feld[2].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="9" name='9' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[9]!=0){echo 'value="'.$feld[9].'" style="color:green" readonly';} ?>></td>
<td><input id="10" name='10' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[10]!=0){echo 'value="'.$feld[10].'" style="color:green" readonly';} ?>></td>
<td><input id="11" name='11' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[11]!=0){echo 'value="'.$feld[11].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="18" name='18' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[18]!=0){echo 'value="'.$feld[18].'" style="color:green" readonly';} ?>></td>
<td><input id="19" name='19' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[19]!=0){echo 'value="'.$feld[19].'" style="color:green" readonly';} ?>></td>
<td><input id="20" name='20' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[20]!=0){echo 'value="'.$feld[20].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="3" name='3' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[3]!=0){echo 'value="'.$feld[3].'" style="color:green" readonly';} ?>></td>
<td><input id="4" name='4' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[4]!=0){echo 'value="'.$feld[4].'" style="color:green" readonly';} ?>></td>
<td><input id="5" name='5' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[5]!=0){echo 'value="'.$feld[5].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="12" name='12' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[12]!=0){echo 'value="'.$feld[12].'" style="color:green" readonly';} ?>></td>
<td><input id="13" name='13' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[13]!=0){echo 'value="'.$feld[13].'" style="color:green" readonly';} ?>></td>
<td><input id="14" name='14' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[14]!=0){echo 'value="'.$feld[14].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="21" name='21' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[21]!=0){echo 'value="'.$feld[21].'" style="color:green" readonly';} ?>></td>
<td><input id="22" name='22' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[22]!=0){echo 'value="'.$feld[22].'" style="color:green" readonly';} ?>></td>
<td><input id="23" name='23' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[23]!=0){echo 'value="'.$feld[23].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="6" name='6' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[6]!=0){echo 'value="'.$feld[6].'" style="color:green" readonly';} ?>></td>
<td><input id="7" name='7' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[7]!=0){echo 'value="'.$feld[7].'" style="color:green" readonly';} ?>></td>
<td><input id="8" name='8' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[8]!=0){echo 'value="'.$feld[8].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="15" name='15' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[15]!=0){echo 'value="'.$feld[15].'" style="color:green" readonly';} ?>></td>
<td><input id="16" name='16' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[16]!=0){echo 'value="'.$feld[16].'" style="color:green" readonly';} ?>></td>
<td><input id="17" name='17' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[17]!=0){echo 'value="'.$feld[17].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="24" name='24' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[24]!=0){echo 'value="'.$feld[24].'" style="color:green" readonly';} ?>></td>
<td><input id="25" name='25' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[25]!=0){echo 'value="'.$feld[25].'" style="color:green" readonly';} ?>></td>
<td><input id="26" name='26' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[26]!=0){echo 'value="'.$feld[26].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="27" name='27' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[27]!=0){echo 'value="'.$feld[27].'" style="color:green" readonly';} ?>></td>
<td><input id="28" name='28' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[28]!=0){echo 'value="'.$feld[28].'" style="color:green" readonly';} ?>></td>
<td><input id="29" name='29' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[29]!=0){echo 'value="'.$feld[29].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="36" name='36' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[36]!=0){echo 'value="'.$feld[36].'" style="color:green" readonly';} ?>></td>
<td><input id="37" name='37' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[37]!=0){echo 'value="'.$feld[37].'" style="color:green" readonly';} ?>></td>
<td><input id="38" name='38' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[38]!=0){echo 'value="'.$feld[38].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="45" name='45' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[45]!=0){echo 'value="'.$feld[45].'" style="color:green" readonly';} ?>></td>
<td><input id="46" name='46' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[46]!=0){echo 'value="'.$feld[46].'" style="color:green" readonly';} ?>></td>
<td><input id="47" name='47' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[47]!=0){echo 'value="'.$feld[47].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="30" name='30' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[30]!=0){echo 'value="'.$feld[30].'" style="color:green" readonly';} ?>></td>
<td><input id="31" name='31' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[31]!=0){echo 'value="'.$feld[31].'" style="color:green" readonly';} ?>></td>
<td><input id="32" name='32' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[32]!=0){echo 'value="'.$feld[32].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="39" name='39' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[39]!=0){echo 'value="'.$feld[39].'" style="color:green" readonly';} ?>></td>
<td><input id="40" name='40' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[40]!=0){echo 'value="'.$feld[40].'" style="color:green" readonly';} ?>></td>
<td><input id="41" name='41' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[41]!=0){echo 'value="'.$feld[41].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="48" name='48' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[48]!=0){echo 'value="'.$feld[48].'" style="color:green" readonly';} ?>></td>
<td><input id="49" name='49' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[49]!=0){echo 'value="'.$feld[49].'" style="color:green" readonly';} ?>></td>
<td><input id="50" name='50' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[50]!=0){echo 'value="'.$feld[50].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="33" name='33' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[33]!=0){echo 'value="'.$feld[33].'" style="color:green" readonly';} ?>></td>
<td><input id="34" name='34' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[34]!=0){echo 'value="'.$feld[34].'" style="color:green" readonly';} ?>></td>
<td><input id="35" name='35' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[35]!=0){echo 'value="'.$feld[35].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="42" name='42' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[42]!=0){echo 'value="'.$feld[42].'" style="color:green" readonly';} ?>></td>
<td><input id="43" name='43' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[43]!=0){echo 'value="'.$feld[43].'" style="color:green" readonly';} ?>></td>
<td><input id="44" name='44' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[44]!=0){echo 'value="'.$feld[44].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="51" name='51' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[51]!=0){echo 'value="'.$feld[51].'" style="color:green" readonly';} ?>></td>
<td><input id="52" name='52' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[52]!=0){echo 'value="'.$feld[52].'" style="color:green" readonly';} ?>></td>
<td><input id="53" name='53' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[53]!=0){echo 'value="'.$feld[53].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="54" name='54' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[54]!=0){echo 'value="'.$feld[54].'" style="color:green" readonly';} ?>></td>
<td><input id="55" name='55' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[55]!=0){echo 'value="'.$feld[55].'" style="color:green" readonly';} ?>></td>
<td><input id="56" name='56' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[56]!=0){echo 'value="'.$feld[56].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="63" name='63' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[63]!=0){echo 'value="'.$feld[63].'" style="color:green" readonly';} ?>></td>
<td><input id="64" name='64' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[64]!=0){echo 'value="'.$feld[64].'" style="color:green" readonly';} ?>></td>
<td><input id="65" name='65' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[65]!=0){echo 'value="'.$feld[65].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="72" name='72' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[72]!=0){echo 'value="'.$feld[72].'" style="color:green" readonly';} ?>></td>
<td><input id="73" name='73' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[73]!=0){echo 'value="'.$feld[73].'" style="color:green" readonly';} ?>></td>
<td><input id="74" name='74' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[74]!=0){echo 'value="'.$feld[74].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="57" name='57' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[57]!=0){echo 'value="'.$feld[57].'" style="color:green" readonly';} ?>></td>
<td><input id="58" name='58' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[58]!=0){echo 'value="'.$feld[58].'" style="color:green" readonly';} ?>></td>
<td><input id="59" name='59' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[59]!=0){echo 'value="'.$feld[59].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="66" name='66' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[66]!=0){echo 'value="'.$feld[66].'" style="color:green" readonly';} ?>></td>
<td><input id="67" name='67' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[67]!=0){echo 'value="'.$feld[67].'" style="color:green" readonly';} ?>></td>
<td><input id="68" name='68' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[68]!=0){echo 'value="'.$feld[68].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="75" name='75' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[75]!=0){echo 'value="'.$feld[75].'" style="color:green" readonly';} ?>></td>
<td><input id="76" name='76' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[76]!=0){echo 'value="'.$feld[76].'" style="color:green" readonly';} ?>></td>
<td><input id="77" name='77' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[77]!=0){echo 'value="'.$feld[77].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
<td class="linie">
<table class="box-table">
<tbody><tr>
<td><input id="60" name='60' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[60]!=0){echo 'value="'.$feld[60].'" style="color:green" readonly';} ?>></td>
<td><input id="61" name='61' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[61]!=0){echo 'value="'.$feld[61].'" style="color:green" readonly';} ?>></td>
<td><input id="62" name='62' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[62]!=0){echo 'value="'.$feld[62].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="69" name='69' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[69]!=0){echo 'value="'.$feld[69].'" style="color:green" readonly';} ?>></td>
<td><input id="70" name='70' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[70]!=0){echo 'value="'.$feld[70].'" style="color:green" readonly';} ?>></td>
<td><input id="71" name='71' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[71]!=0){echo 'value="'.$feld[71].'" style="color:green" readonly';} ?>></td>
</tr>
<tr>
<td><input id="78" name='78' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[78]!=0){echo 'value="'.$feld[78].'" style="color:green" readonly';} ?>></td>
<td><input id="79" name='79' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[79]!=0){echo 'value="'.$feld[79].'" style="color:green" readonly';} ?>></td>
<td><input id="80" name='80' class="cell" size="1" type="text" pattern="[1-9]" maxlength="1" <?PHP if($feld[80]!=0){echo 'value="'.$feld[80].'" style="color:green" readonly';} ?>></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<tr>
<td> <button type="submit" name='fertig' id="fertig">Fertig!</button> <button type="submit" name='neu' id="neu">Neu Generieren</button></td>
</tr>
</td>
</tr>
</tbody>
</table>
</form>
</div>





<?PHP  //setzt die vom User eingegebenen Zahlen wieder in das Feld (mit Javascript), wenn der User auf "Fertig" geklickt hat, aber die Lösung Fehler enthielt.

if($setField)
{
	foreach($userSetFields as $key=>$value)
	{
		echo '<script type="text/javascript">';
		echo 'document.getElementById("'.$key.'").value = "'.$value.'";';
		echo '</script>';

	}

	echo '<td><font color="red">Das war nicht korrekt...versucht nochmal :)</font></td>';

}

?>








  <footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</head>
</html>
