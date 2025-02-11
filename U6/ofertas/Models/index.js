//Importar Sequelize

const {Sequelize} = require('sequelize');
//Importar configurarcion BD 

const bd = require('../config/database')


//importar el modelo de Usuario

const Usuario = require('./usuario');

//Definir relaziones

//Exportar conexion , modelos y relaciones 

module.exports = {
    bd,
    Usuario,
}