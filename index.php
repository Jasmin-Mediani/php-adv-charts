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

            <?php include 'valori.php'; ?>
            var valori = <?php echo json_encode($valori); ?> ;

            var ctx = $("#grafico1");
            var chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: mesi,
                    datasets: [{
                        label: "Grafico numero 1",
                        backgroundColor: "rgb(118, 215, 196)",
                        borderColor: "rgb(0, 0, 102)",
                        data: valori
                    }],
                }
            });

    <?php include 'data.php' ?>

    var mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto",
        "Settembre", "Ottobre", "Novembre", "Dicembre"
    ];

    var valoriDiFatturato = <?php echo json_encode($graphs["fatturato"]["data"]); ?>;
    var tipoDiGrafico2 = <?php echo '"'.$graphs["fatturato"]["type"].'"'; ?>;

    //var livelloDiAccesso = <?php echo json_encode($graphs["fatturato"]["data"]); ?>;

    var valoriDiFatturatoByAgent = <?php echo json_encode($graphs["fatturato_by_agent"]["data"]); ?>;
    var tipoDiGrafico3 = <?php echo '"' . $graphs["fatturato_by_agent"]["type"] . '"'; ?>;


    var tipoDiGrafico4 = <?php echo '"' . $graphs["team_efficiency"]["type"] . '"'; ?>;



    var ctx = $("#grafico2");
    var graficoLinea = new Chart(ctx, {
        type: tipoDiGrafico2,
        data: {
            labels: mesi,
            datasets: [{
                label: "Grafico numero 2",
                backgroundColor: "rgb(153, 102, 255)",
                borderColor: "rgb(0, 0, 102)",
                data: valoriDiFatturato
            }],
        }
    });


    <?php

    $nomi = [];
    $valori = [];

    foreach ($graphs["fatturato_by_agent"]["data"] as $key => $value) {

      array_push($nomi, $key);
      array_push($valori, $value);

    }

    ?>



    var arrayNomi = <?php echo json_encode($nomi); ?>;
    //console.log(arrayNomi);

    var arrayValori = <?php echo json_encode($valori); ?>;
    //console.log(arrayValori);


    var ctx = $("#grafico3");
    var graficoTorta = new Chart(ctx, {
        type: tipoDiGrafico3,
        data: {
            labels: arrayNomi,
            datasets: [{
                label: "Grafico numero 3",
                backgroundColor: ["rgb(51, 204, 255)", "rgb(153, 102, 255)", "rgb(255, 102, 204)", "rgb(255, 153, 102)"],
                borderColor: "rgb(0, 0, 102)",
                data: arrayValori
                    }],
                }
            });

            <?php

    $team = [];
    $valoriDelTeam = [];

    foreach ($graphs["team_efficiency"]["data"] as $key => $value) {

      array_push($team, $key);
      array_push($valoriDelTeam, $value);

    }

    ?>

    var arrayTeam = <?php echo json_encode($team); ?>;
    console.log(arrayTeam);

    var arrayValoriDeiTeam = <?php echo json_encode($valoriDelTeam); ?>;
    console.log(arrayValoriDeiTeam);

    var ctx = $("#grafico4");
    var graficoTorta = new Chart(ctx, {
        type: tipoDiGrafico4,
        data: {
            labels: mesi,
            datasets: [
              {
                label: arrayTeam[0],
                backgroundColor: ["rgb(51, 204, 255)", "rgb(153, 102, 255)", "rgb(255, 102, 204)", "rgb(255, 153, 102)"],
                borderColor: "rgb(0, 0, 102)",
                data: arrayValoriDeiTeam[0]
                    },
              {
                label: arrayTeam[1],
                backgroundColor: ["rgb(51, 204, 255)", "rgb(153, 102, 255)", "rgb(255, 102, 204)", "rgb(255, 153, 102)"],
                borderColor: "rgb(0, 0, 102)",
                data: arrayValoriDeiTeam[1]
                    },

                    {
                label: arrayTeam[2],
                backgroundColor: ["rgb(51, 204, 255)", "rgb(153, 102, 255)", "rgb(255, 102, 204)", "rgb(255, 153, 102)"],
                borderColor: "rgb(0, 0, 102)",
                data: arrayValoriDeiTeam[2]
                    },
                  ],

                }
          });
        });
  </script>
  //
  <!--<script src="main.js"></script>-->
</html>
