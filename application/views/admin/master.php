<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin SI PERPUS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
  		echo __css('fontawesome');
  		echo __css('bootstrap');
  		echo __css('fontastic');
  		echo __css('default');
  		echo __css('custom');
  	?>

  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Admin </span><strong> SI PERPUS</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a>
                    </li>
                    <li>
                    	<a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                    		<strong>view all notifications</strong>
                    	</a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item"><a href="<?=base_url('admin/logout')?>" class="nav-link logout" onclick="return confirm('Keluar ?')"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="title">
              <h1 class="h5"><?php echo $this->session->userdata('__admin_nama'); ?></h1>
              <p>Petugas</p>
            </div>
          </div>
          <ul class="list-unstyled">
            <li class="active"><a href="<?=base_url('admin/dashboard')?>"> <i class="fa fa-home"></i>Home </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>Manage Data Siswa </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?=base_url('admin/kelas')?>"><span class="fa fa-list"></span> Data Kelas</a></li>
                <li><a href="<?=base_url('admin/siswa')?>"><span class="fa fa-list"></span> Data Siswa</a></li>
              </ul>
            </li>

            <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Manage Data Buku </a>
              <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                <li><a href="<?=base_url('admin/rak')?>"><span class="fa fa-list"></span> Data Rak Buku</a></li>
                <li><a href="<?=base_url('admin/buku')?>"><span class="fa fa-list"></span> Data Buku</a></li>
              </ul>
            </li>

          </ul>

          <span class="heading">STATUS PEMINJAMAN</span>

          <ul class="list-unstyled">
            <li> <a href="<?=base_url('admin/penjadwalan')?>"> <i class="fa fa-clock-o"></i>Penjadwalan </a></li>
            <li> <a href="<?=base_url('admin/peminjaman')?>"> <i class="fa fa-table"></i>Data Peminjaman </a></li>
            <li> <a href="<?=base_url('admin/pengembalian')?>"> <i class="fa fa-table"></i>Data Pengembalian </a></li>
             <li> <a href="<?=base_url('admin/history')?>"> <i class="fa fa-history"></i>History</a></li>
            <li> <a href="<?=base_url('admin/denda')?>"> <i class="fa fa-dollar"></i>Denda </a></li>
            <li> <a href="<?=base_url('admin/laporanS')?>"> <i class="fa fa-file-o"></i>LAPORAN </a></li>
          </ul>
        </nav>
        <div class="content-inner"> 

          <?php echo $konten; ?>

          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12 text-right">
                  <p>Skripsi Unipdu Ceria &copy; 2019</p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
   
  <?php
    echo __js('jquery');
    echo __js('popper'); 
		echo __js('bootstrap');
    echo __js('checkall');
    echo __js('_checkall');
	 ?>

   <script type="text/javascript">
     $('#toggle-btn').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');

        $('.side-navbar').toggleClass('shrinked');
        $('.content-inner').toggleClass('active');
        $(document).trigger('sidebarChanged');

        if ($(window).outerWidth() > 1183) {
            if ($('#toggle-btn').hasClass('active')) {
                $('.navbar-header .brand-small').hide();
                $('.navbar-header .brand-big').show();
            } else {
                $('.navbar-header .brand-small').show();
                $('.navbar-header .brand-big').hide();
            }
        }

        if ($(window).outerWidth() < 1183) {
            $('.navbar-header .brand-small').show();
        }
    });
   </script>
  </body>
</html>