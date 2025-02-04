<?php


require_once 'AccesoDatos.php';

//creamos una distancia de accesp a los datos


$ad =  new AccesoDatos('ventas.txt');





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Agenda</h1>
    <form action="#" method="post">
    
    
    <div>
            <label for="tlf">
            Introduce el telefono:
            <input type="tel" name="tlf" id="tlf">
            </label>

    </div>
    <div>
    <label for="cantidad">cantidad</label>
    <input type="number" id="cantidad" name="cantidad" value="1">

    </div>

    <input type="submit" name="enviar" value="Añadir"/>
    </form>    

    <?php

        if(isset($_POST['enviar'])){
            $datosProducto= explode('-' , $_POST['producto']);
            $t = new Ticket($datosProducto[0],$datosProducto[1],$_POST['cantidad']);

            //introducir el ticket en la venta
            $ad->insertarProducto($t);



        }


        //recuperar lo que hay en el fichero y pintarlo en una tabla
        echo '<h3>Productos<h3>';
        echo '<table>';
        echo '<tr><th>Producto</th><th>Precio U</th><th>Cantidad</th><th>Total</th></tr>';
        //ceramos una arry y lo rellenamos con todos los productos del fichero 
        $productos =$ad->obtenerProductos();

            foreach($productos as $p){
                echo'<tr>';
                echo'<td>'.$p->getProducto().'</td>';
                echo'<td>'.$p->getPrecioU().'</td>';
                echo'<td>'.$p->getCantidad().'</td>';
                echo'<td>'.$p->getTotal().'</td>';

                echo'</tr>';
            }


        echo '</table>';
    ?>


</body>
</html>