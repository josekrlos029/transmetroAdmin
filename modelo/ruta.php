<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ruta
 *
 * @author JuanMi Martinez
 */
class ruta extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idRuta;
    private $nombreCorto;
    private $nombreLargo;
    private $descripcion;
    private $tipoRuta;
   
    public function getIdRuta() {
        return $this->idRuta;
    }
    
    public function getNombreCorto() {
        return $this->nombreCorto;
    }
    
    public function getNombreLargo() {
        return $this->nombreLargo;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getTipoRuta() {
        return $this->tipoRuta;
    }
    
    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }
    
    public function setNombreCorto($nombreCorto) {
        $this->nombreCorto = $nombreCorto;
    }
    
    public function setNombreLargo($nombreLargo) {
        $this->nombreLargo = $nombreLargo;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function setTipoRuta($tipoRuta) {
        $this->tipoRuta = $tipoRuta;
    }
    
    private function mapearRuta(Ruta $ruta, array $props) {
        if (array_key_exists('idRuta', $props)) {
            $ruta->setIdRuta($props['idRuta']);
        }
         if (array_key_exists('nombreCorto', $props)) {
            $ruta->setNombreCorto($props['nombreCorto']);
        }
         if (array_key_exists('nombreLargo', $props)) {
            $ruta->setNombreLargo($props['nombreLargo']);
        }   
        if (array_key_exists('descripcion', $props)) {
            $ruta->setDescripcion($props['descripcion']);
        }
        if (array_key_exists('tipoRuta', $props)) {
            $ruta->setTipoRuta($props['tipoRuta']);
        }
        
    }
    
    private function getParametros(Ruta $per){
              
        $parametros = array(
            ':idRuta' => $per->getIdRuta(),
            ':nombreCorto' => $per->getNombreCorto(),
            ':nombreLargo' => $per->getNombreLargo(),
            ':descripcion' => $per->getDescripcion(),
            ':tipoRuta' => $this->getTipoRuta(),
            
                
        );
        return $parametros;
    }
    
    public function crearRuta(Ruta $ruta){
        $sql = "INSERT INTO ruta(idRuta, nombreCorto, nombreLargo, descripcion, tipoRuta) VALUES(:idRuta, :nombreCorto, :nombreLargo, :descripcion, :tipoRuta)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($ruta));
    }
    
    public function actualizarRuta(Ruta $ruta) {
        $sql = "UPDATE ruta SET nombreCorto=:nombreCorto, nombreLargo=:nombreLargo, descripcion=:descripcion, tipoRuta=:tipoRuta  WHERE idRuta=:idRuta";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($ruta));
       
        }
        
    public function leerRuta() {
        $sql = "SELECT idRuta, nombreCorto, nombreLargo, descripcion, tipoRuta FROM ruta";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $rut = array();
        foreach ($resultado as $fila) {
            $ruta = new Ruta();
            $this->mapearRuta($ruta, $fila);
            $rut[$ruta->getIdRuta()] = $ruta;
        }
        return $rut;
    }    
    
}
?>
