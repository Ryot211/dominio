<div class="hero overlay inner-page" style="max-height: 100px; overflow: hidden;">
    <img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob" style="height: 100%; width: auto;">
    <div class="container">
        <div class="row align-items-center justify-content-center pt-5">
            <div class="col-lg-6 text-center pe-lg-5">
                <h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa fa-plus-circle"></i> Sucursales</h1>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container" >
    <form  action="<?php echo site_url('sucursales/guardarSucursal');?>" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-light" id="formularioSucursal" >
       
        <div class="mb-3">
            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre de la Sucursal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion"><b>Direccion:</b></label>
            <input type="text" name="direccion" id="direccion" placeholder="Ingrese la direccion de la Sucursal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ciudad"><b>Ciudad:</b></label>
            <input type="text" name="ciudad" id="ciudad" placeholder="Ingrese la ciudad de ubicacion de la Sucursal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono"><b>Telefono:</b></label>
            <input type="text" name="telefono" id="telefono" placeholder="Ingrese la ciudad de ubicacion de la Sucursal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gerente"><b>Gerente:</b></label>
            <input type="text" name="gerente" id="gerente" placeholder="Ingrese el nombre del gerente de la sucursal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="horario"><b>Horario:</b></label>
            <input type="text" name="horario" id="horario" placeholder="Ingrese el horario de atención" class="form-control" required>
        </div>   
        <div class="form-group">
            <label for="Banco_ID"><b>Banco:</b></label>
            <select name="Banco_ID" id="Banco_ID" class="form-control" required>
                <option value="">Seleccione el banco</option>
                <?php foreach ($bancos as $banco): ?>
                    <option value="<?php echo $banco->id; ?>"><?php echo $banco->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="latitud"><b>Latitud:</b></label>
                <input type="number" name="latitud" id="latitud" placeholder="Ingrese la latitud" class="form-control" required readonly>
            </div>
            <div class="col-md-6">
                <label for="longitud"><b>Longitud:</b></label>
                <input type="number" name="longitud" id="longitud" placeholder="Ingrese la longitud" class="form-control" required readonly>
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
                <a href="<?php echo site_url('sucursales/index');?>" class="btn btn-danger"><i class="fa-solid fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>


</div>

    <br>
    <br>

    <script type="text/javascript">
  function initMap(){
    var coordenadaCentral=new google.maps.LatLng(-0.1804137561027874, -78.4985377843305);
    var miMapa=new google.maps.Map(
      document.getElementById('mapa'),
      {
        center:coordenadaCentral,
        zoom:8,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      }
    );
    var marcador=new google.maps.Marker({
      position:coordenadaCentral,
      map:miMapa,
      title:'Seleccione la ubicacion',
      draggable:true
    });
    google.maps.event.addListener(
      marcador,
      'dragend',
      function(event){
        var latitud=this.getPosition().lat();
        var longitud=this.getPosition().lng();
        document.getElementById('latitud').value=latitud;
        document.getElementById('longitud').value=longitud
      }
    );
  }
</script>



<script>
    $(document).ready(function() {
        $('#formularioSucursal').validate({
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
                horario: {
                    required: true
                },
                Banco_ID: {
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
                    required: "Ingrese el nombre de la Sucursal"
                },
                direccion: {
                    required: "Ingrese la dirección de la Sucursal"
                },
                ciudad: {
                    required: "Ingrese la ciudad de ubicación de la Sucursal"
                },
                telefono: {
                    required: "Ingrese el teléfono de la Sucursal"
                },
                gerente: {
                    required: "Ingrese el nombre del gerente de la sucursal"
                },
                horario: {
                    required: "Ingrese el horario de atención"
                },
                Banco_ID: {
                    required: "Seleccione el banco"
                },
                latitud: {
                    required: "Ingrese la latitud",
                    number: "Ingrese un valor numérico"
                },
                longitud: {
                    required: "Ingrese la longitud",
                    number: "Ingrese un valor numérico"
                }
            }
        });
    });
</script>
