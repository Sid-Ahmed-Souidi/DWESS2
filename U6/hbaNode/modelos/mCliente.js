//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Cliente = bd.define('Cliente' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },

    nombre:{
        type: DataTypes.STRING,
        allowNull:false,
    },


    email:{
        type: DataTypes.STRING,
        allowNull:false,
    },

    fechaAlta:{
        type: DataTypes.DATEONLY,
        allowNull:false,
    },

},
{

    tableName :'clientes',
    Timestamps:true,
}
)

module.exports = Cliente;
