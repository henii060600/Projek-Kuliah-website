<!--== Page Title Area Start ==-->
<section id="page-title-area" class="section-padding overlay">
<div class="container">

    <div class="row">
        <!-- Page Title Start -->
        <div class="col-lg-12">
            <div class="section-title  text-center">
                <h2>MASIH BINGUNG MAU NAIK APA?</h2>
          
                <p>Yuk sewa motor buat motoran di Motorun dulu...</p>
            </div>
        </div>
        <!-- Page Title End -->
    </div>
</div>
</section>
<!--== Page Title Area End ==-->

<!--== Car List Area Start ==-->
<section id="car-list-area" class="section-padding">
<div class="container">
	<?php echo $this->session->flashdata('pesan') ?>
    <div class="row">
        <!-- Car List Content Start -->
        <div class="col-lg-12">
            <div class="car-list-content">
                <div class="row">
                    <!-- Single Car Start -->
                    <?php foreach ($motor as $mt ) : ?>
	                    <div class="col-lg-4 col-md-4">
	                        <div class="single-car-wrap">
	                        	<img src="<?php echo base_url('assets/upload/' . $mt->gambar) ?>"style="max-width:100%; max-height: 100%; height: 90%; width: 100%">
	                            <div class="car-list-info without-bar">
	                                <h2><a href="#"><?php echo $mt->nama_motor ?></a></h2>
	                                <h5>Rp. <?php echo number_format($mt->harga,0,',','.') ?>/Hari</h5>
	                              
	                                <?php 
	                                	if($mt->status == "1"){
	                                		echo anchor('customer/rental/tambah_rental/' . $mt->id_motor,'<span class="rent-btn">Rental</span>');
	                                	}else{
	                                		echo "<span class='rent-btn'>Tidak Tersedia</span>";
	                                	}

	                                ?>

	                                
	                                <a href="<?php echo base_url('customer/data_motor/detail_motor/' . $mt->id_motor) ?>" class="rent-btn">Detail</a>

	                            </div>
	                        </div>
	                    </div>
                	<?php endforeach ?>
                    <!-- Single Car End -->
                </div>
            </div>
        </div>
    </div>
</div>
</section>