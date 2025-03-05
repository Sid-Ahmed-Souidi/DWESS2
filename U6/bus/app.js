const express = require('express');

const app = express();


app.use(express.json());


const rutaC = require('./routes/rConductor');
const rutaL = require('./routes/rLinea');
const rutaB = require('./routes/rBillete');

app.use('/api' , rutaC)
app.use('/api' , rutaL)
app.use('/api' , rutaB)




module.exports = app;