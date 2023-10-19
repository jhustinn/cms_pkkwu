<div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <p class="text-center">Sign In</p>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('auth') ?>" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="mb-4">
                                <label for="password1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password1">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>

                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>