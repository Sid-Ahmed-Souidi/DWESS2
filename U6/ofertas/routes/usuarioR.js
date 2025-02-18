// Cargar librería de Express
const express = require('express');

//Inicializar el sistema de rutas
const api = express.Router();

//importar middelware

const mAuth = require('../middelware/auth')
const subirF = require('connect-multiparty')


//Importamos el controlador donde se definen las funciones asignadas
//a las rutas
const controlador = require('../controllers/usuarioC');

//Creamos rutas
api.post('/login',controlador.login);
api.post('/registro',controlador.registro);
api.put('/avatar',[mAuth.comprobarAuth ,subirF],controlador.subirAvatar);
api.get('/avatar',[mAuth.comprobarAuth ,subirF],controlador.obtenerAvatar);

//Exportamos las rutas de este fichero
module.exports = api;