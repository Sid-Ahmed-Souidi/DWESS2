//importar libreria de orm

const Sequelize = require("sequelize");

const bd = new Sequelize('hbanode','root','root',
    {
        host:'localhost',
        port: '3308',
        dialect:'mysql',
        dialectModule: require('mysql2')
    }

);

module.exports = bd;