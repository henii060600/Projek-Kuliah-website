<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          
            <div class="login-brand">
              <img width="70px" src="<?php echo base_url().'assets/upload/scooter.png'?>">  
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Registrasi</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('register') ?>">
               
                    <div class="form-group">
                      <label for="nama_user">Nama Lengkap</label>
                      <input id="nama_user" type="text" class="form-control" name="nama_user" autofocus>
                      <?php echo form_error('nama_user', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                  
                    <div class="row">                 
                    <div class="form-group col-6">
                      <label for="no_telp" class="d-block">No. Handphone</label>
                      <input id="no_telp" type="text" class="form-control" name="no_telp">
                      <?php echo form_error('no_telp', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                    <div class="form-group col-6">
                    <label for="no_identitas" class="d-block">No. Identitas (KTP / SIM / Passpor)</label>
                      <input type="text" name="no_identitas" class="form-control">
                      <?php echo form_error('no_identitas', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">','</div>') ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <label >Buat akun login</label>

                  <div class="row">
                  <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username">
                      <?php echo form_error('username', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                      <div class="form-group col-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      <?php echo form_error('password', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                  </div>

                    
                  </div>
                    

                

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      <h6>Regitrasi</h6>
                    </button>
                  </div>
                </form>
            </div>
            
          </div>
        </div>
        
      </div>
    </section>
  </div>