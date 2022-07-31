<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>

<form method="POST" action="<?= base_url('admin/tambah_type_aksi') ?>">
    <div class="form-group ml-3">
        <label for="">Kode Tipe</label>
        <input type="text" name="kode_type" class="form-control">
        <?php echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>
    </div>

    <div class="form-group ml-3">
        <label for="">Nama Tipe</label>
        <input type="text" name="nama_type" class="form-control">
        <?php echo form_error('nama_type','<div class="text-small text-danger">','</div>') ?>
    </div>

    <button type="submit" class="btn btn-primary ml-3">Simpan</button>
    <button type="reset" class="btn btn-danger ml-3">Reset</button>


</form>