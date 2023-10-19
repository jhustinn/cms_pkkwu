<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile Layout
    </h2>
</div>
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img id="profileImage" alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                    src="<?= base_url('assets/images/profile/') . $admin['image'] ?>">
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                    <?= $admin['name'] ?>
                </div>
                <div class="text-gray-600">
                    <?php switch ($admin['role_id']) {
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
                <div class="text-gray-600">
                    Member Since
                    <?= date('d F Y', $admin['since']); ?>
                </div>

            </div>
        </div>
        <div
            class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="truncate sm:whitespace-normal flex items-center"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 mr-2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <?= $admin['email'] ?>
            </div>

        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-5">Sales Growth</div>
            <div class="flex items-center justify-center lg:justify-start mt-2">
                <div class="mr-2 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-9">+23%</span> </div>
                <div class="w-32 lg:w-40">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="simple-line-chart-1 chartjs-render-monitor" height="40"
                        style="display: block; width: 160px; height: 40px;" width="160"></canvas>
                </div>
            </div>
            <div class="flex items-center justify-center lg:justify-start">
                <div class="mr-2 w-20 flex"> STP: <span class="ml-3 font-medium text-theme-6">-2%</span> </div>
                <div class="w-32 lg:w-40">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="simple-line-chart-2 chartjs-render-monitor" height="40"
                        style="display: block; width: 160px; height: 40px;" width="160"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start cursor-pointer">
        <a id="editUserProfileBtn" data-toggle="tab" class="py-4 sm:mr-8">Account &amp;
            Profile</a>
        <a data-toggle="tab" data-target="#account-and-profile" href="javascript:;" class="py-4 sm:mr-8">Change
            Password</a>
        <a id="aboutUserProfileBtn" data-toggle="tab" data-target="#activities" href="javascript:;"
            class="py-4 sm:mr-8">Activities</a>
    </div>
</div>
<div class="intro-y mt-5">
    <div id="userProfile">

    </div>
</div>