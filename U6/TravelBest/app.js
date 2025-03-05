const express = require('express');

const app = express();


app.use(express.json());


const rutaC = require('./routes/rReserva');
const rutaL = require('./routes/rViaje');


app.use('/api' , rutaC)
app.use('/api' , rutaL)




module.exports = app;