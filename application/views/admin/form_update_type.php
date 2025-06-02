<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1>Form Update Type Motor</h1>
		</div>
	</div>
    <?php foreach ($type as $tp) :?>
	<form method="POST" action="<?php echo base_url('admin/data_type/update_type_aksi') ?>">
		
		<div class="form-group">
		<label>Nama Type Motor</label>
		<input type="hidden" name="id_type" value="<?php echo $tp->id_type ?>">
		<input type="text" name="nama_type" class="form-control" value="<?php echo $tp->nama_type ?>"> 
    	<?php echo form_error('nama_type','<div class="text-small text-danger">','</div>') ?>
		</div> 

		<button type="submit" class="btn btn-primary">
			Simpan
		</button>
		<button type="reset" class="btn btn-danger">
			Reset
		</button>


	</form>
<?php endforeach ; ?>
</div>