<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
  		echo __css('fontawesome');
  		echo __css('bootstrap');
  		echo __css('fontastic');
  		echo __css('default');
  		echo __css('custom');
  	?>

  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Login Admin</h1>
                  </div>
                  <p>Sistem Informasi Perpustakaan</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action="<?=base_url('admin/login');?>" method="post" class="form-validate">

                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material" placeholder="User Name">
                    </div>

                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material" placeholder="Password">
                    </div>

                    <button type="submit"class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button> 
                  </form>

                  <p id="notifications"><?php echo $this->session->flashdata('msg'); ?></p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </body>
</html>