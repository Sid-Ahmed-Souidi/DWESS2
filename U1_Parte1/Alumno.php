<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <div>
            <label for="nombre">Nombre</label> </br>
            <input type="text" id="nombre" name="nombre">
        </div>

        <div>
            <label for="curso">Curso</label> </br>
            <select name="curso"  id="curso">
                <option value ="Primero DAM"> 1ª DAW</option>
                <option selected ="selected"> 1ª DAW</option>
                <option > 1ª DAW</option>
                <option > 2ª DAW</option>

            </select>

        </div>
        <div>
            <label for="asig">Asignaturas</label> </br>
            <select  name="asig[]" id="asig"  multiple="multiple">
                <option value ="Primero DAM"> 1ª DAW</option>
                <option selected ="selected"> 1ª DAW</option>
                <option > DWES</option>
                <option > DIC</option>
                <option > PROG</option>
                <option > BD</option>
            </select>


        </div>
        <div>
        
            <label >Sexo</label></br>
            <label for="hombre">hombre</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" checked="checked"/>
            <label for="mujer">Mujer</label>
            <input type="radio" id="mujer" name="sexo" value="mujer"/>
        </div>


        <div>
        
        <label >Otros</label></br>
        <label for="becaM">Beca MEC</label>
        <input type="checkbox" id="becaM" name="otros[]" value="Beca MEC">
        <label for="transporte">transporte</label>
        <input type="checkbox" id="transporte" name="otros[]" value="Trasporte">
        <label for="delegado">Delegado</label>  
        <input type="checkbox" id="delegado" name="otros[]" value="Delegado">

    </div>

    <input type="submit" name="enviar" value="Enviar">
    <input type="reset" value="Cancelar">

    </form>
    <?php 
        if(isset($_POST['enviar'])){
            echo"Nombre:" .$_POST['nombre'];
            echo"Curso:" .$_POST['curso'];
            echo"<br/> Asignaturas:"; 
            //Hay que chequear si se ha marcado alguna asignatura
            if(isset($_POST['asig'])){
                foreach($_POST['asig']as $a){
                    echo $a.'';
                }

            }
            //chequear si hay sexo seleccionado
            if(isset($_POST['sexo']))
            echo"<br/> Sexo:".$_POST['sexo'];
            echo"<br/>Otros:";

            if(isset($_POST['otros'])){
                foreach($_POST['otros']as $o){
                    echo $o.' ';
                }
            }

            }   


    ?>
</body>
</html>