<div class="col-md-9">
	<form class="form-inline mt-2 mt-md-0" action="<?=base_url()?>buku/search" method="post">
		<div class="input-group mb-3">
          <input type="text" name="cari" class="form-control form-control" placeholder="Cari Buku">
          <div class="input-group-append">
            <button class="btn btn-secondary rounded-right" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
	</form>

	<div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
	
	<div class="row">
		<?php foreach ($query_buku->result() as $b) { ?>
		<div class="col-md-4">
			<div class="card">
                <img src="<?=base_url('/dist/img/buku/default.jpg')?>" class="card-img-top">
                <div class="card-body"><b><?=$b->JUDUL;?></b><br>
                    <i class="small badge badge-info"><?=$b->THN_TERBIT;?></i>
                    <i class="small badge badge-secondary"><?=$b->PENERBIT;?></i>
                    <i class="small badge badge-danger">Tersedia <?=$b->STOK;?> Buku</i>
                </div>
                <div class="card-footer btn-group align-center">

                <?php
                	$where 	= $this->db->where('NIS', $this->session->userdata('__siswa_nis') )
	  				   				   ->where('ID_BUKU', $b->ID_BUKU)
	  				   				   ->get('peminjaman');
				  ?>

                	<?php if ($b->STOK < 1 ) { ?>

						<button class="btn btn-danger btn-sm">
							<i class="fa fa-times"></i> Stok Kosong
						</button>
							
					<?php } elseif ($where->num_rows() == 0 ) { ?>

                    <a href="<?php echo site_url('siswa/pinjam/').$b->ID_BUKU; ?>" class="btn btn-success btn-sm">Pinjam <i class="fa fa-send"></i></a>

       				<?php } else { ?>
						<button class="btn btn-outline-success btn-sm">
							<i class="fa fa-refresh"></i> Meminjam
						</button>
					<?php } ?>

                    <a href="<?php echo site_url('siswa/detailBuku/').$b->ID_BUKU; ?>" class="btn btn-info btn-sm">Detail <i class="fa fa-info"></i></a>
                </div>
            </div>
		</div>
		<?php } ?>
		</div>
</div>