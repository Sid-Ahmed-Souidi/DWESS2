//importar Express

const express = require('express')

//iniciar sistema de ruta
const api = express.Router();

//importar controlador 
const cBillete = require('../Controlador/cBillete')

//crear rutas

api.post('/billete',cBillete.store)

//Exportamos API

module.exports = api;