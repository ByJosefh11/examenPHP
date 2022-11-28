<?php
include_once "Soporte.php";
class Disco extends Soporte {
public $idiomas;

private $formatoPantalla;

public function __construct (String $titulo, int $numero, float $precio, $idiomas, $formatoPantalla){
    parent::__construct($titulo, $numero, $precio);
    $this -> idiomas = $idiomas;
    $this -> formatoPantalla = $formatoPantalla;
}

public function muestraResumen(){
    echo "<br><u>Resumen</u><br>Titulo: <i>".$this->titulo."</i><br>Identificador: <i>".$this->numero."</i><br>Precio con IVA: <i>".$this->getPrecioConIva()." €</i><br>Idiomas: <i>".$this->idiomas."</i><br>Formato de pantalla: <i>".$this->formatoPantalla."</i>";
}

}

?>