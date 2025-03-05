const bd = require('../ConfigBD/dataBase');

const Conductor = require('./Mconductor');
const lineas = require('./Mlinea');
const Billete = require('./Mbillete');


Conductor.hasMany(Billete, { foreignKey: 'conductor_id' })
lineas.hasMany(Billete, { foreignKey: 'lineas_id' })

Billete.belongsTo(Conductor, { foreignKey: 'conductor_id' })
Billete.belongsTo(lineas, { foreignKey: 'lineas_id' })

module.exports = {
    bd,
    Conductor,
    lineas,
    Billete
}