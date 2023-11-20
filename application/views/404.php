<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Content not found.</p>
        <p class="lead">
            The page you’re looking for doesn’t exist.
        </p>
        <a href="<?= base_url() ?>" class="btn btn-primary">Go Home</a>
    </div>
</div>
<section class="py-0" id="blog">
    <div class="container">
        <h1 class="fs-lg-6 fs-md-5 fs-3">Blog Kami</h1>
        <div class="row mt-5 gx-xl-7">
            <?php foreach ($konten as $k):
                $tanggal = new DateTime($k['tanggal']); ?>
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0 text-center text-md-start h-auto">
                    <div class="d-flex justify-content-between flex-column h-100"><a href="<?= base_url('blog/' . $k['slug']) ?>"><img
                                class="w-md-100 w-75 rounded-2" src="<?= base_url('assets/images/konten/') . $k['foto'] ?>"
                                alt=""></a>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a
                                href="#">
                                <p class="fw-bold mb-0 text-black"><?= $k['nama_kategori'] ?></p>
                            </a>
                            <p class="mb-0"><?= $tanggal->format('M, Y-d') ?></p>
                        </div><a href="#">
                            <h5 class="mt-1 mb-3 fs-0 fs-md-1"><?php if (strlen($k['keterangan']) > 40) {
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
