<!-- Begin Page Content -->
    <div class="container-fluid">
<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    </div>

    <a href="<?= base_url('admin/tambah_type') ?>" class="btn btn-primary mb-2 ml-4">Tambah Data</a>

    <?php echo $this->session->flashdata('message'); ?>
    
    <table class="table table-bordered table-striped table-hover ml-3">
        <thead>
            <tr>
                <th width="20px">No</th>
                <th>Kode Tipe</th>
                <th>Nama Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $no = 1;
            foreach($type as $tp) :?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tp->kode_type ?></td>
                <td><?php echo $tp->nama_type ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?= base_url('admin/update_type/'.$tp->id_type) ?>"><i class="fas fa-fw fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="<?= base_url('admin/delete_type/'.$tp->id_type) ?>"><i class="fas fa-fw fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>