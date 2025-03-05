const app = require('./app')
const { bd, Conductor, Linea, Billete } = require('./Modelo/index');


bd.sync({ force: true }).then(() => {
    console.log("conexion establecida fiera, lo has hecho bien");
    app.listen('3000', () => {
        console.log("jgdg http://localhost:3000");
    });
})
    .catch((err) => {
        console.log("Erro al concatenar con la bd", err);
    });
