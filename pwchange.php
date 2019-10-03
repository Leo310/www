<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
 
 $error = "";
 $pwchanged = "";
 if (isset($_SESSION['error'])) $error = $_SESSION['error'];
 if (isset($_SESSION['pwchanged'])) $error = $_SESSION['pwchanged'];
 
?>
<body class="body" background="images/bild3.jpg">

<!-- always used menu -->
<button style="float:right; margin-top:7px; margin-right:10px" class="abmeldebutton" onClick="window.location.href='scr_logout.php'">abmelden »</button>

<h1 style="float:right; margin-top:11px; margin-right:2%" class="userloggedin"><?php echo $_SESSION['user'];?></h2>
<h1 style="float:right; margin-top:11px; margin-right:3%" class="userloggedin">|</h2>


<button style="float:right; margin-top:5px; margin-right:2%" class="menubutton" onClick="window.location.href='scr_deleteuser.php'">account löschen</button>
<button style="float:right; margin-top:5px; margin-right:2%px" class="menubutton" onClick="window.location.href='pwchange.php'">passwort ändern</button>

<!-- end of always used menu ----------------------------------------------- -->




<center><div class="formularcontainer">
	<h1 style="margin-top: 10%;" class="frontheadline">passwort ändern</h1>
		<table style="margin-top: 5%;">

			<form action='scr_pwchange.php' method='post'>
				<tr>
					<td>
						<input class="inputRahmen" type='password' name='oldpw' id='altespw' placeholder="altes kennwort" required>
					</td>
				</tr>
				<tr>	
					<td>
						<input class="inputRahmen" type='password' name='newpw' id='neuespw' placeholder="neues kennwort" required>
					</td>
				</tr>
				<tr>
					<td>
						<input class="inputRahmen" type='password' name='bnewpw' id='bneuespw' placeholder="neues kennwort bestätigen" required>
					</td>
				</tr>		
		</table>
		<table>
	</div>
<div style='margin-left:auto; margin-right:auto; margin-top:5%; min-width:200px; width:100%;'>
				<tr>	
					<td>
						<center><input type='submit' value='änderungen speichern' class="button"></center>
					</td>
				</tr>
			</form>
				<tr>
					<td>
						<p style="margin-top: 40px;"></p>
						<?php 
							  if ($error) {
								  echo "<p class='text'>$error</p>"; 
								  unset($_SESSION['error']);
							  }

							  if ($pwchanged) {
								  echo "<p class='text'>$pwchanged</hp>"; 
								  unset($_SESSION['pwchanged']);
							  }
						?>
					</td>
				</tr>
			</table>
</div>

</body>
</html>
