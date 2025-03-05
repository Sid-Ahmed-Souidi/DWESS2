//importar Express

const express = require('express')

//iniciar sistema de ruta
const api = express.Router();

//importar controlador 
const cConductor = require('../Controlador/cConductor')

//crear rutas

api.post('/conductor',cConductor.store)
api.get('/conductor/:id',cConductor.obtenerBilletes)

//Exportamos API

module.exports = api;