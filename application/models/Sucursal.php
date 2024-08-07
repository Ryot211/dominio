<?php
  class Sucursal extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }
    //Insertar nuevos hospitales
    //Insertar nuevos hospitales

    //Insertar nuevos hospitales

    function insertar($datos){
      $respuesta=$this->db->insert("sucursal",$datos);
      return $respuesta;
    }
    //Consulta de datos
    function consultarTodos(){
        $sucursal=$this->db->get("sucursal");
        if ($sucursal->num_rows()>0) {
          return $sucursal->result();
        } else {
          return false;
        }
      }
       // Método para obtener el banco asociado a la sucursal
       function obtenerBanco($id)
       {
           $this->db->select('banco.*');
           $this->db->from('sucursal');
           $this->db->join('banco', 'sucursal.BANCO_ID = banco.id', 'left');
           $this->db->where('sucursal.id', $id);
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
        return $this->db->delete("sucursal");
    }
    //Funcion editar el hospital por el id
     function obtenerPorId($id){
      $this->db->where("id",$id);
      $sucursal=$this->db->get("sucursal");
      if ($sucursal->num_rows()>0) {
        return $sucursal->row();
      } else {
        return false;
      }
    }
  //funcion para actualizar hospitales
  //funcion para actualizar hospitales
  //funcion para actualizar hospitales
  //funcion para actualizar hospitales

  function actualizar($id,$datos){
    $this->db->where("id",$id);
    return $this->db
                ->update("sucursal",$datos);
  }


}// fin de la clase
?>
