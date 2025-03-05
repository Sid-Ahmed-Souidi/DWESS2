//crear Conductor 
const Conductor = require('../modelos/Mconductor');
const Billete = require('../modelos/Mbillete');
const Linea = require('../modelos/Mlinea');
const { Op } = require("sequelize");

async function store(req,res) {
    try {
        console.log("Datos recibidos:", req.body); 

        if (!req.body.nombreApe || !req.body.dni || !req.body.telefono) {
            throw 'Faltan datos para la creacion del conductor';
        } 
         // Comprobar que el usuario existe
          const conductor = await Conductor.findOne({where:{dni:req.body.dni}});
         if(conductor){
          throw 'El conductor ya existe';
        }
         else{
            const o = await Conductor.create({
                nombreApe: req.body.nombreApe,
                dni: req.body.dni,
                telefono: req.body.telefono,
                fechaContrato: new Date()
            });
            res.json(o);
         }
    } catch (error) {
        res.status(500).send({textoError:error});
    }
}

async function obtenerBilletes(req,res) {
    try {
        if(!req.body.fecha || !req.params.id){
            throw 'La fecha o el id no se esta pasando por parametros ';
        }else{
           //  const conductor = await Conductor.findOne({where:{id:req.params.id}});
            const c = await Conductor.findByPk(req.params.id);
            if(!c){
                throw 'El conductor no existe ';
            }
            // const fechaInicio = new Date(req.body.fecha);
            // fechaInicio.setHours(0, 0, 0, 0);  // Inicio del día
            
            // const fechaFin = new Date(req.body.fecha);
            // fechaFin.setHours(23, 59, 59, 999);  // Fin del día
            
                    const b = await Billete.findAll({
                        attributes:['id', 'tipo', 'precio'],
                            where:{conductor_id:req.params.id  , 
                                fecha:req.body.fecha // Busca entre las 00:00 y 23:59


                            },
                            include:[
                                {model:Linea, attributes:['nombre']},
                                {model:Conductor, attributes:['nombreApe']}]
                    });
                    res.status(200).send(b);
                    console.log("Billetes encontrados:", b);

        }
        } catch (error) {
            res.status(500).send('Error:'+error);
    }
}

module.exports = {
    store,
    obtenerBilletes
}