
const bd = require('../configBD/database');

const Billete = require('./mBillete');
const Conductor = require('./mConductor');
const Linea = require('./mLinea');

//definir relaciones 

Conductor.hasMany(Billete ,{foreignKey:'conductor_id'});
Linea.hasMany(Billete ,{foreignKey:'linea_id'});


Billete.belongsTo(Conductor , {foreignKey:'conductor_id'});
Billete.belongsTo(Linea , {foreignKey:'linea_id'});



module.exports ={
    bd,
    Billete,
    Conductor,
    Linea
}