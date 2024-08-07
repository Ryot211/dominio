<?php
  /**
   *
   */
  class Corresponsales extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model("Corresponsal");
      $this->load->model("Banco");
      //Desabilitando errores y advertencias de php
      //Desabilitando errores y advertencias de php
      //Desabilitando errores y advertencias de php

      //Desabilitando errores y advertencias de php
      //error_reporting(0)
      //phpinfo();
    }
    public function index() {
        $data["listadoCorresponsales"] = $this->Corresponsal->consultarTodos();
        $data['banco'] = $this->Banco->obtener_datos_banco();

        // Verificar si hay corresponsales antes de iterar sobre ellos
        if ($data["listadoCorresponsales"]) {
            // Obtener información del banco para cada corresponsal
            foreach ($data["listadoCorresponsales"] as $corresponsal) {
                $corresponsal->banco = $this->Corresponsal->obtenerBanco($corresponsal->id);
            }
        } else {
            // Manejar el caso en que no hay corresponsales
            $data["listadoCorresponsales"] = array(); // Asignar un array vacío
        }

        $this->load->view("header", $data);
        $this->load->view("corresponsales/index", $data); // Pasar los datos a la vista
        $this->load->view("footer", $data);
    }


    // eliminacion del hospitales recibiendo el id por el metodo get

    public function borrar($id){
      $this->Corresponsal->eliminar($id);
      $this->session->set_flashdata("eliminacion", "Corresponsal eliminada exitosamente");
      redirect('corresponsales/index');
    }

  //renderizacion de formulario de nuevo hospital
  public function nuevo(){
    $this->load->model('Banco'); // Cargar el modelo de banco
    $data['bancos'] = $this->Banco->consultarTodos(); // Obtener la lista de bancos disponibles
    $data['banco'] = $this->Banco->obtener_datos_banco();
    $this->load->view("header", $data);
    $this->load->view("corresponsales/nuevo", $data); // Pasar la lista de bancos a la vista
    $this->load->view("footer", $data);
}


  // Capturando datos e insertando en la tabla hospital

  public function guardarCorresponsal(){

    $datosNuevaCorresponsal=array(
      "nombre"=>$this->input->post("nombre"),
      "direccion"=>$this->input->post("direccion"),
      "ciudad"=>$this->input->post("ciudad"),
      "tipo"=>$this->input->post("tipo"),
      "horario"=>$this->input->post("horario"),
      "latitud"=>$this->input->post("latitud"),
      "longitud"=>$this->input->post("longitud"),
      "estado"=>$this->input->post("estado"),
      "fecha_re"=>$this->input->post("fecha_re"),
      "Banco_ID"=>$this->input->post("Banco_ID"),

      );

    $this->Corresponsal->insertar($datosNuevaCorresponsal);
    //flash_data->crear una session de tipo flash
    $this->session->set_flashdata("confirmacion", "Corresponsal creada exitosamente");
    enviarEmail("bryan.gallardo6753@utc.edu.ec","CREACION-Corresponsal",
          "<h1>Se creo la Corresponsal </h1>".$datosNuevaCorresponsal['nombre']."<h1> exitosamente </h1>");
    redirect('corresponsales/index');
  }

//Renderizar el formulario de edicion
    public function editar($id){
      $data["corresponsalEditar"]=$this->Corresponsal->obtenerPorId($id);
      $data['bancos'] = $this->Banco->consultarTodos(); // Obtener la lista de bancos disponibles
      $data['banco'] = $this->Banco->obtener_datos_banco();
      $this->load->view("header", $data);
      $this->load->view("corresponsales/editar",$data);
      $this->load->view("footer", $data);
    }
// actualizar hospitales
public function actualizarCorresponsal(){

  $id=$this->input->post("id");
  $datosCorresponsal=array(
    "nombre"=>$this->input->post("nombre"),
    "direccion"=>$this->input->post("direccion"),
    "ciudad"=>$this->input->post("ciudad"),
    "tipo"=>$this->input->post("tipo"),
    "horario"=>$this->input->post("horario"),
    "latitud"=>$this->input->post("latitud"),
    "longitud"=>$this->input->post("longitud"),
    "estado"=>$this->input->post("estado"),
    "fecha_re"=>$this->input->post("fecha_re"),
    "Banco_ID"=>$this->input->post("Banco_ID"),


  );

  // Llamar a la función actualizar con los tres argumentos
  $this->Corresponsal->actualizar($id, $datosCorresponsal);

  $this->session->set_flashdata("confirmacion","Corresponsal actualizada exitosamente");
  redirect('corresponsales/index');
}

  }// cierre de la clase

 ?>
