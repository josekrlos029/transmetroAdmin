<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rutaAlimentador
 *
 * @author JuanMi Martinez
 */
class rutaAlimentador extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idRutaAlimentador;
    private $idRuta;    
    private $lat;
    private $lon;
    private $orden;
    
    public function getIdRutaAlimentador() {
        return $this->idRutaAlimentador;
    }
    
    public function getIdRuta() {
        return $this->idRuta;
    }
        
    public function getLat() {
        return $this->lat;
    }
    
    public function getLon() {
        return $this->lon;
    }    
    
    public function getOrden() {
        return $this->orden;
    }
    
    public function setIdRutaAlimentador($idRutaAlimentador) {
        $this->idRutaAlimentador = $idRutaAlimentador;
    }
    
    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }
        
    public function setLat($lat) {
        $this->lat = $lat;
    }
    
    public function setLon($lon) {
        $this->lon = $lon;
    }
        
    public function setOrden($orden) {
        $this->orden = $orden;
    }
    
    private function mapearRutaAlimentador(RutaAlimentador $rutaAlimentador, array $props) {
        if (array_key_exists('idRutaAlimentador', $props)) {
            $rutaAlimentador->setIdRutaAlimentador($props['idRutaAlimentador']);
        }
         if (array_key_exists('idRuta', $props)) {
            $rutaAlimentador->setIdRuta($props['idRuta']);
        }
                
        if (array_key_exists('lat', $props)) {
            $rutaAlimentador->setLat($props['lat']);
        } 
        
        if (array_key_exists('lon', $props)) {
            $rutaAlimentador->setLon($props['lon']);
        }        
           
        if (array_key_exists('orden', $props)) {
            $rutaAlimentador->setOrden($props['orden']);
        }
        
               
    }
    
    private function getParametros(RutaAlimentador $per){
              
        $parametros = array(
            ':idRutaAlimentador' => $per->getIdRutaAlimentador(),
            ':idRuta' => $per->getIdRuta(),            
            ':lat' => $per->getLat(),
            ':lon' => $per->getLon(),
            ':orden' => $this->getOrden(),
            
                
        );
        return $parametros;
    }
    
    public function crearRutaAlimentador(RutaAlimentador $rutaAlimentador){
        $sql = "INSERT INTO rutaalimentador(idRutaAlimentador, idRuta, lat, lon, orden) VALUES(:idRutaAlimentador, :idRuta, :lat, :lon, :orden)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($rutaAlimentador));
    }
}

?>
