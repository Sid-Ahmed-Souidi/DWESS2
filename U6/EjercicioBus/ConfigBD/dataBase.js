//importar libreria de orm
const Sequelize = require("sequelize");
//configracion de la base de datos

const bd = new Sequelize('busClase', 'root', 'root',
    {
        host: 'localhost',
        port: '3306',
        dialect: 'mysql',
        dialectModule: require('mysql2')
    }
);

module.exports = bd;
