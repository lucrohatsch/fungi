var ctx = document.getElementById('grafico_temp').getContext("2d");





var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        
        datasets: [{
            label: 'Temperatura',
            
            borderColor: 'rgb(230, 172, 25)',
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

let urlT = 'http://localhost/static/functions/consulta_TH.php.php'
        fetch(urlT)
            .then( response => response.json() )
            .then( datos => mostrar(datos) )
            .catch( error => console.log(error) )


        const mostrar = (valores) =>{
            valores.forEach(element => {
                myChart.data['labels'].push(element.FECHA)
                myChart.data['datasets'][0].data.push(element.TEMP)
                myChart.update()
            });
            console.log(myChart.data)
        } 


;