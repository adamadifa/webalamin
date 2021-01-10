<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<meta name="author" content="phpmu.com">
	<meta name="robots" content="all,index,follow">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
	<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	<?php if ($this->uri->segment(1) == 'berita' and $this->uri->segment(2) == 'detail') {
		$rows = $this->model_utama->view_where('berita', array('judul_seo' => $this->uri->segment(3)))->row_array();
		echo '<meta property="og:title" content="' . $title . '" />
			 <meta property="og:type" content="article" />
			 <meta property="og:url" content="' . base_url() . '' . $this->uri->segment(3) . '" />
			 <meta property="og:image" content="' . base_url() . 'asset/foto_berita/' . $rows['gambar'] . '" />
			 <meta property="og:description" content="' . $description . '"/>';
	} ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />

	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/img/favicon.png" rel="icon">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- =======================================================
  * Template Name: Arsha - v2.2.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<?php include "header.php"; ?>
	</header><!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">

		<div class="container">
			<div class="row">
				<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
					<h1>Pesantren Persis <br>Al-Amin Sindangkasih</h1>
					<h2>Prestatif, Berakhlak Mulia, dan Tafaqquh fiddin.</h2>
					<div class="d-lg-flex">
						<a href="#about" class="btn-get-started scrollto">Daftar Sekarang</a>
						<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
					</div>
				</div>
				<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
					<img src="<?php echo base_url(); ?>asset/images/santri.png" class="img-fluid animated" alt="">
				</div>
			</div>
		</div>

	</section><!-- End Hero -->

	<main id="main">
		<?php echo $contents; ?>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">





		<div class="container footer-bottom clearfix">
			<div class="copyright">
				&copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/php-email-form/validate.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/venobox/venobox.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/vendor/aos/aos.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/assets/js/main.js"></script>

</body>

</html>