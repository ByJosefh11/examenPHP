<?php
include_once "Soporte.php";
class Juego extends Soporte {
public string $consola;
private int $minNumJugadores;
private int $maxNumJugadores;

public function __construct (String $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores){
    parent::__construct($titulo, $numero, $precio);
    $this -> consola = $consola;
    $this -> minNumJugadores = $minNumJugadores;
    $this -> maxNumJugadores = $maxNumJugadores;
}

public function muestraResumen(){
    echo "<br><u>Resumen</u><br>Titulo: <i>".$this->titulo."</i><br>Identificador: <i>".$this->numero."</i><br>Precio con IVA:  <i>".$this->getPrecioConIva()." €</i><br>Consola: <i>".$this->consola."</i><br>Numero de jugadores: <i>".$this->muestraJugadoresPosibles()."</i>";
}
public function muestraJugadoresPosibles(){
    
    if ($this -> minNumJugadores == $this -> maxNumJugadores){
        if ($this -> minNumJugadores==1) {
            $resultado = "Para un jugador";
        }else{
            $resultado = "Para ".$this->minNumJugadores." jugadores";
            }
        }else{
            $resultado = "De ".$this->minNumJugadores." a ".$this->maxNumJugadores ." jugadores";
        }
    return $resultado;
    }
}

?>