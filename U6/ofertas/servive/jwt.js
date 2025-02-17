const jwt = require('jsonwebtoken');

//importar dontenv
const dontenv = require('dotenv');
dontenv.config();

//Funcion crear token 

function crearToken(usuario, caducidad){

    try{
            //Obtener datos de usuario que van en el token
    //Esto es el payload 
    const {id,email}= usuario;
    
    //Crear el payload 
    const payload = {id,email};
    //generar y devolver el token 
    return jwt.sign(payload,process.env.CLAVE_JWT,{expiresIn:caducidad})

    }catch(error){
        throw `Error al generar el token:${error}`;
    }

}

//funcion verificar token 
//verifica la firma y la caducidad 
function verificarToken(token){


    try{
    const datosVerificacion = jwt.verify(token,process.env.CLAVE_JWT);
    return datosVerificacion;
     }catch(error){
      throw `Error al generar el token:${error}`;
    }

}

module.exports = {
    crearToken,
    verificarToken

}