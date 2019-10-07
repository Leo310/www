<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");

 $error4 = "";

 if (isset($_SESSION['error4'])) $error4 = $_SESSION['error4'];


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
  	<h1 style="margin-top: 10%;" class="frontheadline">schade, dass du gehst :(</h1>
    <h1 class="lowerheadline" style="margin-top:1%">gib bitte dein kennwort zur bestätigung ein.</h1>
  		<table style="margin-top: 7%;">

  			<form action='scr_deleteuser.php' method='post'>
  				<tr>
  					<td>
  						<input class="inputRahmen" type='password' name='pw' id='pw' placeholder="kennwort" required>
  					</td>
  				</tr>
  		</table>
  		<table>
  	</div>
  <div style='margin-left:auto; margin-right:auto; margin-top:10%; min-width:200px; width:100%;'>
  				<tr>
            <td>
              <button class="button" onclick="history.back();" style="margin-left: -5%">« abbrechen</button>
            </td>
  					<td>
  						<input type='submit' value='löschen »' class="confirmbutton" style="margin-left: 5%">
  					</td>
  				</tr>
  			</form>
      </table>
  				<!-- <tr>
  					<td> -->
  						<center><p style="margin-top: 5%;"></p>
                <?php
      						if ($error4) {
      						echo "<p class='text'>$error4</p>";
      						unset($_SESSION['error4']);
      						}
      					?>
  						</center>
  					<!-- </td>
  				</tr> -->
  			<!-- </table>  -->
  </div>

  </body>
  </html>
