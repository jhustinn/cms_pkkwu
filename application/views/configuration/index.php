<div class="intro-y box lg:mt-5">
    <div class="flex items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Website Configuration
        </h2>
    </div>
    <div class="p-5">
        <?php foreach ($config as $con): ?>
            <form id="configForm">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-6">
                        <input type="hidden" value="<?= $con['id_konfigurasi'] ?>" name="configId" id="configId">
                        <div>
                            <label>Website Title</label>
                            <input type="text" name="web_title" required class="input w-full border bg-gray-100 mt-2"
                                value="<?= $con['judul_website']; ?>" placeholder="Website Title">
                        </div>
                        <div class="mt-3">
                            <label>Website Profile</label>
                            <input type="text" name="web_profile" required class="input w-full border mt-2"
                                placeholder="Website Profile" value="<?= $con['profil_website']; ?>">
                        </div>
                        <div class="mt-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" required class="input w-full border mt-2"
                                placeholder="Instagram" value="<?= $con['instagram']; ?>">
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <label>WhatsApp Number</label>
                            <input type="text" name="wa_number" required class="input w-full border mt-2"
                                placeholder="WhatsApp Number" value="<?= $con['no_wa']; ?>">
                        </div>
                        <div class="mt-3">
                            <label>Address</label>
                            <input type="text" name="address" required class="input w-full border mt-2"
                                placeholder="Address" value="<?= $con['alamat']; ?>">
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="email" name="email" required class="input w-full border mt-2"
                                placeholder="Email Address" value="<?= $con['email']; ?>">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="button w-40 bg-theme-1 text-white ml-auto">Save Changes</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>