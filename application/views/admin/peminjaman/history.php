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
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($query_pinjam->result() as $k) { ?>
			<tr>
				<td><?=$no++; ?></td>
				<td><?=$k->NIS;?></td>
				<td><?=$k->JUDUL; ?></td>
				<td><?=$k->TGL_PINJAM;?></td>
				<td class="text-center"><span class="badge badge-info"><?=$k->STATUS_HISTORY;?></span></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>