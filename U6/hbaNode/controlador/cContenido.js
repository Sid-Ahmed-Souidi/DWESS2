const Contenido = require('../modelos/mContenido');
const Reproduccion = require('../modelos/mReproduccion');
const Cliente = require('../modelos/mCliente');

//Obtendra todos los datos de todos los contenidos 
async function obtenerContenido(req ,res) {
    try {
        const contenidos = await Contenido.findAll();
        if(contenidos.length==0){
            throw 'No hay contenidos';
        }
        console.log("Contenidos encontrados:", contenidos);
        res.status(200).json(contenidos);

    } catch (error) {
        res.status(500).send('Error:'+error);
    }
}

//obtener reproducciones de un cliente 
async function reproducirContenido(req ,res) {
    try {
    if(!req.body.email || !req.params.id){
        throw 'No se han pasado los paramatros';   
    }
    else{
        const cliente = await Cliente.findOne({where:{email:req.body.email}});
        if(!cliente){
            throw 'El cliente no se ha encontrado';   
        }
        const contenido = await Contenido.findByPk(req.params.id);
        if(!contenido){
            throw 'El contenido no se ha encontrado';   
        }
        const r = await Reproduccion.create({
            cliente_id:cliente.id,
            contenido_id:contenido.id,
            fechaIR:new Date()
        });
        res.json(r);
    }
} catch (error) {
    res.status(500).send({textoError:error});
}

}






module.exports = {
    obtenerContenido,
    reproducirContenido
}