<?php

// clase de tareas
class Tareas
{
    public $id;
    public $nombre;
    public $fechaFin;


    public function __construct($id, $nombre, $fechaFin)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fechaFin = $fechaFin;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFechaFin()
    {
        return $this->fechaFin;
    }
}

?>