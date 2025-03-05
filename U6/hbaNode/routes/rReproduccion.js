//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cReproduccion = require('../controlador/cReproduccion');

//Crear rutas
api.post('/reproduccion',cReproduccion.reproducirContenido)


module.exports = api;