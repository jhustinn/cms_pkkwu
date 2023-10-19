<div class="intro-y box lg:mt-5">
    <div class="flex items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Account &amp;
            Profile
        </h2>
    </div>
    <div class="p-5" id="editUserProfile">
        <form id="userProfileForm">
            <input type="hidden" name="idImageProfile" value="<?= $admin['image']; ?>">
            <input type="hidden" name="idProfile" id="idProfile" value="<?= $admin['id'] ?>">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 xl:col-span-4">
                    <div class="border border-gray-200 rounded-md p-5">
                        <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                            <img class="rounded-md" id="viewImageUser" alt="User profile" src="">
                        </div>
                        <div class="w-40 mx-auto cursor-pointer relative mt-5">
                            <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                            <input type="file" name="profileImage"
                                class="changeUserImage w-full h-full top-0 left-0 absolute opacity-0">
                        </div>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-8">
                    <div>
                        <label>Email</label>
                        <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                            placeholder="Input text" value="<?= $admin['email']; ?>" disabled="">
                    </div>
                    <div class="mt-3">
                        <label>Level</label>
                        <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                            placeholder="Input text" value="<?php switch ($admin['role_id']) {
                                case 1:
                                    echo "Admin";
                                    break;
                                case 2:
                                    echo "Contributor";
                                    break;
                                default:
                                    echo "level tidak ada!";
                            } ?>" disabled="">
                    </div>
                    <div class="mt-3">
                        <label>Name</label>
                        <input type="text" name="name" class="input w-full border bg-gray-100 mt-2"
                            placeholder="Input text" value="<?= $admin['name']; ?>">
                    </div>
                    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
        </form>
    </div>
</div>

<script>
    // Profile
    $('#viewImageUser').attr('src', "<?= base_url('assets/images/profile/') ?>" + "<?= $admin['image'] ?>");
    // End Profile

    // Edit User Profile
    $("#userProfileForm").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Profile/editUserProfile') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {

                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    setTimeout(function () {
                        window.location.reload();
                    }, 1900);

                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )

                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    `Failed to edit profile!`,
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

</script>