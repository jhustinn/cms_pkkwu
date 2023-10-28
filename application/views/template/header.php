<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="" class="text-nowrap logo-img">
                        <h1>
                            Admin
                        </h1>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">User</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('user') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User's</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Content</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('content') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-device-desktop"></i>
                                </span>
                                <span class="hide-menu">Content</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('category') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-grid"></i>
                                </span>
                                <span class="hide-menu">Category</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('carousel') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-box-multiple"></i>
                                </span>
                                <span class="hide-menu">Carousel</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('gallery') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-graph"></i>
                                </span>
                                <span class="hide-menu">Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('configuration') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="hide-menu">Configuration</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            <header class="app-header" style="background: none;">
                <nav class="navbar navbar-expand-lg navbar-light shadow-lg m-4 rounded" style="background: white;">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <?= $title; ?>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link">
                                <?= $title; ?>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end mb-2" id="navbarNav">
                        <a href="<?= base_url('auth/logout') ?>"
                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                    </div>
                </nav>
            </header>