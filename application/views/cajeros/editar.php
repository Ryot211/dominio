<div class="hero overlay inner-page" style="max-height: 100px; overflow: hidden;">
    <img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob" style="height: 100%; width: auto;">
    <div class="container">
        <div class="row align-items-center justify-content-center pt-5">
            <div class="col-lg-6 text-center pe-lg-5">
                <h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa fa-plus-circle"></i> Cajeros</h1>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container" >
    <form  action="<?php echo site_url('cajeros/actualizarCajero');?>" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light" id="formularioCajero" >
    <input type="hidden" name="id" id="id"value="<?php echo $cajeroEditar->id; ?>">
   
        <div class="mb-3">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $cajeroEditar->nombre; ?>" placeholder="Ingrese el nombre del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ubicacion"><b>Ubicacion:</b></label>
            <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $cajeroEditar->ubicacion; ?>" placeholder="Ingrese la ubicacion del Cajero" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="direccion"><b>Direccion:</b></label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $cajeroEditar->direccion; ?>" placeholder="Ingrese la direccion de la Cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ciudad"><b>Ciudad:</b></label>
            <input type="text" name="ciudad" id="ciudad" value="<?php echo $cajeroEditar->ciudad; ?>" placeholder="Ingrese la ciudad de ubicacion de la Corresponsal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="numserie"><b>Numero de Serie:</b></label>
            <input type="text" name="numserie" id="numserie" value="<?php echo $cajeroEditar->numserie; ?>" placeholder="Ingrese el numero de serie del Cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="modelo"><b>Modelo:</b></label>
            <input type="text" name="modelo" id="modelo"value="<?php echo $cajeroEditar->modelo; ?>" placeholder="Ingrese el modelo del cajero" class="form-control" required>
        </div>   

        <div class="form-group">
            <label for="estado"><b>Estado del cajero:</b></label>
            <input type="text" name="estado" id="estado" value="<?php echo $cajeroEditar->estado; ?>" placeholder="Ingrese el estado del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_ins"><b>Fecha de Instalacion:</b></label>
            <input type="date" name="fecha_ins" id="fecha_ins" value="<?php echo $cajeroEditar->fecha_ins; ?>" placeholder="Seleccione la fecha de instalacion del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mantenimiento"><b>Fecha de Mantenimiento:</b></label>
            <input type="date" name="mantenimiento" id="mantenimiento" value="<?php echo $cajeroEditar->mantenimiento; ?>" placeholder="Seleccione la fecha del ultimo mantenimiento del cajero" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Sucursal_ID"><b>Sucursal:</b></label>
            <select name="Sucursal_ID" id="Sucursal_ID" class="form-control" required>
                <option value="">Seleccione la Sucursal</option>
                <?php foreach ($sucursales as $sucursal): ?>
                    <?php if ($cajeroEditar->Sucursal_ID == $sucursal->id): ?>
                        <option value="<?php echo $sucursal->id; ?>" selected><?php echo $sucursal->nombre; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $sucursal->id; ?>"><?php echo $sucursal->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="latitud"><b>Latitud:</b></label>
                <input type="number" name="latitud" id="latitud" value="<?php echo $cajeroEditar->latitud; ?>" placeholder="Ingrese la latitud" class="form-control" required readonly>
            </div>
            <div class="col-md-6">
                <label for="longitud"><b>Longitud:</b></label>
                <input type="number" name="longitud" id="longitud" value="<?php echo $cajeroEditar->longitud; ?>" placeholder="Ingrese la longitud" class="form-control" required readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div id="mapa" style="height:500px; width:100%; border:1px solid black;"></div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk "></i> Guardar</button> &nbsp&nbsp&nbsp&nbsp
                <a href="<?php echo site_url('cajeros/index');?>" class="btn btn-danger"><i class="fa-solid fa-ban"></i> Cancelar</a>
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
        // Agregar método para validar que la fecha de mantenimiento no sea anterior a la fecha de instalación
        $.validator.addMethod("fechaMantenimientoMayor", function(value, element) {
            var fechaIns = $('#fecha_ins').val();
            var fechaMantenimiento = value;
            return new Date(fechaMantenimiento) >= new Date(fechaIns);
        }, "La fecha de mantenimiento no puede ser anterior a la fecha de instalación.");

        $('#formularioCajero').validate({
            rules: {
                nombre: {
                    required: true
                },
                ubicacion: {
                    required: true
                },
                direccion: {
                    required: true
                },
                ciudad: {
                    required: true
                },
                numserie: {
                    required: true
                },
                modelo: {
                    required: true
                },
                estado: {
                    required: true
                },
                fecha_ins: {
                    required: true
                },
                mantenimiento: {
                    required: true,
                    fechaMantenimientoMayor: true // Utilizando la regla personalizada
                },
                Sucursal_ID: {
                    required: true
                },
                latitud: {
                    required: true,
                    number: true
                },
                longitud: {
                    required: true,
                    number: true
                }
            },
            messages: {
                nombre: {
                    required: "Ingrese el nombre del cajero"
                },
                ubicacion: {
                    required: "Ingrese la ubicacion del cajero"
                },
                direccion: {
                    required: "Ingrese la direccion del cajero"
                },
                ciudad: {
                    required: "Ingrese la ciudad del cajero"
                },
                numserie: {
                    required: "Ingrese el numero de serie del cajero"
                },
                modelo: {
                    required: "Ingrese el modelo del cajero"
                },
                estado: {
                    required: "Ingrese el estado del cajero"
                },
                fecha_ins: {
                    required: "Ingrese la fecha de instalacion del cajero"
                },
                mantenimiento: {
                    required:"Ingrese la fecha del ultimo mantenimiento del cajero"
                },
                Sucursal_ID: {
                    required: "Seleccione la sucursal del cajero"
                },
                latitud: {
                    required: "Seleccione la latitud del cajero",
                    number: "Seleccione la latitud del cajero"
                },
                longitud: {
                    required: "Seleccione la longitud del cajero",
                    number: "Seleccione la longitud del cajero"
                }
            }
        });
    });
</script>

