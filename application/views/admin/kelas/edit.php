<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header>
<br>   
<div class="container-fluid">
	<?php foreach($query_kelas->result() as $k) { ?>
	<form action="<?=base_url('admin/ubahKelas')?>" method="post">
		<fieldset class="form-group">
			<label>ID Kelas</label>
			<input type="text" class="form-control" name="id_kelas" value="<?=$k->ID_KELAS; ?>" readonly>
		</fieldset>
		<fieldset class="form-group">
			<label>Nama Kelas</label>
			<input type="text" class="form-control" name="kelas" value="<?=$k->KELAS;?>">
		</fieldset>
		<button type="submit" class="btn btn-primary">perbarui <i class="fa fa-refresh"></i></button>
		<a href="<?=base_url('admin/kelas');?>" class="btn btn-secondary">Kembali</a>
	</form>
	<?php } ?>
</div>

