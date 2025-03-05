//mostrar Viajes
const Viaje = require('../modelos/mViaje')
const Reserva = require('../modelos/mReserva')

async function viajes(req , res) {
    try {   

        const viajes = await Viaje.findAll();
        if(viajes==0){
            throw 'No hay viajes';
        }
        res.status(200).json(viajes);
        
    } catch (error) {
        res.status(500).send('error:'+error);
    }
}





module.exports = {
    viajes,
}