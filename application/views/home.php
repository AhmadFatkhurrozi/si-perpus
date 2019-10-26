<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>

    <?php 
        echo __css('bootstrap');
        // echo __css('theme');
        echo __css('template');
        echo __css('fontawesome');
        echo __css('fontastic');
        echo __css('default');
        echo __css('custom');
    ?>
    <link rel="stylesheet" href="<?=base_url('/dist/owl/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('/dist/owl/owl.theme.default.min.css');?>">
  </head>
  
  <body>
    <header>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6">
                    <div class="m-0 vh-100 d-flex flex-column justify-content-center text-dark">
                        <h1 class="display-4"><?php echo $judul; ?></h1>
                        <p class="lead text-muted">
                          <small>Buku Adalah Guru Sejati, Diam Tetapi Banyak Memberi</small></p>
                        
                                <form action="<?=base_url('siswa/cekNis');?>" method="post">
                                    <div class="input-group mb-3">
                                      <input type="text" name="nis" class="form-control form-control-lg" placeholder="Masukkan NIS">
                                      <div class="input-group-append">
                                        <button class="btn btn-secondary btn-lg rounded-right" type="submit"><i class="fa fa-sign-in"></i></button>
                                      </div>
                                    </div>
                                </form>
                                <p id="notifications"><?php echo $this->session->flashdata('msg'); ?></p>
                           
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
      <h4 class="heading-4 text-center mt-5">Buku Terbaru</h4>
        <div class="owl-carousel owl-theme">
          <div class="item">
            <a href="http://youtube.com">
              <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
            </a>
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
          <div class="item">
            <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1478328496l/32874939.jpg">
          </div>
        </div>
    </div>

    <section class="dashboard-counts no-padding-bottom mb-5">
      <div class="container-fluid">
        <div class="row bg-white has-shadow">
          <!-- Item -->
          <div class="col-xl-4 col-sm-6">
            <div class="text-center mt-3">
              <i class="fa fa-sign-in bg-violet" style="padding: 6px 8px;border-radius: 50%;"></i><span class="title">Input NIS</span>
            </div>
            <br>
            <small>Akses situs SI-PERPUS, masukkan NIS</small>
          </div>
          <!-- Item -->
          <div class="col-xl-4 col-sm-6">
            <div class="text-center mt-3">
              <i class="fa fa-envelope bg-red" style="padding: 6px 8px;border-radius: 50%;"></i><span class="title">Pinjam</span>
            </div>
            <br>
            <small>Lihat katalog buku yang tersedia, lalu pesan</small>
          </div>
          <!-- Item -->
          <div class="col-xl-4 col-sm-6">
            <div class="text-center mt-3">
              <i class="fa fa-check bg-green" style="padding: 6px 8px;border-radius: 50%;"></i><span class="title">Validasi</span>
            </div>
            <br>
            <small>Pergi ke perpustakaan untuk mencari buku pada RAK/ tempat sesuai yang dipesan, dan ke petugas untuk divalidasi dengan menunjukkan Kartu pelajar</small>
          </div>

        </div>
      </div>
    </section>

    <?php echo $footer; ?>

    <?php
        echo __js('jquery'); 
        echo __js('popper');
        echo __js('bootstrap');
     ?>
     <script src="<?=base_url('/dist/owl/owl.carousel.min.js');?>"></script>

    <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 6,
                    nav: true,
                    loop: false,
                    margin: 50
                  }
                }
              })
            })
          </script>
</body>
</html>