
<div class="hero overlay inner-page">
<img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob">

		<div class="container">
			<div class="row align-items-center justify-content-center pt-5">
				<div class="col-lg-6 text-center pe-lg-5">
					<h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa-solid fa-store"></i>Corresponsales</h1>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i class="fa fa-eye"></i> Ver Mapa
							</button>
							<a href="<?php echo site_url('corresponsales/nuevo'); ?>" class="btn btn-success">
								<i class="fa fa-plus-circle"></i>
								Agregar Correponsales
							</a>
				</div>
			</div>
		</div>
	</div>


    <br>
<div class="table-container">
    <?php if ($listadoCorresponsales): ?>
		<table class="table table-borderless table-rounded">
        <thead>
            <tr class="table-primary" >
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
                <th>CIUDAD</th>
                <th>TIPO</th>
                <th>HORARIO</th>
                <th>LATITUD</th>
                <th>LONGITUD</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>BANCO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoCorresponsales as $corresponsal): ?>
                <tr class="table-info" >
                    <td><?php echo $corresponsal->id; ?></td>
                    <td><?php echo $corresponsal->nombre; ?></td>
                    <td><?php echo $corresponsal->direccion; ?></td>
                    <td><?php echo $corresponsal->ciudad; ?></td>
                    <td><?php echo $corresponsal->tipo; ?></td>
                    <td><?php echo $corresponsal->horario;?></td>
                    <td><?php echo $corresponsal->latitud; ?></td>
                    <td><?php echo $corresponsal->longitud; ?></td>
                    <td><?php echo $corresponsal->estado;?></td>
                    <td><?php echo $corresponsal->fecha_re?></td>
                    <td><?php echo $corresponsal->banco->nombre;?></td>
                    <td>
                        <a href="<?php echo site_url('corresponsales/editar/').$corresponsal->id; ?>" class="btn btn-warning" title="Editar"><i class="fa fa-pen"></i></a>
                        <a href="#" onclick="confirmarEliminacionCorresponsal('<?php echo $corresponsal->id; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eyes"></i> Mapa de sucursales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="reporteMapa" class="modal-body" style="height:300px; width:100%; border:2px solid black">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function initMap() {
    var coordenadaCentral = new google.maps.LatLng(-0.152948869329262, -78.4868431364856);
    var miMapa = new google.maps.Map(
        document.getElementById('reporteMapa'),
        {
            center: coordenadaCentral,
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
    );


    // Icono personalizado para el marcador
		// Icono personalizado para el marcador
		// Icono personalizado para el marcador
		// Icono personalizado para el marcador

	var icono = {
		url: "<?php echo base_url('assets/images/tienda.png'); ?>",
		scaledSize: new google.maps.Size(40, 40), // Tamaño personalizado del icono
		origin: new google.maps.Point(0, 0), // Origen del icono (0, 0) para que la posición coincida con la posición del marcador
		anchor: new google.maps.Point(20, 40), // Ancla del icono (centro inferior)
		labelOrigin: new google.maps.Point(20, 13) // Origen de la etiqueta (centro superior)
	};


    <?php foreach ($listadoCorresponsales as $corresponsal): ?>
    var coordenadaTemporal = new google.maps.LatLng(
        <?php echo $corresponsal->latitud; ?>,
        <?php echo $corresponsal->longitud; ?>
    );

    var marcador = new google.maps.Marker({
        position: coordenadaTemporal,
        map: miMapa,
        title: '<?php echo $corresponsal->nombre; ?>',
        icon: icono // Asignación del icono personalizado al marcador
    });
    <?php endforeach; ?>
}


    </script>
<?php else: ?>
    <div class="alert alert-danger">
        No se encontraron corresponsales registradas
    </div>
<?php endif; ?>
