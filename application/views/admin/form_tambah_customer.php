 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/tambah_customer_aksi') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <?php echo form_error('name','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <?php echo form_error('email','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?php echo form_error('gender','<div class="text-small text-danger">','</div>') ?>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                                <label for="">No. Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control">
                                <?php echo form_error('no_telepon','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control">
                                <?php echo form_error('nik','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        &nbsp;
                        <button type="reset" class="btn btn-danger mt-4">Reset</button>
                    </div>
                </div>
            </form>
    </div>
</div>