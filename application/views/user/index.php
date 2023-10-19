<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        <?= $title; ?>
    </h2>
</div>
<div class="m-5"> <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
        class="btn btn-primary m-1">Add
        User</a> </div>
<!-- BEGIN: Datatable -->
<div class="card datatable-wrapper p-5 mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- END: Datatable -->

<!-- Tambah User Modal -->
<div class="modal" id="addUserModal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Add Users</h2>
            <div class="dropdown relative sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i
                        data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2"> <a href="javascript:;"
                            class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </div>
                </div>
            </div>
        </div>
        <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="addUser">
            <div class="col-span-12 sm:col-span-6">
                <label>Name</label>
                <input required type="text" class="input w-full border mt-2 flex-1" name="name" placeholder="Full Name">
            </div>
            <div class="col-span-12 sm:col-span-6">
                <label>Email</label>
                <input required type="email" class="input w-full border mt-2 flex-1" name="email"
                    placeholder="example@gmail.com">
            </div>
            <div class="col-span-12">
                <label>Password</label>
                <input required type="password" class="input w-full border mt-2 flex-1" name="password"
                    placeholder="Password">
            </div>
            <div class="col-span-12">
                <label>Level</label>
                <select class="select2 input w-full border mt-2 flex-1" name="role" data-hide-search="true">
                    <option value="1">Admin</option>
                    <option value="2">Contributor</option>
                </select>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Add</button>
            </div>
        </form>

        <!-- Delete Modal -->
        <div class="modal" id="deleteUserModal">
            <div class="modal__content">
                <form id="deleteUser">
                    <input type="hidden" name="id_delete" id="id_delete">
                    <div class="p-5 text-center"> <i data-feather="x-circle"
                            class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This
                            process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editUserModal">
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