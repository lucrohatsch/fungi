var hctx = document.getElementById('grafico_hume').getContext("2d");

var HChart = new Chart(hctx, {
    type: 'line',
    data: {
        
        datasets: [{
            label: 'Humedad',
            
            borderColor: 'rgb(55, 115, 212)',
            borderWidth: 1},
            ]
    },
    
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
})

var urlH = 'http://localhost/static/functions/consulta_H.php'
        fetch(urlH)
            .then( responseH => responseH.json() )
            .then( datosH => mostrar(datosH) )
            .catch( error => console.log(error) )


        var mostrar = (valoresH) =>{
            valoresH.forEach(element => {
                HChart.data['labels'].push(element.FECHA)
                HChart.data['datasets'][0].data.push(element.TEMP)
                HChart.update()
            });
            console.log(HChart.data)
        };