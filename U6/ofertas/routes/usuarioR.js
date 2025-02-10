//cargar libreria de Express 

const express = require('express');


//Inicializar el sistema de rutas

const api = express.Router();


//importamos el conrtrolador donde se definen llas fuinciones
//asignadass

const controlador = require('../controllers/usuarioC')

//Creamos rutas

api.post('/login',controlador.login)
api.post('/registro',controlador.registro)


module.exports = api;