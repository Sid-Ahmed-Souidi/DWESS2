<?php


require_once 'Nota.php';

class Modelo {


    private $nombreFN='Notas.dat';
    private $nombreFA='Asignaturas.dat';


    function __construct()
    {
        
    }


 



    function crearNota(Nota $n){

        try{

            $f = fopen($this->nombreFN,'a+');
            fwrite($f ,$n->getAsig().';'.$n->getFecha().';'.$n->getDesc().';'.$n->getNota().';'.$n->getTipo().PHP_EOL);


        }catch(Throwable $t){

            echo 'crearNota'. $t->getMessage();
            



        }finally{

            fclose($f);

        }







    }




    function obtenerNotas(){
        

        $resultado =array();
        try{

            if(file_exists($this->nombreFN)){
                $resgistros=file($this->nombreFN);
                foreach($resgistros as $linea){
                    $campos=explode(';',$linea);

                    $resultado[]=new Nota($campos[0],$campos[1],$campos[2],$campos[3],$campos[4]);
                }
            }
            

        }catch(Throwable $th){
            echo 'obtenerNotas'. $th->getMessage();
        }



        return $resultado;
    }



    function obtenerAsignaturas(){

        $resultado =array();
        try{

            if(file_exists($this->nombreFA)){
                $resultado=file($this->nombreFA);
           
            }
            

        }catch(Throwable $th){
            echo $th->getMessage();
        }



        return $resultado;



        
    }

}