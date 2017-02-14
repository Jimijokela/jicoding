<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dynasty Kokkola</title>
        <link rel="icon" type="image/png" href="">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm">
            
            <?php
                # 1. otetaan yhteys palvelimeen ja valitaan data15 -tietokanta käyttöön
                $my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
                # 2. tarkistetaan yhteyden tila
                if($my->mysql_errno) {
                    die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
                }
                #valitaan tietokannan merkistä
                $my->set_charset('utf8');
                $result = $my->query('SELECT * FROM dynasty');  

                    echo '<table class="table table-striped">';
                    echo '<tr><th>Pykälä</th><th>Toimielin</th><th>Viimeisin kokous</th><th>Dokumentti tyyppi<th></tr>';
                # 3. luetaan kyselyn tulos rivi kerrallaan
                while($t = $result->fetch_object()) {
                
                    echo '<tr>';
                    echo '<td>'.$t->tid.'</td>';
                    echo '<td>'.$t->Toimielimet.'</td>';
                    echo '<td>'.$t->Kokous.'</td>';
                    echo '<td>'.$t->Dokumentti.'</td>';
                    echo '</tr>';

                }
                    echo '</table>';
           
                # 4. suljetaan yhteys
                $my->close
            ?>
            
            
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
    </body>
</html>