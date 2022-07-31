 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/tambah_mobil_aksi') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipe Mobil</label>
                            <select name="kode_type" id="" class="form-control">
                                <option value="">--Pilih Tipe Mobil--</option>
                                <?php foreach($type as $tp) : ?>
                                    <option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Merk</label>
                            <input type="text" name="merk" id="merk" class="form-control">
                            <?php echo form_error('merk','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control">
                            <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Warna</label>
                            <input type="text" name="warna" id="warna" class="form-control">
                            <?php echo form_error('warna','<div class="text-small text-danger">','</div>') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control">
                                <?php echo form_error('tahun','<div class="text-small text-danger">','</div>') ?>
                            </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            </select>
                            <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        &nbsp;
                        <button type="reset" class="btn btn-danger mt-4">Reset</button>
                    </div>
                </div>
            </form>
    </div>
</div>