<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
<fieldset>
    <legend>Registrar Trabajo</legend>

<div>
<label for="fecha">Fecha Entrada</label>
<input type="date" id="fecha" name="fecha" value="<?php echo (isset($_POST['fecha'])?$_POST['fecha']:date('Y-m-d') )?>">
</div>

<div>
<label for="nombre">Cliente</label>
<input type="text" id="nombre" name="nombre" value="<?php echo (isset($_POST['nombre'])?$_POST['nombre']: '')  ?>" placeholder="nombre cliente">
</div><br>

<div>
<label for="tipo">Tipo</label><br>
    <select name="tipo" id="tipo">
        <option <?php echo (isset($_POST['tipo'])&& $_POST['tipo']=='Fiesta'?'selected="selected"':'')?>>Fiesta</option>
        <option <?php echo (isset($_POST['tipo'])&& $_POST['tipo']=='Cuero'?'selected="selected"':'')?> >Cuero</option>
        <option <?php echo (isset($_POST['tipo'])&& $_POST['tipo']=='Hogar'?'selected="selected"':'')?>>Hogar</option>
        <option <?php echo (!isset($_POST['tipo'])|| isset($_POST['tipo'])&& $_POST['tipo']=='Textil'?'selected="selected"':'')?> >Textil</option>
    </select><br>
</div>


<div>
    <label>Servicios</label>
    <input type="checkbox" id="limpieza" name="servicios[]" value="limpieza">
    <label for="limpieza">limpieza</label>
    <input type="checkbox" id="planchado" name="servicios[]" value="planchado">
    <label for="planchado">Planchado</label>
    <input type="checkbox" id="desmanchado" name="servicios[]" value="desmanchado">
    <label for="desmanchado">desmanchado</label><br>

    <div><label for="importe">importe</label>
    <input type="number" id="importe"  name="importe" value="<?php echo (isset($_POST['importe'])?$_POST['importe']:1)?>"/>
</div><br>


<input type="submit" value="guardar" name="guardar"/>




</div>

</form>

<?php

if(isset($_POST['guardar'])){
    if(empty($_POST['fecha'])  ||empty($_POST['tipo']) ||empty($_POST['nombre']) || empty($_POST['importe'])){

        echo "rellena los campos fecha o tipo o nombre o importe";
        $error=true;

        //comprobamos si la array viene y que si tiene almenos un servicio
    }if(!isset($_POST['servicios']) or sizeof($_POST['servicios'])<1){
        echo 'Al menos debes marcar un servicio';
        $error=true;


    

    }if(isset($_POST["tipo"]) and $_POST['tipo']=="Cuero" and isset($_POST['servicios'])){
        //se puede hacer con el inarray in_array('Planchado' ,$post['servicios'])
        foreach($_POST['servicios']as $s){
            if($s=='planchado'){
                echo 'No puedes seleccionar Cuero y planchado';
                $error=true;

                break;
            }
        }

    }
    if(isset($_POST['tipo']) and $_POST['tipo']=='Fiesta' and isset($_POST['importe']) and $_POST['importe']>50){
        echo 'importe en prendas de fiesta debe ser > 50';
        $error=true;
    }

    if(!isset($error)){
        echo '<h2>DAtos Correctos</h2>';
        echo '<h3>Prenda : '.$_POST['tipo'].'</h3>';
        echo '<h3>Servicio : '.implode('/',$_POST['servicios']).'</h3>';

    }


}




?>


</fieldset>

    
</body>
</html>