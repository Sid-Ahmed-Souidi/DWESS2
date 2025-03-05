const Conductor = require('../modelos/Mconductor');
const Billete = require('../modelos/Mbillete');
const Linea = require('../modelos/Mlinea');
const bd = require('../configBD/dataBase');

//obtener recaudacion de linea 

async function obtenerLinea(req , res ) {
try {
        if(!req.body.fecha || !req.params.id){
         throw 'no se ha pasado la fecha ni el id';
         }
        else{
            const l = await Linea.findOne({where:{id:req.params.id}});
            if(!l){
                throw 'La linea no existe';
            }
                const billetes = await Billete.findAll({
                    attributes:['id', 'tipo', 'precio'],
                        where:{linea_id:req.params.id  , 
                            fecha:req.body.fecha // Busca entre las 00:00 y 23:59
                        },
                        include:[
                            {model:Linea, attributes:['nombre']},
                            {model:Conductor, attributes:['nombreApe']}]
                });

                let precioTotal = 0;
                billetes.forEach(billete => {
                 precioTotal += billete.precio;
                    
                });
                res.status(200).send({total:precioTotal});
            }

        }      catch (error) {
          res.status(500).send('Error:'+error);

 }
}


//borrar linea y si tiene liena los billetes
async function destroy(req , res) {
    try {
    if(!req.params.id){
        throw 'no se ha pasado ningun id';
    }

    const l = await Linea.findByPk(req.params.id,{include:Billete});
    if(!l){
        throw 'la linea no existe';

    }
    console.log(l)
    if(l.Billetes.length==0){
        await Linea.destroy({where:{id : req.params.id} });
        res.status(200).send({mensaje:'Linea borrada'});
    }
    else{
        const t = await bd.transaction();

        try {
            await Billete.destroy({where:{linea_id : req.params.id} , transaction:t});
            await Linea.destroy({where:{id : req.params.id} , transaction:t});
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
    obtenerLinea,
    destroy
}