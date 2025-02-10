//


//cargar libreria de Express 

const express = require('express');


//Inicializar el sistema de rutas

const api = express.Router();


//importamos el conrtrolador donde se definen llas fuinciones
//asignadass

const controlador = require('../controllers/ofertaC')

//Creamos rutasWW
api.get('/ofertas',controlador.index)
api.get('/oferta/:id',controlador.show) //se recupera el id
api.post('/oferta',controlador.store)
api.put('/oferta',controlador.update)
api.delete('/oferta',controlador.destroy)


module.exports = api;