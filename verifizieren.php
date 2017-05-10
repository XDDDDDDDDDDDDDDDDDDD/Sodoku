<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();

	
	echo $_SESSION['verify'];
	
	
?>


<article style="float:left; margin-left: 20px">
    <section class="container"style="color: black; font-size: 130%">
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


</body>
</html>