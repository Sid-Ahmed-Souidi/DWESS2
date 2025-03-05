const express = require('express');

const app = express();


app.use(express.json());


const rutaCli = require('./routes/rCliente');
const rutaR = require('./routes/rReproduccion');
const rutaCon = require('./routes/rContenido');


app.use('/api' , rutaCli)
app.use('/api' , rutaR)
app.use('/api' , rutaCon)




module.exports = app;