<?php



require_once 'Ticket.php';


class AccesoDatos{
    private $nombre;

function __construct($n)
{
    $this->nombre=$n;


}



function insertarProducto(Ticket $t){

    try{    
        //abrir el fichero 
    $fichero = fopen($this->nombre, 'a+');
    //insertar al final
    fwrite($fichero ,$t->getProducto().';'.$t->getPrecioU().';'.$t->getCantidad().';'.$t->getTotal().PHP_EOL);

    }catch(Throwable $e){
       echo  $e->getMessage();

    }

    finally{

    //cerrrar el fichero
    if(isset($fichero)){
        fclose($fichero);
    }

    }

}


function obtenerProductos(){
    $resultado=array();

    try{
        if(file_exists($this->nombre))
        $tmp=file($this->nombre);
        $b=4/0;
        foreach($tmp as $linea){
            $campos=explode(';',$linea);
            //crear objeto ticket
            $t= new Ticket($campos[0],$campos[1],$campos[2]);
            //añadimos $t al array de objetos resultado
            $resultado[]=$t;
        }

    }catch(Throwable $e){
        echo  $e->getMessage();


    }
    return $resultado;


    $resultado=array();

 



}


}
?>