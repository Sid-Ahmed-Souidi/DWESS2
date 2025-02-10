//importamos express
const express = require('express');

//inicializamos express

const app = express();


//Importar rutas 

const rutaU = require('./routes/usuarioR')
const rutaO = require('./routes/ofertaR')

//Asignar url base a las aplicacion

app.use('/api',rutaU);
app.use('/api',rutaO);


//exportar app para cargarla 
module.exports=app;