//importar Express
const express = require('express')

//iniciar sistema de ruta
const api = express.Router();

//importar controlador 
const cReserva = require('../controlador/cReserva');

//crear rutas

api.get('/reserva/:id',cReserva.reservasViaje)
api.post('/reserva/:id',cReserva.crearReserva)
api.post('/anularReserva/:id',cReserva.anularReserva)


//Exportamos API

module.exports = api;