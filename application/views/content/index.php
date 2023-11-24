<div class="pt-5">
    <div class="p-5 mt-5">
        <div id="ngilang">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h4 class="mt-2 text-white"><?= $title; ?></h4>
                <button type="button" class="btn btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#addPhoto">
                    Add Content
                </button>
            </div>
            <div class="card-body">
                <table class="table table-report table-report--bordered display datatable w-full" id="content_table">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">Title</th>
                            <th class="whitespace-no-wrap">Photo</th>
                            <th class="whitespace-no-wrap">Date Added</th>
                            <th class="whitespace-no-wrap">Category</th>
                            <th class="whitespace-no-wrap">Description</th>
                            <th class="whitespace-no-wrap">Creator</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($content as $c): ?>
                                                <tr>
                                                    <td class="">
                                                        <div class="font-medium whitespace-no-wrap">
                                                            <?= $c['judul'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <a href="<?= base_url('assets/images/konten/' . $c['foto']) ?>" class="" target="blank">
                                                            See Photo
                                                        </a>
                                                    <td class="">
                                                        <div class="font-medium whitespace-no-wrap">
                                                            <?= $c['tanggal'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="font-medium whitespace-no-wrap">
                                                            <?= $c['nama_kategori'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="font-medium whitespace-no-wrap">
                                                            <?= $c['keterangan'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="font-medium whitespace-no-wrap">
                                                            <?= $c['username'] ?>
                                                        </div>
                                                    </td>
                                                    </td>
                                                    <td>
                                                        <div class="flex justify-content-center items-center text-center">
                                                            <button type="button"
                                                                class="btn btn-light-warning text-warning btn-lg px-4 fs-4 font-medium"
                                                                data-bs-toggle="modal" data-bs-target="#vertical-center-modal<?= $c['foto'] ?>">
                                                                Edit
                                                            </button>
                                                            <a class="btn btn-light-danger text-danger btn-lg px-4 fs-4 font-medium"
                                                                href="<?= base_url('content/deletePhoto/' . $c['foto']) ?>">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php foreach ($content as $g): ?>
                        <div class="modal fade" id="vertical-center-modal<?= $g['foto'] ?>" tabindex="-1"
                            aria-labelledby="vertical-center-modal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title" id="myLargeModalLabel">
                                            Edit
                                        </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body p-4">
                                            <form action="<?= base_url('content/editContent') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $g['foto'] ?>">
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Title</label>
                                                    <input required type="text" name="judul" class="form-control" value="<?= $g['judul'] ?>"
                                                        placeholder="Photo Title">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Category</label>
                                                    <select class="form-select" name="kategori">
                                                        <?php foreach ($category as $cat): ?>
                                                                                <option value="<?= $cat['id_kategori'] ?>">
                                                                                    <?= $cat['nama_kategori'] ?>
                                                                                </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Description</label>
                                                    <textarea required type="text" name="keterangan" class="form-control" id="exampleInputtext"
                                                        placeholder="Description"><?= $g['keterangan'] ?></textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <img id="imagePreview" src="<?= base_url('assets/images/konten/' . $g['foto']) ?>"
                                                        style="max-width: 200px; max-height: 200px;">
                                                    <input type="file" name="editImage" id="imageInput" class="form-control">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start">
                                            Save
                                        </button>
                                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php endforeach; ?>



<div class="modal fade" id="addPhoto" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Add Content
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body p-4">
                    <form action="<?= base_url('content/addContent') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Title</label>
                            <input required type="text" name="judul" class="form-control" id="exampleInputtext"
                                placeholder="Conten Title">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Category</label>
                            <select class="form-select" name="kategori">
                                <?php foreach ($category as $cat): ?>
                                                        <option value="<?= $cat['id_kategori'] ?>">
                                                            <?= $cat['nama_kategori'] ?>
                                                        </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Description</label>
                            <textarea required type="text" name="keterangan" class="form-control" id="exampleInputtext"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Photo</label>
                            <input type="file" name="foto" class="form-control" placeholder="ACME Inc.">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light-success text-success font-medium waves-effect text-start">
                    Save
                </button>
                <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                    data-bs-dismiss="modal">
                    Close
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
