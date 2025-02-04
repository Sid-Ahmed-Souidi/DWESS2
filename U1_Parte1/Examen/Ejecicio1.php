




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E</title>
</head>
<body>

<form action="" method="post">


    <div>
    <label for="">Titulo de la Pelicula</label></br>
    <input type="text" name="titulo"/>
    </div>

    <div>
    <label for="">Fecha de registro</label></br>
    <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d') ?>"/></br>
    </div>


    <div>
    <label for="">Género</label></br>
        <select name="tipoG[]" id="tipoG" multiple="multiple" >
            <option  name="comedia">comedia</option>
            <option  name="drama" >drama</option>
            <option name="terror" >terror</option>
            <option name="aventura" >aventura</option>

        </select>

    </div>

    <div>
    <label for="">Tipo</label></br>
            <input type ="radio" name="tipoPS" checked="checked"  value="pelicula"/>Pelicula
            <input type ="radio" name="tipoPS"value="serie"/>Serie

    </div>

    <div>
    <label for="">Nª de Capitulos</label></br>
    <input type="text" name="capitulos"/>
    </div></br>

    <input type="submit" name="guardar" value="guardar"/>



</form>


<?php
//  if(empty($_POST['fecha']) || empty($_POST['asig']) || empty($_POST['desc']) || empty($_POST['nota']) || empty($_POST['tipo'])){


if(isset($_POST['guardar'])){
    if(empty($_POST['fecha']) || empty($_POST['titulo']) || empty($_POST['capitulos'])){
        echo '<h3 style="color:red;">Error , hay campos vacios</h3>';



    }elseif(isset($_POST['tipoPS']) && $_POST['tipoPS'] =='serie'  &&  $_POST['capitulos'] <=1 ){
        echo '<h3 style="color:red;">Error ,Si es tipo serie y el numero de capitulos debe ser mayor a 1</h3>';

    }

                // Verificamos que tipoG esté definido y sea un array
    //if (isset($_POST['tipoG']) && is_array($_POST['tipoG'])) { 
    $error=true;
    foreach($_POST['tipoG']as $s){
        if($s=='comedia' ||$s=='drama' || $s=='terror' || $s=='aventura'){
            $error=false;
            break;
        }
    }
    

    if($error){
        echo '<h3 style="color:red;">Error ,Al menos debe estar marcado un genero</h3>';
    }else{
        echo 'Datos Correctos </br>' ;
        echo '  La Pelicula: '.($_POST['titulo']).' </br>';
        echo 'Genero: '. implode('/',$_POST['tipoG']);



    }










        }




    







?>


    
</body>
</html>