//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Reproduccion = bd.define('Reproduccion' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },

    cliente_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'clientes',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },

    contenido_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'contenidos',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },


    fechaIR:{
        type: DataTypes.DATEONLY,
        allowNull:false,
    },


},
{

    tableName :'reproduccions',
    Timestamps:true,
}
)

module.exports = Reproduccion;
