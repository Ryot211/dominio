<?php
class Banco extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function consultarTodos(){
        $bancos = $this->db->get('banco')->result();
        return $bancos;
    }

    function obtener_datos_banco()
    {
        $query = $this->db->query("SELECT * FROM banco WHERE id = 1");
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    //Insertar nuevos hospitales
    function insertar($datos){
        $respuesta=$this->db->insert("banco",$datos);
        return $respuesta;
      }

      //eliminacion de hospital por id
      function eliminar($id){
          $this->db->where("id",$id);
          return $this->db->delete("banco");
      }
      //Funcion editar el hospital por el id
       function obtenerPorId($id){
        $this->db->where("id",$id);
        $banco=$this->db->get("banco");
        if ($banco->num_rows()>0) {
          return $banco->row();
        } else {
          return false;
        }
      }
  
      function actualizar($id, $datos, $imagen1, $imagen2, $imagen3, $imagen4) {
        if (!empty($imagen1)) {
            $datos['imagen1'] = $imagen1;
        } else {
            // Obtener la foto actual del doctor y asignarla nuevamente a $datos['imagen1']
            $bancoActual = $this->obtenerPorId($id);
            if ($bancoActual) {
                $datos['imagen1'] = $bancoActual->imagen1;
            }
        }
    
        if (!empty($imagen2)) {
            $datos['imagen2'] = $imagen2;
        } else {
            // Obtener la foto actual del doctor y asignarla nuevamente a $datos['imagen2']
            $bancoActual = $this->obtenerPorId($id);
            if ($bancoActual) {
                $datos['imagen2'] = $bancoActual->imagen2;
            }
        }
    
        if (!empty($imagen3)) {
            $datos['imagen3'] = $imagen3;
        } else {
            // Obtener la foto actual del doctor y asignarla nuevamente a $datos['imagen3']
            $bancoActual = $this->obtenerPorId($id);
            if ($bancoActual) {
                $datos['imagen3'] = $bancoActual->imagen3;
            }
        }
    
        if (!empty($imagen4)) {
            $datos['imagen4'] = $imagen4;
        } else {
            // Obtener la foto actual del doctor y asignarla nuevamente a $datos['imagen4']
            $bancoActual = $this->obtenerPorId($id);
            if ($bancoActual) {
                $datos['imagen4'] = $bancoActual->imagen4;
            }
        }
    
        $this->db->where("id", $id);
        return $this->db->update("banco", $datos);
    }
    
}
?>
