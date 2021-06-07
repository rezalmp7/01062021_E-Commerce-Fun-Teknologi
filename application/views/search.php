            <?php
            $get = $this->input->get();

            if(isset($get['sortBy']))
            {
                $sortBy = $get['sortBy'];
            }
            else {
                $sortBy = 'az';
            }

            if(isset($get['kategori']))
            {
                $kategori = $get['kategori'];
            }
            else {
                $kategori = 'all';
            }

            if(isset($get['price']))
            {
                $price = $get['price'];
            }
            else {
                $price = 'all';
            }
            if(isset($get['page']))
            {
                $page = $get['page'];
            }
            else {
                $page = '10';
            }
            ?>
            
            <div class="uk-padding-large uk-padding-remove-bottom uk-clearfix" id="body">
                <div class="uk-visible@l uk-width-1-6 uk-float-left uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <a href="#" class="uk-width-1-1 uk-padding-remove-horizontal uk-text-center fun-poppins-semi-bold uk-button uk-button-text"><span class="iconify" data-icon="dashicons:arrow-left-alt2" data-inline="false"></span> Kembali</a>
                        <div class="uk-width-1-1 uk-text-center uk-padding-small uk-padding-remove-horizontal" id="filter">
                            <h5 class="fun-poppins-semi-bold">Saring</h5>
                            <a href="?kategori=all&price=all&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="uk-button uk-button-text">Hapus Saring</a>
                        </div>
                        <div class="uk-width-1-1 uk-display-block">
                            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true;">
                                <li class="uk-parent uk-open">
                                    <a class="fun-poppins-semi-bold link-black" href="#" aria-expanded="true">Kategori</a>
                                    <ul class="uk-nav-sub">
                                        <?php
                                        foreach ($data_kategori as $a) {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $a->id; ?>&price=<?php echo $price; ?>&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="link-black <?php if($kat_dekstop == $a->id) echo 'fun-active'; ?>"><?php echo $a->nama; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="uk-parent uk-open">
                                    <a href="#" class="fun-poppins-semi-bold link-black"  aria-expanded="true">Harga</a>
                                    <ul class="uk-nav-sub">
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=0 AND 500000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='0 AND 500000') echo 'fun-active '; ?>link-black">Rp 0 - Rp 500.0000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=500000 AND 1000000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='500000 AND 1000000') echo 'fun-active '; ?>link-black">Rp 500.0000 - Rp 1.000.0000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=1000000 AND 1500000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='1000000 AND 1500000') echo 'fun-active '; ?>link-black">Rp 1.000.000 - Rp 1.500.000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=1500000 AND 2000000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='1500000 AND 2000000') echo 'fun-active '; ?>link-black">Rp 1.500.000 - Rp 2.000.000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=2000000 AND 2500000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='2000000 AND 2500000') echo 'fun-active '; ?>link-black">Rp 2.000.000 - Rp 2.500.000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=2500000 AND 3000000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='2500000 AND 3000000') echo 'fun-active '; ?>link-black">Rp 2.500.000 - Rp 3.000.000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=3000000 AND 3500000&sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='3000000 AND 3500000') echo 'fun-active '; ?>link-black">Rp 3.000.000 - Rp 3.500.000</a></li>
                                        <li><a href="?kategori=<?php echo $kategori; ?>&price=3500000 &sortBy=<?php echo $sortBy; ?>&page=<?php echo $page; ?>" class="<?php if($price=='3500000') echo 'fun-active '; ?>link-black">Rp 3.500.000 And Above</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-5-6@l uk-float-right uk-padding-remove uk-margin-remove">
                    <!-- ShordBy Website -->
                    <div class="uk-visible@l uk-width-1-1 uk-padding-small uk-margin-remove" id="sortBy">
                        <span class="uk-padding-small uk-padding-remove-vertical uk-padding-remove-left">13 Barang</span>
                        <span class="uk-padding uk-padding-remove-vertical">
                            Sortir 
                            <button class="uk-button uk-button-default uk-button-small uk-margin-small-left" type="button"><?php if($sortBy == 'terbaru') echo 'Terbaru'; elseif($sortBy == 'terlama') echo 'Terlama'; elseif($sortBy == 'za') echo 'Nama Z-A'; else echo 'Nama A-Z'; ?> <span class="iconify" data-icon="dashicons:arrow-down" data-inline="false"></span></button>
                            <div class="uk-padding-remove" uk-dropdown="mode: click">
                                <ul class="uk-list uk-list-divider uk-padding-remove">
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=terbaru&page=<?php echo $page; ?>">Terbaru</a></li>
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=terlama&page=<?php echo $page; ?>">Terlama</a></li>
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=az&page=<?php echo $page; ?>">Name A-Z</a></li>
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block" href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=za&page=<?php echo $page; ?>">Name Z-A</a></li>
                                </ul>
                            </div>
                        </span>
                        <span class="uk-padding uk-padding-remove-vertical">
                            Menunjukkan
                            <button class="uk-button uk-button-default uk-button-small uk-margin-small-left uk-margin-large-right" type="button"><?php if(isset($_GET['page'])) echo $_GET['page']; else echo 10; ?> <span class="iconify" data-icon="dashicons:arrow-down" data-inline="false"></span></button>
                            <div class="uk-padding-remove" uk-dropdown="mode: click">
                                <ul class="uk-list uk-list-divider uk-padding-remove">
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block"
                                            href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=<?php echo $sortBy; ?>&page=10">10</a></li>
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block"
                                            href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=<?php echo $sortBy; ?>&page=50">50</a></li>
                                    <li class="uk-padding-remove uk-margin-remove"><a class="uk-padding-small uk-display-block"
                                            href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=<?php echo $sortBy; ?>&page=100">100</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>
                    <!-- ShortBy Mobile -->
                    <div class="uk-hidden@l uk-width-1-1 uk-padding-remnove uk-margin-remove" id="sortBy">
                        <div class="uk-child-width-1-1 uk-margin-remove uk-padding-remove" uk-grid>
                            <div class="uk-padding-remove uk-margin-remove uk-text-center" style="border-right: 2px solid white">
                                <?php
                                if($sortBy_mob == 'terlama')
                                {
                                ?>
                                <a href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=terbaru&page=<?php echo $page; ?>" class="uk-display-block uk-padding-small">Terbaru</a>
                                <?php
                                }
                                else {
                                ?>
                                <a href="<?php echo base_url(); ?>produk/search?kategori=<?php echo $kategori; ?>&price=<?php echo $price; ?>&sortBy=terlama&page=<?php echo $page; ?>" class="uk-display-block uk-padding-small">Terlama</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-display-block uk-clearfix">
                        <div class="list-wrapper uk-width-1-1 uk-child-width-1-2 uk-child-width-1-5@s uk-padding-remove uk-margin-small-top uk-margin-remove-left uk-grid-match" uk-grid>
                            <?php 
                            
                            foreach ($produk as $b) {
                            ?>
                            <div class="bodyProduk">
                                <div class="uk-height-1-1">
                                    <div class="uk-height-1-1 produk uk-border-rounded">
                                        <div class="gambar_produk uk-border-rounded uk-clearfix"
                                            style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $b->src; ?>'); position: relative;">
                                            <?php if($b->discount != null) { ?><span class="uk-label uk-float-left" id="discount-gambar">Discount</span><?php } ?>
                                            <a href="<?php echo base_url(); ?>wishlist/tambah?id=<?php echo $b->id; ?>"
                                                class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                            </a>
                                            <span class="viewcart_produk"></span>
                                            <span
                                                class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $b->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>cart/tambah?id=<?php echo $b->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                    <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                </a>
                                            </span>
                                        </div>
                                        <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $b->id; ?>" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                            <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $b->nama; ?></h6>
                                            <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                            <?php
                                            if($b->discount != null)
                                            {
                                            ?>
                                                <span id="diskon">Rp. <?php echo number_format($b->harga,2,",","."); ?></span>
                                            <?php
                                            }
                                            
                                            if($b->discount == null)
                                            {
                                                $discount = 0;
                                            }
                                            else {
                                                $discount = $b->discount;
                                            }
                                            $harga_akhir = $b->harga-($b->harga*$discount/100);
                                            ?>
                                                <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                            </div>
                                            <?php
                                            $id_star = $b->id; 
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
                    <div class="uk-visible@l uk-width-1-1 uk-padding-small uk-display-block uk-clearfix">
                        <div class="uk-width-1-1 uk-display-block uk-clearfix" id="pagination-container"></div>
                    </div>
                </div>
            </div>
            <div class="newproduk_allproduk uk-padding-large uk-padding-remove-top">
                <div id="new" class="uk-margin-medium-top uk-clearfix">
                    <div class="uk-width-1-1 uk-padding-renive uk-float-right" id="new">
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="head_new_rekomendasi">
                            <span class="uk-text-bold">Source Code Baru</span><span class="uk-float-right"><a href="#"
                                    class="uk-button uk-button-text">Lihat Semua Product</a></span>
                        </div>
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="body_new">
                            <div class="uk-child-width-1-2 uk-child-width-1-6@s uk-padding-remove uk-margin-small-top uk-margin-remove-left uk-grid-match" uk-grid>
                                <?php
                                $no=1;
                                foreach ($produk_baru as $pb) {
                                    if($no >= 6)
                                    {
                                        break;
                                    }
                                ?>
                                <div class="bodyProduk">
                                    <div class="uk-height-1-1">
                                        <div class="uk-height-1-1 produk uk-border-rounded">
                                            <div class="gambar_produk uk-border-rounded uk-clearfix"
                                                style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $pb->src; ?>'); position: relative;">
                                                <?php if($pb->discount != null) { ?><span class="uk-label uk-float-left" id="discount-gambar"><?php echo $pb->discount; ?>%</span><?php } ?>
                                                <a href="<?php echo base_url(); ?>wishlist/tambah?&id=<?php echo $pb->id; ?>"
                                                    class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                                    <span class="iconify" data-icon="ant-design:heart-outlined" data-inline="false"></span>
                                                </a>
                                                <span class="viewcart_produk"></span>
                                                <span
                                                    class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                    <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $pb->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                        <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>cart/tambah?&id=<?php echo $pb->id; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                        <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                                    </a>
                                                </span>
                                            </div>
                                            <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $pb->id; ?>" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $pb->nama; ?></h6>
                                                <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                                <?php
                                                if($pb->discount != null)
                                                {
                                                ?>
                                                    <span id="diskon">Rp. <?php echo number_format($pb->harga,2,",","."); ?></span>
                                                <?php
                                                }
                                                
                                                if($pb->discount == null)
                                                {
                                                    $discount = 0;
                                                }
                                                else {
                                                    $discount = $pb->discount;
                                                }
                                                $harga_akhir = $pb->harga-($pb->harga*$discount/100);
                                                ?>
                                                    <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                                </div>
                                                <?php
                                                $id_star = $pb->id; 
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
            if(isset($_GET['page']))
            {
                $get = $_GET['page'];
            }
            else {
                $get = 30;
            }
            ?>
            <script>
                
                $(document).ready(function () {
                    // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

                    var items = $(".list-wrapper .bodyProduk");
                    var numItems = items.length;
                    
                    var perPage = <?php echo  $get; ?>

                    items.slice(perPage).hide();

                    $('#pagination-container').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: "&laquo;",
                        nextText: "&raquo;",
                        onPageClick: function (pageNumber) {
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });
                });
            </script>