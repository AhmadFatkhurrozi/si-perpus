<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header> 
<br> 
<div class="container-fluid">   
	<a href="<?=base_url('admin/tambahSiswa')?>" class="btn btn-outline-primary btn-sm">Tambah Data</a>
	<br><br>
	<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>TTL</th>
				<th>No. HP</th>
				<th>Alamat</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($query_siswa->result() as $k) { ?>
			<tr>
				<td><?=$no++; ?></td>
				<td><?=$k->KELAS;?></td>
				<td><?=$k->NIS; ?></td>
				<td><?=$k->NAMA; ?></td>
				<td><?=$k->JK; ?></td>
				<td><?=$k->TEMPAT_LAHIR;?>, <?=$k->TGL_LAHIR;?></td>
				<td><?=$k->NO_HP;?></td>
				<td><?=$k->ALAMAT;?></td>
				<td>
					<a href="<?=base_url('admin/hapusSiswa/'.$k->NIS)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
					<a href="<?=base_url('admin/editSiswa/'.$k->NIS)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>