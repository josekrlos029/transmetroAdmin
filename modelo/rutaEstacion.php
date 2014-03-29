<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rutaEstacion
 *
 * @author JuanMi Martinez
 */
class rutaEstacion extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idRuta;
    private $idEstacion;
    private $orden;
    
     public function getIdRuta() {
        return $this->idRuta;
    }
    
    public function getIdEstacion() {
        return $this->idEstacion;
    }
    
    public function getOrden() {
        return $this->orden;
    }
    
     public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }
    
    public function setEstacion($estacion) {
        $this->estacion = $estacion;
    }
    
    public function setOrden($orden) {
        $this->orden = $orden;
    }
    
    private function mapearRutaEstacion(RutaEstacion $rutaEstacion, array $props) {
        if (array_key_exists('idRuta', $props)) {
            $rutaEstacion->setIdRuta($props['idRuta']);
        }
        
        if (array_key_exists('idEstacion', $props)) {
            $rutaEstacion->setIdEstacion($props['idEstacion']);
        }
           
        if (array_key_exists('orden', $props)) {
            $rutaEstacion->setOrden($props['orden']);
        }
    }
    
    private function getParametros(RutaEstacion $per){
              
        $parametros = array(
            ':idRuta' => $per->getIdRuta(),
            ':idEstacion' => $per->getIdEstacion(),            
            ':orden' => $per->getOrden(),
            
                
        );
        return $parametros;
    }
    
    public function crearRutaEstacion(RutaEstacion $rutaEstacion){
        $sql = "INSERT INTO rutaestacion(idRuta, idEstacion, orden) VALUES(:idRuta, :idEstacion, :orden)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($rutaEstacion));
    }
    
    
}

?>
