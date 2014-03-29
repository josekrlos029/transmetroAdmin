<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of horarioRuta
 *
 * @author JuanMi Martinez
 */
class horarioRuta extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idRuta;
    private $lunes;
    private $martes;
    private $miercoles;
    private $jueves;
    private $viernes;
    private $sabado;
    private $domingo;
    
     public function getIdRuta() {
        return $this->idRuta;
    }

    public function getLunes() {
        return $this->lunes;
    }

    public function getMartes() {
        return $this->martes;
    }

    public function getMiercoles() {
        return $this->miercoles;
    }

    public function getJueves() {
        return $this->jueves;
    }

    public function getViernes() {
        return $this->viernes;
    }
    
    public function getSabado() {
        return $this->sabado;
    }

    public function getDomingo() {
        return $this->domingo;
    }

    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    public function setLunes($lunes) {
        $this->lunes = $lunes;
    }
    
    public function setMartes($martes) {
        $this->martes = $martes;
    }
    
    public function setMiercoles($miercoles) {
        $this->miercoles = $miercoles;
    }
    
    public function setJueves($jueves) {
        $this->jueves = $jueves;
    }
    
    public function setViernes($viernes) {
        $this->viernes = $viernes;
    }
    
    public function setSabado($sabado) {
        $this->sabado = $sabado;
    }
    
    public function setDomingo($domingo) {
        $this->domingo = $domingo;
    }
    
      private function mapearHorarioRuta(HorarioRuta $horarioRuta, array $props) {
        if (array_key_exists('idRuta', $props)) {
            $horarioRuta->setIdRuta($props['idRuta']);
        }
         if (array_key_exists('lunes', $props)) {
            $horarioRuta->setLunes($props['lunes']);
        }
         if (array_key_exists('martes', $props)) {
            $horarioRuta->setMartes($props['martes']);
        }   
        if (array_key_exists('miercoles', $props)) {
            $horarioRuta->setMiercoles($props['miercoles']);
        }
        if (array_key_exists('jueves', $props)) {
            $horarioRuta->setJueves($props['jueves']);
        }
        if (array_key_exists('viernes', $props)) {
            $horarioRuta->setViernes($props['viernes']);
        }
        if (array_key_exists('sabado', $props)) {
            $horarioRuta->setSabado($props['sabado']);
        }
        if (array_key_exists('domingo', $props)) {
            $horarioRuta->setDomingo($props['domingo']);
        }
}

        private function getParametros(HorarioRuta $per){
              
        $parametros = array(
            ':idRuta' => $per->getIdRuta(),
            ':lunes' => $per->getLunes(),            
            ':martes' => $per->getMartes(),
            ':miercoles' => $per->getMiercoles(),
            ':jueves' => $this->getJueves(),
            ':viernes' => $per->getViernes(),
            ':sabado' => $per->getSabado(),
            ':domingo' => $this->getDomingo(),
            
                
        );
        return $parametros;
    }
    
    public function crearHorarioRuta(HorarioRuta $horarioRuta){
        $sql = "INSERT INTO horarioruta(idRuta, lunes, martes, miercoles, jueves, viernes, sabado, domingo) VALUES(:idRuta, :lunes, :martes, :miercoles, :jueves, viernes, sabado, domingo)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($horarioRuta));
    }
    
    public function actualizarHorarioRuta(HorarioRuta $horarioRuta) {
        $sql = "UPDATE horarioruta SET lunes=:lunes, martes=:martes, miercoles=:miercoles, jueves=:jueves, viernes=:viernes, sabado=:sabado, domingo=:domingo  WHERE idRuta=:idRuta";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($horarioRuta));
       
        }
        
    public function leerHorarioRuta() {
        $sql = "SELECT idRuta, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM horarioruta";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $horar = array();
        foreach ($resultado as $fila) {
            $horarioRuta = new HorarioRuta();
            $this->mapearHorarioRuta($horarioRuta, $fila);
            $horar[$horarioRuta->getIdRuta()] = $horarioRuta;
        }
        return $horar;
    }     
}

?>
