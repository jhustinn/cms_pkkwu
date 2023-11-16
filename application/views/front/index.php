<!-- ============================================-->
<!-- <section> begin ============================-->
<section>

    <div class="container">
        <div class="border-bottom border-dark py-7">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $no = 1;
                    foreach ($carousel as $c): ?>
                                    <div class="carousel-item <?php if ($no == 1) {
                                        echo 'active';
                                    } ?>">
                                        <img src="<?= base_url('assets/images/carousel/') . $c['foto'] ?>" class="d-block w-100"
                                            alt="">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5 class="text-white"><?= $c['judul'] ?></h5>
                                        </div>
                                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    <!-- end of .container-->

</section>

<section class="py-0">

    <div class="container">
        <h1 class="fs-lg-6 fs-md-5 fs-3">Letest News</h1>
        <div class="row mt-5 gx-xl-7">
            <?php foreach ($konten as $k): ?>
                            <div class="col-lg-4 col-md-6 mb-5 mb-md-0 text-center text-md-start h-auto">
                                <div class="d-flex justify-content-between flex-column h-100"><a href="#"><img
                                            class="w-md-100 w-75 rounded-2" src="<?= base_url('assets/images/konten/') . $k['foto'] ?>"
                                            alt="" /></a>
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a
                                            href="#">
                                            <p class="fw-bold mb-0 text-black"><?= $k['nama_kategori'] ?></p>
                                        </a>
                                        <p class="mb-0"><?= $k['tanggal']; ?></p>
                                    </div><a href="#">
                                        <h5 class="mt-1 mb-3 fs-0 fs-md-1"><?= $k['keterangan'] ?></h5>
                                    </a>
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-md-5">
                                        <p class="mb-0 fw-bold">By</p>
                                        <p class="mb-0 text-gray"><?= $k['username'] ?></p>

                                        </a>
                                    </div>
                                </div>
                            </div>
            <?php endforeach; ?>
            <div class="text-center mb-4">
                <button class="btn btn-outline-dark">Load More</button>
            </div>
        </div>
        <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->


</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section>

    <div class="container bg-dark overflow-hidden rounded-1">
        <div class="bg-holder"
            style="background-image:url(<?= base_url('vendor/boldo-1.0.0/public/') ?>assets/img/promo/promo-bg.png);">
        </div>
        <!--/.bg-holder-->

        <div class="px-5 py-7 position-relative">
            <h1 class="text-center w-lg-75 mx-auto fs-lg-6 fs-md-4 fs-3 text-white">An enterprise template to ramp up
                your company website</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-auto w-100 w-lg-50">
                    <input class="form-control mb-2 border-light fs-1" type="email" placeholder="Your email address" />
                </div>
                <div class="col-auto mt-2 mt-lg-0">
                    <button class="btn btn-success text-dark fs-1">Start now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-0">

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-sm-12"><a href="index.html"><img class="img-fluid mt-5 mb-4"
                        src="<?= base_url('vendor/boldo-1.0.0/public/') ?>assets/img/black-logo.png" alt="" /></a>
                <p class="w-lg-75 text-gray">Social media validation business model canvas graphical user interface
                    launch party creative facebook iPad twitter.</p>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Landings</h3>
                <ul class="list-unstyled">
                    <li class="my-3 col-md-4"><a href="#">Home</a></li>
                    <li class="my-3"><a href="#">Products</a></li>
                    <li class="my-3"><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Company</h3>
                <ul class="list-unstyled">
                    <li class="my-3"><a href="#">Home</a></li>
                    <li class="my-3"><a href="#">Careers</a><span
                            class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">Hiring!</span></li>
                    <li class="my-3"><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Resources</h3>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="#">Home</a></li>
                    <li class="mb-3"><a href="#">Products</a></li>
                    <li class="mb-3"><a href="#">Services</a></li>
                </ul>
            </div>
        </div>
        <p class="text-gray">All rights reserved.</p>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->
