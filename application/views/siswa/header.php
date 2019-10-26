    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" id="navbar1">
        <div class="container">
            <a class="navbar-brand mr-1 mb-1 mt-0" href="<?php echo base_url('/siswa/dashboard'); ?>">SI PERPUS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mbl">
                        <a class="nav-link dropdown-toggle" href="#" id="layoutDd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Kategori Buku
                        </a>
                       
                        <div class="dropdown-menu" aria-labelledby="layoutDd">
                             <?php foreach($query_kategori->result() as $kat){ ?> 
                            <a class="dropdown-item px-2" href="./template3.html"><?=$kat->NAMA_KATEGORI;?></a>
                            <?php } ?>
                        </div>
                        
                    </li>
                    <li class="nav-item mbl">
                        <a class="nav-link" href="#buttons">Data Peminjaman</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDd">
                            <a class="dropdown-item px-2" href="#more">
                                <i class="fa fa-user"></i>
                                <?php echo $this->session->userdata("__siswa_nama"); ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="btn btn-outline-danger-sm" href="<?php echo base_url('siswa/logout'); ?>" onclick="return confirm('Keluar ?')"> 
                            <i class="fa fa-sign-out"></i>Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 