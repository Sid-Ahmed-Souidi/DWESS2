//importar Express
const express = require('express')

//iniciar sistema de ruta
const api = express.Router();

//importar controlador 
const cViaje = require('../controlador/cViaje');

//crear rutas

api.get('/viaje',cViaje.viajes)



//Exportamos API

module.exports = api;