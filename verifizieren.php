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


.disabled {
	pointer-events:none; 
	opacity:0.6;         
}


	</style>
</head>
<body>

<?php
session_start();

include('header/headerLogout.html');





?>

<ul>
	<li><a href="Start.php" class="active" href="#Start">Start</a></li>
	<li><a href="Profil.php"class="active" href="#Profil">Profil</a></li>
	<li><a href="Bestenliste"class="active" href="#Bestenliste">Bestenliste</a></li>
	<li><a href="Tutorial.php" class="active" href="#Regeln">Regeln</a></li>
	<li><a href="Impressum.php" class="active" href="#Impressum">Impressum</a></li>
</ul>


<h2 style="color: white; margin-left:12%"> Code: <?php echo $_SESSION['verify']; ?> </h2>


<article style="float:left; margin-left: 20px;">
    <section class="container"style="color: white; font-size: 130%; margin-top: 10px">
      <form class="register"action="verifizieren2.php" method="POST">
        <table style="width:100%; text-align: left; font-size: 110%">
          <tr>
            <th> <label for="input" > Verifikationscode </label> </th>
            <td> <input type="text" id="input" name=input float:right> </td>
			<td> <button type="submit" style="margin-left: 50px" id='verify' name='verify'> Code verifizieren </button> </td>
          </tr>
        </table>
     </form>
    </section>
  </article>




	<footer style="position: absolute; bottom: 5px">
    Copyright &copy; Getschmann, Kracht, Kuessner </br>
    31789 Hameln Sudoku für Dummies GmbH </br>
    Email: Dummies.Hsw@google.com
  </footer>

</body>
</html>
