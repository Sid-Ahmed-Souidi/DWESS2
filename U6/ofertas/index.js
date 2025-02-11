//Importar Aplicación app.js
const app = require('./app')

//Puerto de escucha del servidor

//cArgar dotenv para trabajar con variables .env
const dotenv = require('dotenv')
dotenv.config();

//llamamos el puerto que esta definido en .env
const puerto=process.env.APP_PORT;

//Cargar configuracion de BD

const {bd ,Usuario} =require('./Models/index');


//Conectar con la bd 

bd.sync(
    {
    force:true, //Cmbiar a false cuando ek esquema de bd sea definitivo
})
.then(()=>{
    console.log('BD base de datos conectada');
    //Lanzar aplicación
    app.listen(puerto,()=>{
    console.log('Aplicación lanzada en http://localhost:3000')
})


})
.catch((error)=>{
    console.log('Error al conectar la BD',error);
})

