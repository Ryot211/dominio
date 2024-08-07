<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- Importacion de Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<!--Importacion de boostrap --->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- iMPORTANDO API DE GOOGLE MAPS -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxKneyvn8b9jwvDdDC0EW7IfJMZ5R6At8&libraries=places&callback=initMap"></script>

	<!-- iMPORTANDO FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<!-- iMPORTANDO Sweet Alert -->
	<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css " rel="stylesheet">
    <!-- Bootstrap Fileinput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css">

    <!-- Bootstrap Fileinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
    <!-- español fileinput -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/es.min.js"></script>

   <!-- jQuery Validate CDN (Otra versión) -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/flaticon/font/flaticon.css'); ?>">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/tiny-slider.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/aos.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/glightbox.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


	<link rel="stylesheet" href="<?php echo base_url('assets/css/flatpickr.min.css'); ?>">



	<title>BanEcuador</title>

</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>

	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="<?php echo site_url();?>" class="logo m-0 float-start"><?php echo $banco->nombre; ?><span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center ">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="<?php echo site_url();?>">Inicio</a></li>
								<li><a href="<?php echo site_url('bancos/index');?>">Banco</a></li>
								<li><a href="<?php echo site_url('sucursales/index');?>">Sucursales</a></li>
								<li><a href="<?php echo site_url('cajeros/index');?>">Cajeros</a></li>
								<li><a href="<?php echo site_url('corresponsales/index');?>">Correponsales</a></li>
								<li><a href="<?php echo site_url();?>/welcome/contacto">Contacto</a></li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>

							<a href="#" class="call-us d-flex align-items-center">
								<span class="icon-phone"></span>
								<span><?php echo $banco->telefono; ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php if($this->session->flashdata('confirmacion')):?>
            <script type="text/javascript" >
                Swal.fire({
                    title: "Confirmacion",
                    text: "<?php echo $this->session->flashdata('confirmacion') ?>",
                    icon: "success"
                });
            </script>
            <?php $this->session->set_flashdata('confirmacion','');?>
        <?php endif;?>
		<?php if($this->session->flashdata('eliminacion')):?>
            <script type="text/javascript" >
                Swal.fire({
                    title: "Eliminacion",
                    text: "<?php echo $this->session->flashdata('eliminacion') ?>",
                    icon: "warning"
                });
            </script>
            <?php $this->session->set_flashdata('eliminacion','');?>
        <?php endif;?>

		<script>
			    function confirmarEliminacionSucursal(id) {
			        Swal.fire({
			            title: '¿Estás seguro?',
			            text: 'Esta acción no se puede deshacer.',
			            icon: 'warning',
			            showCancelButton: true,
			            confirmButtonColor: '#3085d6',
			            cancelButtonColor: '#d33',
			            confirmButtonText: 'Sí, eliminar',
			            cancelButtonText: 'Cancelar'
			        }).then((result) => {
			            if (result.isConfirmed) {
			                window.location.href = "<?php echo site_url('sucursales/borrar/'); ?>" + id;
			            }
			        });
			        return false;
			    }

				function confirmarEliminacionCorresponsal(id) {
			        Swal.fire({
			            title: '¿Estás seguro?',
			            text: 'Esta acción no se puede deshacer.',
			            icon: 'warning',
			            showCancelButton: true,
			            confirmButtonColor: '#3085d6',
			            cancelButtonColor: '#d33',
			            confirmButtonText: 'Sí, eliminar',
			            cancelButtonText: 'Cancelar'
			        }).then((result) => {
			            if (result.isConfirmed) {
			                window.location.href = "<?php echo site_url('corresponsales/borrar/'); ?>" + id;
			            }
			        });
			        return false;
			    }
				function confirmarEliminacionCajero(id) {
			        Swal.fire({
			            title: '¿Estás seguro?',
			            text: 'Esta acción no se puede deshacer.',
			            icon: 'warning',
			            showCancelButton: true,
			            confirmButtonColor: '#3085d6',
			            cancelButtonColor: '#d33',
			            confirmButtonText: 'Sí, eliminar',
			            cancelButtonText: 'Cancelar'
			        }).then((result) => {
			            if (result.isConfirmed) {
			                window.location.href = "<?php echo site_url('cajeros/borrar/'); ?>" + id;
			            }
			        });
			        return false;
			    }
			</script>


	</nav>
