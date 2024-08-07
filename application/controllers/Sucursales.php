<?php
  /**
   *
   */
  class Sucursales extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model("Sucursal");
      $this->load->model("Banco");
      //Desabilitando errores y advertencias de php
      //Desabilitando errores y advertencias de php
      //Desabilitando errores y advertencias de php

      //error_reporting(0)
      //phpinfo(); ...
    }

  public function index() {
    $data["listadoSucursales"] = $this->Sucursal->consultarTodos();
    $data['banco'] = $this->Banco->obtener_datos_banco();

    // Verificar si hay corresponsales antes de iterar sobre ellos
    if ($data["listadoSucursales"]) {
        // Obtener información del banco para cada corresponsal
        foreach ($data["listadoSucursales"] as $sucursal) {
            $sucursal->banco = $this->Sucursal->obtenerBanco($sucursal->id);
        }
    } else {
        // Manejar el caso en que no hay corresponsales
        $data["listadoSucursales"] = array(); // Asignar un array vacío
    }

    $this->load->view("header", $data);
    $this->load->view("sucursales/index", $data); // Pasar los datos a la vista
    $this->load->view("footer", $data);
}



    // eliminacion del hospitales recibiendo el id por el metodo get
    // eliminacion del hospitales recibiendo el id por el metodo get
    // eliminacion del hospitales recibiendo el id por el metodo get
    // eliminacion del hospitales recibiendo el id por el metodo get

    public function borrar($id){
      $this->Sucursal->eliminar($id);
      $this->session->set_flashdata("eliminacion", "Sucursal eliminada exitosamente");
      redirect('sucursales/index');
    }

  //renderizacion de formulario de nuevo hospital
  public function nuevo(){
    $this->load->model('Banco'); // Cargar el modelo de banco
    $data['bancos'] = $this->Banco->consultarTodos(); // Obtener la lista de bancos disponibles
    $data['banco'] = $this->Banco->obtener_datos_banco();
    $this->load->view("header", $data);
    $this->load->view("sucursales/nuevo", $data); // Pasar la lista de bancos a la vista
    $this->load->view("footer", $data);
}


  // Capturando datos e insertando en la tabla hospital

  public function guardarSucursal(){

    $datosNuevaSucursal=array(
      "nombre"=>$this->input->post("nombre"),
      "direccion"=>$this->input->post("direccion"),
      "ciudad"=>$this->input->post("ciudad"),
      "telefono"=>$this->input->post("telefono"),
      "gerente"=>$this->input->post("gerente"),
      "horario"=>$this->input->post("horario"),
      "latitud"=>$this->input->post("latitud"),
      "longitud"=>$this->input->post("longitud"),
      "Banco_ID"=>$this->input->post("Banco_ID"),

      );

    $this->Sucursal->insertar($datosNuevaSucursal);
    //flash_data->crear una session de tipo flash
    $this->session->set_flashdata("confirmacion", "Sucursal creada exitosamente");
    enviarEmail("bryan.gallardo6753@utc.edu.ec","CREACION-SUCURSAL",
          "<h1>Se creo la sucursal </h1>".$datosNuevaSucursal['nombre']."<h1> exitosamente </h1>");
    redirect('sucursales/index');
  }

//Renderizar el formulario de edicion
    public function editar($id){
      $data["sucursalEditar"]=$this->Sucursal->obtenerPorId($id);
      $data['banco'] = $this->Banco->obtener_datos_banco();
      $data['bancos'] = $this->Banco->consultarTodos(); // Obtener la lista de bancos disponibles
      $this->load->view("header", $data);
      $this->load->view("sucursales/editar",$data);
      $this->load->view("footer", $data);
    }
// actualizar hospitales
public function actualizarSucursal(){

  $id=$this->input->post("id");
  $datosSucursal=array(
    "nombre"=>$this->input->post("nombre"),
    "direccion"=>$this->input->post("direccion"),
    "ciudad"=>$this->input->post("ciudad"),
    "telefono"=>$this->input->post("telefono"),
    "gerente"=>$this->input->post("gerente"),
    "horario"=>$this->input->post("horario"),
    "latitud"=>$this->input->post("latitud"),
    "longitud"=>$this->input->post("longitud"),
    "Banco_ID"=>$this->input->post("Banco_ID"),

  );

  // Llamar a la función actualizar con los tres argumentos
  $this->Sucursal->actualizar($id, $datosSucursal);

  $this->session->set_flashdata("confirmacion","Sucursal actualizada exitosamente");
  redirect('sucursales/index');
}

  }// cierre de la clase

 ?>
