//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Conductor = bd.define('Conductor' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },

    nombreApe:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    dni:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    telefono:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    fechaContrato:{
        type: DataTypes.DATEONLY,
        allowNull:false,
    },

},
{

    tableName :'conductores',
    Timestamps:true,
}
)

module.exports = Conductor;
