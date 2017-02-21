<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="icon" type="image/png" href="http://kokkola.oncloudos.com/kuvat/DWEB.ICO">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    </head>
    <body class="container">

<div style="background-color:#f1f1f1">
  <div class="row">
    <div class="col text-left">
      <h1>DYNASTY TIETOPALVELU</h1>
    </div>
    <div class="col text-right">
      <h1>KOKKOLA</h1>
    </div>
  </div>
</div>

<div class="text-center">
    <a href="testi_elimet.php">Etusivu</a>
    <h1>Kirjautuminen</h1>
</div>

<?php
    session_start();
    if($_SESSION['loggedin'] != 'true'){
  $sid = session_id();
  $nimi = $_POST['nimi'];
  $salasana = $_POST['salasana'];
  require_once('t_login.php');  // luodaan PHP-yhteys

 $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
        $my->set_charset("utf8");

        if ($my->connect_errno)
          die("connect failed: ". $my->connect_error);

  $sql = 'SELECT * FROM 707A_login WHERE nimi="' . $nimi . '" AND salasana="' . $salasana . '"';
$res = mysqli_query($my, $sql) or die('Error #1');

  $rows = $res -> num_rows;
  $u = mysqli_fetch_object($res);

   if($rows>0){

//   $tmp = mysqli_query($con,"UPDATE login SET
//   sid='".session_id()."'WHERE UID='.$u->uid.'");
   echo "kirjautunimen onnistui<br>";
   echo "Voit nyt lisätä tai poistaa taulukkoja.<br>";
   echo "Siirry <a href='lisaa_elpk.php'>lisäämis</a> tai <a href='poista_elpk.php'>poistamis</a> sivulle.";
   $_SESSION['nimi'] = $nimi;
   $_SESSION['loggedin'] = 'true';
  }
 else{
  echo "kirjautuminen epäonnistui<br>";
  echo "Nimi on Testi ja salasana on Testi.";
  }

          $my->close();

}
else{
echo "olet kirjautuneena " .$_SESSION['nimi']. "<br>";
echo "Voit nyt lisätä tai poistaa taulukkoja.<br>";
echo "Siirry <a href='lisaa_elpk.php'>lisäämis</a> tai <a href='poista_elpk.php'>poistamis</a> sivulle.";
}
?>

<form action="testi_login.php" method="POST">
  <p> <input type="text" name="nimi"> nimi</p>
  <p> <input type="password" name="salasana"> salasana</p>
    <button type="submit" name="send">Kirjaudu</button>
</form>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    </body>
</html>
