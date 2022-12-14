
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?= base_url('assets/img/Cover Login.jpg'); ?>" width="500px" height="500px" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/img/logokia.jpg'); ?>" width="100px" height="auto" alt="">
                                        <br>
                                        <br>
                                        <h1 class="h4 text-gray-900 mb-4">Login Page Nissan Siliwangi</h1>
                                    </div>
                                    
                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" id="name"
                                                placeholder="Masukkan Username Anda" value="<?= set_value('name'); ?>">
                                                <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register'); ?>">Belum Punya Akun ? Daftar Sekarang !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

