<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1>Form Tambah Type Motor</h1>
		</div>
	</div>

	<form method="POST" action="<?php echo base_url('Admin/Data_type/tambah_type_aksi') ?>">
		
			<div class="form-group">
			<label>Nama Type Motor</label>
			<input type="text" name="nama_type" class="form-control"> 
        	<?php echo form_error('nama_type','<div class="text-small text-danger">','</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">
			Simpan
		</button>
		<button type="reset" class="btn btn-danger">
			Reset
		</button>


	</form>

</div>