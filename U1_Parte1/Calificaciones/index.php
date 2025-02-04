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
        <label for="asignatura">Selecciona Asignatura</label>
        <select  id="asignatura" name="asignatura">
            <option value="DWES">DWES</option>
            <option value="DIW">DIW</option>
            <option value="FOL">FOL</option>
            <option value="DES">DES</option>
        </select>

   </div>

   <div>

        <label for="nota">Nota</label>
        <input type="number" id="nota" name="nota" step="0.01"   max=10 min=0/>
   </div>
   <div>
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value=""/>
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
            echo '<h3 style="color:red;">Error ya existe un contacto con ese tlf'.$persona->getNombre().'<h3/>';
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