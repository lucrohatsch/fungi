var tctx = document.getElementById('graficos').getContext("2d");

var TChart = new Chart(tctx, {
    type: 'line',
    data: {
        
        datasets: [{
            label: 'Temperatura',
            
            borderColor: 'rgb(237, 159, 14)',
            borderWidth: 1},
            
            {
            label: 'Humedad',
                
            borderColor: 'rgb(55, 115, 212)',
            borderWidth: 1},
            {
            label: 'CO2',
                    
            borderColor: 'rgb(166, 173, 173)',
            borderWidth: 1}
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

var urlG = 'http://fungi.cultivoiot.com.ar/static/functions/consulta_graficas.php'
        fetch(urlG)
            .then( response => response.json() )
            .then( datos => mostrar(datos) )
            .catch( error => console.log(error) )


        var mostrar = (valores) =>{
            valores.forEach(element => {
                TChart.data['labels'].push(element.FECHA)
                TChart.data['datasets'][0].data.push(element.TEMP)
                TChart.data['datasets'][1].data.push(element.HUME)
                TChart.data['datasets'][2].data.push(element.CO2)
                TChart.update()
            });
            console.log(TChart.data)
        }         
;