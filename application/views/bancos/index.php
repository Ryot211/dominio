
<div class="hero overlay inner-page">
<img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob">

		<div class="container">
			<div class="row align-items-center justify-content-center pt-5">
				<div class="col-lg-6 text-center pe-lg-5">
					<h1 class="heading text-white mb-2" data-aos="fade-up"><i class="fa-solid fa-building-columns"></i>Banco</h1>

				</div>
			</div>
		</div>
	</div>


    <br>
    <div class="table-container">
    <?php if ($listadoBancos): ?>
        <table class="table table-bordered table-rounded">
            <tbody>
                <?php foreach ($listadoBancos as $index => $banco): ?>
                    <?php if ($index === 0): ?>
                        <!-- Personaliza el contenido de la primera fila aquí -->
                        <tr class="table-primary">
                            <td colspan="2">Información General</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($banco as $campo => $valor): ?>
                        <tr class="table-info">
                            <td><?php echo ucwords(str_replace('_', 'ID ', $campo)); ?></td>
                            <td><?php echo $valor; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="table-info">
                        <td colspan="2">
                            <a href="<?php echo site_url('bancos/editar/').$banco->id; ?>" class="btn btn-warning" title="Editar"><i class="fa fa-pen"></i></a>
                       </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</div>





<style>

</style>
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

//Actualizacion de index.php
//Actualizacion de index.php

//Actualizacion de index.php
//Actualizacion de index.php
//Actualizacion de index.php
//Actualizacion de index.php

    </script>
<?php else: ?>
    <div class="alert alert-danger">
        No se encontraron cajeros registradas
    </div>
<?php endif; ?>
