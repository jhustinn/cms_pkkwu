<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        <?= $title; ?>
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="text-center mr-2 mb-2"> <a class="button inline-block bg-theme-1 text-white addContentBtn">Add
                Content</a> </div>
    </div>
</div>
<!-- BEGIN: Datatable -->
<div class="card box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="content_table">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Title</th>
                <th class="border-b-2 whitespace-no-wrap">Description</th>
                <th class="border-b-2 whitespace-no-wrap">Category</th>
                <th class="border-b-2 whitespace-no-wrap">Date Added</th>
                <th class="border-b-2 whitespace-no-wrap">Creator</th>
                <th class="border-b-2 whitespace-no-wrap">Photo</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($content as $c): ?>
                <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $c['judul'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $c['keterangan'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $c['nama_kategori'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $c['tanggal'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">
                            <?= $c['username'] ?>
                        </div>
                    </td>
                    <td class="border-b">
                        <button value="<?= $c['foto'] ?>"
                            class="flex items-center mr-3 text-blue-500 hover:text-blue-300 viewImageBtn"> <i
                                data-feather="zoom-in" class="w-4 h-4 mr-1"></i>
                            See Photo
                        </button>
                        <!-- <img src="" alt="Content Photo"> -->
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <button class="flex items-center mr-3 editContentBtn" value="<?= $c['foto']; ?>"> <i
                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </button>

                            <button class="flex items-center text-theme-6 deleteContentBtn" value="<?= $c['foto']; ?>">
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


<!-- Tambah Kategori Modal -->
<div class="modal" id="addContentModal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Add Content</h2>
            <div class="dropdown relative sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i
                        data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
            </div>
        </div>
        <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="addContent" enctype="multipart/form-data">
            <div class="col-span-12 sm:col-span-12">
                <label>Title</label>
                <input required type="text" class="input w-full border mt-2 flex-1" name="judul"
                    placeholder="Content Title">
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label>Photo</label>
                <input type="file" class="input w-full border mt-2 flex-1" name="foto">
            </div>
            <div class="col-span-12">
                <label>Category</label>
                <select data-hide-search="true" class="select2 w-full border mt-2 flex-1" name="kategori">
                    <?php foreach ($category as $cat): ?>
                        <option value="<?= $cat['id_kategori'] ?>">
                            <?= $cat['nama_kategori'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label>Description</label>
                <textarea required type="text" class="input w-full border mt-2 flex-1" name="keterangan"
                    placeholder="Description"></textarea>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Add</button>
            </div>
        </form>

        <!-- Delete Modal -->
        <div class="modal" id="deleteContentModal">
            <div class="modal__content">
                <form id="deleteContent">
                    <input type="hidden" name="id_delete" id="id_delete">
                    <input type="hidden" name="judul_delete" id="judul_delete">
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

    <!-- View Image Modal -->
    <div class="modal" id="viewImageModal">
        <div class="modal__content">
            <div class="p-5">
                <div class="slider mx-6 center-mode">
                    <div class="h-56 px-2">
                        <div class="h-full image-fit rounded-md overflow-hidden"> <img id="viewImage"
                                alt="Midone Tailwind HTML Admin Template" src="" /> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editContentModal">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Edit Content</h2>
            </div>
            <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="editContent" enctype="multipart/form-data">
                <input type="hidden" id="id_edit_image" name="id_edit_image">
                <input type="hidden" id="id_edit_content" name="id_edit_content">
                <div class="col-span-12 sm:col-span-12">
                    <div class="col-span-12 xl:col-span-4">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="w-80 h-80 relative zoom-in mx-auto">
                                <img class="rounded-md" id="viewImageEdit" src="">
                            </div>
                            <!-- <p class="text-center" id="img_edit"></p> -->
                            <div class="w-40 mx-auto relative mt-5">
                                <button type="button" class="cursor-pointer button w-full bg-theme-1 text-white ">Change
                                    Photo</button>
                                <input type="file" name="editImage"
                                    class="changePhoto w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label>Title</label>
                        <input required type="text" id="edit_title" class="input w-full border mt-2 flex-1"
                            name="edit_title" placeholder="Content Title">
                    </div>

                    <!-- <label>Photo</label> -->
                    <!-- <div class="h-full image-fit rounded-md mb-6"> <img id="viewImageEdit" src="" /></div>
                    <input type="file" class="input w-full border mt-2 flex-1" name="foto"> -->
                </div>
                <div class="col-span-12">
                    <label>Category</label>
                    <select class="select2 input w-full border mt-2 flex-1" id="edit_category" name="edit_category"
                        data-hide-search="true">
                        <?php foreach ($category as $cat): ?>
                            <option value="<?= $cat['id_kategori'] ?>">
                                <?= $cat['nama_kategori'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                    <!-- <select data-hide-search="true" class="select2 w-full border mt-2 flex-1" name="kategori"
                        id="edit_category">


                    </select> -->
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <label>Description</label>
                    <textarea required type="text" id="edit_description" class="input w-full border mt-2 flex-1"
                        name="edit_description" placeholder="Description"></textarea>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                    <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                </div>
            </form>
        </div>
    </div>