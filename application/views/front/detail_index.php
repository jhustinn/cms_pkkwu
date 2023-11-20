<section>
    <div class="container">
        <div class="border-bottom border-dark py-7">
            <div class="row align-items-center gx-xl-7">
            <div class="col-lg-6 mt-5 mt-lg-0 text-center text-lg-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-3"><a
                            href="">
                            <p class="fw-bold mb-0 text-black"><?= $konten[0]['nama_kategori'] ?></p>
                        </a>
                        <p class="mb-0"><?php $tanggal = new DateTime($konten[0]['tanggal']);
                        echo $tanggal->format('M, Y-d'); ?></p>
                    </div>
                    <h1 class="fs-xl-6 fs-md-4 fs-3 my-3"><?= $konten[0]['judul'] ?></h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2">
                        <p class="mb-0"><?= $konten[0]['username'] ?></p>
                    </div>
                </div>
                <div class="col-lg-6 text-center"><a href="<?= base_url('assets/images/konten/') . $konten[0]['foto'] ?>" target="_blank"><img class="img-fluid"
                            src="<?= base_url('assets/images/konten/') . $konten[0]['foto'] ?>" alt=""></a></div>
                
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 style="text-align: justify;"><?= $konten[0]['keterangan'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<section class="py-0" id="blog">
    <div class="container">
        <h1 class="fs-lg-6 fs-md-5 fs-3">Blog Kami</h1>
        <div class="row mt-5 gx-xl-7">
            <?php foreach ($kontenAll as $k):
                $tanggal = new DateTime($k['tanggal']); ?>
                                        <div class="col-lg-4 col-md-6 mb-5 mb-md-0 text-center text-md-start h-auto">
                                            <div class="d-flex justify-content-between flex-column h-100"><a href="<?= $k['slug'] ?>"><img
                                                        class="w-md-100 w-75 rounded-2" src="<?= base_url('assets/images/konten/') . $k['foto'] ?>"
                                                        alt=""></a>
                                                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a
                                                        href="#">
                                                        <p class="fw-bold mb-0 text-black"><?= $k['nama_kategori'] ?></p>
                                                    </a>
                                                    <p class="mb-0"><?= $tanggal->format('M, Y-d') ?></p>
                                                </div><a href="#">
                                                    <h5 class="mt-1 mb-3 fs-0 fs-md-1">
                                                        <?php if (strlen($k['keterangan']) > 40) {
                                                            // If it is, truncate the text and append '...read more'
                                                            echo substr($k['keterangan'], 0, 40) . ' <a style="color: blue;" href="' . $k['slug'] . '">...Lihat</a>';
                                                        } else {
                                                            // If not, use the original text
                                                            echo $k['keterangan'];
                                                        } ?></h5>
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

        </div><!-- end of .container-->
</section>
