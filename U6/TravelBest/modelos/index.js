
//Relaciones entre los modelos 
const bd = require('../configBD/database');

const Viaje = require('./mViaje');
const Reserva = require('./mReserva');


//Definir relaciones 

Viaje.hasMany(Reserva , {foreignKey :'viaje_id'})
Reserva.belongsTo(Viaje , {foreignKey :'viaje_id'})



module.exports = {
    bd, 
    Viaje,
    Reserva
}
