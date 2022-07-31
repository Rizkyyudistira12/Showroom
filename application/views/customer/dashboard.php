 
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach($mobil as $mb) : ?>
                    <div class="col mb-5">
                        <div class="card">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('assets/upload/'.$mb->gambar) ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $mb->merk ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted">Rp <?php echo $mb->harga ?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <?php 
                                            if($mb->status == "0"){
                                                echo "<span class='btn btn-danger' disable>Terjual</span>";
                                            }else{
                                                echo anchor('customer/beli'.$mb->id_mobil,'<button class="btn btn-success">Beli</button>');
                                            }
                                    ?>

                                    <a class="btn btn-warning" href="<?= base_url('customer/dashboard/detail_mobil/').$mb->id_mobil ?>">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
