<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model("Sucursal");
       $this->load->model("Cajero");
       $this->load->model("Corresponsal");
       $this->load->model("Banco");
    }

    public function index()
    {
        // Obtener datos de los modelos 123
        // Obtener datos de los modelos 123
        // Obtener datos de los modelos 123

        $data["listadoSucursales"] = $this->Sucursal->consultarTodos();
        $data["listadoCajeros"] = $this->Cajero->consultarTodos();
        $data["listadoCorresponsales"] = $this->Corresponsal->consultarTodos();
		$data['banco'] = $this->Banco->obtener_datos_banco();
        // Cargar las vistas y pasar los datos
        $this->load->view('header', $data);
        $this->load->view('welcome_message', $data);
        $this->load->view('footer', $data);
    }

    public function contacto()
    {
        // Obtener el número de teléfono desde el modelo Banco
		$data['banco'] = $this->Banco->obtener_datos_banco();


        // Cargar la vista 'header' y pasar los datos
        $this->load->view('header', $data);

        // Cargar la vista 'contacto' (sin necesidad de pasar datos adicionales)
        $this->load->view('contacto', $data);

        // Cargar la vista 'footer' (sin necesidad de pasar datos adicionales)
        $this->load->view('footer', $data);
    }


}
?>
