//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/dataBase')

const Billete = bd.define('Billete' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },
    conductor_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'conductores',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },

    linea_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'lineas',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },

    fecha:{
        type: DataTypes.DATEONLY,
        allowNull:false,
    },


    hora:{
        type: DataTypes.TIME,
        allowNull:false,
    },

    tipo: {
        type:DataTypes.ENUM("GENERAL" , 'REDUCIDO'),
        allowNull:false,
    },

    precio:{
        type:DataTypes.FLOAT,
        allowNull:false,

    }


},
{

    tableName :'billetes',
    Timestamps:true,
}
)

module.exports = Billete;
