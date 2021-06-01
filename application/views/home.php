
            <div class="uk-padding-large uk-padding-remove-bottom" id="body">
                <div class="uk-padding-remove uk-margin-remove" id="slideshow">
                    <!-- slideshow dekstop -->
                    <div class="uk-visible@s uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 4000; pause-on-hover: true; ratio: 5:1; min-height: 300; max-height:800; animation: push">
                        <ul class="uk-slideshow-items">
                            <?php
                            foreach ($slideshow as $a) {
                            ?>
                            <li>
                                <img src="<?php echo base_url(); ?>/assets/img/web/background slideshow.png" alt="" uk-cover>
                                <div class="uk-width-1-1 uk-position-left uk-text-left uk-padding-small" id="body_slide">
                                    <div class="uk-width-1-2 uk-margin-remove uk-padding-large uk-float-left">
                                        <h2 uk-slideshow-parallax="x: 100,-100" class="uk-text-bold"><?php echo $a->judul; ?></h2>
                                        <p uk-slideshow-parallax="x: 200,-200"><?php echo $a->deskripsi; ?>.</p>
                                        <!-- <a href="#" class="uk-button uk-button-default uk-border-rounded">Read more</a> -->
                                    </div>
                                    <div class="uk-width-1-2 uk-margin-remove uk-padding-small uk-float-right">
                                        <img src="<?php echo base_url(); ?>assets/img/slideshow/<?php echo $a->src; ?>" class="uk-width-1-1 uk-width-2-3@s uk-width-2-5@m uk-float-right">
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                            uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                            uk-slideshow-item="next"></a>
                    
                    </div>
                    <!-- slideshow mobile -->
                    <div class="uk-hidden@s uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                        uk-slideshow="autoplay: false; autoplay-interval: 4000; pause-on-hover: true; ratio: 5:7; min-height: 300; max-height:400; animation: push"
                        id="slideshow">
                        <ul class="uk-slideshow-items">
                            <?php
                            foreach ($slideshow as $a) {
                            ?>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/img/web/background slideshow.png" alt="" uk-cover>
                                <div class="uk-width-1-1 uk-position-left uk-text-left uk-padding-small" id="body_slide">
                                    <div class="uk-width-1-1 uk-margin-remove uk-padding-small">
                                        <h2 uk-slideshow-parallax="x: 100,-100" class="uk-text-bold"><?php echo $a->judul; ?></h2>
                                        <p uk-slideshow-parallax="x: 200,-200"><?php echo $a->deskripsi; ?>.</p>
                                        <!-- <a href="#" class="uk-button uk-button-default uk-border-rounded">Read more</a> -->
                                    </div>
                                    <div class="uk-width-1-1 uk-margin-remove uk-padding-small">
                                        <img src="<?php echo base_url(); ?>assets/img/slideshow/<?php echo $a->src; ?>" class="uk-display-block uk-width-1-1 uk-width-3-5@s uk-margin-auto">
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                            uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                            uk-slideshow-item="next"></a>
                    
                    </div>
                </div>
                <div id="new_rekomendasi" class="uk-margin-medium-top uk-clearfix">
                    <div class="uk-width-1-1 uk-width-1-3@s uk-padding-small uk-float-left" id="rekomendasi">
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="head_new_rekomendasi">
                            <span class="uk-text-bold">Terfavorit</span>
                        </div>
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-small-top">
                            <div class="uk-slider-container-offset" uk-slider="center: true; autoplay: true; autoplay-interval: 3000">
                            
                                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                            
                                    <ul class="uk-slider-items uk-child-width-3-4 uk-grid">
                                        <?php
                                        $no=1;
                                        foreach ($rekomendasi as $rek) {
                                            if($no>4)
                                            {
                                                break;
                                            }
                                        ?>
                                        <li>
                                            <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                    <div class="uk-width-1-1 uk-disply-block background_rekomendasi" style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $rekomendasi_produk[$rek]->src; ?>');"></div>
                                                </div>
                                                <div class="uk-card-body uk-padding-small">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove"><?php echo $rekomendasi_produk[$rek]->nama; ?></h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                                    <?php
                                                    if($rekomendasi_produk[$rek]->discount != null)
                                                    {
                                                    ?>
                                                        <span id="diskon">Rp. <?php echo number_format($rekomendasi_produk[$rek]->harga,2,",","."); ?></span>
                                                    <?php
                                                    }
                                                    
                                                    if($rekomendasi_produk[$rek]->discount == null)
                                                    {
                                                        $discount = 0;
                                                    }
                                                    else {
                                                        $discount = $rekomendasi_produk[$rek]->discount;
                                                    }
                                                    $harga_akhir = $rekomendasi_produk[$rek]->harga-($rekomendasi_produk[$rek]->harga*$discount/100);
                                                    ?>
                                                        <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                                    </div>
                                                    <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $rekomendasi_produk[$rek]->id; ?>" class="uk-button uk-button-default uk-button-small uk-float-right">Detail</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </ul>
                            
                                    <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-previous
                                        uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-light" href="#" uk-slidenav-next
                                        uk-slider-item="next"></a>
                            
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-width-2-3@s uk-padding-small uk-float-right" id="new">
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="head_new_rekomendasi">
                            <span class="uk-text-bold">Source Code Baru</span><span class="uk-float-right"><a href="<?php echo base_url(); ?>produk/search" class="uk-button uk-button-text">Lihat Semua Product</a></span>
                        </div>
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="body_new">
                            <div class="list-wrapper uk-child-width-1-2 uk-child-width-1-4@s uk-padding-remove uk-margin-small-top uk-margin-remove-left uk-grid-match" uk-grid>
                                <?php
                                foreach ($produk_baru as $c) {
                                ?>
                                <div class="bodyProduk">
                                    <div class="uk-height-1-1">
                                        <div class="uk-height-1-1 produk uk-border-rounded">
                                            <div class="gambar_produk uk-border-rounded uk-clearfix"
                                                style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $c->src; ?>'); position: relative;">
                                                <?php if($c->discount != null) { ?><span class="uk-label uk-float-left" id="discount-gambar">Discount</span><?php } ?>
                                                <a href="<?php echo base_url(); ?>wishlist/tambah?id=<?php echo $c->id; ?>"
                                                    class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                    <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                </a>
                                                <span class="viewcart_produk"></span>
                                                <span
                                                    class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                    <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $c->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                        <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>cart/tambah?id=<?php echo $c->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                        <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                    </a>
                                                </span>
                                            </div>
                                            <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $c->id; ?>" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden uk-display-block">
                                                <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $c->nama; ?></h6>
                                                <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                                <?php
                                                if($c->discount != null)
                                                {
                                                ?>
                                                    <span id="diskon">Rp. <?php echo number_format($c->harga,2,",","."); ?></span>
                                                <?php
                                                }
                                                
                                                if($c->discount == null)
                                                {
                                                    $discount = 0;
                                                }
                                                else {
                                                    $discount = $c->discount;
                                                }
                                                $harga_akhir = $c->harga-($c->harga*$discount/100);
                                                ?>
                                                    <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                                </div>
                                                <?php
                                                $id_star = $c->id; 
                                                ?>
                                                <div class="jstars" data-value="<?php echo $star[$id_star]['star']; ?>" data-color="#33B0E5" data-size="18px"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="flashsale" class="uk-width-1-1 uk-height-1-1 uk-margin-medium-bottom">
                    <div class="head-flashsale bg-black uk-padding uk-text-center">
                        <h5 class="uk-text-center uk-padding-remove uk-margin-remove" id="tgl_flashsale"></h5>
                        <a href="#" class="uk-button uk-button-text">Lihat Semua</a>
                        <div class="tambah-height"></div>
                    </div>
                    <div class="body-flashsale">
                        <div class="uk-width-5-6 uk-margin-auto-right uk-margin-auto-left uk-child-width-1-2 uk-padding-remove uk-width-1-1 uk-margin-small-top uk-flex uk-flex-nowarp uk-flex-none">
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-left bodyProduk">
                                <div>
                                    <div class="produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('img/produk/produk1.png'); position: relative;">
                                            <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                            <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                <span id="harga">Rp.200.000</span>
                                            </div>
                                            <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <?php
                foreach($kategori as $d) {
                ?>
                <div class="promo uk-margin-medium-top">
                    <div class="head_promo uk-margin-small-bottom uk-text-center">
                        <a href="<?php echo base_url(); ?>produk/search?kategori/" class="uk-button uk-button-text"><?php echo $d['nama']; ?></a>
                    </div>
                    <div class="body_promo">
                        <div class="uk-width-1-1 uk-margin-remove" uk-grid>
                            <div class="head-promo uk-width-1-1 uk-width-1-3@s uk-padding-small uk-padding-remove-left uk-float-left">
                                <div class="uk-width-1-1 uk-height-1-1 uk-display-block uk-margin-remove uk-padding-remove uk-clearfix">
                                    <div class="uk-width-2-5@s uk-padding-small uk-float-left">
                                        <h3 class="uk-padding uk-padding-remove-bottom uk-text-bold"><?php echo $d['nama']; ?></h3>
                                    </div>
                                    <div class="uk-width-3-5@s uk-padding-small uk-float-right">
                                            <span style="font-size: 150px"><?php echo $d['icon']; ?></span>
                                            <!-- <img class="uk-width-1-2 uk-width-1-1@s uk-margin-auto-right uk-margin-auto-left" src="img/promo/Full airpod model.png"> -->
                                    </div>
                                    <div class="uk-width-1-1" style="clear: both">
                                        <a href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $d['id']; ?>"
                                            class="uk-button uk-button-default uk-button-small uk-padding-small uk-padding-remove-vertical uk-margin-bottom uk-margin-left">Check
                                            now <span class="iconify" data-icon="bi:arrow-right-short" data-inline="false"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="body-promo uk-width-2-3@s uk-float-left uk-padding-remove">
                                <div class="uk-child-width-1-2 uk-child-width-1-4@s uk-padding-remove uk-grid-match uk-margin-remove-left" uk-grid>
                                    <?php
                                    $nama_kategori = $d['nama'];
                                    foreach ($nama[$nama_kategori] as $e) {
                                    ?>
                                    <div class="bodyProduk">
                                        <div class="uk-height-1-1">
                                            <div class="uk-height-1-1 produk uk-border-rounded">
                                                <div class="gambar_produk uk-border-rounded uk-clearfix"
                                                    style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $e->src; ?>'); position: relative;">
                                                    <?php if($e->discount != null) { ?><span class="uk-label uk-float-left" id="discount-gambar"><?php echo $c->discount; ?>%</span><?php } ?>
                                                    <a href="<?php echo base_url(); ?>wishlist/tambah?id=<?php echo $e->id; ?>"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $e->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>cart/tambah?id=<?php echo $e->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $e->id; ?>" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $e->nama; ?></h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                                    <?php
                                                    if($e->discount != null)
                                                    {
                                                    ?>
                                                        <span id="diskon">Rp. <?php echo number_format($e->harga,2,",","."); ?></span>
                                                    <?php
                                                    }
                                                    
                                                    if($e->discount == null)
                                                    {
                                                        $discount = 0;
                                                    }
                                                    else {
                                                        $discount = $e->discount;
                                                    }
                                                    $harga_akhir = $e->harga-($e->harga*$discount/100);
                                                    ?>
                                                        <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                                    </div>
                                                    <?php
                                                    $id_star = $e->id;
                                                    ?>
                                                    <div class="jstars" data-value="<?php echo $star[$id_star]['star']; ?>" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- <div class="promo uk-margin-medium-top">
                    <div class="head_promo uk-margin-small-bottom uk-text-center">
                        <a href="#" class="uk-button uk-button-text">iOS</a>
                    </div>
                    <div class="body_promo">
                        <div class="uk-grid-match uk-margin-remove" uk-grid>
                            <div class="head-promo uk-width-1-1 uk-width-1-3@s uk-padding-small uk-padding-remove-left uk-float-left">
                                <div class="uk-width-1-1 uk-height-1-1 uk-display-block uk-margin-remove uk-padding-remove uk-clearfix">
                                    <div class="uk-width-2-5@s uk-padding-small uk-float-left">
                                        <h3 class="uk-padding uk-padding-remove-bottom uk-text-bold">Aplikasi Point Of Sales</h3>
                                    </div>
                                    <div class="uk-width-3-5@s uk-padding-small uk-float-right">
                                        <img class="uk-width-1-2 uk-width-1-1@s uk-margin-auto-right uk-margin-auto-left"
                                            src="img/promo/Complete Model.png">
                                    </div>
                                    <div class="uk-width-1-1">
                                        <a href="http://localhost/ecommerce_fun/produk_detail.html"
                                            class="uk-button uk-button-default uk-button-small uk-padding-small uk-padding-remove-vertical uk-margin-bottom uk-margin-left">Check
                                            now <span class="iconify" data-icon="bi:arrow-right-short" data-inline="false"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="body-promo uk-width-2-3@s uk-float-left uk-padding-remove">
                                <div class="uk-child-width-1-2 uk-child-width-1-4@s uk-padding-remove">
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-left bodyProduk">
                                        <div>
                                            <div class="produk uk-border-rounded">
                                                <div class="gambar_produk_promo uk-border-rounded uk-clearfix"
                                                    style="background-image: url('img/produk/produk1.png'); position: relative;">
                                                    <span class="uk-label uk-float-left" id="discount-gambar">Discount</span>
                                                    <a href="http://localhost/ecommerce_fun/wishlist.html"
                                                        class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                        <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                    </a>
                                                    <span class="viewcart_produk"></span>
                                                    <span
                                                        class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                        <a href="http://localhost/produk_detail" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                        </a>
                                                        <a href="http://localhost/produk_cart" class="uk-padding-small uk-padding-remove-vertical">
                                                            <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                        </a>
                                                    </span>
                                                </div>
                                                <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                    <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove">FUN Cashier</h6>
                                                    <div class="uk-margin-remove uk-padding-remove uk-padding-remove"><span id="diskon">Rp.420.000</span>
                                                        <span id="harga">Rp.200.000</span>
                                                    </div>
                                                    <div class="jstars" data-value="3.5" data-color="#33B0E5" data-size="18px"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--
                <div class="uk-width-1-1 uk-margin-large-top uk-padding-large uk-padding-remove-horizontal">
                    <h2 class="uk-text-center uk-text-bold">Dapatkan <span style="color: #33B0E5;">Penawaran Spesial</span> kami !</h2>
                    <form class="uk-form-stacked uk-width-2-3@s uk-margin-auto-left uk-margin-auto-right">
                        <div class="uk-margin uk-margin-remove-bottom uk-clearfix">
                            <div class="uk-form-controls uk-width-2-3 uk-float-left">
                                <input class="uk-input uk-form-large" style="background-color:rgb(221, 221, 221);" id="form-stacked-text" type="text" placeholder="Email Anda">
                            </div>
                            <div class="uk-form-controls uk-width-1-3 uk-float-right">
                                <input type="submit" class="uk-button uk-button-secondary uk-button-large uk-width-1-1" value="Submit">
                            </div>
                        </div><div class="uk-width-1-1 uk-text-center">Contoh : example@email.com</div>
                    </form>
                </div> -->
            </div>
            <script>
                function get_star( id )
                {
                    $.ajax({
                        url : "<?php echo base_url();?>home/get_star",
                        method : "POST",
                        contentType : "application/json",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                            var html = '';
                            var i;
                                
                            html += data[i].baris;
                            $('.star').html(html);
                            
                        }
                    });
                }
            </script>