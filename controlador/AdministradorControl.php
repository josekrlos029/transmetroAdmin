<?php
/**
 * Description of AdministradorControl
 *
 * @author JoseCarlos
 */

  
class AdministradorControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    
    
    public function obtenerParadas(){
         try {
            
            $estacion = new estacion();
            $estaciones = $estacion->leerEstaciones();
            $arr= array();
            foreach($estaciones as $est){
                $arr[] = array('id'=>$est->getIdEstacion(),
                        'descripcion'=>$est->getDescripcion(),
                        'nombre'=>$est->getNombre(),
                        'lat'=>$est->getLat(),
                        'lon'=>$est->getLon(),
                        'portal'=>$est->getPortal());
            }
            
            echo json_encode($arr);
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }

        
}
?>