<?php
include_once "Soporte.php";
class Cliente {

    public String $nombre;

    private int $numero;

    private $soportesAlquilados=[];

    private int $numSoportesAlquilados=0;

    private String $maxAlquilerConcurrente;

	public function getNumero()
    {
        return $this->numero;
    }


    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen()
    {
        echo "Nombre: ".$this->nombre . ", Nº soportes alquilados: " . $this->getNumSoportesAlquilados();
    }
	
    public function __construct(String $nombre, int $numero){
        $this -> nombre = $nombre;
        $this -> numero = $numero;

		if(func_num_args()==3)
			$this -> maxAlquilerConcurrente = func_get_arg(2);
		else
			$this -> maxAlquilerConcurrente = 3;
    }
	
	public function tieneAlquilado(Soporte $s):bool{
		if($this->numSoportesAlquilados==0)
			return false;
		else
        return in_array($s, $this->soportesAlquilados);
    }
	
	public function alquilar(Soporte $s):bool{
		if($this->tieneAlquilado($s)){
			echo "<br>Error. El cliente ya tiene alquilado este soporte: ".$s->getNumero();
			return false;
		}else{
			if($this->numSoportesAlquilados == $this->maxAlquilerConcurrente){
				echo "<br>Error. El cliente ha alcanzado el máximo de soportes alquilados";
				return false;
			}else{
				echo "<br>Soporte alquilado correctamente: ".$s->getNumero();
				array_push($this->soportesAlquilados, $s);
				$this->numSoportesAlquilados++;
				return true;
			}
		}
	}
	
	public function devolver(int $numSoporte):bool{
		$resultado=false;
		if($this->numSoportesAlquilados==0){
			echo "<br>Error. El cliente no tiene ningún soporte alquilado";
		}else{
			for($i=0;$i<$this->numSoportesAlquilados;$i++){
				if($this->soportesAlquilados[$i]->getNumero()==$numSoporte){
					echo "<br>Soporte devuelto correctamente: ".$numSoporte;
					array_splice($this->soportesAlquilados,$i,1);
					$this->numSoportesAlquilados--;
					$resultado=true;
					break;
				}
			}
			if(!$resultado)
				echo "<br>Error. El cliente no tenía alquilado ese soporte: ".$numSoporte;
		}
			return $resultado;
	}
	
	public function listarAlquileres():void{
		echo "<br>El cliente tiene alquilados <b>".$this->numSoportesAlquilados."</b> soportes:";
		foreach($this->soportesAlquilados as $s){
			echo "<br><b>-".$s->titulo."</b>";
		}
	}
}

?>