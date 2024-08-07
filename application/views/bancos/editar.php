<div class="hero overlay inner-page" style="max-height: 100px; overflow: hidden;">
    <img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob" style="height: 100%; width: auto;">
    <div class="container">
        <div class="row align-items-center justify-content-center pt-5">
            <div class="col-lg-6 text-center pe-lg-5">
                <h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa fa-plus-circle"></i> Banco</h1>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container" >
    <form  action="<?php echo site_url('bancos/actualizarBanco');?>" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light" id="formularioActualizarBanco" >
    <input type="hidden" name="id" id="id"value="<?php echo $bancoEditar->id; ?>">

        <div class="mb-3">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $bancoEditar->nombre; ?>" placeholder="Ingrese el nombre del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion"><b>Direccion:</b></label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $bancoEditar->direccion; ?>" placeholder="Ingrese la direccion de la Cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ciudad"><b>Ciudad:</b></label>
            <input type="text" name="ciudad" id="ciudad" value="<?php echo $bancoEditar->ciudad; ?>" placeholder="Ingrese la ubicacion del Cajero" class="form-control" required>
        </div>
        <div class="form-group">
             <label for="telefono"><b>Telefono:</b></label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $bancoEditar->telefono; ?>" placeholder="Ingrese la ciudad de ubicacion de la Corresponsal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gerente"><b>Gerente:</b></label>
            <input type="text" name="gerente" id="gerente" value="<?php echo $bancoEditar->gerente; ?>" placeholder="Ingrese el numero de serie del Cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="textge"><b>Texto-Gerente:</b></label>
            <input type="text" name="textge" id="textge"value="<?php echo $bancoEditar->textge; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="mision"><b>Mision:</b></label>
            <input type="text" name="mision" id="mision"value="<?php echo $bancoEditar->mision; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="vision"><b>Vision:</b></label>
            <input type="text" name="vision" id="vision"value="<?php echo $bancoEditar->vision; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo"><b>Correo:</b></label>
            <input type="text" name="correo" id="correo"value="<?php echo $bancoEditar->correo; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="horario"><b>Horario:</b></label>
            <input type="text" name="horario" id="horario"value="<?php echo $bancoEditar->horario; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lema"><b>Lema:</b></label>
            <input type="text" name="lema" id="lema"value="<?php echo $bancoEditar->lema; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tarjetadeb"><b>Tarjeta de debito:</b></label>
            <input type="text" name="tarjetadeb" id="tarjetadeb"value="<?php echo $bancoEditar->tarjetadeb; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="remesas"><b>Remesas:</b></label>
            <input type="text" name="remesas" id="remesas"value="<?php echo $bancoEditar->remesas; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="educacionfin"><b>Educacion Financiera:</b></label>
            <input type="text" name="educacionfin" id="educacionfin"value="<?php echo $bancoEditar->educacionfin; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ben1"><b>Beneficiario1:</b></label>
            <input type="text" name="ben1" id="ben1"value="<?php echo $bancoEditar->ben1; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="text1"><b>Texto-Beneficiario1:</b></label>
            <input type="text" name="text1" id="text1"value="<?php echo $bancoEditar->text1; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ben2"><b>Beneficiario2:</b></label>
            <input type="text" name="ben2" id="ben2"value="<?php echo $bancoEditar->ben2; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="text2"><b>Texto-Beneficiario2:</b></label>
            <input type="text" name="text2" id="text2"value="<?php echo $bancoEditar->text2; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="text2">Imagen Principal:</label>
            <input type="file" name="imagen1"id="imagen1"  class="form-control"  accept="image/*">
            <script>
                                            $(document).ready(function () {
                                                $("#imagen1").fileinput({
                                                //showUpload:false
                                                //showRemove: false,
                                                language:'es',
                                                });
                                            });
                                        </script>
            <br>
            <?php if ($bancoEditar->imagen1!=""): ?>
                <img src="<?php echo base_url('uploads/Bancos/').$bancoEditar->imagen1; ?>"height="100px" alt="">
            <?php else: ?>
                N/A
            <?php endif; ?>
        </div>
        <br>
        <label for="text2" >Imagen 1:</label>
        <input type="file" name="imagen2"id="imagen2"  class="form-control"  accept="image/*">
        <script>
                                        $(document).ready(function () {
                                            $("#imagen2").fileinput({
                                            //showUpload:false
                                            //showRemove: false,
                                            language:'es',
                                            });
                                        });
                                    </script>
        <br>
        <?php if ($bancoEditar->imagen2!=""): ?>
            <img src="<?php echo base_url('uploads/Bancos/').$bancoEditar->imagen2; ?>"height="100px" alt="">
        <?php else: ?>
            N/A
        <?php endif; ?>
        <br>
        <label for="text2" >Imagen 2:</label>
        <input type="file" name="imagen3"id="imagen3"  class="form-control"  accept="image/*">
        <script>
                                        $(document).ready(function () {
                                            $("#imagen3").fileinput({
                                            //showUpload:false
                                            //showUpload:false

                                            //showUpload:false

                                            //showRemove: false,
                                            language:'es',
                                            });
                                        });
                                    </script>
        <br>
        <?php if ($bancoEditar->imagen3!=""): ?>
            <img src="<?php echo base_url('uploads/Bancos/').$bancoEditar->imagen3; ?>"height="100px" alt="">
        <?php else: ?>
            N/A
        <?php endif; ?>
        <br>
        <label for="text2" >Imagen 3:</label>
        <input type="file" name="imagen4"id="imagen4"  class="form-control"  accept="image/*">
        <script>
                                        $(document).ready(function () {
                                            $("#imagen4").fileinput({
                                            //showUpload:false
                                            //showRemove: false,
                                            language:'es',
                                            });
                                        });
                                    </script>
        <br>
        <?php if ($bancoEditar->imagen4!=""): ?>
            <img src="<?php echo base_url('uploads/Bancos/').$bancoEditar->imagen4; ?>"height="100px" alt="">
        <?php else: ?>
            N/A
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk "></i> Actualizar</button> &nbsp&nbsp&nbsp&nbsp
                <a href="<?php echo site_url('bancos/index');?>" class="btn btn-danger"><i class="fa-solid fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>


</div>

    <br>
    <br>

    <script type="text/javaScript">
  function initMap(){
    var coordenadaCentral =
		new google.maps.LatLng(<?php echo $cajeroEditar->latitud; ?>, <?php echo $cajeroEditar->longitud; ?>);
   var miMapa= new google.maps.Map(
     document.getElementById('mapa'),{
       center: coordenadaCentral,
       zoom: 10,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     }
   );
   var marcador= new google.maps.Marker({
     position:coordenadaCentral,
     map: miMapa,
     title: 'Seleccione la ubicacion',
     draggable:true
   });
   google.maps.event.addListener(
    marcador,
    'dragend',
    function(event){
      var latitud=this.getPosition().lat();
      var longitud=this.getPosition().lng();
      document.getElementById('latitud').value=latitud;
      document.getElementById('longitud').value=longitud;
    }
   );
  }

</script>




<script>
    $(document).ready(function() {
        $('#formularioActualizarBanco').validate({
            rules: {
                nombre: {
                    required: true
                },
                direccion: {
                    required: true
                },
                ciudad: {
                    required: true
                },
                telefono: {
                    required: true
                },
                gerente: {
                    required: true
                },
                textge: {
                    required: true
                },
                mision: {
                    required: true
                },
                vision: {
                    required: true
                },
                correo: {
                    required: true,

                },
                horario: {
                    required: true
                },
                lema: {
                    required: true
                },
                tarjetadeb: {
                    required: true
                },
                remesas: {
                    required: true
                },
                educacionfin: {
                    required: true
                },
                ben1: {
                    required: true
                },
                text1: {
                    required: true
                },
                ben2: {
                    required: true
                },
                text2: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "Ingrese el nombre del Banco"
                },
                direccion: {
                    required: "Ingrese la dirección del Banco"
                },
                ciudad: {
                    required: "Ingrese la ciudad de ubicación del Banco"
                },
                telefono: {
                    required: "Ingrese el teléfono del Banco"
                },
                gerente: {
                    required: "Ingrese el nombre del gerente del Banco"
                },
                textge: {
                    required: "Ingrese el texto del gerente del Banco"
                },
                mision: {
                    required: "Ingrese la misión del Banco"
                },
                vision: {
                    required: "Ingrese la visión del Banco"
                },
                correo: {
                    required: "Ingrese el correo electrónico",

                },
                horario: {
                    required: "Ingrese el horario de atención del Banco"
                },
                lema: {
                    required: "Ingrese el lema del Banco"
                },
                tarjetadeb: {
                    required: "Ingrese el tipo de tarjeta de débito del Banco"
                },
                remesas: {
                    required: "Ingrese el tipo de remesas del Banco"
                },
                educacionfin: {
                    required: "Ingrese el tipo de educación financiera del Banco"
                },
                ben1: {
                    required: "Ingrese el primer beneficiario del Banco"
                },
                text1: {
                    required: "Ingrese el texto del primer beneficiario del Banco"
                },
                ben2: {
                    required: "Ingrese el segundo beneficiario del Banco"
                },
                text2: {
                    required: "Ingrese el texto del segundo beneficiario del Banco"
                }
            }
        });
    });
</script>
