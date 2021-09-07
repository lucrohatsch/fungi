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


/*
var urlT = 'http://localhost/static/functions/consulta_T.php'
        fetch(urlT)
            .then( responseH => responseH.json() )
            .then( datosT => mostrar(datosT) )
            .catch( error => console.log(error) )


        var mostrar = (valoresT) =>{
            valoresT.forEach(element => {
                TChart.data['labels'].push(element.FECHA)
                TChart.data['datasets'][0].data.push(element.TEMP)
                TChart.update()
            });
            console.log(TChart.data)
        } 
*/

var urlG = 'http://localhost/static/functions/consulta_graficas.php'
        fetch(urlG)
            .then( response => response.json() )
            .then( datos => mostrar(datos) )
            .catch( error => console.log(error) )


        var mostrar = (valores) =>{
            valores.forEach(element => {
                TChart.data['labels'].push(element.FECHA)
                TChart.data['datasets'][0].data.push(element.TEMP)
                TChart.data['datasets'][1].data.push(element.HUME)
                TChart.update()
            });
            console.log(TChart.data)
        }         
;