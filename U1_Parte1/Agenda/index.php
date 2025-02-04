<?php

require_once 'Modelo.php';


// Aqui pasamos el fichero que vamos a utilizar para introducir los datos
$modelo = new Modelo('agenda.dat');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <form action="#" method="post" enctype="multipart/form-data">
   <div>
        <label for="nombre">Nombre</label>
        <!--Aqui el usuario esta comprobando si se ha enviado el campo nombre y no es null -->
        <input type="text" id="nombre" name="nombre" value="<?php echo (isset($_POST['nombre'])?$_POST['nombre']:'')?>"/>
   </div>

   <div>
        <label for="telf">Telefono</label>
        <input type="text" id="telf" name="telf" pattern="[0-9]{9}" value="<?php echo (isset($_POST['telf'])?$_POST['telf']:'')?>"/>
   </div>

   <div>
        <label >Tipo</label><br/>
        <label for="amigo">Amigo</label>
        <!--el checked == a checked es que el campo marcado por defecto es amigo -->
        <input type="radio" id="amigo" name="tipo" value="Amigo" checked="checked"/>
        <label for="familia">Familia</label>
         <!--El isset comprueba si esta enviado y si el campo tipo es igual a familia
         y si ambas condiciones son verdaderas se imprime checked -->
        <input type="radio" id="familia" name="tipo" value="Familia"
        <?php echo (isset($_POST['tipo']) &&  $_POST['tipo'] == 'Familia'?'checked':'');  ?>/>
        <label for="otros">Otros</label>
         <!--El isset comprueba si esta enviado y si el campo tipo es igual a Otros y si ambas condiciones son verdaderas se imprime checked-->
        <input type="radio" id="otros" name="tipo" value="Otros"
        <?php echo (isset($_POST['tipo']) &&  $_POST['tipo'] == 'Otros'?'checked':'');  ?>/>


    
   </div>
   <div>

    <label for="foto">Foto</label>
    <input type="file" id="foto" name="foto" />
   </div>

     <input type="submit" value="Crear" name="crear">
      

   </form>
    <?php
    if(isset($_POST['crear'])){
        if(empty($_POST['nombre']) || empty($_POST['telf']) || empty($_FILES['foto']['name']) || empty($_POST['tipo'])){
            echo '<h3 style="color:red;">Error , hay campos vacios</h3>';

        }else{

            //chequear si ya hay un contacto en para el telefono 
            $persona = $modelo->obtenerContacto($_POST['telf']);
            //persona tiene null si no hay contacto y un objeto contacto 
            //con todos los datos si hay contacto 


            if($persona==null){
            $id = $modelo->obtenerID();

            //nombre del fichero sera el instante de tiempo 
            //en el que se sube y el nombre original.
            //se guardaran en la carpeta img
            //files se utiliza para archivos 
            $nombref='img/' . time().$_FILES['foto']['name'];
            $c=new contacto($id,$_POST['nombre'],$_POST['telf'],$_POST['tipo'],$nombref);
            //guardar el contacto en el fichero
            $modelo->crearContacto($c);

            //guardar foto en el servidor '
            $destino = $nombref;
            $origen = $_FILES['foto']['tmp_name'];
            move_uploaded_file($origen,$destino);
          //  private $id,$nombre,$telefono,$tipo,$foto;

        }
        else{
            echo '<h3 style="color:red;">Error ya existe un contacto con ese tlf'.$persona->getNombre().'</h3>';
        }
    }
       
        }
        echo '<h3>Contactos<h3>';
        echo '<table border="1px">';
         echo '<tr>
         <th>Id</th><th>Nombre</th><th>Telefono</th><th>tipo</th></tr>';
        //ceramos una arry y lo rellenamos con todos los productos del fichero 
        $contactos =$modelo->obtenerContactos();
        foreach($contactos as $c){
            
            echo'<tr>';
            echo'<td>'.$c->getId().'</td>';
            echo'<td>'.$c->getNombre().'</td>';
            echo'<td>'.$c->getTelefono().'</td>';
            echo'<td>'.$c->getTipo().'</td>';
            echo'<td><img src="'.$c->getFoto().'"width="100px"/></td>';

            echo'</tr>';


        }
            echo '</table>';


    ?>

</body>
</html>