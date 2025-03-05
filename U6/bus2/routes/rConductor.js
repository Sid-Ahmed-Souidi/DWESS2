//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cConductor = require('../controlador/cConductor');

//Crear rutas
api.post('/conductor',cConductor.crearConductor)


module.exports = api;