<!DOCTYPE html>
<html lang="fi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Poista Tietoja</title>
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
      <a href="testi_elimet.php">Etusivu</a>
    </div>
    <div class="col">
      <a href="lisaa_ti.php">Lisää</a>
    </div>
    <div class="col">
      <a href="poista_ti.php">Poista</a>
    </div>
    <div class="col">
      <a href="nollaa_tid.php">Nollaa tid</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <a href="poista_elpk.php">ELPK</a>
    </div>
    <div class="col">
      <a href="poista_poy.php">Pöytäkirja</a>
    </div>
    <div class="col">
      <a href="poista_tieto.php">Etusivun taulukko</a>
    </div>
  </div>
</div>

<div class="container" style="background-color:#f2f3f4">
<form method="GET">
  <div class="row">
    <div class="col">
<input type="text" name="Pykala"
placeholder="4"> Pykala/asianro<br>
<button type="submit" name="send" value="true">Poista</button>
    </div>
  </div>
</form>
</div>

    <?php
        # Luetaan lomakkeen muuttujat
        $send = $_GET['send'];
        $Pykala = $_GET['Pykala'];

    # Tarkistetaan onko lomakkeen nappia painettu. Jos on, niin suoritetaan
    # SGL-kysely
    if($send=='true') {
        $my=mysqli_connect("127.0.0.1","data15","jNTKdg3NTbRBuVEn","data15");

        if($my->mysql_errno) {
              die("MySQL, virhe yhteyden luonnissa: ".$my->connect_error);
          }

          $my->set_charset('utf8');
          $my->query('DELETE FROM dynasty3a WHERE
          Pykala="'.$Pykala.'" ');

        $my->close();   # Suljetaan yhteys tietokantaan
    }
    ?>

<?php
    $my=mysqli_connect("127.0.0.1","data15","jNTKdg3NTbRBuVEn","data15");

    if($my->mysql_errno) {
          die("MySQL, virhe yhteyden luonnissa: ".$my->connect_error);
      }

      $my->set_charset('utf8');
    $tulos = $my->query('SELECT * FROM dynasty3a');

        echo '<table>';
        echo '<tr><th>Pykala</th><th>pvm</th><th>otsikko</th><th>teksti</th><th>Osallistujat</th></tr>';

        while( $t = $tulos->fetch_object() ) {
            echo '<tr>';
            echo '<td>'.$t->Pykala.'</td>';
            echo '<td>'.$t->pvm.'</td>';
            echo '<td>'.$t->otsikko.'</td>';
            echo '<td>'.$t->teksti.'</td>';
            echo '<td>'.$t->Osallistujat.'</td>';
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
