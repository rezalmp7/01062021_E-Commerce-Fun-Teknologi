
<!-- 
                        LIST COMMENT
HEADER                      BODY                    FOOTER
- icon link header          - slideshow dekstop     
- UIkit CSS                 - slideshow mobile
- Google Font               - flashsale
- Style CSS                 - promo
- icon CSS

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    
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

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/uikit/css/uikit.min.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&family=Poppins:ital,wght@0,100;0,400;0,600;0,900;1,700&display=swap" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_jqueryGallery.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/rating.css">

    <!-- icon CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/photoGallery/fancybox/jquery.fancybox.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/ratingme/rating.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iziToast-master/dist/css/iziToast.min.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-75TZ2eNcXs0WxNVb"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

</head>
<body>
    <div class="uk-container-expand uk-padding-remove" id="<?php echo $page; ?>">
        <div class="uk-margin-auto-right uk-margin-auto-left">
            <div class="uk-padding-remove uk-margin-remove"
                uk-sticky="animation: uk-animation-slide-top; sel-target: #header; cls-active: uk-navbar-sticky black; cls-inactive: uk-navbar-transparent;"
                id="header">
                <div class="uk-padding-small uk-background-secondary" id="headerTop">
                    <div class="uk-padding uk-padding-remove-vertical">
                        <div class="uk-width-1-1 uk-inline">
                            <span class="uk-position-center-left"><span class="label">Mon-Thu: </span>9:00 AM - 5:30 PM
                                <i class="fas fa-chevron-down"></i></span>
                            <div class="uk-background-secondary white jadwal uk-padding-small" uk-dropdown>
                                <table>
                                    <tr>
                                        <td class="label">Mon-Thu:</td>
                                        <td>9:00 AM - 5:30 PM</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Fri-Sat:</td>
                                        <td>9:00 AM - 4:00 PM</td>
                                    </tr>
                                </table>
                            </div>
            
                            <span class="uk-position-center">Kantor : Jalan Petek Nomer 18, Kelurahan Purwosari,
                                Kecamatan Semarang Timur.</span>
                            <span class="uk-position-center-right">Kontak : (+62) 851-5613-5202 &emsp; <a href="mailto:funmediadigital@gmail.com" target="_blank"><span
                                        class="iconify" data-icon="clarity:email-solid" data-inline="false"></span></a>
                                &ensp; <a href="https://www.facebook.com/FunTeknologiSemarang" target="_blank"><span class="iconify" data-icon="carbon:logo-facebook"
                                        data-inline="false"></span></a> &ensp; <a href="https://www.instagram.com/fun_teknologi/" target="_blank"><span class="iconify"
                                        data-icon="ant-design:instagram-filled" data-inline="false"></span></a></span>
                        </div>
                    </div>
                </div>
                <nav class="uk-margin-remove uk-padding-remove" id="menuDekstop">
                    <div class="uk-padding uk-padding-remove-vertical" uk-navbar>
            
                        <div class="uk-navbar-left" id="logo">
                            <img class="uk-visible@s uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-remove"
                                src="<?php echo base_url(); ?>assets/img/web/logo_grey_no_txt.png" alt="Logo Fun Technology" id="logo-fun" />
                            <a href="<?php echo base_url(); ?>" id="title_logo"
                                class="uk-visible@s uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-small-left uk-margin-remove-vertical">
                                FUN<br>TEKNOLOGI<br><span>Your IT Solution</span></a>
                            <ul class="uk-visible@m uk-child-width-1-5@l uk-width-large@l uk-navbar-nav uk-padding-remove uk-margin-small-left"
                                id="kategori">
                                <?php
                                foreach ($kategori as $a) {
                                ?>
                                <li class="uk-button uk-padding-remove-horizontal uk-text-center"><a class="<?php if(isset($kat_active)) { if($kat_active == $a->id) echo 'fun-active'; } ?> uk-display-block"
                                        href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $a->id; ?>"><?php echo $a->icon; ?><br><?php echo $a->nama; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="uk-button uk-padding-remove-horizontal uk-text-center"><a class="<?php if(isset($kat_active)) { if($kat_active == 'kategori') echo 'fun-active'; } ?> uk-display-block"
                                        href="<?php echo base_url(); ?>produk/search?kategori=all"><span class="iconify" data-icon="bi:check-all"
                                            data-inline="false"></span><br>Semua</a></li>
                            </ul>
                        </div>
            
                        <div class="uk-visible@s uk-margin-medium-right uk-navbar-right">
                            <a href="#kategori_pad" class="uk-visible@s uk-hidden@m" uk-toggle><span class="iconify"
                                    data-icon="codicon:list-selection" data-inline="false"></span></a>
            
                            
                            <!-- <div class="uk-margin">
                                <form class="uk-search uk-search-default uk-width-medium@m">
                                    <a href="" uk-search-icon></a>
                                    <input class="uk-search-input" type="search" placeholder="Search">
                                </form>
                            </div> -->
                            <?php
                            $cek_status = $this->session->userdata();
                            if(isset($cek_status['ecommerce_fun_status']))
                            {
                                if($cek_status['ecommerce_fun_status'] != 'ecommerce_fun_login')
                                {
                            ?>
                            <span><a href="<?php echo base_url(); ?>login" class="uk-display-block uk-padding-small uk-padding-remove-right"><span class="iconify" data-icon="ic:round-login" data-inline="false"></span></a></span>
                            <?php
                                }
                                else {
                                    $img_pelanggan = $cek_status['ecommerce_fun_photo'];
                                    $img_default = 'avatar_default.jpg';
                            ?>
                            <span><a href="<?php echo base_url(); ?>wishlist" class="uk-display-block uk-padding-small uk-padding-remove-right"><span
                                        class="iconify" data-icon="akar-icons:heart"
                                        data-inline="false"></span><sup><span class="uk-badge"><?php echo $jml_wishlist; ?></span></sup></a></span>
                            <span><a href="<?php echo base_url(); ?>cart" class="uk-display-block uk-padding-small uk-padding-remove-right"><span
                                        class="iconify" data-icon="jam:shopping-cart" data-inline="false"></span><sup><span
                                            class="uk-badge"><?php echo $jml_cart; ?></span></sup></a></span>
                            <span><a href="#" class="uk-display-block uk-padding-small uk-padding-remove-right" type="button"><img
                                        class="uk-border-pill" src="<?php echo base_url(); ?>assets/img/pelanggan/<?php if($img_pelanggan == null) echo $img_default; else echo $img_pelanggan; ?>" width="27px" height="27px"
                                        alt="Border pill"></a></span>
                            <div class="uk-padding-small akun" uk-dropdown>
                                <h5 class="uk-margin-remove uk-text-bold"><?php echo $cek_status['ecommerce_fun_nama'] ;?></h5>
                                <span class="uk-text-small"><?php echo $cek_status['ecommerce_fun_email']; ?></span>
                                <hr class="uk-padding-remove uk-margin-small-top uk-margin-remove-bottom">
                                <ul class="uk-nav uk-dropdown-nav uk-padding-remove">
                                    <li class="uk-active"><a class="uk-padding-remove" href="<?php echo base_url(); ?>profil">Profil</a></li>
                                    <li><a class="uk-padding-remove" href="<?php echo base_url(); ?>login/logout">Keluar</a></li>
                                </ul>
                            </div>
                            <?php
                                }
                            }
                            else {
                            ?>
                            <span><a href="<?php echo base_url(); ?>login" class="uk-display-block uk-padding-small uk-padding-remove-right"><span class="iconify" data-icon="ic:round-login" data-inline="false"></span></a></span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div id="kategori_pad" uk-offcanvas>
                        <div class="uk-offcanvas-bar">
                    
                            <ul class="uk-nav uk-nav-default">
                                <?php
                                foreach ($kategori as $headkat) {
                                ?>
                                <li><a class="uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $headkat->id; ?>"><?php echo $headkat->icon; ?>
                                        <?php echo $headkat->nama; ?></a></li>
                                <?php
                                }
                                ?>
                                <li><a class="uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=all"><span class="iconify" data-icon="bi:check-all"
                                            data-inline="false"></span> Semua</a></li>
                            </ul>
                    
                        </div>
                    </div>
                </nav>
                <nav class="uk-hidden@s" id="menuMobile">
                    <div class="uk-navbar-left uk-padding-small">
                        <div class="uk-navbar-left" id="logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/web/logo_grey_no_txt.png"
                                    alt="Logo Fun Technology" id="logo-fun"></a>
                        </div>
                        <div class="uk-navbar-right">
                            <span><span><a href="<?php echo base_url(); ?>wishlist" class="uk-display-block uk-padding-small uk-padding-remove-right"><span
                                        class="iconify" data-icon="akar-icons:heart"
                                        data-inline="false"></span><sup><span class="uk-badge"><?php echo $jml_wishlist; ?></span></sup></a></span></span>
                        </div>
                    </div>
                </nav>
                <hr class="header uk-padding-remove uk-margin-remove-top uk-margin-remove-bottom">
            </div>