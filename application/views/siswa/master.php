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
		echo __css('bootstrap');
		echo __css('template');
		echo __css('fontastic');
	?>

</head>

<body id="page-top">
<?php echo $header; ?>

<div class="container">
	<div class="row mt-5 mb-5" style="padding: 30px 10px;">

		<div class="col-lg-3 bg-light desktop">
			
			<div class="sidebar-header text-center">
		        <div class="user-info">
		            <span class="user-name">
		                <strong><?php echo $this->session->userdata("__siswa_nama"); ?></a></strong><br>
		                <small><strong>NIS.</strong><i><?php echo $this->session->userdata("__siswa_nis"); ?></a></i></small><br>
		            </span>
		           <hr class="m-y-md">
		        </div>
		    </div>

		    <strong><i class="fa fa-book"></i> Kategori Buku</strong>

	        <div class="list-group">
	        	<?php foreach($query_kategori->result() as $k){ ?> 
	          	<a href="<?=base_url('siswa/bukuKat/'.$k->ID_KATEGORI)?>"
	          		class="btn-sm lst list-group-item <?php echo __menu_active( $k->ID_KATEGORI , $judul ); ?>">
	            	<?php echo $k->NAMA_KATEGORI;?>(<?php echo $k->total ?>)
	          	</a>
	          	<?php } ?>
	        </div>

	        <hr>

	        <strong><i class="fa fa-list"></i> Data Peminjaman</strong>

	        <div class="list-group">
	            <a href="<?=base_url('siswa/peminjaman')?>" 
	            	class="btn-sm lst list-group-item <?php echo __menu_active('Data Peminjaman', $judul ); ?>">
	            	PEMINJAMAN SAYA
	            </a>
	            <!-- <a href="<?//=base_url('siswa/denda')?>" 
	            	class="btn-sm lst list-group-item <?php// echo __menu_active('Denda', $judul ); ?>">
	            	DENDA
	            </a> -->
	            <a href="<?=base_url('siswa/history')?>"
	            	class="btn-sm lst list-group-item <?php echo __menu_active('Riwayat Peminjaman', $judul ); ?>">
	            	HISTORY
	            </a>
	        </div>

	        <hr>

	        <strong><i class="fa fa-user"></i> Profile</strong>

	        <div class="list-group">
	          	<a href="<?=base_url('siswa/profil')?>" 
	          		class="btn-sm lst list-group-item <?php echo __menu_active('Profile', $judul ); ?>">
	          		BIODATA
	          </a>
	        </div>
	        <hr>
	    </div>

	    <?php echo $konten; ?>

	</div>	
</div>

<?php echo $footer; ?>


  <?php
		echo __js('jquery'); 
		echo __js('bootstrap-bundle');
		echo __js('creative');
	 ?>

</body>

</html>