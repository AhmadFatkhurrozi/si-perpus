<section class="dashboard-counts no-padding-bottom">
	<div class="container-fluid">
	  <div class="row bg-white has-shadow">
	    <!-- Item -->
	    <div class="col-xl-3 col-sm-6">
	      <div class="item d-flex align-items-center">
	        <div class="icon bg-violet"><i class="fa fa-book"></i></div>
	        	<div class="title"><span>Data<br>Buku</span>
	        </div>
	        <div class="number"><strong><?php echo $this->db->count_all('buku'); ?></strong></div>
	      </div>
	    </div>
	    <!-- Item -->
	    <div class="col-xl-3 col-sm-6">
	      <div class="item d-flex align-items-center">
	        <div class="icon bg-red"><i class="fa fa-users"></i></div>
	        	<div class="title"><span>Data<br>Siswa</span>
	        </div>
	        <div class="number"><strong><?php echo $this->db->count_all('siswa'); ?></strong></div>
	      </div>
	    </div>
	    <!-- Item -->
	    <div class="col-xl-3 col-sm-6">
	      <div class="item d-flex align-items-center">
	        <div class="icon bg-green"><i class="fa fa-refresh"></i></div>
	        	<div class="title"><span>Data<br>Peminjaman</span>
	        </div>
	        <div class="number"><strong><?php echo $this->db->count_all('peminjaman'); ?></strong></div>
	      </div>
	    </div>
	    <!-- Item -->
	    <div class="col-xl-3 col-sm-6">
	      <div class="item d-flex align-items-center">
	        <div class="icon bg-orange"><i class="fa fa-dollar"></i></div>
	       		<div class="title"><span>Data<br>###</span>
	        </div>
	        <div class="number"><strong><?php // echo $this->db->count_all('denda'); ?></strong></div>
	      </div>
	    </div>
	  </div>
	</div>
</section>