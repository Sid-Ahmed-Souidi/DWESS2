<?php

require_once 'Modelo.php';


session_start();
$bd=new Modelo();


if($bd->getConexion()==null){
    echo 'No hay conexion';
}

$mod = $bd->obtenerModalidades();

if(isset($_POST['selModalidad'])){
    if(!empty($_POST['modalidad'])){
        //aqui sacamos la modalidad y la almacenamos en el session['mod']
        $m=$bd->obtenerModalidad($_POST['modalidad']);
        if($m!=null){
            
            $_SESSION['mod']=$m;
        }else{
            $error= 'Error de optencion de modalidad';
        }
    }
}




if(isset($_POST['selAlumno'])){
    if(!empty($_POST['alumno'])){
        $_SESSION['alumno'] =$bd->obtenerModalidad($_POST['modalidad']);
        if($a!=null){
            $_SESSION['mod']=$a;
        }else{
            $error= 'Error de optencion de modalidad';
        }
    }
}
?>