//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Contenido = bd.define('Contenido' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },

    tipo:{
        type: DataTypes.ENUM("DRAMA" , "COMEDIA"),
        allowNull:false,
    },


    titulo:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    duracion:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },

    temporada:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },

    capitulo:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },


    tituloC:{
        type: DataTypes.STRING,
        allowNull:false,
    },


},
{

    tableName :'contenidos',
    Timestamps:true,
}
)

module.exports = Contenido;
