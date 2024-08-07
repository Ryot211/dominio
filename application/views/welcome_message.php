<div class="hero overlay">
<img src="<?php echo base_url('assets/images/blob.svg'); ?>" alt="" class="img-fluid blob">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5">
					<h1 class="heading text-white mb-3" data-aos="fade-up"><?php echo $banco->nombre; ?></h1>
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100"><?php echo $banco->lema; ?></p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="<?php echo site_url();?>/welcome/contacto" class="btn btn-outline-white-reverse me-4">Contáctanos</a>
						<a href="https://youtu.be/oQemEGY33ik?si=aS6ON9XtuTOXe7JN" class="text-white glightbox">Cumpliendo sueños</a>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
				<div class="img-wrap">
						<img src="uploads/Banco/<?php echo $banco->imagen1; ?>" alt="Imagen del banco" class="small-image">
					</div>


				</div>
			</div>
		</div>
	</div>
<style>
	.small-image {
    max-width: 650px; /* Puedes ajustar este valor según tu preferencia */
    height: auto; /* Esto mantiene la proporción de la imagen */
}

</style>

<div class="section">
		<div class="container">
			<div class="row justify-content-between">
				<h1 class="center" >Reporte General</h1>
				<div id="reporteMapa" style="height:300px; width:100%; border:2px solid white; border-radius: 10px;" class="col-lg-11 mb-4 mb-lg-0">
					<!-- Contenido del elemento -->
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

        // Iconos para cada tipo de marcador
				// Iconos para cada tipo de marcador
				// Iconos para cada tipo de marcador

        var iconos = {
            cajero: "<?php echo base_url('assets/images/cajero.png'); ?>",
            sucursal: "<?php echo base_url('assets/images/image.png'); ?>",
            corresponsal: "<?php echo base_url('assets/images/tienda.png'); ?>"
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
            icon: {
                url: iconos.cajero,
                scaledSize: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40),
                labelOrigin: new google.maps.Point(20, 13)
            }
        });
        <?php endforeach; ?>

        <?php foreach ($listadoSucursales as $sucursal): ?>
        var coordenadaTemporal = new google.maps.LatLng(
            <?php echo $sucursal->latitud; ?>,
            <?php echo $sucursal->longitud; ?>
        );

        var marcador = new google.maps.Marker({
            position: coordenadaTemporal,
            map: miMapa,
            title: '<?php echo $sucursal->nombre; ?>',
            icon: {
                url: iconos.sucursal,
                scaledSize: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40),
                labelOrigin: new google.maps.Point(20, 13)
            }
        });
        <?php endforeach; ?>

        <?php foreach ($listadoCorresponsales as $corresponsal): ?>
        var coordenadaTemporal = new google.maps.LatLng(
            <?php echo $corresponsal->latitud; ?>,
            <?php echo $corresponsal->longitud; ?>
        );

        var marcador = new google.maps.Marker({
            position: coordenadaTemporal,
            map: miMapa,
            title: '<?php echo $corresponsal->nombre; ?>',
            icon: {
                url: iconos.corresponsal,
                scaledSize: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40),
                labelOrigin: new google.maps.Point(20, 13)
            }
        });
        <?php endforeach; ?>
    }
</script>



	<div class="section sec-features">
		<div class="container">
			<div class="row">
				<div class="col-6" data-aos="fade-up" data-aos-delay="0">
					<div class="feature d-flex">

						<div>
							<h3>Misión</h3>
							<p class="justificado" ><?php echo $banco->mision; ?></p>
						</div>
					</div>
				</div>
				<div class="col-6" data-aos="fade-up" data-aos-delay="200">
					<div class="feature d-flex">

						<div>
							<h3>Visíon</h3>
							<p class="justificado" ><?php echo $banco->vision; ?> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<div class="section sec-services">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
				<h2 class="heading text-primary">Servicios</h2>
				</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up">

				<div class="service text-center">
				<span class="bi-wallet-fill"></span>
					<div>
						<h3>Tarjetas de debito</h3>
						<p class="mb-4"><?php echo $banco->tarjetadeb; ?></p>
						<p><a href="#" class="btn btn-outline-primary py-2 px-3">Ver más</a></p>
					</div>
				</div>


			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
				<div class="service text-center">
				<span class="bi-layers"></span>
					<div>
						<h3>Cobro de remesas</h3>
						<p class="mb-4" ><?php echo $banco->remesas; ?></p>
					<p><a href="#" class="btn btn-outline-primary py-2 px-3">Ver más</a></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
				<div class="service text-center">
				<span class="bi-cash-coin"></span>
					<div>
						<h3>Educacion Financiera</h3>
						<p class="mb-4" ><?php echo $banco->educacionfin; ?></p>
						<a href="#" class="btn btn-outline-primary py-2 px-3">Ver más</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="section sec-cta overlay" style="background-image: url('images/img-3.jpg')">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5" data-aos="fade-up" data-aos-delay="0">
				<h2 class="heading">Quieres comunicarte con nosotros?</h2>
				<p><?php echo $banco->lema; ?> </p>
			</div>
			<div class="col-lg-5 text-end" data-aos="fade-up" data-aos-delay="100">
				<a href="<?php echo site_url();?>/welcome/contacto"class="btn btn-outline-white-reverse">Contáctanos</a>
			</div>
		</div>
	</div>
</div>




<div class="section sec-testimonial bg-light">
	<div class="container">
		<div class="row mb-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<h2 class="heading text-primary">Testimonios</h2>
			</div>

		</div>


		<div class="testimonial-slider-wrap">
			<div class="testimonial-slider" id="testimonial-slider">
				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('assets/images/img-4.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p><?php echo $banco->textge; ?></p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black"><?php echo $banco->gerente; ?></strong>
								<span>Gerente de BanEcuador</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('assets/images/img-3.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p><?php echo $banco->text1; ?></p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black"><p><?php echo $banco->ben1; ?></p></strong>
								<span>Beneficiario Crédito BanEcuador</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('assets/images/img-2.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p><p><?php echo $banco->text2; ?></p></p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black"><p><?php echo $banco->ben2; ?></p></strong>
								<span>Beneficiario Crédito BanEcuador</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
