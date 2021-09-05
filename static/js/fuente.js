console.log("Hola Fungi world");

function inicio(){
    mensajes = document.getElementById("mensajes");
    conectar_mqtt();
    suscribir_mqtt();
//    conectar_socket();
    actualizador();

}


function conectar_mqtt() {
    const options = {
        connectTimeout: 4000,
        clientId: 'fungi',
        keepalive: 60,
        clean: true,
    }	

    const TCP_URL = 'ws://200.58.127.50:9083/mqtt'
    client = mqtt.connect(TCP_URL, options);

    client.on('connect',() => {
        console.log('MQTT conectado con exito')
    })   
}

function suscribir_mqtt(){
	
	client.subscribe('fungi', {qos:0}, (error)=>{
		if (!error){
			console.log('Suscripcion exitosa')
		}else{
			console.log('Suscripcion fallida. ' + error)
				}
			})
}
/*
function conectar_socket() {
    const socket = io();
    
    socket.on('connect', function() {
    console.log("Conectado a WS");
    socket.emit('confirma', {data: 'Mensaje desde la web'});
    console.log("despues de enviar mensaje");
    });

    socket.on('connect_error', function(e){
         console.log(e);  
    });
    
}

*/

function actualizador() {
    client.on('message', (topic, message) =>{
        var json_mqtt=message.toString();
        json_mqtt=json_mqtt.replace(/['"]+/g, '"');	
        console.log(json_mqtt);			
        /*var msn = JSON.parse(json_mqtt);

        for (i in msn){
            var destino = i;
            document.getElementById(destino).innerHTML=msn[i];
        }*/				
        console.log('Mensaje recibido bajo topico: ', topic, '->', message.toString());
})
    
}



window.addEventListener("load", inicio,false);