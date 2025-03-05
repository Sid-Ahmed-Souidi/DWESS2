//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Viaje = bd.define('Viaje' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },
    tituloViaje:{
        type: DataTypes.STRING,
        allowNull:false,
    },
    destino:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    numNoches:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },
    numPlazas:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },

    precioPersona:{
        type: DataTypes.FLOAT,
        allowNull:false,
    },


},
{

    tableName :'viajes',
    Timestamps:true,
}
)

module.exports = Viaje;
