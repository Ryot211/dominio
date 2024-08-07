
<div class="hero overlay inner-page">
<img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob">

		<div class="container">
			<div class="row align-items-center justify-content-center pt-5">
				<div class="col-lg-6 text-center pe-lg-5">
					<h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa-solid fa-money-check-dollar"></i>Cajeros</h1>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i class="fa fa-eye"></i> Ver Mapa
							</button>
							<a href="<?php echo site_url('cajeros/nuevo'); ?>" class="btn btn-success">
								<i class="fa fa-plus-circle"></i>
								Agregar Cajeros
							</a>
				</div>
			</div>
		</div>
	</div>


    <br>
<div class="table-container">
    <?php if ($listadoCajeros): ?>
		<table class="table table-borderless table-rounded">
        <thead>
            <tr class="table-primary" >
                <th>ID</th>
                <th>NOMBRE</th>
                <th>UBICACION</th>
                <th>DIRECCION</th>
                <th>CIUDAD</th>
                <th>N-SERIE</th>
                <th>MODELO</th>
                <th>ESTADO</th>
                <th>FECHA</th>
                <th>MANTENIMIENTO</th>
                <th>SUCURSAL</th>
                <th>LATITUD</th>
                <th>LONGITUD</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoCajeros as $cajero): ?>
                <tr class="table-info" >
                    <td><?php echo $cajero->id; ?></td>
                    <td><?php echo $cajero->nombre; ?></td>
                    <td><?php echo $cajero->ubicacion; ?></td>
                    <td><?php echo $cajero->direccion; ?></td>
                    <td><?php echo $cajero->ciudad; ?></td>
                    <td><?php echo $cajero->numserie; ?></td>
                    <td><?php echo $cajero->modelo;?></td>
                    <td><?php echo $cajero->estado;?></td>
                    <td><?php echo $cajero->fecha_ins?></td>
                    <td><?php echo $cajero->mantenimiento?></td>
                    <td><?php echo $cajero->sucursal->nombre;?></td>
                    <td><?php echo $cajero->latitud; ?></td>
                    <td><?php echo $cajero->longitud; ?></td>

                    <td>
                        <a href="<?php echo site_url('cajeros/editar/').$cajero->id; ?>" class="btn btn-warning" title="Editar"><i class="fa fa-pen"></i></a>
                        <a href="#" onclick="confirmarEliminacionCajero('<?php echo $cajero->id; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- Modal -->
<!-- Modal -->
<!-- Modal -->
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-eyes"></i> Mapa de cajeros</h5>
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
	var icono = {
		url: "<?php echo base_url('assets/images/cajero.png'); ?>",
		scaledSize: new google.maps.Size(40, 40), // Tamaño personalizado del icono
		origin: new google.maps.Point(0, 0), // Origen del icono (0, 0) para que la posición coincida con la posición del marcador
		anchor: new google.maps.Point(20, 40), // Ancla del icono (centro inferior)
		labelOrigin: new google.maps.Point(20, 13) // Origen de la etiqueta (centro superior)
	};


    <?php foreach ($listadoCajeros as $cajero): ?>
    var coordenadaTemporal = new google.maps.LatLng(
        <?php echo $cajero->latitud; ?>,
        <?php echo $cajero->longitud; ?>
    );

    var marcador = new google.maps.Marker({
        position: coordenadaTemporal,
        map: miMapa,
        title: '<?php echo $cajero->nombre; ?>',
        icon: icono // Asignación del icono personalizado al marcador
    });
    <?php endforeach; ?>
}


    </script>
<?php else: ?>
    <div class="alert alert-danger">
        No se encontraron cajeros registradas
    </div>
<?php endif; ?>
