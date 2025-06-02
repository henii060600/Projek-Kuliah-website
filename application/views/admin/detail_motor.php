<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Motor</h1>
        </div>

        <?php foreach ( $detail as $dt ) : ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-5">
                            <img width="400" src="<?php echo base_url() . 'assets/upload/' . $dt->gambar ?>">

                        </div>

                        <div class="col-md-7">
                            
                            <table class="table">
                                <tr>
                                    <td>Type Motor</td>
                                    <td>
                                    <?php
                                    if ($dt->nama_type == "Skuter" )
                                        {echo "Skuter";}
                                        elseif ($dt->nama_type == "Motor Bebek" )
                                        {echo "Motor Bebek";}
                                        elseif ($dt->nama_type == "Bebek Sport" )
                                        {echo "Bebek Sport";}
                                        elseif ($dt->nama_type == "Sport" )
                                        {echo "Sport";}
                                        elseif ($dt->nama_type == "Elektrik Skuter" )
                                        {echo "Elektrik Skuter";}
                                        elseif ($dt->nama_type == "Listrik" )
                                        {echo "Listrik";}
                                        elseif ($dt->nama_type == "Custom" )
                                        {echo "Custom";}
                                    else {echo "Type Belum Terdaftar";}
                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nama Motor</td>
                                    <td><?php echo $dt->nama_motor ?></td>
                                </tr>

                                <tr>
                                    <td>Merk</td>
                                    <td><?php echo $dt->merk ?></td>
                                </tr>

                                <tr>
                                    <td>No. Plat</td>
                                    <td><?php echo $dt->no_plat ?></td>
                                </tr>

                                <tr>
                                    <td>Warna</td>
                                    <td><?php echo $dt->warna ?></td>
                                </tr>

                                <tr>
                                    <td>Tahun</td>
                                    <td><?php echo $dt->tahun?></td>
                                </tr>

                                <tr>
                                    <td>Harga</td>
                                    <td>Rp. <?php echo number_format($dt->harga,0,',','.') ?></td>
                                </tr>

                                <tr>
                                    <td>Denda</td>
                                    <td>Rp. <?php echo number_format($dt->denda,0,',','.')?></td>
                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php 
                                            if($dt->status == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                               
                            </table>

                            <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_motor') ?>">Kembali</a>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_motor/update_motor/') . $dt->id_motor ?>">Update</a>
                        </div>

                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </section>
</div>