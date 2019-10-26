<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header> 
<br> 
<div class="container-fluid">   
	<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($query_pinjam->result() as $k) { ?>
			<tr>
				<td><?=$no++; ?></td>
				<td><?=$k->NIS;?></td>
				<td><?=$k->JUDUL; ?></td>
				<td><?=$k->TGL_PINJAM;?></td>
				<td><?=$k->TGL_KEMBALI;?></td>

				<?php $date_now = date("Y-m-d"); 

				if ($date_now <= $k->TGL_KEMBALI) { ?>

					<td class="text-center"><span class="badge badge-info"><?=$k->STATUS_HISTORY;?></span></td>
					<td class="text-center">
						<a href="<?=base_url('admin/kembalikan/'.$k->ID_PEMINJAMAN.'/'.$k->ID_BUKU)?>" class="btn btn-success btn-sm"><i class="fa fa-sign-in"></i> Di Kembalikan</a>
					</td>	
				</form>				

				<?php } else { ?>

					<td class="text-center">
						<span class="badge badge-danger">
						TELAT 
						<?php 
							$berakhir = new DateTime($k->TGL_KEMBALI);
							$today 	  = new DateTime();
	                        $diff     = $today->diff($berakhir);
	                        $hari     = $diff->d;
	                        echo $hari; echo " HARI!";
 						?>
						</span>
						<span class="badge badge-success">
							Denda Rp. <?php echo $hari*500; ?>
						</span>
					</td>
					<td class="text-center">
						<!-- <a href="<?//=base_url('admin/tambahDenda/'.$k->ID_PEMINJAMAN.'/'.$k->TGL_KEMBALI)?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Hitung Denda</a> -->
						<a href="<?=base_url('admin/kembalikan/'.$k->ID_PEMINJAMAN.'/'.$k->ID_BUKU)?>" class="btn btn-success btn-sm"><i class="fa fa-sign-in"></i> Di Kembalikan</a>
					</td>

				<?php } ?>

			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>