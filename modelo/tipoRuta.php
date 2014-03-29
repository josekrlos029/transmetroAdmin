<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoRuta
 *
 * @author JuanMi Martinez
 */
class tipoRuta extends Modelo{
    public function __construct() {
        parent::__construct();
    }
    
    private $idRuta;
    private $nombre;
    
    public function getIdRuta() {
        return $this->idRuta;
    }
    
    public function getNombre() {
        return $this->idNombre;
    }
    
    public function setIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    private function mapearTipoRuta(TipoRuta $tipoRuta, array $props) {
        if (array_key_exists('idRuta', $props)) {
            $tipoRuta->setIdRuta($props['idRuta']);
        }
        
        if (array_key_exists('nombre', $props)) {
            $tipoRuta->setNombre($props['nombre']);
        }
    }
    
    private function getParametros(TipoRuta $per){
              
        $parametros = array(
            ':idRuta' => $per->getIdRuta(),
            ':nombre' => $per->getNombre(),
                                   
                
        );
        return $parametros;
    }
    
    public function crearTipoRuta(TipoRuta $tipoRuta){
        $sql = "INSERT INTO tipoRuta(idRuta, nombre) VALUES(:idRuta, :nombre)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($tipoRuta));
    }
    
    public function actualizarTipoRuta(TipoRuta $tipoRuta) {
        $sql = "UPDATE tiporuta SET nombre=:nombre  WHERE idRuta=:idRuta";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($tipoRuta));
       
        }
        
    public function leerTipoRuta() {
        $sql = "SELECT idRuta, nombre FROM tiporuta";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $tiporu = array();
        foreach ($resultado as $fila) {
            $tipoRuta = new TipoRuta();
            $this->mapearTipoRuta($tipoRuta, $fila);
            $tiporu[$tipoRuta->getIdRuta()] = $tipoRuta;
        }
        return $tiporu;
    }     
}

?>
