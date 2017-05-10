<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();

	
	$verify = rand(00001,99999);
	
	/* Die Funktion kann nicht realisiert werden, da wir keinen mailserver haben.
	
	$to      = $_SESSION['email'];  //An wen
	$subject = 'Verifikation';      //Titel
	$message = '                    
 
	Vielen Dank für die Erstellung deines Accounts!
	
	Um deine E-Mail Adresse zu verifizieren, musst du nur den folgenden Code 
	
	' . $verify . '	
	
	in dem Feld auf der Website eingeben und den "Bestätigen"- Button drücken.
	
	
	Wir wünschen dir viel Spass eim Rätseln!
	
	-Dein Sudoku-Team
	'; // Nachricht
                     
	$headers = 'From: postmaster@localhost' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Senden
	
	*/
	
	$sek=1;
	
	if(isset($_POST['verify'])) 
	{
		if(isset($_POST['input']))
		{
			if($_POST['input']==$verify)
			{
				
			}
			else
			{
				if($sek>3)
				{
					
				}
				else
				{
					echo "Der Sicherheitscode ist nicht korrekt!<br>";
					echo "Das war Versucht " . $sek . " von 3.";
					$sek++;
				}
					
			}
			
		}
		else
		{
			echo "Bitte den Code eingeben!";
		}
		
	}
	
	
?>


<article style="float:left; margin-left: 20px">
    <section class="container"style="color: black; font-size: 130%">
      <form class="register"action="verifizieren.php" method="POST">
        <table style="width:100%; text-align: left; font-size: 110%">
          <tr>
            <th> <label for="input" > Verifikationscode </label> </th>
            <td> <input type="text" id="input" name=input float:right> </td>
			<td> <button type="submit" style="margin-left: 50px" id='verify' name='verify'> Code verifizieren </button> </td>
          </tr>
        </table>
		 <br><button type="submit" style="margin-left: 50px" id='neueEmail' name='neueEmail'> E-Mail erneut senden </button>
     </form>
    </section>
  </article>


</body>
</html>