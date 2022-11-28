<?php
include_once "Soporte.php";
class CintaVideo extends Soporte {

private $duracion;

public function __construct (String $titulo, int $numero, float $precio, $duracion){
    parent::__construct($titulo, $numero, $precio);
    $this -> duracion = $duracion;
    
}

public function muestraResumen(){
    echo "<br><u>Resumen</u><br>Titulo: <i>".$this->titulo."</i><br>Identificador: <i>".$this->numero."</i><br>Precio con IVA:  <i>".$this->getPrecioConIva()." €</i><br>Duracion: <i>".$this->duracion."</i>";
}

}

?>