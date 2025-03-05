//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cContenido = require('../controlador/cContenido');

//Crear rutas
api.get('/contenido',cContenido.obtenerContenido)

api.post('/contenido/:id',cContenido.reproducirContenido)

module.exports = api;