//Importar libreria de tipos de datos de sequelize

const { DataTypes } = require('sequelize')

//Importar configuracion BD

const bd = require('../config/database');

const Usuario = bd.define('Oferta', 

    {
        id:{
            type:DataTypes.INTEGER,
            autoIncrement:true,
            primaryKey:true
        },
        titulo:{
            type:DataTypes.STRING,
            allowNull:false

        },
        descripcion:{
            type:DataTypes.STRING,
            allowNull:false

        },
        usuari_id:{
            type:DataTypes.INTEGER,
            allowNull:false,
            references:{
                model:'usuarios',
                key:'id'
            },
            onUpdate :'CASCADE',
            onDelete 'RESTRICT'

        },


    },



    {
        tablename: 'usuarios',
        timestamps: true
    }
);

module.exports = Usuario;