<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5">
                <img src="<?= base_url('assets/img/Cover Login.jpg'); ?>" width="500px" height="600px" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <img src="<?= base_url('assets/img/logokia.jpg'); ?>" width="100px" height="auto" alt="">
                        <br>
                        <br>
                        <h1 class="h4 text-gray-900 mb-4">Register Page Nissan Siliwangi</h1>
                    </div>
                    <form class="user" method="POST" action="<?= base_url('auth/register'); ?>">
                         <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                value="<?= set_value('name'); ?>" placeholder="Nama Lengkap">
                            <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email"
                                value="<?= set_value('email'); ?>" placeholder="Email Address">
                                <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control form-control-user">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="" disabled>-- Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?php echo form_error('gender','<div class="text-small text-danger">','</div>') ?>
                        </div>

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

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="password1" name="password1" placeholder="Masukkan Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="password2" name="password2" placeholder="Ulangi Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Akun
                        </button>
                        <hr>
                    </form>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun ? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>