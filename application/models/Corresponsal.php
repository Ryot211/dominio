<?php
  class Corresponsal extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
    }
    //Insertar nuevos hospitales
    //Insertar nuevos hospitales

    //Insertar nuevos hospitales

    function insertar($datos){
      $respuesta=$this->db->insert("corresponsal",$datos);
      return $respuesta;
    }
    //Consulta de datos
    function consultarTodos(){
        $corresponsal=$this->db->get("corresponsal");
        if ($corresponsal->num_rows()>0) {
          return $corresponsal->result();
        } else {
          return false;
        }
      }
       // Método para obtener el banco asociado a la sucursal
       function obtenerBanco($id)
       {
           $this->db->select('banco.*');
           $this->db->from('corresponsal');
           $this->db->join('banco', 'corresponsal.BANCO_ID = banco.id', 'left');
           $this->db->where('corresponsal.id', $id);
           $query = $this->db->get();

           if ($query->num_rows() > 0) {
               return $query->row();
           } else {
               return false;
           }
       }


    //eliminacion de hospital por id
    //eliminacion de hospital por id

    //eliminacion de hospital por id

    function eliminar($id){
        $this->db->where("id",$id);
        return $this->db->delete("corresponsal");
    }
    //Funcion editar el hospital por el id
    //Funcion editar el hospital por el id
    //Funcion editar el hospital por el id
    //Funcion editar el hospital por el id

     function obtenerPorId($id){
      $this->db->where("id",$id);
      $corresponsal=$this->db->get("corresponsal");
      if ($corresponsal->num_rows()>0) {
        return $corresponsal->row();
      } else {
        return false;
      }
    }
  //funcion para actualizar hospitales ...
  //funcion para actualizar hospitales ...
  //funcion para actualizar hospitales ...
  //funcion para actualizar hospitales ...

  function actualizar($id,$datos){
    $this->db->where("id",$id);
    return $this->db
                ->update("corresponsal",$datos);
  }


}// fin de la clase
?>
