<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header>
<br>   
<div class="container-fluid">
	<form action="<?=base_url('admin/tambahkanSiswa')?>" method="post">
		<fieldset class="form-group">
			<label>Pilih Kelas</label>
			<select class="form-control" name="kelas">
				<option disabled value="">---Pilih Kelas---</option>                    
	            <?php foreach($query_kelas->result() as $k) { ?>
	            	<option value="<?=$k->ID_KELAS;?>"><?=$k->KELAS;?></option>
	            <?php } ?>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label>NIS</label>
			<input type="text" class="form-control" name="nis" placeholder="Exp : 1234">
		</fieldset>
		<fieldset class="form-group">
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="nama" placeholder="Exp : Siti Maryam">
		</fieldset>
		<fieldset class="form-group">
			<label class="radio-inline"> Jenis Kelamin
				<input type="radio" name="jk" value="laki-laki" required> Laki-laki
				<input type="radio" name="jk" value="perempuan" required> Perempuan
			</label>
		</fieldset>
		<fieldset class="form-group">
			<label>Tempat tanggal lahir</label>
			<label class="form-inline">
				<input type="text" name="tmp" class="form-control" placeholder="masukkan tempat lahir" required>
				<input type="date" name="tgl" class="form-control" required>
			</label>
		</fieldset>
		<fieldset class="form-group">
	        <label>Nomor HP</label>
	          <input type="text" class="form-control" placeholder="Masukkan nomor HP" name="hp">     
	      </fieldset>
	      <fieldset class="form-group">
	        <label>Alamat</label>
	          <textarea name="alamat" class="form-control" placeholder="masukkan alamat lengkap"></textarea>   
	      </fieldset>
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
		<a href="<?=base_url('admin/siswa');?>" class="btn btn-secondary">Kembali</a>
	</form>
<br>
</div>