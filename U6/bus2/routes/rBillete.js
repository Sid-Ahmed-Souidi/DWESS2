//importar express

const express = require('express');

//iniciar sistema rutas

const api = express.Router();

//importar controlador 
const cBillete = require('../controlador/cBillete');

//Crear rutas
api.post('/billete',cBillete.venderBillete)

api.get('/billete/:id',cBillete.billetesConductor)

module.exports = api;