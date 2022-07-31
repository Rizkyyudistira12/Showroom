<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>

    <?php foreach($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img width="500px" src="<?php echo base_url().'assets/upload/'.$dt->gambar ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Tipe Mobil</td>
                                <td>
                                <?php
                                    if($dt->kode_type == "SDN")
                                    {
                                        echo "Sedan";
                                    } elseif($dt->kode_type == "HTB")
                                    {
                                        echo "Hatchback";
                                    } elseif($dt->kode_type == "MPV")
                                    {
                                        echo "Multi Purpose Vehicle";
                                    } else
                                    {
                                        echo "<span class='text-danger'>Tipe Mobil Belum Terdaftar</span>";
                                    }
                                ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Merk</td>
                                <td><?php echo $dt->merk ?></td>
                            </tr>

                            <tr>
                                <td>No. Mesin</td>
                                <td><?php echo $dt->harga ?></td>
                            </tr>

                            <tr>
                                <td>Warna</td>
                                <td><?php echo $dt->warna ?></td>
                            </tr>

                            <tr>
                                <td>Tahun</td>
                                <td><?php echo $dt->tahun ?></td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>
                                  <?php 
                                    if($dt->status == "0"){
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    }else{
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    }
                                  ?>
                                </td>
                            </tr>
                        </table>

                        <a class="btn btn-sm btn-danger" href="<?= base_url('admin/data_mobil') ?>">Kembali</a>
                        &nbsp;
                        <a class="btn btn-sm btn-info" href="<?= base_url('admin/update_mobil/'.$dt->id_mobil) ?>">Update Data</a>
                    </div>
                </div>
            </div>
        </div>

     <?php endforeach; ?>
