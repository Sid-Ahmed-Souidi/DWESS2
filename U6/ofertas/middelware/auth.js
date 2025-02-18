//Cargar configuracion jwt 
const servicioJWT = require('../servive/jwt');

//implementar funcion del middelware
function comprobarAuth(req, res,next){
    try{
        //comprobar que la peticion trae el token 
        if(!req.headers.authorization){
            return res.status(403).send('No se envia el token');
        }
        const resultado = servicioJWT.verificarToken(req.headers.authorization);
        console.log(resultado);
        //Añadimos a los datos de peticion (req) el payload
        req.datosUS =resultado;
        next();
    }catch (error){
        return res.status(500).send(error);
    }

}
module.exports ={
    comprobarAuth
};



