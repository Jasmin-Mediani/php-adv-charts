$(document).ready(function () {
    //     var mesi = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

    //     var valori = [1000, 1322, 1123, 2301, 3288, 988, 502, 2300, 5332, 2300, 1233, 2322];

    //     var ctx = $("#grafico1");
    //     var chart = new Chart(ctx, {
    //         type: "line",
    //         data: {
    //             labels: mesi,
    //             datasets: [{
    //                 label: "Grafico numero 1",
    //                 backgroundColor: "rgb(118, 215, 196)",
    //                 borderColor: "rgb(52, 152, 219)",
    //                 data: valori
    //             }],
    //         }
    //     });
    // });


    $.ajax({
        url: 'server.php',
        method: 'GET',
        success: function (datiInArrivo) {
            var grafico = datiInArrivo;

            var valoriDiFatturato = grafico.fatturato.data; //è un array per il primo dei due grafici
            var tipoDiGrafico2 = grafico.fatturato.type;

            var valoriDiFatturatoByAgent = grafico.fatturato_by_agent.data;
            var tipoDiGrafico3 = grafico.fatturato_by_agent.type;

            console.log(tipoDiGrafico3)

            //console.log(valoriDiFatturato);
            //console.log(valoriDiFatturatoByAgents);


            /*ciclo sul secondo oggetto per separare nomi da valori e metterli in due array diversi da dare a chart*/

            var arrayDiNomi = [];
            var arrayDiValori = [];

            for (var nome in valoriDiFatturatoByAgent) {
                arrayDiNomi.push(nome);
                arrayDiValori.push(valoriDiFatturatoByAgent[nome]);
            }

            //console.log(arrayDiNomi);
            //console.log(arrayDiValori);


            var ctx = $("#grafico2");
            var graficoLinea = new Chart(ctx, {
                type: tipoDiGrafico2,
                data: {
                    labels: null,
                    datasets: [{
                        label: "Grafico numero 2",
                        backgroundColor: "rgb(153, 102, 255)",
                        borderColor: "rgb(0, 0, 102)",
                        data: valoriDiFatturato
                    }],
                }
            });

            var ctx = $("#grafico3");
            var graficoTorta = new Chart(ctx, {
                type: tipoDiGrafico3,
                data: {
                    labels: arrayDiNomi,
                    datasets: [{
                        label: "Grafico numero 3",
                        backgroundColor: ["rgb(51, 204, 255)", "rgb(153, 102, 255)", "rgb(255, 102, 204)", "rgb(255, 153, 102)"],
                        borderColor: "rgb(0, 0, 102)",
                        data: arrayDiValori
                    }],
                }
            });

        },
        error: function (error) {
            alert('errore nel caricamento della pagina');
        }

    });

});
