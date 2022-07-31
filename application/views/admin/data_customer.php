                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>
                <!-- /.container-fluid -->
                <a href="<?= base_url('admin/tambah_customer') ?>" class="btn btn-primary mb-2 ml-4">Tambah Data Customer</a>
                
                <?php echo $this->session->flashdata('message'); ?>

                <table class="table table-striped table-responsive table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>No. Telepon</th>
                        <th>NIK</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>

                    <?php 
                    $no =1;
                        foreach ($user as $us) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $us->name ?></td>
                            <td><?php echo $us->email ?></td>
                            <td><?php echo $us->alamat ?></td>
                            <td><?php echo $us->gender ?></td>
                            <td><?php echo $us->no_telepon ?></td>
                            <td><?php echo $us->nik ?></td>
                            <td><?php echo $us->password ?></td>
                            <td>
                                <a href="<?= base_url('admin/delete_customer/').$us->id ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="<?= base_url('admin/update_customer/').$us->id ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>