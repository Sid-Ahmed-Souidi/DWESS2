<?php
require_once 'contacto.php';
class Modelo{

    private $nombre;

    function __construct($nombreF)
    {
    
        $this->nombre=$nombreF;

    }


    function crearContacto(contacto $c){

        try{

            //aqui abrimos el fichero 
            $f = fopen($this->nombre,'a+');
            fwrite($f,$c->getId().';'.$c->getNombre().';'.$c->getTelefono().';'.$c->getTipo().';'.$c->getFoto().PHP_EOL);


        }catch(Throwable $t){

            echo $t->getMessage();



        }finally{

            fclose($f);

        }


     }






     function obtenerContactos(){

        $resultado =array();
        try{

            if(file_exists($this->nombre)){
                $resgistros=file($this->nombre);
                foreach($resgistros as $linea){
                    $campos=explode(';',$linea);

                    $resultado[]=new contacto($campos[0],$campos[1],$campos[2],$campos[3],$campos[4]);
                }
            }
            

        }catch(Throwable $th){
            echo $th->getMessage();
        }



        return $resultado;

     }




function obtenerID(){

    $resultado=1;

    try{
    if(file_exists($this->nombre)){
        $resgistros=file($this->nombre);
            //el sizeof obtiene el tamaño de las lineas que tiene el fichero es decir si tiene 2 lineas devuelve 2 
            // y con el -1 obtengo la posicion del array del ultimo registro (la ultima linea)
            $pos=sizeof($resgistros)-1;
            //aqui dividimos la ultima fila con por la expresion ; 
            $campos= explode(';',$resgistros[$pos]);
            //y acedemos al registro del campo 0 que es el id y sumamos 1 para el regisro siguiente 
            $resultado=$campos[0]+1;
        }
    
    }catch (Throwable $th){
        echo $th->getMessage();

    }
    //retornamos el id 
    return $resultado;




}



function obtenerContacto($telf){
    //devuelve null si hay un conctato para el telefono buscado
    //devuelve un objeto contacto si hay un contacto para el tel buscado 
    $resultado=null;

    try{

        if(file_exists($this->nombre)){
            $resgistros=file($this->nombre);
            foreach($resgistros as $linea){
                $campos = explode(";",$linea);
                if($campos[2]==$telf){
                    //he enncontrado un contacto para el telf buscado
                    $resultado= new contacto($campos[0],$campos[1],$campos[2],$campos[3],$campos[4]);
                    return $resultado;
                }
            }
    }

    }catch(Throwable $th){
        echo 'Error al obtener contacto: '.$th->getMessage();
    }

    return $resultado;
}


}






?>