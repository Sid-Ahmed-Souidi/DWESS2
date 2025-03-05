//importa Express

const app = require('./app');
//llamamos directamente al index de modelos y llamamos sus recursos

const {bd, Billete, Conductor , Linea} = require('./modelo/index')


bd.sync({ force: false }).then(() => {
    console.log("conexion establecida broko funciona de lujo")
    app.listen('3000', () => {
        console.log("jgdg http://localhost:3000");
    });

})

.catch((err) => {
    console.log("Erro al concatenar con la bd", err);
});


