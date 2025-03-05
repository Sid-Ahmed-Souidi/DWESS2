const Cliente = require('../modelos/mCliente');
const Reproduccion = require('../modelos/mReproduccion');
const Contenido = require('../modelos/mContenido');

//crear Cliente

async function crearCliente(req , res) {
try {
    
    if(!req.body.email || !req.body.nombre){
        throw 'No se han pasado los paramatros';    
    }

    const cliente = await Cliente.findOne({where:{email:req.body.email}});
    if(cliente){
        throw 'este cliente ya exite';
    }
    else{

    const c = await Cliente.create({
        nombre:req.body.nombre,
        email:req.body.email,
        fechaAlta: new Date()
    })
    res.json(c);
}
} catch (error) {
    res.status(500).send({textoError:error});

}

}


async function obtenerReproCliente(req , res) {

    try {

        if(!req.body.email){
            throw 'No se ha pasado el email'
        }

        const cliente = await Cliente.findOne({where:{email:req.body.email}});
        if(!cliente){
            throw 'Error : el cliente no existe'
        }

        const r =await Reproduccion.findOne({ 
            attributes:['fechaIR'],
            where:{cliente_id:cliente.id},
            include:[
                {model:Contenido,attributes:['tipo']},
                {model:Contenido,attributes:['tituloC']}]
        });
        res.status(200).send(r);
        console.log("Reproducciones encontrados:", r);


    } catch (error) {
        res.status(500).send('Error:'+error);

    }
}











module.exports = {
    crearCliente,
 obtenerReproCliente
    
}