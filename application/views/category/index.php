<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        <?= $title; ?>
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="text-center mr-2 mb-2"> <a href="javascript:;" data-toggle="modal"
                data-target="#header-footer-modal-preview"
                class="button inline-block bg-theme-1 text-white addCategoryBtn">Add
                Category</a> </div>
        <div class="dropdown relative ml-auto sm:ml-0">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
                </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                        <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category </a>
                    <a href=""
                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                        <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="grid lg:grid-cols-2">
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full" id="category_table">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">Content Category</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $c): ?>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                <?= $c['nama_kategori'] ?>
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <button class="flex items-center mr-3 editCategoryBtn" value="<?= $c['id_kategori']; ?>"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </button>

                                <button class="flex items-center text-theme-6 deleteCategoryBtn"
                                    value="<?= $c['id_kategori']; ?>">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                    Delete </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

    <div class="box intro-y p-5 lg:ml-5 mt-5"></div>
</div>

<!-- Tambah Kategori Modal -->
<div class="modal" id="addCategoryModal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Add Category</h2>
            <div class="dropdown relative sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i
                        data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
            </div>
        </div>
        <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="addCategory">
            <div class="col-span-12 sm:col-span-12">
                <label>Category Name</label>
                <input required type="text" class="input w-full border mt-2 flex-1" name="nama_kategori"
                    placeholder="Category Name">
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Add</button>
            </div>
        </form>

        <!-- Delete Modal -->
        <div class="modal" id="deleteCategoryModal">
            <div class="modal__content">
                <form id="deleteCategory">
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
    <div class="modal" id="editCategoryModal">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Edit Category</h2>
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
            <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="editCategory">
                <input type="hidden" name="id" id="id">
                <div class="col-span-12 sm:col-span-12">
                    <label>Category Name</label>
                    <input type="text" id="name" class="input w-full border mt-2 flex-1" name="name"
                        placeholder="Category Name">
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                    <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Edit</button>
                </div>
            </form>
        </div>
    </div>