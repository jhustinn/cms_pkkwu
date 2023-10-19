<h2 class="intro-y text-lg font-medium mt-10">
    User Activity
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input id="activity_search" type="text" class="input w-56 box pr-10 placeholder-theme-13"
                    placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible datatable-wrapper">
        <table class="table table-report -mt-2" id="activity_table">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">PROFILE</th>
                    <th class="whitespace-no-wrap">USERNAME</th>
                    <th class="text-center whitespace-no-wrap">DESCRIPTION</th>
                    <th class="whitespace-no-wrap">TABLE</th>
                    <th class="text-center whitespace-no-wrap">DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activity as $a): ?>
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone Tailwind HTML Admin Template"
                                        class="tooltip rounded-full tooltipstered"
                                        src="<?= base_url('assets/images/profile/') . $a['image'] ?>">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-no-wrap">
                                <?= $a['name']; ?>
                            </a>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">
                                <?php switch ($a['role_id']) {
                                    case 1:
                                        echo "Admin";
                                        break;
                                    case 2:
                                        echo "Contributor";
                                        break;
                                    default:
                                        echo "level tidak ada!";
                                } ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <?= $a['deskripsi'] ?>
                        </td>
                        <td class="">
                            <?= $a['nama_tabel'] ?>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-6">
                                <?= $a['tanggal'] ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x-circle w-16 h-16 text-theme-6 mx-auto mt-3">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be
                undone.</div>
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
            <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->