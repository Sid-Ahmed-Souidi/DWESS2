//Crear conductor 
const Billete = require('../modelo/mBillete');
const Conductor = require('../modelo/mConductor');
const Linea = require('../modelo/mLinea');

async function venderBillete(req ,res) {

    try {

        if(!req.body.conductor_id || !req.body.linea_id || !req.body.tipo || !req.body.precio ){
            throw 'No hay parametros suficientes para crear Billete'
        }
        else{

            const c = await Conductor.findByPk(req.body.conductor_id);
            if(!c){
                throw 'El conductor no existe'
            }

            const l = await Linea.findByPk(req.body.linea_id);

            if(!l){
                throw 'La linea no existe'
            }

            const fecha= new Date();
            const b = await Billete.create({
                conductor_id:c.id,
                linea_id:l.id,
                fecha:fecha.toISOString().split('T')[0],
                hora:fecha.toISOString().split('T')[1].split('.')[0],
                tipo:req.body.tipo,
                precio:req.body.precio
                });
                res.status(200).send(b);

        }
        
    } catch (error) {
        res.status(500).send({textoError:error});
    }
}




async function billetesConductor(req ,res) {
    try {
    if(!req.body.fecha || !req.params.id){
        throw 'no se han pasado los parametros necesarios'
    }

    else {
        const c = Conductor.findByPk(req.params.id);
        if(!c){
            throw 'El conductor no existe';
        }

            const b =await Billete.findAll({ 
                attributes:['id' , 'tipo', 'precio'],
                where:{conductor_id:req.params.id,
                    fecha:req.body.fecha},
                include:[
                    {model:Linea,attributes:['nombre']},
                    {model:Conductor,attributes:['nombreApe']}]
            });
            res.status(200).send(b);
            console.log("Billetes encontrados:", b);

        
    }
        
    } catch (error) {
        res.status(500).send('Error:'+error);

    }


    
}







module.exports = {
    venderBillete,
    billetesConductor
}