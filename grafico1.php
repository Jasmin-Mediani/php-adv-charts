var mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto",
"Settembre", "Ottobre", "Novembre", "Dicembre"
];

var valoriDiFatturato = <?php echo json_encode($graphs["fatturato"]["data"]); ?>;
var tipoDiGrafico2 = <?php echo '"'.$graphs["fatturato"]["type"].'"'; ?>;





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