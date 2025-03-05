//Crear conductor 
const Conductor  = require("../modelo/mConductor");
const Billete  = require("../modelo/mBillete");
const Linea  = require("../modelo/mLinea");
const bd = require('../configBD/database');

async function obtenerRecudacion(req ,res) {
    
    try {
        if(!req.body.fecha || !req.params.id){
            throw 'parametros no encontrasdos'

        }else{
            const l = await Linea.findByPk(req.params.id);
            if(!l){
                throw 'La linea no existe';
            }else{

                const billetes =await Billete.findAll({
                    where:{linea_id:req.params.id ,fecha:req.body.fecha}

                });
               let  importeTotal = 0;
               
               billetes.forEach((billete, indice)=> {
                importeTotal += billete.precio;
                
               });
               res.status(200).send({total:importeTotal});

            }
        }

    } catch (error) {
                 res.status(500).send('Error:'+error);

    }


    
}




async function borrarLinea(req ,res) {

try {

    if(!req.params.id){
        throw 'Error no se ha pasado los parametros necesarios'
    }

    const l = Linea.findByPk(req.params.id);

    if(!l){
        throw 'Error la linea no existe';
    }

    const billetes = await Billete.findAll({
        where:{linea_id:req.params.id}
    })
    console.log(billetes)
    if(billetes.length===0){
        await Linea.destroy({where:{id:req.params.id}})
        res.status(200).send({mensaje:'Linea borrada'});

    }else{
        const t = await bd.transaction();
        try {
            await Billete.destroy({where:{linea_id:req.params.id} , transaction:t })
            await Linea.destroy({where:{id:req.params.id} , transaction:t })
            await t.commit();
            res.status(200).send({mensaje:'Linea y billetes borrados '});

            
        } catch (error) {
            await t.rollback();
            res.status(500).send('Error:'+error);
        }

    }
    
} catch (error) {
    res.status(500).send('Error:'+error);

}



    
}







module.exports = {
    obtenerRecudacion,
    borrarLinea
}