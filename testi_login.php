<?php
	session_start();
	
	if($_GET['kill']=="user") {
		session_destroy();
		header("Location: index.php");
	}
	
	// Otetaan yhteys tietokantaan
	$my = mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
	if($my->mysql_errno) {
		die("MySQL: virhe (#".$my->mysql_errno.") yhteyden luonnissa: ".$my->connect_error);
	}
	$my->set_charset("utf8");
	
	// Luetaan lomakkeen tiedot muuttujiin
	$login	= trim($_POST['login']);
	$passwd	= trim($_POST['passwd']);
	$btn		= trim($_POST['btn']);
	
	if($_SESSION['uid']=='active') {
		# Meillä on aktiivinen uid - ei tehdä mitään ja homma toimii!
	} else if($btn==1 && $login && $passwd) {
	  // Tehdään SQL-kysely tunnuksesta ja salasanasta
	  $sql = "SELECT * FROM 005_login WHERE login='$login' AND passwd='$passwd'";
	  if($res = $my->query($sql)) {
	    // Tarkistetaan löytyykö käyttäjä tietokannasta
	    $rows = $res->num_rows;
	    if($rows>0) {
	    	// Löytyi osuma! Asetetaan SESSIO
	    	$_SESSION['uid']="active";
	    } else {
	    	// Ei löytynyt, mennä kirjautumiseen uudestaan
	    	$my->close();
	    	header("Location: login.php");
	    }
	  } else {
	  	 // Virhetilanne - tänne ei ikinä pitäisi päätyä
	 	 echo $my->error. "<br>"."$sql";
	  }
	} else {
	  my->close();
	  header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="icon" type="image/png" href="">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    </head>
    <body>
    
<div class="container" style="background-color:#f1f1f1">
  <div class="row">
    <div class="col">
      <a href="elimet.php">Etusivu</a>
    </div>
    <div class="col">
      <a href="lisaa_tieto.php">Lisää</a>
    </div>
    <div class="col">
      <a href="poista_tieto.php">Poista</a>
    </div>
    <div class="col">
      <a href="nollaa_tid.php">Nollaa tid</a>
    </div>
    <div class="col">
      <a href="testi_login.php">Login_t</a>
    </div>
  </div>
</div>

<div class="container text-center">
    <a href="http://www.kokkola.fi/">Kokkola</a>
    <h1>Toimielimet</h1>
</div>



    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
    </body>
</html>