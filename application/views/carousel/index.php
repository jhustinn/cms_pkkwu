<div class="grid lg:grid-cols-2">
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full" id="category_table">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">Title</th>
                    <th class="border-b-2 whitespace-no-wrap">Image</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carousel as $car): ?>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                <?= $car['judul']; ?>
                            </div>
                        </td>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                <?= $car['foto']; ?>
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <button class="flex items-center mr-3 editCarouselBtn" value="<?= $car['id_carousel']; ?>">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </button>

                                <button class="flex items-center text-theme-6 deleteCarouselBtn"
                                    value="<?= $car['id_carousel']; ?>">
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

    <div class="box intro-y p-5 lg:ml-5 mt-5">
        <form data-single="true" action="/file-upload" class="dropzone border-gray-200 border-dashed">
            <div class="fallback"> <input name="file" type="file" /> </div>
            <div class="dz-message" data-dz-message>
                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span
                        class="font-medium">not</span> actually uploaded. </div>
            </div>
        </form>
    </div>
</div>
<div class="intro-y box lg:mt-5">
    <div class="flex items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Carousel Preview
        </h2>
    </div>
    <div class="p-5">
        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="flex items-center border-b border-gray-200 px-5 py-4">
                <div class="w-10 h-10 flex-none image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                        src="dist/images/profile-14.jpg">
                </div>
                <div class="ml-3 mr-auto">
                    <a href="" class="font-medium">Russell Crowe</a>
                    <div class="flex text-gray-600 truncate text-xs mt-1"> <a class="text-theme-1 inline-block truncate"
                            href="">Photography</a> <span class="mx-1">•</span> 49 seconds ago </div>
                </div>
                <div class="dropdown relative ml-3">
                    <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-500"> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-more-vertical w-4 h-4">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg> </a>
                    <div class="dropdown-box mt-6 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-2 w-4 h-4 mr-2">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg> Edit Post </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash w-4 h-4 mr-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                </svg> Delete Post </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 grid-cols-12">
                <div class="h-40 xxl:h-56 image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/preview-14.jpg">
                </div>
                <a href="" class="block font-medium text-base mt-5">Desktop publishing software like Aldus PageMaker</a>
                <div class="text-gray-700 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500</div>
            </div>
            <div class="flex items-center px-5 py-3 border-t border-gray-200">
                <a href=""
                    class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-gray-500 text-gray-600 mr-2 tooltip tooltipstered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-bookmark w-3 h-3">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg> </a>
                <div class="intro-x flex mr-2">
                    <div class="intro-x w-8 h-8 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template"
                            class="rounded-full border border-white zoom-in tooltip tooltipstered"
                            src="dist/images/profile-14.jpg">
                    </div>
                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                        <img alt="Midone Tailwind HTML Admin Template"
                            class="rounded-full border border-white zoom-in tooltip tooltipstered"
                            src="dist/images/profile-5.jpg">
                    </div>
                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                        <img alt="Midone Tailwind HTML Admin Template"
                            class="rounded-full border border-white zoom-in tooltip tooltipstered"
                            src="dist/images/profile-15.jpg">
                    </div>
                </div>
                <a href=""
                    class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip tooltipstered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-share-2 w-3 h-3">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg> </a>
                <a href=""
                    class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip tooltipstered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-share w-3 h-3">
                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                        <polyline points="16 6 12 2 8 6"></polyline>
                        <line x1="12" y1="2" x2="12" y2="15"></line>
                    </svg> </a>
            </div>
            <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                    <div class="mr-2"> Comments: <span class="font-medium">27</span> </div>
                    <div class="mr-2"> Views: <span class="font-medium">61k</span> </div>
                    <div class="ml-auto"> Likes: <span class="font-medium">170k</span> </div>
                </div>
                <div class="w-full flex items-center mt-3">
                    <div class="w-8 h-8 flex-none image-fit mr-3">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                            src="dist/images/profile-14.jpg">
                    </div>
                    <div class="flex-1 relative text-gray-700">
                        <input type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13"
                            placeholder="Post a comment...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-smile w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>