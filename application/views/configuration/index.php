<div class="pt-5">
    <div class="p-5 mt-5">
        <div id="ngilang">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Website Configuration</h4>
            </div>
            <?php foreach ($config as $con): ?>
                <form action="<?= base_url('configuration/addConfig') ?>" method="post">
                    <input type="hidden" value="<?= $con['id_konfigurasi'] ?>" name="configId" id="configId">
                    <div>
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="control-label">Website Title</label>
                                        <input type="text" name="web_title" class="form-control" placeholder="Website Title"
                                            value="<?= $con['judul_website'] ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="mb-3 has-danger">
                                        <label class="control-label">Website Profile</label>
                                        <input type="text" name="web_profile" value="<?= $con['profil_website'] ?>"
                                            class="form-control form-control-danger" placeholder="Website Profile">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 has-danger">
                                        <label class="control-label">Instagram</label>
                                        <input type="text" name="instagram" value="<?= $con['instagram'] ?>"
                                            class="form-control form-control-danger" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 has-danger">
                                        <label class="control-label">WhatsApp Number</label>
                                        <input type="text" name="whatsapp" value="<?= $con['no_wa'] ?>"
                                            class="form-control form-control-danger" placeholder="WhatsApp Number">
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 has-danger">
                                        <label class="control-label">Address</label>
                                        <input type="text" name="address" value="<?= $con['alamat'] ?>"
                                            class="form-control form-control-danger" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 has-danger">
                                        <label class="control-label">Email</label>
                                        <input type="text" name="email" value="<?= $con['email'] ?>"
                                            class="form-control form-control-danger" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="card-body border-top">
                                <button type="submit" class="btn btn-success rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-device-floppy me-1 fs-4"></i>
                                        Save
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>