//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cCliente = require('../controlador/cCliente');

//Crear rutas
api.post('/cliente',cCliente.crearCliente)

api.post('/obtenerRCliente',cCliente.obtenerReproCliente)

module.exports = api;