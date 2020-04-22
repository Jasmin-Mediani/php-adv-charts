$(document).ready(function () {
    var mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

    var valori = [1000, 1322, 1123, 2301, 3288, 988, 502, 2300, 5332, 2300, 1233, 2322];

    var ctx = $("#grafico1");
    var chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: mesi,
            datasets: [{
                label: "Grafico numero 1",
                backgroundColor: "rgb(118, 215, 196)",
                borderColor: "rgb(52, 152, 219)",
                data: valori
            }],
        }
    });
});