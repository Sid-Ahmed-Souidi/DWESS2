//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/dataBase')

const Linea = bd.define('Linea' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },
    nombre:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    origen:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    destino: {
        type:DataTypes.STRING,
        allowNull:false,
    },

}
,
{
    tableName:'lineas',
    timestamps:true,
}

)



module.exports = Linea;
