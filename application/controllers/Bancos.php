<?php
  /**
   *
   */
  class Bancos extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('Banco');
      //Desabilitando errores y advertencias de php
      //error_reporting(0)
      //phpinfo();
    }

    //renderizacionde la vista hospitales
    public function index(){
      $data["listadoBancos"]=$this->Banco->consultarTodos();
      $data['banco'] = $this->Banco->obtener_datos_banco();
      $this->load->view("header",$data);
      $this->load->view("bancos/index",$data);
      $this->load->view("footer",$data);
    }
    // eliminacion del hospitales recibiendo el id por el metodo get

    public function borrar($id){
      $this->Banco->eliminar($id);
      $this->session->set_flashdata("eliminacion", "Banco eliminado exitosamente");
      redirect('bancos/index');
    }

  //renderizacion de formulario de nuevo hospital
  public function nuevo(){
    $data['banco'] = $this->Banco->obtener_datos_banco();
    $this->load->view("header",$data);
    $this->load->view("bancos/nuevo",$data);
    $this->load->view("footer",$data);
  }

  // Capturando datos e insertando en la tabla hospital

  public function guardarDoctor(){
     /* INICIO PROCESO DE SUBIDA DE ARCHIVOS */
     $config['upload_path'] = APPPATH.'../uploads/Banco/'; // ruta de subida de archivos
     $config['allowed_types'] = 'jpeg|jpg|png'; // tipo de archivos permitidos
     $config['max_size'] = 5*1024; // definir el peso máximo de subida (5MB)

    // Subida de la primera imagen
    $nombre_aleatorio1 = "imagen1_" . time() * rand(100, 10000);
    $config['file_name'] = $nombre_aleatorio1;
    $this->load->library('upload', $config); // cargando la librería UPLOAD
    if ($this->upload->do_upload("imagen1")) { // intentando subir el archivo
        $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
        $nombre_archivo_subido1 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
    } else {
        $nombre_archivo_subido1 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
    }
     // Subida de la segunda imagen
     $nombre_aleatorio2 = "imagen2_" . time() * rand(100, 10000);
     $config['file_name'] = $nombre_aleatorio2;
     $this->load->library('upload', $config); // cargando la librería UPLOAD
     if ($this->upload->do_upload("imagen2")) { // intentando subir el archivo
         $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
         $nombre_archivo_subido2= $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
     } else {
          $nombre_archivo_subido2 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
     }

     // Subida de la tercera imagen
     $nombre_aleatorio3 = "imagen3_" . time() * rand(100, 10000);
     $config['file_name'] = $nombre_aleatorio3;
     $this->load->library('upload', $config); // cargando la librería UPLOAD
     if ($this->upload->do_upload("imagen3")) { // intentando subir el archivo
         $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
          $nombre_archivo_subido3 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
     } else {
          $nombre_archivo_subido3 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
     }
     // Subida de la cuarta imagen
     $nombre_aleatorio4 = "imagen4_" . time() * rand(100, 10000);
     $config['file_name'] = $nombre_aleatorio4;
     $this->load->library('upload', $config); // cargando la librería UPLOAD
     if ($this->upload->do_upload("imagen4")) { // intentando subir el archivo
         $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
          $nombre_archivo_subido4 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
     } else {
          $nombre_archivo_subido4 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
     }


    // Repite el proceso para las imágenes 3 y 4

    $datosNuevoBanco=array(
        "nombre"=>$this->input->post("nombre"),
        "direccion"=>$this->input->post("direccion"),
        "ciudad"=>$this->input->post("ciudad"),
        "telefono"=>$this->input->post("telefono"),
        "gerente"=>$this->input->post("gerente"),
        "mision"=>$this->input->post("mision"),
        "vision"=>$this->input->post("vision"),
        "fundacion"=>$this->input->post("fundacion"),
        "correo"=>$this->input->post("correo"),
        "horario"=>$this->input->post("horario"),
        "lema"=>$this->input->post("lema"),
        "tarjetadeb"=>$this->input->post("tarjetadeb"),
        "remesas"=>$this->input->post("remesas"),
        "ben1"=>$this->input->post("ben1"),
        "text1"=>$this->input->post("text1"),
        "ben2"=>$this->input->post("ben2"),
        "text2"=>$this->input->post("text2"),
        "textge"=>$this->input->post("textge"),
        "latitud"=>$this->input->post("latitud"),
        "longitud"=>$this->input->post("longitud"),
        "imagen1"=>$nombre_archivo_subido1,
        "imagen2"=>$nombre_archivo_subido2 ,
        "imagen3"=>$nombre_archivo_subido3 ,
        "imagen4"=>$nombre_archivo_subido4 ,

        );

      $this->Banco->insertar($datosNuevoBanco);
      //flash_data->crear una session de tipo flash
      $this->session->set_flashdata("confirmacion", "Banco creado exitosamente");
      enviarEmail("bryan.gallardo6753@utc.edu.ec","CREACION-BANCO",
            "<h1>Se creo el Doctor(a) </h1>".$datosNuevoBanco['nombre']."<h1> exitosamente </h1>");
      redirect('bancos/index');
    }



//Renderizar el formulario de edicion
    public function editar($id){
      $data["bancoEditar"]=$this->Banco->obtenerPorId($id);
      $data['banco'] = $this->Banco->obtener_datos_banco();
      $this->load->view("header",$data);
      $this->load->view("bancos/editar",$data);
      $this->load->view("footer",$data);
    }
// actualizar hospitales
public function actualizarBanco(){

       /* INICIO PROCESO DE SUBIDA DE ARCHIVOS */
       $config['upload_path'] = APPPATH.'../uploads/Banco/'; // ruta de subida de archivos
       $config['allowed_types'] = 'jpeg|jpg|png'; // tipo de archivos permitidos
       $config['max_size'] = 5*1024; // definir el peso máximo de subida (5MB)

      // Subida de la primera imagen
      $nombre_aleatorio1 = "imagen1_" . time() * rand(100, 10000);
      $config['file_name'] = $nombre_aleatorio1;
      $this->load->library('upload', $config); // cargando la librería UPLOAD
      if ($this->upload->do_upload("imagen1")) { // intentando subir el archivo
          $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
          $nombre_archivo_subido1 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
      } else {
          $nombre_archivo_subido1 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
      }
       // Subida de la segunda imagen
       $nombre_aleatorio2 = "imagen2_" . time() * rand(100, 10000);
       $config['file_name'] = $nombre_aleatorio2;
       $this->load->library('upload', $config); // cargando la librería UPLOAD
       if ($this->upload->do_upload("imagen2")) { // intentando subir el archivo
           $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
           $nombre_archivo_subido2= $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
       } else {
            $nombre_archivo_subido2 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
       }

       // Subida de la tercera imagen
       $nombre_aleatorio3 = "imagen3_" . time() * rand(100, 10000);
       $config['file_name'] = $nombre_aleatorio3;
       $this->load->library('upload', $config); // cargando la librería UPLOAD
       if ($this->upload->do_upload("imagen3")) { // intentando subir el archivo
           $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
            $nombre_archivo_subido3 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
       } else {
            $nombre_archivo_subido3 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
       }
       // Subida de la cuarta imagen
       $nombre_aleatorio4 = "imagen4_" . time() * rand(100, 10000);
       $config['file_name'] = $nombre_aleatorio4;
       $this->load->library('upload', $config); // cargando la librería UPLOAD
       if ($this->upload->do_upload("imagen4")) { // intentando subir el archivo
           $dataArchivoSubido = $this->upload->data(); // capturando información del archivo subido
            $nombre_archivo_subido4 = $dataArchivoSubido["file_name"]; // obteniendo el nombre del archivo
       } else {
            $nombre_archivo_subido4 = ""; // Cuando no se sube el archivo, el nombre queda VACÍO
       }

       // Repite el proceso para las imágenes 3 y 4
       $id=$this->input->post("id");
       $datosBanco=array(
           "nombre"=>$this->input->post("nombre"),
           "direccion"=>$this->input->post("direccion"),
           "ciudad"=>$this->input->post("ciudad"),
           "telefono"=>$this->input->post("telefono"),
           "gerente"=>$this->input->post("gerente"),
           "mision"=>$this->input->post("mision"),
           "vision"=>$this->input->post("vision"),
           "correo"=>$this->input->post("correo"),
           "horario"=>$this->input->post("horario"),
           "lema"=>$this->input->post("lema"),
           "tarjetadeb"=>$this->input->post("tarjetadeb"),
           "remesas"=>$this->input->post("remesas"),
           "ben1"=>$this->input->post("ben1"),
           "text1"=>$this->input->post("text1"),
           "ben2"=>$this->input->post("ben2"),
           "text2"=>$this->input->post("text2"),
           "textge"=>$this->input->post("textge"),
           "imagen1"=>$nombre_archivo_subido1,
           "imagen2"=>$nombre_archivo_subido2 ,
           "imagen3"=>$nombre_archivo_subido3 ,
           "imagen4"=>$nombre_archivo_subido4 ,

           );


  // Llamar a la función actualizar con los tres argumentos
  $this->Banco->actualizar($id, $datosBanco, $nombre_archivo_subido1,$nombre_archivo_subido2,$nombre_archivo_subido3,$nombre_archivo_subido4);

  $this->session->set_flashdata("confirmacion","Banco actualizado exitosamente");
  redirect('bancos/index');
}



  }// cierre de la clase

 ?>
