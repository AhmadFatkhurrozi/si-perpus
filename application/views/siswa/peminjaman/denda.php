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
						<th>Tanggal Kembali</th>
						<th>Telat</th>
						<th>Total Denda</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($query_pinjam->result() as $p) { ?>
					<tr>
						<td><?=$no++; ?></td>
						<td><?=$p->JUDUL; ?></td>
						<td><?=$p->TGL_KEMBALI;?></td>
						<td></td>
						<th></th>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
</div>