const express = require('express');

const rutas = express.Router();

const conductor = require('../Controlador/Cconductor');
rutas.post('/conductor', conductor.store);
rutas.get('/conductor/:id', conductor.obtenerBilletes);

module.exports = rutas;