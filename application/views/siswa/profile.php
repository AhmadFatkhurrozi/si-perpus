<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Perpustakaan</title>

	<?php 
		echo __css('creative');
		echo __css('popup');
		echo __css('fontawesome');
	?>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><b>SIP</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- <h1><?php echo $judul; ?></h1> -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">

	        <form class="form-inline mt-2 mt-md-0" action="<?=base_url()?>siswa/siswaSearch" method="post">
				<input class="form-control mr-sm-2" type="text" placeholder="Masukkan NIS" name="cari" required="">
				<button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
			</form>
        
      </div>
    </div>
  </header>
  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">About</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 text-left">
          <div class="mt-5">
            <h3 class="h4 mb-2">kontak</h3>
            <p class="text-muted mb-0">
              0987654123456
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-left">
          <div class="mt-5">
            <h3 class="h4 mb-2">tentang kami</h3>
            <p class="text-muted mb-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-left">
          <div class="mt-5">
            <h3 class="h4 mb-2">Saran</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
		echo __js('jquery'); 
		echo __js('bootstrap-bundle');
		echo __js('creative');
	 ?>
   
</body>

</html>