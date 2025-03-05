//importar Express

const express = require('express')

//iniciar sistema de ruta
const api = express.Router();

//importar controlador 
const cLinea = require('../Controlador/cLinea')

//crear rutas

api.get('/linea/:id',cLinea.obtenerLinea)
api.delete('/linea/:id',cLinea.destroy)



//Exportamos API
module.exports = api;