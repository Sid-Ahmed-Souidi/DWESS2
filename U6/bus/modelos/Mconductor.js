//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/dataBase')

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
        unique: true

    },

    telefono: {
        type:DataTypes.STRING,
        allowNull:false,
    },

    fechaContrato:{
        type:DataTypes.DATE,
        allowNull:false,

    }

},
        {
             tableName:'conductores',
             timestamps:true,
        }
)


module.exports = Conductor;
