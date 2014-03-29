<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estacion
 *
 * @author JuanMi Martinez
 */
class estacion extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idEstacion;
    private $nombre;
    private $descripcion;
    private $lat;
    private $lon;
    private $portal;
    
    public function getIdEstacion() {
        return $this->idEstacion;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getLat() {
        return $this->lat;
    }
    
    public function getLon() {
        return $this->lon;
    }
    
    public function getPortal() {
        return $this->portal;
    }
    
    public function setIdEstacion($idEstacion) {
        $this->idEstacion = $idEstacion;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function setLat($lat) {
        $this->lat = $lat;
    }
    
    public function setLon($lon) {
        $this->lon = $lon;
    }
    
    public function setPortal($portal) {
        $this->portal = $portal;
    }
    
    private function mapearEstacion(Estacion $estacion, array $props) {
        if (array_key_exists('idEstacion', $props)) {
            $estacion->setIdEstacion($props['idEstacion']);
        }
         if (array_key_exists('nombre', $props)) {
            $estacion->setNombre($props['nombre']);
        }
           
        if (array_key_exists('descripcion', $props)) {
            $estacion->setDescripcion($props['descripcion']);
        }
        
        if (array_key_exists('lat', $props)) {
            $estacion->setLat($props['lat']);
        } 
        
        if (array_key_exists('lon', $props)) {
            $estacion->setLon($props['lon']);
        }
        
        if (array_key_exists('portal', $props)) {
            $estacion->setLon($props['portal']);
        }
        
    }
    
    private function getParametros(Estacion $per){
              
        $parametros = array(
            ':idEstacion' => $per->getIdEstacion(),
            ':nombre' => $per->getNombre(),
            ':descripcion' => $per->getDescripcion(),
            ':lat' => $per->getLat(),
            ':lon' => $this->getLon(),
            ':portal' => $this->getPortal(),
                
        );
        return $parametros;
    }
    
    public function crearEstacion(Estacion $estacion){
        $sql = "INSERT INTO estacion(idEstacion, nombre, descripcion, lat, lon, portal) VALUES(:idEstacion, :nombre, :descripcion, :lat, :lon, :portal)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estacion));
    }
    
    public function actualizarEstacion(Estacion $estacion) {
        $sql = "UPDATE estacion SET nombre=:nombre, descripcion=:descripcion, lat=:lat, lon=:lon, portal=:portal  WHERE idEstacion=:idEstacion";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estacion));
       
        }
        
    public function leerEstacion() {
        $sql = "SELECT idEstacion, nombre, descripcion, lat, lon, portal FROM estacion";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $estac = array();
        foreach ($resultado as $fila) {
            $estacion = new Estacion();
            $this->mapearEstacion($estacion, $fila);
            $estac[$estacion->getIdEstacion()] = $estacion;
        }
        return $estac;
    }    
}
?>
