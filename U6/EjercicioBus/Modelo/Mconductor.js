const { DataTypes } = require('sequelize');
const bd = require('../ConfigBD/dataBase')

const Conductor = bd.define('Conductor', {
    id: {
        type: DataTypes.INTEGER,
        primaryKey: true,
        autoIncrement: true
    },
    nombreApe: {
        type: DataTypes.STRING,
        allowNul: false
    },
    telefono: {
        type: DataTypes.STRING,
        allowNul: false,
    },
    dni: {
        type: DataTypes.STRING,
        allowNul: false,
        unique: true
    }, fechaContrato: {
        type: DataTypes.DATE,
        allowNul: false,
    },


},
    {
        tableName: 'conductores',
        timestamps: true,
    }

)

module.exports = Conductor;