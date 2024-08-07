<?php
  class Cajero extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }
    //Insertar nuevos hospitales
    function insertar($datos){
      $respuesta=$this->db->insert("cajero",$datos);
      return $respuesta;
    }
    //Consulta de datos
    //Consulta de datos
    //Consulta de datos
    //Consulta de datos

    function consultarTodos(){
        $cajero=$this->db->get("cajero");
        if ($cajero->num_rows()>0) {
          return $cajero->result();
        } else {
          return false;
        }
      }
       // Método para obtener el banco asociado a la sucursal
       // Método para obtener el banco asociado a la sucursal
       // Método para obtener el banco asociado a la sucursal

       function obtenerSucursal($id)
       {
           $this->db->select('sucursal.*'); // Selecciona todos los campos de la tabla cajero
           $this->db->from('cajero');
           $this->db->join('sucursal', 'cajero.SUCURSAL_ID = sucursal.id', 'left'); // Corrige la tabla y el campo de join
           $this->db->where('cajero.id', $id);
           $query = $this->db->get();

           if ($query->num_rows() > 0) {
               return $query->row();
           } else {
               return false;
           }
       }


    //eliminacion de hospital por id
    function eliminar($id){
        $this->db->where("id",$id);
        return $this->db->delete("cajero");
    }
    //Funcion editar el hospital por el id
     function obtenerPorId($id){
      $this->db->where("id",$id);
      $cajero=$this->db->get("cajero");
      if ($cajero->num_rows()>0) {
        return $cajero->row();
      } else {
        return false;
      }
    }
  //funcion para actualizar hospitales
  function actualizar($id,$datos){
    $this->db->where("id",$id);
    return $this->db
                ->update("cajero",$datos);
  }


}// fin de la clase
?>
