<div class="pt-5">
    <div class="p-5 mt-5">
        <div id="ngilang">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h4 class="mt-2 text-white"><?= $title; ?></h4>
                <button type="button" class="btn btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#addUserModal">
                    Add User
                </button>
            </div>
<!-- BEGIN: Datatable -->
<div class="card-body">
                <table class="table table-report table-report--bordered display datatable w-full" id="content_table">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">Name</th>
                            <th class="whitespace-no-wrap">Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $c): ?>
                                                                                <tr>
                                                                                    <td class="">
                                                                                        <div class="font-medium whitespace-no-wrap">
                                                                                            <?= $c['name'] ?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="">
                                                                                        <div class="font-medium whitespace-no-wrap">
                                                                                            <?= $c['email'] ?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="flex justify-content-center items-center text-center">
                                                                                            <button type="button"
                                                                                                class="btn btn-light-warning text-warning btn-lg px-4 fs-4 font-medium"
                                                                                                data-bs-toggle="modal" data-bs-target="#editUserModal<?= $c['id_user'] ?>">
                                                                                                Edit
                                                                                            </button>
                                                                                            <a 
                                                                                                class="btn btn-light-danger text-danger btn-lg px-4 fs-4 font-medium"
                                                                                                href="<?= base_url('user/deleteUser/' . $c['id_user']) ?>">
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
<!-- END: Datatable -->

<div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('User/addUser') ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
        </form>
    </div>
</div>




<?php foreach ($user as $u): ?>
                    <!-- Edit Modal -->
                    <div class="modal" id="editUserModal<?= $u['id_user']; ?>">
                        <div class="modal__content">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">Add Users</h2>
                                <div class="dropdown relative sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                                        <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
                                    </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2"> <a href="javascript:;"
                                                class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </div>
                                    </div>
                                </div>
                            </div>
                            <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="editUser">
                                <input type="hidden" name="id" id="id">
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Name</label>
                                    <input type="text" id="name" class="input w-full border mt-2 flex-1" name="name"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label>Email</label>
                                    <input type="text" id="email" class="input w-full border mt-2 flex-1" name="email"
                                        placeholder="example@gmail.com">
                                </div>
                                <!-- <div class="col-span-12">
                    <label>Password</label>
                    <input type="password" id="password" class="input w-full border mt-2 flex-1" name="password"
                        placeholder="Password">
                </div> -->
                                <!-- <div class="col-span-12">
                    <label>Image</label>
                    <input type="file" name="image" id="image" class="input w-full border mt-2 flex-1"
                        placeholder="JPG/PNG/JPEG Files">
                </div> -->
                                <div class="col-span-12">
                                    <label>Level</label>
                                    <select class="select2 input w-full border mt-2 flex-1" id="role" name="role"
                                        data-hide-search="true">
                                        <option value="1">Admin</option>
                                        <option value="2">Contributor</option>
                                    </select>
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                                    <button type="button" data-dismiss="modal"
                                        class="button w-20 border text-gray-700 mr-1">Cancel</button>
                                    <button type="submit" class="button w-20 bg-theme-1 text-white">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
<?php endforeach; ?>
