
const bd = require('../configBD/database');

const Cliente = require('./mCliente');
const Contenido = require('./mContenido');
const Reproduccion = require('./mReproduccion');

//definir relaciones 

Cliente.hasMany(Reproduccion ,{foreignKey:'cliente_id'});
Contenido.hasMany(Reproduccion ,{foreignKey:'contenido_id'});


Reproduccion.belongsTo(Cliente , {foreignKey:'cliente_id'});
Reproduccion.belongsTo(Contenido , {foreignKey:'contenido_id'});



module.exports ={
    bd,
    Cliente,
    Contenido,
    Reproduccion
}