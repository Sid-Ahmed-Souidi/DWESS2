const express = require('express');

const app = express();

const rutaC = require('./Ruta/Rconductor')
const rutaL = require('./Ruta/Rlinea')
const rutaB = require('./Ruta/Rbillete')

app.use('api', rutaC)
app.use('api', rutaL)
app.use('api', rutaB)

module.exports = app