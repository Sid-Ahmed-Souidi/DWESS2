<?php


require_once 'Modelo.php';

$modelo = new Modelo();

//CArgar asignaturas en un array
$asigs=$modelo->obtenerAsignaturas();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Mis notas de examenes y tareas 2ª DAW</h1>

    <form action="" method="post">
    <div>

    <label for="asig">Asignatura</label></br>
    <select name="asig" id="asig">
       <!--Hacer unoption para cada asignatura-->
       <?php
       foreach ($asigs as $asignatura){
        echo '<option>'.$asignatura.'</option>';

       }

        

       ?>
    </select>
    </div>

    <div>
    <label for="fecha">fecha</label></br>
    <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>"/>

    </div>

    <div>

        <label for="descripcion">Descripcion</label></br>
        <input type="text" name="desc" id="desc" placeholder="Examen tema 1">
    </div>


    <div>

    <label >Tipo</label>
    <input type="radio" name="tipo" id="ex" value="Examen" checked="checked"/>
    <label for="ex">Examen</label>
    <input type="radio" name="tipo" id="ta" value="Tarea" checked="checked"/>
    <label for="ta">Tarea</label>
    </div>


    <div>

    <label for="nota">Nota</label></br>
    <input type="number" name="nota" id="nota" placeholder="Nota"/>
    </div>



    <input type="submit" value="Enviar" name="enviar">

    <?php




            if(isset($_POST['enviar'])){
                if(empty($_POST['fecha']) || empty($_POST['asig']) || empty($_POST['desc']) || empty($_POST['nota']) || empty($_POST['tipo'])){

                    echo '<h3 style="color:red;">Error , hay campos vacios</h3>';

                }else{

                    $n=new Nota($_POST['asig'],$_POST['fecha'],$_POST['desc'],$_POST['nota'],$_POST['tipo']);
                    $modelo->crearNota($n);
                }

            }


            echo '<h3>Notas<h3>';
            echo '<table border="1px">';
             echo '<tr>
             <th>Asignatura</th><th>Fecha</th><th>Descripcion</th><th>Nota</th><th></th></tr>';
            //ceramos una arry y lo rellenamos con todos los productos del fichero 
            $notas =$modelo->obtenerNotas();
            foreach($notas as $n){
                
                echo'<tr>';
                echo'<td>'.$n->getAsig().'</td>';
                echo'<td>'. date('d-m-Y',strtotime($n->getFecha())).'</td>';
                echo'<td>'.$n->getDesc().'</td>';
                echo'<td>'.$n->getNota().'</td>';
                echo'<td>'.$n->getTipo().'</td>';
    
                echo'</tr>';
    
    
            }
                echo '</table>';
    
    











    ?>

   
   
   



    </form>


    
</body>
</html>