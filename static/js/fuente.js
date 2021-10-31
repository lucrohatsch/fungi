console.log("Hola Fungi world");

function inicio(){
    //mensajes = document.getElementById("mensajes");
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
    cBsL = document.getElementById('cBsL');
    cBsL.addEventListener('change', control, false);
    logg = document.getElementById('logg');
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
    client.subscribe('fungi/S01/estados', {qos:1}, (error)=>{
		if (!error){
			console.log('Suscripcion a eS01 exitosa')
		}else{
			console.log('Suscripcion a eS01 fallida. ' + error)
				}
			})
	
	client.subscribe('fungi/S01/lecturas', {qos:1}, (error)=>{
		if (!error){
			console.log('Suscripcion a S01 exitosa')
		}else{
			console.log('Suscripcion a S01 fallida. ' + error)
				}
			})
    client.subscribe('fungi/S00/lecturas', {qos:1}, (error)=>{
		if (!error){
			console.log('Suscripcion a S00 exitosa')
		}else{
			console.log('Suscripcion a S00 fallida. ' + error)
				}
			})
    client.subscribe('fungi/SL/lecturas', {qos:1}, (error)=>{
		if (!error){
			console.log('Suscripcion a SL exitosa')
		}else{
			console.log('Suscripcion a SL fallida. ' + error)
				}
			})
    client.subscribe('fungi/SL/controles', {qos:1}, (error)=>{
		if (!error){
			console.log('Suscripcion a eSL exitosa')
		}else{
			console.log('Suscripcion a eSL fallida. ' + error)
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
            var sala = msn[i]["SALA"];
            //console.log(sala.toString());
            var lote = msn[i]['LOTE'];
            var data = msn[i]['data'];
            //console.log(data);
            for (e=0; e<Object.keys(data).length; e++){
                var destino = Object.keys(data)[e];
                console.log(destino);
                console.log(data[e]);
                document.getElementById(sala).getElementsByClassName(destino)[i].innerHTML=data[destino];
            }

        } 
        
    })
};
/*        
        		
        

        			
        console.log('Mensaje recibido bajo topico: ', topic, '->', message.toString());
*/


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
	console.log("estado=", vX, " y equipo=", cX);

}


window.addEventListener("load", inicio,false);