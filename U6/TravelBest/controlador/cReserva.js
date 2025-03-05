//ver reservas de un viaje
const Viaje = require('../modelos/mViaje')
const Reserva = require('../modelos/mReserva');
const { where } = require('sequelize');
const bd = require('../configBD/database');

async function reservasViaje(req, res) {
    try {

        if(!req.params.id){
            throw 'no se ha pasado los parametros'

        }
        else {
            const viaje = await Viaje.findByPk(req.params.id);
            if(!viaje){
                throw 'El viaje no existe'
            }
            else {
                const reservas = await Reserva.findAll({
                    where:{viaje_id:viaje.id}
                });

                if(reservas==0){
                    throw 'no hay reservas para este viaje'
                }
                else {
                    res.status(200).json(reservas);
                }
            }
        }
        
    } catch (error) {
        res.status(500).send('error:'+error);

    }
      

    
}


//crear Reserva
async function crearReserva(req ,res) {

    try {

        if(!req.params.id || !req.body.fechaSalida || !req.body.nombre || !req.body.personas ){
            throw 'No se han pasado los parametros necesarios';

        }
        else {
            const viaje = await Viaje.findByPk(req.params.id);
            if(!viaje){
                throw 'El viaje seleccionado no existe'
            }
            else {

                if(viaje.numPlazas< req.body.personas){
                    throw 'no hay suficientes plazas'
                }
                let totalViaje = viaje.precioPersona * req.body.personas;
                const r = await Reserva.create({
                    viaje_id:viaje.id,
                    fechaSalida:req.body.fechaSalida ,
                    nombreCliente:req.body.nombre,
                    numPersonas:req.body.personas,
                    totalViaje:totalViaje,
                    anulada:false
                })
                if(r){
                    viaje.numPlazas -= req.body.personas;
                    res.status(200).send(r);
                    await viaje.save();
                }else {
                    throw 'error al crear reserva'
                }
            }
        }
    } catch (error) {
        res.status(500).send('Error:'+error);
    }
}


//anular Reserva
async function anularReserva(req, res) {
        try {
            if(!req.params.id){
             throw 'No se han pasado los parametros necesarios'
            }
            else{
                const reserva = await Reserva.findByPk(req.params.id);
                if(!reserva){
                    throw 'reserva no existe'

                }
                const viaje = await Viaje.findOne({where:{id:reserva.viaje_id}});
                if(!viaje){
                    throw 'viaje no existe'
                }
                reserva.anulada = true;
                if(await reserva.save()){
                    viaje.totalViaje += reserva.numPersonas;
                    if(await viaje.save()){
                        console.log(reserva)
                        res.status(200).json('reserva anulada :'+reserva);
                    }
                }
            }
            
        } catch (error) {
            res.status(500).send('Error:'+error);

        }
    

}








module.exports = {
    reservasViaje,
    crearReserva,
    anularReserva

}