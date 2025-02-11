const dotenv = require('dotenv');
dotenv.config();

//importa libreria de ORM 

const sequelize =require('sequelize');

//CONFIGURAR datos de conexion con la BD;

const configBD = new sequelize(process.env.DB_NAME,process.env.DB_USER,
    process.env.DB_PASSWORD,
    {
        host:process.env.DB_HOST,
        port:process.env.DB_PORT,
        dialect:process.env.DB_DIALECT,
        dialectModule:require('mysql2')


    }

)

module.exports=configBD;