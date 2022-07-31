<div class="container px-4 px-lg-5 mt-5">
    <div class="card">
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
            <div class="row">
                <div class="col-md-6">
                    <img width="500px" height="auto" src="<?= base_url('assets/upload/'.$dt->gambar) ?>" alt="">
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Merk</th>
                            <td><?php echo $dt->merk ?></td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>Rp. <?php echo $dt->harga ?></td>
                        </tr>

                        <tr>
                            <th>Warna</th>
                            <td><?php echo $dt->warna ?></td>
                        </tr>

                        <tr>
                            <th>Tahun Produksi</th>
                            <td><?php echo $dt->tahun ?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <?php if($dt->status == '1')
                                {
                                    echo "Tersedia";
                                }else {
                                    echo "Terjual";
                                }  
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <?php 
                                            if($dt->status == "0"){
                                                echo "<span class='btn btn-danger' disable>Terjual</span>";
                                            }else{
                                                echo anchor('customer/beli'.$dt->id_mobil,'<button class="btn btn-success">Beli</button>');
                                            }
                                    ?>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>     
</div>