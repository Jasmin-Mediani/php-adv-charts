var tipoDiGrafico4 = <?php echo '"' . $graphs["team_efficiency"]["type"] . '"'; ?>;




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