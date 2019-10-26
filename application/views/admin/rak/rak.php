<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header> 
<br> 
<div class="container-fluid">   
	<a href="<?=base_url('admin/tambahRak')?>" class="btn btn-outline-primary btn-sm">Tambah Data</a>
	<br><br>
	<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Rak</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($query_rak->result() as $k) { ?>
			<tr>
				<td><?=$no++; ?></td>
				<td><?=$k->NAMA_RAK; ?></td>
				<td>
					<a href="<?=base_url('admin/hapusRak/'.$k->ID_RAK)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
					<a href="<?=base_url('admin/editRak/'.$k->ID_RAK)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>