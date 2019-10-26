<div class="col-md-9">
	<div class="row">
		<div class="col-md-12" id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
		<div class="col-md-12">
			<span class="no-margin-bottom title text-muted"> <?php echo $judul; ?></span><br><br>
			<table class="table table-bordered table-inverse table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Buku</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($query_pinjam->result() as $p) { ?>
					<tr>
						<td><?=$no++; ?></td>
						<td><?=$p->JUDUL; ?></td>
						<td><?=$p->TGL_PINJAM;?></td>
						<td><?=$p->TGL_KEMBALI;?></td>
						<td>
							<?php $date_now = date("Y-m-d"); 

								if ($date_now > $p->TGL_KEMBALI && $p->TGL_KEMBALI != '0000-00-00') { ?>

								<small>Anda telat mengembalikan buku</small>
								<?php 
									$berakhir = new DateTime($p->TGL_KEMBALI);
									$today 	  = new DateTime();
			                        $diff     = $today->diff($berakhir);
			                        $hari     = $diff->d;
		 						?>
		 						<span class="badge badge-danger"><?php echo $hari;?> Hari!</span>

								<small>
									Segera Kembalikan dengan membayar 
								</small>
								<span class="badge badge-success">Denda Rp. <?php echo $hari*500; ?></span>
								<small>
									, sebelum denda semakin berat, atau dikenakan Sanksi Tegas!
								</small>

							<?php } else { ?>
								<span class="badge badge-info"><?=$p->STATUS_HISTORY;?></span>
							<?php } ?>
						</td>
						<td class="text-center">
							<?php if ($p->STATUS_HISTORY == "Menunggu") { ?>
				                 <?php echo anchor('siswa/batalPinjam/'.$p->ID_BUKU,'
				                  <btn class="btn btn-danger text-light btn-sm">
				                    <span>batalkan</span>
				                  </btn>');
				                ?>
				              <?php } else { ?>
				                  <small>
				                  	<i class="fa fa-info"></i> Buku Berhasil dipinjam, kembalikan pada
				                  	<span class="badge badge-danger"><?=$p->TGL_KEMBALI;?></span>
				                  </small>
				             <?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
</div>