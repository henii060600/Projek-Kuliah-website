<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Data Motor</h1>
          </div>

          <div class="card">
            <div class="card-body">

            <?php foreach ($motor as $mt) : ?>
            <form method="POST" action="<?php echo base_url('Admin/Data_motor/update_motor_aksi')?>"  
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-grup">
                            <label>Type Motor</label>
                            <input type="hidden" name="id_motor" value="<?php echo $mt->id_motor ?>">
                           
                            <select name="nama_type" class="form-control">
                                <option value="<?php echo $mt->nama_type ?>">
                                <?php echo $mt->nama_type ?></option>
                                <?php foreach($type as $tp) : ?>
                                    <option value="<?php echo $tp->nama_type ?>">
                                    <?php echo $tp->nama_type?></option>
                                <?php endforeach;?> 
                                <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?>  
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama Motor</label>
                            <input type="text" name="nama_motor" class="form-control" 
                            value="<?php echo $mt->nama_motor ?>">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" class="form-control"
                            value="<?php echo $mt->merk ?>">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
                            <label>No. Plat</label>
                            <input type="text" name="no_plat" class="form-control"
                            value="<?php echo $mt->no_plat ?>">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control" 
                            value="<?php echo $mt->warna ?>">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        

                    </div>
                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" name="tahun" class="form-control"
                            value="<?php echo $mt->tahun ?>">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
        					<label>Harga</label>
        					<input type="numberic" name="harga" class="form-control" value="<?php echo $mt->harga ?>">
        					<?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
        				</div>

                        
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="numberi" name="denda" class="form-control" 
                            value="<?php echo $mt->denda ?>">
                            <?php echo form_error('denda','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                   <option <?php if($mt->status == "1"){echo "selected='selected'";} 
                                   echo $mt->status; ?> value="1">Tersedia</option>
                                   <option <?php if($mt->status == "0"){echo "selected='selected'";} 
                                   echo $mt->status; ?> value="0">Tidak Tersedia</option>
                            </select>    
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            <?php echo form_error('nama_type','<div class="text=small 
                                text-danger">','</div>')?> 
                        </div>

                        <button type="submit">Tambah</button>
                        <button type="reset">Reset</button>
                    </div>
                </div>
                </form>    
                <?php endforeach; ?>
            </div>
          </div>
        </section>
</div>