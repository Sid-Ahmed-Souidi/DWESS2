//Importar libreria de tipos de datos de sequelize

const { DataTypes } = require('sequelize')

//Importar configuracion BD

const bd = require('../config/database');

const Usuario = bd.define('Usuario', {

    id: {
        type: DataTypes.INTEGER,
        autoincrement: true,
        primaryKey: true
    },
    nombre: {
        type: DataTypes.STRING,
        allowNull: false
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
        unique: true //Es clave alternativa 
    },
    password: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    perfil: {
        type: DataTypes.ENUM('tienda', 'ciudadano'),
        allowNull: false,
    },
    avatar: {
        type: DataTypes.STRING,
        allowNull: true,
    },
},
    {
        tablename: 'usuarios',
        timestamps: true



    }
);

module.exports = Usuario;