const express = require('express');

const rutas = express.Router();

const billete = require('../Controlador/Cbillete');
rutas.post('/billete', billete.store);

module.exports = rutas;