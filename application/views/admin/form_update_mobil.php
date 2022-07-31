    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>
<!-- /.container-fluid -->

<div class="card">
    <div class="card-body">
        <?php foreach($mobil as $mb) : ?>
        <form method="post" action="<?= base_url('admin/update_mobil_aksi') ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tipe Mobil</label>
                        <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil ?>">
                        <select name="kode_type" id="" class="form-control">
                            <option value="<?= $mb->kode_type ?>"><?= $mb->kode_type ?></option>
                            <?php foreach($type as $tp) : ?>
                                <option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kode_type','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Merk</label>
                        <input type="text" name="merk" class="form-control" value="<?= $mb->merk ?>">
                        <?= form_error('merk','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control" value="<?= $mb->harga ?>">
                        <?= form_error('harga','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Warna</label>
                        <input type="text" name="warna" class="form-control" value="<?= $mb->warna ?>">
                        <?= form_error('warna','<div class="text-small text-danger">','</div>') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?= $mb->tahun ?>">
                        <?= form_error('tahun','<div class="text-small text-danger">','</div>') ?>
                    </div>


                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option <?php if($mb->status == "1"){echo "selected='selected'";} echo $mb->status; ?> value="1">Tersedia</option>
                            <option <?php if($mb->status == "0"){echo "selected='selected'";} echo $mb->status; ?> value="0">Tidak Tersedia</option>
                        </select>
                        <?= form_error('status','<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    &nbsp;
                    <button type="reset" class="btn btn-danger mt-4">Reset</button>
                </div>
            </div>
        </form>
        <?php endforeach; ?>
    </div>

</div>

</div>
<!-- End of Main Content -->