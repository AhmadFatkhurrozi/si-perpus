<header class="page-header">
	<div class="container-fluid">
	  <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
	</div>
</header>
<br>   
<div class="container-fluid">
	<?php foreach($query_siswa->result() as $k) { ?>
	<form action="<?=base_url('admin/ubahSiswa')?>" method="post">
		<fieldset class="form-group">
			<label>Pilih Kelas</label>
			<select class="form-control" name="kelas">
				<option disabled value="">---Pilih Kelas---</option>                    
	            <?php foreach($query_kelas->result() as $a) { ?>
	            	<option value="<?=$a->ID_KELAS;?>"><?=$a->KELAS;?></option>
	            <?php } ?>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label>NIS</label>
			<input type="text" class="form-control" name="nis" value="<?=$k->NIS;?>" readonly>
		</fieldset>
		<fieldset class="form-group">
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="nama" value="<?=$k->NAMA?>">
		</fieldset>
		<fieldset class="form-group">
          <label class="radio-inline"> Jenis Kelamin
            <input type="radio" name="jk" value="laki-laki" <?php echo ($k->JK == 'laki-laki')? 'checked' : '';?>> Laki-laki
            <input type="radio" name="jk" value="perempuan"  <?php echo ($k->JK == 'perempuan')? 'checked' : ''; ?>> Perempuan
          </label>
      	</fieldset>
		<fieldset class="form-group">
			<label>Tempat tanggal lahir</label>
			<label class="form-inline">
				<input type="text" name="tmp" class="form-control" value="<?=$k->TEMPAT_LAHIR;?>" required>
				<input type="date" name="tgl" class="form-control" value="<?=$k->TGL_LAHIR;?>" required>
			</label>
		</fieldset>
		<fieldset class="form-group">
	        <label>Nomor HP</label>
	          <input type="text" class="form-control" value="<?=$k->NO_HP;?>" name="hp">     
	    </fieldset>
	    <fieldset class="form-group">
	        <label>Alamat</label>
	          <textarea name="alamat" class="form-control" placeholder="masukkan alamat lengkap"><?=$k->ALAMAT;?></textarea>   
	    </fieldset>
		<button type="submit" class="btn btn-primary">perbarui <i class="fa fa-refresh"></i></button>
		<a href="<?=base_url('admin/siswa');?>" class="btn btn-secondary">Kembali</a>
	</form>
	<?php } ?>
<br>
</div>