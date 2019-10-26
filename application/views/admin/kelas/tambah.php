<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header>
<br>   
<div class="container-fluid">

	<form action="<?=base_url('admin/tambahkanKelas')?>" method="post">
		<fieldset class="form-group">
			<label>Nama Kelas</label>
			<input type="text" class="form-control" name="kelas" placeholder="Exp : VII X">
		</fieldset>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
		<a href="<?=base_url('admin/kelas');?>" class="btn btn-secondary">Kembali</a>
	</form>

</div>