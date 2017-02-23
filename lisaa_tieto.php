<!DOCTYPE html>
<html lang="fi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lisää Tietoja</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<style>
table, th, td {
      border: 3px solid black;
      margin-left:20px;
      margin-top:10px;
      padding: 20px;
      outline: 4px solid black;
    outline-offset: -4px;
 }
 th {
 background-color: #fff3f3;
 }
 td {
 background-color: #ffffff;
 }
</style>
  </head>
  <body class="container">
  
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
  </div>
  <div class="row">
    <div class="col">
      <a href="lisaa_elpk.php">ELPK</a>
    </div>
    <div class="col">
      <a href="lisaa_ti.php">Tiedot</a>
    </div>
    <div class="col">
      <a href="lisaa_poy.php">Poytakirja</a>
    </div>
  </div>
</div>
    
<div class="container" style="background-color:#f2f3f4">
<form method="GET">
  <div class="row">
    <div class="col">    
<input type="text" name="Toimielimet" 
placeholder="Kaupunginhallitus"> Toimielimet<br>
<input type="text" name="Kokous" 
placeholder="14.02.2017"> Kokous<br>
<input type="text" name="Dokumentti" 
placeholder="Pöytäkirja"> Dokumentti<br>
<button type="submit" name="send" value="true">Lisää</button>
    </div>
  </div>
</form>
</div>
    
    <?php
        # Luetaan lomakkeen muuttujat
        $send = $_GET['send'];
        $Toimielimet = $_GET['Toimielimet'];
        $Kokous = $_GET['Kokous'];
        $Dokumentti = $_GET['Dokumentti'];

    # Tarkistetaan onko lomakkeen nappia painettu. Jos on, niin suoritetaan
    # SGL-kysely
    if($send=='true') {
        $my=mysqli_connect("127.0.0.1","data15","jNTKdg3NTbRBuVEn","data15");

        if($my->mysql_errno) {
              die("MySQL, virhe yhteyden luonnissa: ".$my->connect_error);
          }

          $my->set_charset('utf8');
          $my->query('INSERT INTO dynasty
          (Toimielimet,Kokous,Dokumentti)
          VALUES("'.$Toimielimet.'","'.$Kokous.'","'.$Dokumentti.'")');

        $my->close();   # Suljetaan yhteys tietokantaan
    }
    ?>

<?php
    $my=mysqli_connect("127.0.0.1","data15","jNTKdg3NTbRBuVEn","data15");

    if($my->mysql_errno) {
          die("MySQL, virhe yhteyden luonnissa: ".$my->connect_error);
      }

      $my->set_charset('utf8');
    $tulos = $my->query('SELECT * FROM dynasty');

        echo '<table>';
        echo
        '<tr><th>tid</th><th>Toimielimet</th><th>Kokous</th><th>Dokumentti</th></tr>';

        while( $t = $tulos->fetch_object() ) {
            echo '<tr>';
            echo '<td>'.$t->tid.'</td>';
            echo '<td>'.$t->Toimielimet.'</td>';
            echo '<td>'.$t->Kokous.'</td>';
            echo '<td>'.$t->Dokumentti.'</td>';
            echo '</tr>';
          }
          echo '</table>';

    $my->close();   # Suljetaan yhteys tietokantaan
?>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>