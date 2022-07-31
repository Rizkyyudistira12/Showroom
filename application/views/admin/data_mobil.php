                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>
                <!-- /.container-fluid -->
                <a href="<?= base_url('admin/tambah_mobil') ?>" class="btn btn-primary mb-2 ml-4">Tambah Data</a>
                
                <?php echo $this->session->flashdata('message'); ?>

                <table class="table table-hover table-striped table-bordered ml-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Tipe</th>
                            <th>Merk</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach($mobil as $mb) : 
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                                <img width="60px" src="<?= base_url().'assets/upload/'.$mb->gambar ?>" alt="">
                            </td>
                            <td><?php echo $mb->kode_type ?></td>
                            <td><?php echo $mb->merk ?></td>
                            <td><?php echo $mb->harga ?></td>
                            <td><?php if($mb->status == "0") {
                                echo "<span class='badge badge-danger'> Tidak Tersedia</span>";
                            } else {
                                echo "<span class='badge badge-success'> Tersedia</span>";
                            } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/detail_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('admin/delete_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="<?= base_url('admin/update_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <!-- End of Main Content -->