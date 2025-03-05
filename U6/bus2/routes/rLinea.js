//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cLinea = require('../controlador/cLinea');

//Crear rutas
api.get('/linea/:id',cLinea.obtenerRecudacion)
api.post('/borrarLinea/:id',cLinea.borrarLinea)


module.exports = api;