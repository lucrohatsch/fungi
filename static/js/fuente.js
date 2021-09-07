console.log("Hola Fungi world");

function inicio(){
    mensajes = document.getElementById("mensajes");
    cV = document.getElementById('cV');
    cV.addEventListener('change', control, false);
    cB = document.getElementById('cB');
    cB.addEventListener('change', control, false);
    cN = document.getElementById('cN');
    cN.addEventListener('change', control, false);
    cRe = document.getElementById('cRe');
    cRe.addEventListener('change', control, false);
    cCa = document.getElementById('cCa');
    cCa.addEventListener('change', control, false);
    conectar_mqtt();
    suscribir_mqtt();
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
	
	client.subscribe('fungi/lecturas', {qos:2}, (error)=>{
		if (!error){
			console.log('Suscripcion exitosa')
		}else{
			console.log('Suscripcion fallida. ' + error)
				}
			})
}

function actualizador() {
    client.on('message', (topic, message) =>{
        var json_mqtt=message.toString();
        json_mqtt=json_mqtt.replace(/['"]+/g, '"');	
        console.log(json_mqtt);			
        var msn = JSON.parse(json_mqtt);

        for (i in msn){
            var destino = i;
            document.getElementById(destino).innerHTML=msn[i];
        }			
        console.log('Mensaje recibido bajo topico: ', topic, '->', message.toString());
})

}


function control() {
    console.log(this);
    var vX = this.checked;
	var cX = this.getAttribute('id');
	var ctrl_obj = {equipo: cX, estado: vX};
	var ctrl_json = JSON.stringify(ctrl_obj);
	console.log(ctrl_json);
	client.publish('fungi/controles', ctrl_json, (error) => {
			console.log(error || 'mensaje enviado')
			})
	console.log("vX=", vX, " y cX=", cX);

}


window.addEventListener("load", inicio,false);