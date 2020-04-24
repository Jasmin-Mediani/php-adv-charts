var valoriDiFatturatoByAgent = <?php echo json_encode($graphs["fatturato_by_agent"]["data"]); ?>;

var tipoDiGrafico3 = <?php echo '"' . $graphs["fatturato_by_agent"]["type"] . '"'; ?>;


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