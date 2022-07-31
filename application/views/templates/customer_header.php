<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logokia.jpg'); ?>" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/assets_shop/') ?>css/styles.css" rel="stylesheet" />
    </head>

    
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <img width="100px" src="<?= base_url('assets/img/logokia.jpg'); ?>" alt=""> &nbsp; &nbsp; &nbsp; <a class="navbar-brand" href="#!">KIA Siliwangi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('customer/about'); ?>">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/register'); ?>">Register</a></li>
                        <li class="nav-item">
                            <?php if ($this->session->userdata('name')) { ?>
                                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Hi,<?php echo $this->session->userdata('name'); ?> <span class="btn btn-sm btn-danger">Logout</span> 
                                </a>
                                <?php } else { ?>
                                    <a class="nav-link" href="<?= base_url('auth/login'); ?>">Hi,<?php echo $this->session->userdata('name'); ?> <span class="btn btn-sm btn-primary">Login</span> 
                                    </a>
                                    <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">KIA Motors Siliwangi</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Telusuri Mobil Yang Anda Inginkan</p>
                </div>
            </div>
        </header>
        <!-- Section-->