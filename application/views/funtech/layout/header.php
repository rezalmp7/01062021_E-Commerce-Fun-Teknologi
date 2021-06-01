<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - E-Commerce</title>

    <!-- icon link header -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/web/iconified/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/web/iconified/apple-touch-icon-180x180.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/uikit/css/uikit.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_admin.css" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Poppins:ital,wght@0,100;0,400;0,600;0,900;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/uikit/js/uikit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/uikit/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>  
    <script src="<?php echo base_url(); ?>assets/vendor/ckeditor/build/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/dataTable/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

</head>

<body>
    <div class="uk-container-expan uk-padding-remove uk-margin-remove" id="<?php echo $page; ?>" uk-height-viewport="expand: true">
        <div class="uk-margin-remove uk-padding-remove" uk-grid>
            <div class="uk-width-1-5@s uk-padding-remove uk-margin-remove uk-clearfix" id="menu">
                <!-- menu Dekstop -->
                <div class="uk-visible@s uk-width-1-1 uk-margin-remove uk-padding-remove uk-display-block"
                    id="menuDekstop" uk-height-viewport>
                    <div class="uk-padding" id="logo">
                        <img class="uk-width-4-5 uk-margin-auto" src="<?php echo base_url(); ?>assets/img/web/logo_grey_txt.png">
                    </div>
                    <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="nav">
                        <ul class="uk-nav uk-nav-default uk-padding-small">
                            <li class="<?php if($page=='dashboard') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/dashboard"><span class="iconify"
                                        data-icon="ant-design:line-chart-outlined" data-inline="false"></span>
                                    Dashboard</a></li>
                            <li
                                class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom uk-margin-small-top">
                                User</li>
                            <li class="<?php if($page=='user') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/user"><span class="iconify" data-icon="ant-design:user-outlined"
                                        data-inline="false"></span> User</a></li>
                            <li class="<?php if($page=='pelanggan') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/pelanggan"><span class="iconify" data-icon="ant-design:user-outlined"
                                        data-inline="false"></span> Pelanggan</a></li>
                            <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">Laporan
                            </li>
                            <li class="<?php if($page=='laporan_penjualan') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/laporan_penjualan"><span class="iconify" data-icon="bx:bx-book-bookmark"
                                        data-inline="false"></span> Laporan Penjualan</a></li>
                            <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">Produk
                            </li>
                            <li class="<?php if($page=='produk') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/produk"><span class="iconify" data-icon="gridicons:product"
                                        data-inline="false"></span> Produk</a></li>
                            <li class="<?php if($page=='kategori') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/kategori"><span class="iconify" data-icon="carbon:product"
                                        data-inline="false"></span> Kategori</a></li>
                            <li class="<?php if($page=='comment') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/comment"><span class="iconify" data-icon="bx:bx-comment-error"
                                        data-inline="false"></span> New Comment</a></li>
                            <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">Promo
                            </li>
                            <li class="<?php if($page=='promo') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/promo"><span class="iconify" data-icon="bx:bx-award"
                                        data-inline="false"></span> Daftar Promo</a></li>
                            <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">Website
                            </li>
                            <li class="<?php if($page=='slideshow') echo 'uk-active'; ?>"><a href="<?php echo base_url(); ?>funtech/slideshow"><span class="iconify" data-icon="ri:slideshow-2-line"
                                        data-inline="false"></span> Slideshow</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Menu Mobile -->
                <div class="uk-hidden@s uk-padding-small uk-width-1-1 uk-display-block uk-background-mute"
                    id="menuMobile">
                    <button class="uk-button uk-margin-small-right" style="background: transparent;" type="button"
                        uk-toggle="target: #offcanvas-reveal"><span uk-navbar-toggle-icon></span> <span
                            class="uk-padding-small"><img style="height: 25px"
                                src="<?php echo base_url(); ?>assets/img/web/logo_grey_no_txt.png"></span></button>
                    <div id="offcanvas-reveal" uk-offcanvas="mode: reveal; overlay: true">
                        <div class="uk-offcanvas-bar" style="background-color: white;" id="nav">

                            <button class="uk-offcanvas-close" type="button" uk-close></button>

                            <img class="uk-width-2-3 uk-margin-auto-left uk-margin-auto-right uk-margin-medium-bottom"
                                src="../img/web/logo_grey_txt.png">
                            <ul class="uk-nav uk-nav-default uk-padding-small">
                                <li class="uk-active"><a href="<?php echo base_url(); ?>dashboard"><span class="iconify"
                                            data-icon="ant-design:line-chart-outlined" data-inline="false"></span>
                                        Dashboard</a></li>
                                <li
                                    class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom uk-margin-small-top">
                                    User
                                </li>
                                <li><a href="<?php echo base_url(); ?>user"><span class="iconify" data-icon="ant-design:user-outlined"
                                            data-inline="false"></span>
                                        User</a></li>
                                <li><a href="<?php echo base_url(); ?>pelanggan"><span class="iconify" data-icon="ant-design:user-outlined"
                                            data-inline="false"></span>
                                        Pelanggan</a></li>
                                <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">
                                    Laporan</li>
                                <li><a href="<?php echo base_url(); ?>laporan_penjualan"><span class="iconify" data-icon="bx:bx-book-bookmark"
                                            data-inline="false"></span> Laporan
                                        Penjualan</a></li>
                                <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">
                                    Produk</li>
                                <li><a href="<?php echo base_url(); ?>produk"><span class="iconify" data-icon="gridicons:product"
                                            data-inline="false"></span> Produk</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>kategori"><span class="iconify" data-icon="carbon:product"
                                            data-inline="false"></span> Kategori</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>new_comment"><span class="iconify" data-icon="bx:bx-comment-error"
                                            data-inline="false"></span> New
                                        Comment</a>
                                </li>
                                <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">
                                    Promo</li>
                                <li><a href="<?php echo base_url(); ?>promo"><span class="iconify" data-icon="bx:bx-award"
                                            data-inline="false"></span> Daftar Promo</a>
                                </li>
                                <li class="label uk-padding-small uk-padding-remove-right uk-padding-remove-bottom ">
                                    Website</li>
                                <li><a href="<?php echo base_url(); ?>slideshow"><span class="iconify" data-icon="ri:slideshow-2-line"
                                            data-inline="false"></span>
                                        Slideshow</a></li>
                                <li><a href="<?php echo base_url(); ?>pesan"><span class="iconify" data-icon="bi:chat-left-text"
                                            data-inline="false"></span> Pesan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="uk-width-4-5@s uk-padding" id="content">
                <div class="uk-width-1-1 uk-margin-remove uk-padding-remove uk-clearfix" id="header" uk-grid>
                    <div class="uk-width-1-2 uk-float-left">
                        <h2 class="uk-width-1-1 fun-poppins-semi-bold uk-padding-remove uk-margin-remove"><?php echo $page_name; ?></h2>
                        <p class="uk-width-1-1 fun-poppins uk-padding-remove uk-margin-remove">Fun Teknologi</p>
                    </div>
                    <div class="uk-width-1-2 uk-float-right">
                        <div class="uk-float-right" id="pesan">
                            <a class="uk-button fun-poppins uk-padding-remove uk-margin-remove" type="button" uk-grid>
                                <span class="uk-padding-remove uk-margin-remove">
                                    <div class="gambar_profil uk-border-circle uk-padding-remove uk-margin-remove"
                                        style="background-image: url('<?php echo base_url(); ?>assets/img/web/admin_default.jpg');"></div>
                                </span>
                                <div class="uk-padding-remove uk-margin-remove uk-text-center">
                                    <span class="uk-padding-remove uk-margin-remove"><?php echo $this->session->userdata('ecommerce_admin_nama'); ?></span>
                                    <hr class="uk-padding-remove uk-margin-remove">
                                    <span class="uk-visible@s uk-padding-remove uk-margin-remove ket">Admin
                                        Account</span>
                                </div>
                            </a>
                            <div uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?php echo base_url(); ?>funtech/login/logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
