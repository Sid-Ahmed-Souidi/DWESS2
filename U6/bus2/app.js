const express = require('express');

const app = express();


app.use(express.json());


const rutaCli = require('./routes/rBillete');
const rutaR = require('./routes/rConductor');
const rutaCon = require('./routes/rLinea');


app.use('/api' , rutaCli)
app.use('/api' , rutaR)
app.use('/api' , rutaCon)




module.exports = app;