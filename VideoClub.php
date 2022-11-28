<?php

include_once "Cliente.php";
include_once "Juego.php";
include_once "Disco.php";
include_once "CintaVideo.php";

class VideoClub{

    private String $nombre;
    private $productos = [];

    private int $numProductos = 0;

    private $socios= [];

    private int $numSocios = 0;

    private int $indProductos=0;

    private int $indSocios=0;


    public function __construct(String $nombre){
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $s){
        if(!in_array($s, $this->productos)) {
            array_push($this->productos, $s);
            $this->numProductos++;
        }else{
            echo "<br>El videoclip ya tenia ese soporte";
        }
    }

    public function incluirCintaVideo(String $titulo, float $precio, int $duracion) {
        $cinta=new CintaVideo($titulo, $this->indProductos++, $precio, $duracion);
        $this->incluirProducto($cinta);
    }

    public function incluirDvd(String $titulo, float $precio, String $idiomas, String $pantalla) {
        $dvd=new Disco($titulo, $this->indProductos++, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirJuego(String $titulo, float $precio, String $consola, int $minJ, int $maxJ) {
        $juego=new Juego($titulo, $this->indProductos++, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }

    public function incluirSocio(String $nombre, int $maxAlquileresConcurrentes=3) {
        array_push($this->socios, new Cliente($nombre, $this->indSocios++, $maxAlquileresConcurrentes));
        $this->numSocios++;
    }

    public function listarProductos() {
        $out="<h3>Lista de productos</h3><ul>";
        foreach($this->productos as $p)
            $out.="<li>".$p->titulo."</li>";
        $out.="</ul>";
        echo $out;
    }

    public function listarSocios() {
        $out="<h3>Lista de socios</h3><ul>";
        foreach($this->socios as $s)
            $out.="<li>".$s->nombre."</li>";
        $out.="</ul>";
        echo $out;
    }

    public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte) {
        $clienteSeleccionado=null;
        $soporteSeleccionado=null;
        foreach($this->socios as $cliente){
            if($cliente->getNumero() == $numeroCliente){
                $clienteSeleccionado = $cliente;
            }
        }

        foreach($this->productos as $producto){
            if($producto->getNumero() == $numeroSoporte){
                $soporteSeleccionado = $producto;
            }
        }
        if($clienteSeleccionado==null){
            echo "<br>Ese cliente no existe";
        }else{
            if($soporteSeleccionado==null){
                echo "<br>Ese soporte no existe";
            }else{

                $clienteSeleccionado->alquilar($soporteSeleccionado);
            }
        }
    }

}




?>