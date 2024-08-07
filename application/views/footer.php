
<div class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="widget">
					<h3>Información</h3>
					<p><?php echo $banco->lema; ?></p>
				</div> <!-- /.widget -->
				<div class="widget">
          <h3>Dirección</h3>
					<address> <br><?php echo $banco->direccion; ?></address>
					<ul class="list-unstyled links">
						<li><a href="tel://1800-000700"><?php echo $banco->telefono; ?></a></li>
						<li><a href="mailto:sugerencias@banecuador.fin.ec"><?php echo $banco->correo; ?></a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<div class="widget">
					<h3>Información</h3>
					<ul class="list-unstyled float-start links">
						<li><a href="<?php echo site_url('sucursales/index');?>" >Sucursales</a></li>
						<li><a href="<?php echo site_url('cajeros/index');?>">Cajeros</a></li>
						<li><a href="<?php echo site_url('corresponsales/index');?>">Correponsales</a></li>
						<li><a href="<?php echo site_url();?>/welcome/contacto">Contacto</a></li>

					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<div class="widget">

					<h3>Redes Sociales</h3>
					<ul class="list-unstyled social">
						<li><a href="#"><span class="icon-instagram"></span></a></li>
						<li><a href="#"><span class="icon-twitter"></span></a></li>
						<li><a href="https://www.facebook.com/BanEcuador/?locale=es_LA"><span class="icon-facebook"></span></a></li>



					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
		</div> <!-- /.row -->

		<div class="row mt-5">
			<div class="col-12 text-center">
					<!--
              **==========
              NOTE:
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
		<!-- Preloader -->
		<!-- Preloader -->

    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/tiny-slider.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/flatpickr.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/aos.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/glightbox.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/navbar.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/counter.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

  </body>
  </html>
