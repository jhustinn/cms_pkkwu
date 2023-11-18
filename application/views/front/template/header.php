<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?= $config[0]['judul_website'] ?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="icon" type="image/png"
    href="<?= base_url('assets/images/logos/rexi.png') ?>">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="vendors/prism/prism.css" rel="stylesheet">
    <link href="<?= base_url('vendor/boldo-1.0.0/public/') ?>vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('vendor/boldo-1.0.0/public/') ?>assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('vendor/boldo-1.0.0/public/') ?>assets/css/user.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="index.html"><svg width="200" height="50.49999999999997" viewBox="0 0 360 155" class="css-1j8o68f"><defs id="SvgjsDefs1464"></defs><g id="SvgjsG1465" featurekey="symbolContainer" transform="matrix(1,0,0,1,20,20)" fill="#ffffff"><rect xmlns="http://www.w3.org/2000/svg" width="120" height="135" rx="10" ry="10"></rect></g><g id="SvgjsG1466" featurekey="monogramFeature-0" transform="matrix(2.2755585185223763,0,0,2.2755585185223763,30.00097222348814,-1.1999147568334436)" fill="#0ea47a"><path d="M4.3945 59.941406 l0 -41.836 l19.043 0 c8.5547 0 12.832 3.7403 12.832 11.221 c0 5.0587 -3.3302 9.2481 -9.9902 12.568 l13.271 18.105 l-9.7852 0 l-12.744 -18.252 l0 -3.5449 c7.4218 -1.2695 11.133 -4.1505 11.133 -8.6426 c0 -3.0858 -1.7383 -4.6289 -5.2148 -4.6289 l-10.635 0 l0 35.01 l-7.9102 0 z"></path></g><g id="SvgjsG1467" featurekey="nameFeature-0" transform="matrix(2.278941722696823,0,0,2.278941722696823,153.71021051852827,7.92890764863035)" fill="#ffffff"><path d="M18.16 11.440000000000001 c2.4 0 4.3936 0.74 5.98 2.22 s2.38 3.3667 2.38 5.66 c0 3.5733 -1.5067 5.96 -4.52 7.16 l0 0.08 c1.0133 0.29332 1.8066 0.78 2.38 1.46 s1.0066 1.4733 1.3 2.38 s0.48 2.36 0.56 4.36 c0.10668 2.6133 0.48 4.36 1.12 5.24 l-6.28 0 c-0.34668 -0.88 -0.61336 -2.5333 -0.80004 -4.96 c-0.21332 -2.56 -0.68 -4.2332 -1.4 -5.02 s-1.8933 -1.18 -3.52 -1.18 l-6.32 0 l0 11.16 l-6.28 0 l0 -28.56 l15.4 0 z M15.96 24.36 c1.3333 0 2.38 -0.3 3.14 -0.9 s1.14 -1.66 1.14 -3.18 c0 -1.44 -0.37332 -2.46 -1.12 -3.06 s-1.8134 -0.9 -3.2 -0.9 l-6.88 0 l0 8.04 l6.92 0 z M53 11.440000000000001 l0 5.28 l-15.08 0 l0 6.12 l13.84 0 l0 4.88 l-13.84 0 l0 7 l15.4 0 l0 5.28 l-21.68 0 l0 -28.56 l21.36 0 z M62.64 11.440000000000001 l5.6 9.12 l5.8 -9.12 l6.88 0 l-9.16 13.64 l9.96 14.92 l-7.48 0 l-6.24 -9.88 l-6.36 9.88 l-7.08 0 l10 -14.96 l-9.2 -13.6 l7.28 0 z M90.51999999999998 11.440000000000001 l0 28.56 l-6.28 0 l0 -28.56 l6.28 0 z"></path></g><g id="SvgjsG1468" featurekey="sloganFeature-0" transform="matrix(2.1650879119937487,0,0,2.1650879119937487,157.01217946606835,97.35182678569899)" fill="#ffffff"><path d="M7.5 5.720000000000001 c2.0266 0 3.62 0.62666 4.78 1.88 s1.74 2.98 1.74 5.18 c0 2.28 -0.58334 4.0534 -1.75 5.32 s-2.73 1.9 -4.69 1.9 l-6.2 0 l0 -14.28 l6.12 0 z M7.3 17.36 c1.1333 0 2.0134 -0.37334 2.64 -1.12 s0.94 -1.8067 0.94 -3.18 c0 -1.5733 -0.33666 -2.75 -1.01 -3.53 s-1.71 -1.17 -3.11 -1.17 l-2.24 0 l0 9 l2.78 0 z M26.880000000000003 5.720000000000001 l0 2.64 l-7.54 0 l0 3.06 l6.92 0 l0 2.44 l-6.92 0 l0 3.5 l7.7 0 l0 2.64 l-10.84 0 l0 -14.28 l10.68 0 z M34.08 5.380000000000001 c1.7467 0 3.1366 0.40002 4.17 1.2 s1.55 1.9333 1.55 3.4 l-3.04 0 c-0.04 -0.72 -0.28334 -1.26 -0.73 -1.62 s-1.1367 -0.54 -2.07 -0.54 c-0.65334 0 -1.18 0.14334 -1.58 0.43 s-0.6 0.68332 -0.6 1.19 c0 0.41334 0.12334 0.71334 0.37 0.9 s0.59666 0.35332 1.05 0.49998 s1.2467 0.36 2.38 0.64 c1.1867 0.29334 2.1 0.61334 2.74 0.96 s1.1267 0.79 1.46 1.33 s0.5 1.2033 0.5 1.99 c0 0.90666 -0.24 1.7133 -0.72 2.42 s-1.18 1.2433 -2.1 1.61 s-1.96 0.55 -3.12 0.55 c-1.7733 0 -3.23 -0.44334 -4.37 -1.33 s-1.71 -2.1034 -1.71 -3.65 l0 -0.1 l3.04 0 c0 0.84 0.28666 1.49 0.86 1.95 s1.3333 0.69 2.28 0.69 c0.84 0 1.5167 -0.15 2.03 -0.45 s0.77 -0.74334 0.77 -1.33 c0 -0.38666 -0.14 -0.71332 -0.42 -0.97998 s-0.65334 -0.48332 -1.12 -0.64998 s-1.2533 -0.37666 -2.36 -0.63 c-1.28 -0.32 -2.2134 -0.66 -2.8 -1.02 s-1.0333 -0.79666 -1.34 -1.31 s-0.46 -1.13 -0.46 -1.85 c0 -0.89334 0.25666 -1.6733 0.77 -2.34 s1.1833 -1.16 2.01 -1.48 s1.68 -0.48 2.56 -0.48 z M45.28 5.720000000000001 l0 14.28 l-3.14 0 l0 -14.28 l3.14 0 z M54.440000000000005 5.380000000000001 c1.6267 0 3.0066 0.47336 4.14 1.42 s1.76 2.1534 1.88 3.62 l-3 0 c-0.18666 -0.8 -0.54666 -1.4 -1.08 -1.8 s-1.18 -0.6 -1.94 -0.6 c-1.2267 0 -2.18 0.44334 -2.86 1.33 s-1.02 2.0766 -1.02 3.57 c0 1.4667 0.34666 2.63 1.04 3.49 s1.64 1.29 2.84 1.29 c2.0534 0 3.1866 -1.0267 3.4 -3.08 l-3.16 0 l0 -2.34 l6 0 l0 7.72 l-2 0 l-0.32 -1.62 c-1 1.3067 -2.3066 1.96 -3.92 1.96 c-2.1066 0 -3.8034 -0.69334 -5.09 -2.08 s-1.93 -3.1666 -1.93 -5.34 c0 -2.2134 0.64 -4.0234 1.92 -5.43 s2.98 -2.11 5.1 -2.11 z M66.34 5.720000000000001 l5.96 9.58 l0.04 0 l0 -9.58 l2.94 0 l0 14.28 l-3.14 0 l-5.94 -9.56 l-0.04 0 l0 9.56 l-2.94 0 l0 -14.28 l3.12 0 z"></path></g></svg></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i
                        class="fa-solid fa-bars text-white fs-3"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url('home') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url('blog'); ?>">Blogs</a>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= base_url('front/gallery') ?>">Our Work</a></li>
                        </li>
                        <li class="nav-item mt-2 mt-lg-0"><a
                                class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100" aria-current="page"
                                href="<?= base_url('auth') ?>">Log In</a></li>
                    </ul>
                </div>
            </div>
        </nav>