<div style="width: 500px">
<table style="width: 100%">

	<h3>Invoice Pembayaran Anda</h3>
	<hr>
	<?php foreach($transaksi as $tr) : ?>
		

		<tr>
			<td>Nama Customer</td>
			<td>: </td>
			<td><?php echo $tr->nama_user ?></td>
		</tr>

        <tr>
			<td>Nama Motor</td>
			<td>: </td>
			<td><?php echo $tr->nama_motor ?></td>
		</tr>

		<tr>
			<td>Merk</td>
			<td>: </td>
			<td><?php echo $tr->merk ?></td>
		</tr>

		<tr>
			<td>Tanggal Rental</td>
			<td>: </td>
			<td><?php echo date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
		</tr>

		<tr>
			<td>Tanggal Kembali</td>
			<td>: </td>
			<td><?php echo date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
		</tr>

		<tr>
			<td>Biaya Sewa/Hari</td>
			<td>: </td>
			<td>Rp. <?php echo number_format($tr->harga,0,',','.') ?></td>
		</tr>

		<tr>
			<?php 
				$x = strtotime($tr->tgl_kembali);
				$y = strtotime($tr->tgl_rental);
				$jmlHari = abs(($x - $y)/(60*60*24));

			?>
			<td>Jumlah Hari Sewa</td>
			<td>: </td>
			<td><?php echo $jmlHari; ?> Hari</td>
		</tr>

		<tr>
			<td>Status Pembayaran</td>
			<td>:</td>
			<td>
				<?php 
					if($tr->status_pembayaran == '0') {
						echo "Belum Lunas";
					}else{
						echo "Lunas";
					}
				?>
			</td>
		</tr>

		<tr style="font-weight: bold; color: red">
			<td>JUMLAH PEMBAYARAN</td>
			<td>: </td>
			<td>Rp. <?php echo number_format(($tr->harga * $jmlHari),0,',','.') ?></td>
		</tr>

	<?php endforeach; ?>
</table>

<hr>
<span style="font-weight: bold">Informasi Rental</span>
<table style="width: 100%">
	<tr>
		<td>Alamat Rental</td>
		<td>:</td>
		<td>Jl. Mampang Prapatan II No.14</td>
	</tr>
</table>
<span style="font-weight: bold">Alat Pembayaran: </span>
	<ul>
	<li class="list-group-item font-bold"
					>BCA <br>
					 1120275 A.N Deviana
					</li>

					<li class="list-group-item font-bold"
					>MANDIRI <br>
					 11220275 A.N Deviana
					</li>

					<li class="list-group-item font-bold"
					>DANA <br>
					 08992628715 A.N Deviana
					</li>
	</ul>
</div>
<script type="text/javascript">
	window.print();
</script>