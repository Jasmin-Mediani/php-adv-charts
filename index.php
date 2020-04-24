<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="style.css" />

    <title>Chart avanzato</title>
  </head>

  <body>
    <div class="container">
      <canvas id="grafico1"></canvas>
      <!-- in css non funziona, quindi per separare i grafici mi arrangio con br-->
      <br /><br /><br /><br /><br /><br /><br />
      <canvas id="grafico2"></canvas>
      <br /><br /><br /><br /><br /><br /><br />
      <canvas id="grafico3"></canvas>
      <br /><br /><br /><br /><br /><br /><br />
      <canvas id="grafico4"></canvas>
    </div>
  </body>

  <script>
          $(document).ready(function() {
              var mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre",
                  "Ottobre", "Novembre", "Dicembre"
              ];

              // var valori = [1000, 1322, 1123, 2301, 3288, 988, 502, 2300, 5332, 2300, 1233, 2322];

              // <?php include 'valori.php'; ?>
              // var valori = <?php echo json_encode($valori); ?> ;

              // var ctx = $("#grafico1");
              // var chart = new Chart(ctx, {
              //     type: "line",
              //     data: {
              //         labels: mesi,
              //         datasets: [{
              //             label: "Grafico numero 1",
              //             backgroundColor: "rgb(118, 215, 196)",
              //             borderColor: "rgb(0, 0, 102)",
              //             data: valori
              //         }],
              //     }
              //   });

      <?php include 'data.php' ?>
      <?php
      $livello_accesso = $_GET["level"];
      if($graphs["fatturato"]["access"] == $livello_accesso)
        include 'grafico1.php' ?>

        <?php
      $livello_accesso = $_GET["level"];
      if($graphs["fatturato_by_agent"]["access"] == $livello_accesso) {

       include 'grafico1.php';
       include 'grafico2.php';
       }
       ?>

       <?php
      $livello_accesso = $_GET["level"];
      if($graphs["team_efficiency"]["access"] == $livello_accesso) {

       include 'grafico1.php';
       include 'grafico2.php';
       include 'grafico3.php';
       }
       ?>





    });
  </script>
  //
  <!--<script src="main.js"></script>-->
</html>
