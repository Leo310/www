<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");

 $error = $error1 = "";
 $pwchanged = "";
 if (isset($_SESSION['error'])) $error = $_SESSION['error'];
 if (isset($_SESSION['pwchanged'])) $error1 = $_SESSION['pwchanged'];
?>
<body class="body" background="images/bild3.jpg">

  <!-- always used menu -->
  <button style="float:right; margin-top:0.5%; margin-right:1%" class="abmeldebutton" onClick="window.location.href='scr_logout.php'">abmelden »</button>

  <h1 style="float:right; margin-top:0.7%; margin-right:2%" class="userloggedin"><?php echo $_SESSION['user'];?></h2>
  <h1 style="float:right; margin-top:0.7%; margin-right:3%" class="userloggedin">|</h2>


  <button style="float:right; margin-top:0.4%; margin-right:2%" class="menubutton" onClick="window.location.href='deleteuser.php'">account löschen</button>
  <button style="float:right; margin-top:0.4%; margin-right:0.3%" class="menubutton" onClick="window.location.href='pwchange.php'">passwort ändern</button>

  <!-- end of always used menu -->
  <!-- optional back button top left --> <button style="float:left; margin-top:0.4%; margin-left:-1%" class="menubutton" onClick="history.back();">« zurück</button>



<center><div class="formularcontainer">
	<h1 style="margin-top: 10%;" class="frontheadline">kennwort ändern</h1>
		<table style="margin-top: 5%;">
			<form action='scr_pwchange.php' method='post'>
				<?php
				 if (isset($_SESSION['rechte'])) $rechte = $_SESSION['rechte'];
				 echo "<input type='hidden' name='rechte' value='$rechte'>";
				?>
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
            <button class="button" onclick="window.location.href='scr_login.php'" style="margin-left: -5%">« abbrechen</button>
          </td>
					<td>
						<input type='submit' value='speichern »' class="confirmbutton" style="margin-left: 5%">
					</td>
				</tr>
			</form>
    </table>
				<!-- <tr>
					<td> -->
						<center><p style="margin-top: 40px;"></p>
						<?php
							  if ($error) {
								  echo "<p class='text'>$error</p>";
								  unset($_SESSION['error']);
							  }

							  if ($error1) {
								  echo "<p class='text'>$error1</hp>";
								  unset($_SESSION['pwchanged']);
							  }
						?></center>
					<!-- </td>
				</tr> -->
			<!-- </table>  -->
</div>

</body>
</html>
