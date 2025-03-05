//crear Conductor 
const Conductor = require('../modelos/Mconductor');
const Billete = require('../modelos/Mbillete');
const Linea = require('../modelos/Mlinea');
//vender billete es decir crear billete
async function store(req, res) {
    try {
        console.log("Datos recibidos:", req.body); 
        // "conductor_id": 1,
        // "linea_id": 1,
        // "tipo": "GENERADO",
        // "precio": 20
        if (!req.body.linea_id || !req.body.conductor_id || !req.body.precio || !req.body.tipo) {
            throw 'Faltan datos para la creacion del billete';
        } 
         // Comprobar que el conductor existe
          const conductor = await Conductor.findOne({where:{id:req.body.conductor_id}});
          //comprobar que la linea existe 
          const linea = await Linea.findOne({where:{id:req.body.linea_id}});

         if(!conductor && !linea){
          throw 'El conductor o la linea no existe';
        }
         else{
            const fecha = new Date();
            const o = await Billete.create({
                conductor_id: req.body.conductor_id,
                linea_id: req.body.linea_id,
                fecha: fecha.toISOString().split('T')[0],
                hora: fecha.toISOString().split('T')[1].split('.')[0],
                tipo:req.body.tipo,
                precio:req.body.precio,

            });
            res.json(o);
         }
    } catch (error) {
        res.status(500).send({textoError:error});
    }



    
}



module.exports = {
    store,
}