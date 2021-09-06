var ctx = document.getElementById('grafico_temp').getContext("2d");





var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['0', '2', '4', '6', '8', '10', '12'],
        datasets: [{
            label: 'Temperatura',
            data: [25.1, 19, 15, 18, 27, 32, 33],
            borderColor: 'rgb(230, 172, 25)',
            borderWidth: 1},
            {label: 'Humedad',
            data: [1, 19, 2, 6, 5, 50, 33],
            borderWidth: 1,
            borderColor: 'rgb(25, 104, 230)'
        }]
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