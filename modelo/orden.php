<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orden
 *
 * @author JuanMi Martinez
 */
class orden extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idPortal1;
    private $idPortal2;    
    private $estacion;
    private $orden;
    
    public function getIdPortal1() {
        return $this->idPortal1;
    }
    
    public function getIdPortal2() {
        return $this->idPortal2;
    }
        
    public function getEstacion() {
        return $this->estacion;
    }
    
    public function getOrden() {
        return $this->orden;
    }  
    
    public function setIdPortal1($idPortal1) {
        $this->idPortal1 = $idPortal1;
    }
    
    public function setIdPortal2($idPortal2) {
        $this->idPortal2 = $idPortal2;
    }
        
    public function setEstacion($estacion) {
        $this->estacion = $estacion;
    }
    
    public function setOrden($orden) {
        $this->orden = $orden;
    }
    
    private function mapearOrden(Orden $orden, array $props) {
        if (array_key_exists('idPortal1', $props)) {
            $orden->setIdPortal1($props['idPortal1']);
        }
         if (array_key_exists('idPortal2', $props)) {
            $orden->setIdPortal2($props['idPortal2']);
        }
                
        if (array_key_exists('estacion', $props)) {
            $orden->setEstacion($props['estacion']);
        } 
        
        if (array_key_exists('orden', $props)) {
            $orden->setOrden($props['orden']);
        }  
    }
    
    private function getParametros(Orden $per){
              
        $parametros = array(
            ':idPortal1' => $per->getIdPortal1(),
            ':idPortal2' => $per->getIdPortal2(),
            ':estacion' => $per->getEstacion(),
            ':orden' => $per->getOrden(),
                        
                
        );
        return $parametros;
    }
    
    public function crearOrden(Orden $orden){
        $sql = "INSERT INTO orden(idPortal1, idPortal2, estacion, orden) VALUES(:idPortal1, :idPortal2, :estacion, :orden)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($orden));
    }
}

?>
