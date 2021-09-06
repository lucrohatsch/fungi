var tctx = document.getElementById('grafico_temp').getContext("2d");

var TChart = new Chart(tctx, {
    type: 'line',
    data: {
        
        datasets: [{
            label: 'Temperatura',
            
            borderColor: 'rgb(237, 159, 14)',
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


var urlT = 'http://localhost/static/functions/consulta_T.php'
        fetch(urlT)
            .then( response => response.json() )
            .then( datos => mostrar(datos) )
            .catch( error => console.log(error) )


        var mostrar = (valores) =>{
            valores.forEach(element => {
                TChart.data['labels'].push(element.FECHA)
                TChart.data['datasets'][0].data.push(element.TEMP)
                TChart.update()
            });
            console.log(myChart.data)
        } 

var urlH = 'http://localhost/static/functions/consulta_H.php'
        fetch(urlH)
            .then( response => response.json() )
            .then( datos => mostrar(datos) )
            .catch( error => console.log(error) )


        var mostrar = (valores) =>{
            valores.forEach(element => {
                HChart.data['labels'].push(element.FECHA)
                HChart.data['datasets'][0].data.push(element.TEMP)
                HChart.update()
            });
            console.log(myChart.data)
        } 
;