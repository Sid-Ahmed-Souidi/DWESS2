const express = require('express');

const rutas = express.Router();

const linea = require('../Controlador/Clinea');
rutas.delete('/linea', linea.destroy);
rutas.get('/linea/:id', linea.obtenerRecaudacion);

module.exports = rutas;