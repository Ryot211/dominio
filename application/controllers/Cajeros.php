<?php
  /**
   *
   */
  class Cajeros extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model("Cajero");
      $this->load->model("Sucursal");
      $this->load->model("Banco");
      
      
      //Desabilitando errores y advertencias de php
      //error_reporting(0)
      //phpinfo();
    }
    public function index() {
        $data["listadoCajeros"] = $this->Cajero->consultarTodos();
        $data['banco'] = $this->Banco->obtener_datos_banco();
        
        // Verificar si hay corresponsales antes de iterar sobre ellos
        if ($data["listadoCajeros"]) {
            // Obtener información del banco para cada corresponsal
            foreach ($data["listadoCajeros"] as $cajero) {
                $cajero->sucursal = $this->Cajero->obtenerSucursal($cajero->id);
            }
        } else {
            // Manejar el caso en que no hay corresponsales
            $data["listadoCajeros"] = array(); // Asignar un array vacío
        }
    
        $this->load->view("header", $data);
        $this->load->view("cajeros/index", $data); // Pasar los datos a la vista
        $this->load->view("footer", $data);
    }
  
    // eliminacion del hospitales recibiendo el id por el metodo get

    public function borrar($id){
      $this->Cajero->eliminar($id);
      $this->session->set_flashdata("eliminacion", "Cajero eliminado exitosamente");
      redirect('cajeros/index');
    }

  //renderizacion de formulario de nuevo hospital
  public function nuevo(){
    $this->load->model('Sucursal'); // Cargar el modelo de banco
    $data['sucursales'] = $this->Sucursal->consultarTodos(); // Obtener la lista de bancos disponibles
    $data['banco'] = $this->Banco->obtener_datos_banco();
    $this->load->view("header", $data);
    $this->load->view("cajeros/nuevo", $data); // Pasar la lista de bancos a la vista
    $this->load->view("footer", $data);
}


  // Capturando datos e insertando en la tabla hospital

  public function guardarCajero(){

    $datosNuevoCajero=array(
      "nombre"=>$this->input->post("nombre"),
      "ubicacion"=>$this->input->post("ubicacion"),
      "direccion"=>$this->input->post("direccion"), 
      "ciudad"=>$this->input->post("ciudad"), 
      "numserie"=>$this->input->post("numserie"),
      "modelo"=>$this->input->post("modelo"),
      "estado"=>$this->input->post("estado"),
      "fecha_ins"=>$this->input->post("fecha_ins"),
      "mantenimiento"=>$this->input->post("mantenimiento"),
      "latitud"=>$this->input->post("latitud"),
      "longitud"=>$this->input->post("longitud"),
      "Sucursal_ID"=>$this->input->post("Sucursal_ID"),

      );

    $this->Cajero->insertar($datosNuevoCajero);
    //flash_data->crear una session de tipo flash
    $this->session->set_flashdata("confirmacion", "Cajero creado exitosamente");
    enviarEmail("bryan.gallardo6753@utc.edu.ec","CREACION-CAJERO",
          "<h1>Se creo el cajero </h1>".$datosNuevoCajero['nombre']."<h1> exitosamente </h1>");
    redirect('cajeros/index');
  }

//Renderizar el formulario de edicion
    public function editar($id){
      $data["cajeroEditar"]=$this->Cajero->obtenerPorId($id);
      $data['sucursales'] = $this->Sucursal->consultarTodos(); // Obtener la lista de bancos disponibles
      $data['banco'] = $this->Banco->obtener_datos_banco();
      $this->load->view("header", $data);
      $this->load->view("cajeros/editar",$data);
      $this->load->view("footer", $data);
    }
// actualizar hospitales
public function actualizarCajero(){

  $id=$this->input->post("id");
  $datosCajero=array(
    "nombre"=>$this->input->post("nombre"),
    "ubicacion"=>$this->input->post("ubicacion"),
    "direccion"=>$this->input->post("direccion"), 
    "ciudad"=>$this->input->post("ciudad"), 
    "numserie"=>$this->input->post("numserie"),
    "modelo"=>$this->input->post("modelo"),
    "estado"=>$this->input->post("estado"),
    "fecha_ins"=>$this->input->post("fecha_ins"),
    "mantenimiento"=>$this->input->post("mantenimiento"),
    "latitud"=>$this->input->post("latitud"),
    "longitud"=>$this->input->post("longitud"),
    "Sucursal_ID"=>$this->input->post("Sucursal_ID"),

  );

  // Llamar a la función actualizar con los tres argumentos
  $this->Cajero->actualizar($id, $datosCajero);

  $this->session->set_flashdata("confirmacion","Cajero actualizado exitosamente");
  redirect('cajeros/index');
}

  }// cierre de la clase

 ?>
