//Crear conductor 

const Conductor  = require("../modelo/mConductor");
const Billete  = require("../modelo/mBillete");
const Linea  = require("../modelo/mLinea");

async function crearConductor(req ,res) {

    try {
        if(!req.body.nombre || !req.body.dni || !req.body.telefono){
            throw 'No se pasan los parametros';
        }
        else{
            const conductor = await Conductor.findOne({where:{dni:req.body.dni}});
            if(conductor){
                throw 'Ya existe un conductor con ese dni';
            }
            else{
                const c = await Conductor.create({
                nombreApe:req.body.nombre,
                dni:req.body.dni,
                telefono:req.body.telefono,
                fechaContrato: new Date()
                });
                res.json(c);
            }
        }
    } catch (error) {
        res.status(500).send({textoError:error});

    }
    
}







module.exports = {
    crearConductor
}