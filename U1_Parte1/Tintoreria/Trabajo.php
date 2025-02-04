<?php



class Trabajo{

    private $fecha,$cliente ,$tipo,$sevicios,$importe;




    function __construct( $fecha,$cliente ,$tipo,$sevicios,$importe)
    {

        $this->fecha=$fecha;
        $this->cliente=$cliente;
        $this->tipo=$tipo;
        $this->sevicios=$sevicios;
        $this->importe=$importe;

        
    }





    



    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *cliente
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of sevicios
     */ 
    public function getSevicios()
    {
        return $this->sevicios;
    }

    /**
     * Set the value of sevicios
     *
     * @return  self
     */ 
    public function setSevicios($sevicios)
    {
        $this->sevicios = $sevicios;

        return $this;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }
}




?>