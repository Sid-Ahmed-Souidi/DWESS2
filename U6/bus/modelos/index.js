
//Relaciones entre los modelos 
const bd = require('../configBD/dataBase');

const Conductor = require('./Mconductor');
const Billete = require('./Mbillete');
const Linea = require('./Mlinea');


//Definir relaciones 

Conductor.hasMany(Billete , {foreignKey :'conductor_id'});
Linea.hasMany(Billete , {foreignKey :'linea_id'})


Billete.belongsTo(Conductor , {foreignKey :'conductor_id'})

Billete.belongsTo(Linea , {foreignKey :'linea_id'})


module.exports = {
    bd, 
    Conductor,
    Billete,
    Linea
}
