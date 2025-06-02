<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          
                      
        </form>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown">
            <a href="#" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama_user')?></div></a>
            </a>
          </li>
          
				</ul>
            </div>
        
        </ul>
      </nav>      
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">
            <img width="60px" src="<?php echo base_url().'assets/upload/scooter.png'?>">  
              <h4>MOTORUN</h4>
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SM</a>
          </div>
          <ul class="sidebar-menu">        
            <li><a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
              <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
             
              <li><a class="nav-link" href="<?php echo base_url('admin/data_motor')?>">
              <i class="fas fa-motorcycle"></i> <span>Data Motor</span></a></li>
              
              <li><a class="nav-link" href="<?php echo base_url('admin/data_type')?>">
              <i class="fas fa-grip-horizontal"></i> <span>Data Type</span></a></li>
              
              <li><a class="nav-link" href="<?php echo base_url('admin/data_customer')?>">
              <i class="far fa-address-card"></i> <span>Data Customer</span></a></li>
              
              <li><a class="nav-link" href="<?php echo base_url('admin/transaksi')?>">
              <i class="fas fa-dollar-sign"></i> <span>Data Transaksi</span></a></li>
             
              <li><a class="nav-link" href="<?php echo base_url('admin/laporan')?>">  
              <i class="fas fa-clipboard"></i> <span>Laporan</span></a></li>

              <li><a class="nav-link" href="<?php echo base_url('auth/logout')?>">  
              <i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
            </ul>
        </aside>
      </div>