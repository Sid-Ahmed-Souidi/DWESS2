//Extrae DataTypes del paquete sequelize
const {DataTypes} = require('sequelize');
//Carga la configuracion de la BD
const bd = require('../configBD/database');

const Reserva = bd.define('Reserva' ,{

    id:{
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true,

    },
    viaje_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'viajes',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },
    fechaSalida:{
        type: DataTypes.DATEONLY,
        allowNull:false,
    },

    nombreCliente:{
        type: DataTypes.STRING,
        allowNull:false,
    },


    numPersonas:{
        type: DataTypes.INTEGER,
        allowNull:false,
    },

    totalViaje:{
        type: DataTypes.FLOAT,
        allowNull:false,
    },

    anulada:{
        type: DataTypes.BOOLEAN,
        allowNull:false,
    },

},
{

    tableName :'reservas',
    Timestamps:true,
}
)

module.exports = Reserva;
