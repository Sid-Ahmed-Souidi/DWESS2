const { DataTypes } = require('sequelize');
const bd = require('../ConfigBD/dataBase');
const Conductor = require('./Mconductor');
const lineas = require('./Mlinea');

const Billete = bd.define('Billete', {
    id: {
        type: DataTypes.INTEGER,
        primaryKey: true,
        autoIncrement: true
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

    lineas_id: {
        type: DataTypes.INTEGER,
        allowNull: false,
        references: {
            model: 'lineas',
            key: "id",
        },
        onUpdate: "CASCADE",
        onDelete: "restrict",
    },
    fecha: {
        type: DataTypes.DATE,
        allowNul: false,
    },
    hora: {
        type: DataTypes.TIME,
        allowNul: false,
    },
    precio: {
        type: DataTypes.FLOAT,
        allowNul: false,
    },
    tipo: {
        type: DataTypes.ENUM('GENERAL', 'REDUCIDO'),
        allowNul: false,
    },



},
    {
        tableName: 'billetes',
        timestamps: true,
    }

)

module.exports = Billete;