const { DataTypes } = require('sequelize');
const bd = require('../ConfigBD/dataBase')

const lineas = bd.define('Lineas', {
    id: {
        type: DataTypes.INTEGER,
        primaryKey: true,
        autoIncrement: true
    },
    nombre: {
        type: DataTypes.STRING,
        allowNul: false
    },
    origen: {
        type: DataTypes.STRING,
        allowNul: false,
    },
    destino: {
        type: DataTypes.STRING,
        allowNul: false,
    },



},
    {
        tableName: 'lineas',
        timestamps: true,
    }

)

module.exports = lineas;