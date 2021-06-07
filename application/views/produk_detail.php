
            <div class="uk-padding-large" id="body">
                <div class="uk-width-1-1 uk-clearfix" id="body_top">
                    <div class="uk-width-1-2@s uk-float-left">
                        <div class="uk-width-1-1 uk-padding-small uk-padding-remove-vertical gallery clearfix" id="gallery">
                            <div class="pics clearfix">
                                <div class="uk-width-1-6 thumbs">
                                    <?php
                                    foreach ($gambar as $a) {
                                    ?>
                                    <div class="preview"> <a href="#" class="selected" data-full="<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>"
                                            data-title="Title 1"> <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>" /> </a> </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <a href="<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>" class="full uk-width-5-6" title="Title 1">
                                    <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>"> </a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-padding-small uk-padding-remove-vertical uk-width-1-2@s uk-float-right" id="deskripsi">
                        <h4 class="fun-poppins-semi-bold uk-padding-remove uk-margin-remove"><?php echo $produk->nama; ?></h4>
                        <div class="jstars uk-padding-remove uk-margin-remove" data-value="<?php if($star[$produk->id]['star'] != null) echo $star[$produk->id]['star']; else { echo '0'; } ?>" data-color="#33B0E5" data-size="18px"><?php if($star[$produk->id]['star'] != null) echo $star[$produk->id]['star']; else { echo '0'; } ?> </div>
                        <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                        <?php
                        if($produk->discount != null)
                        {
                        ?>
                            <span id="diskon">Rp. <?php echo number_format($produk->harga,2,",","."); ?></span>
                        <?php
                        }
                        
                        if($produk->discount == null)
                        {
                            $discount = 0;
                        }
                        else {
                            $discount = $produk->discount;
                        }
                        $harga_akhir = $produk->harga-($produk->harga*$discount/100);
                        ?>
                            <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                        </div>
                        <div class="fun-poppins uk-padding-small uk-padding-remove-horizontal">Kategori : <?php echo $produk->namaKategori; ?></div>
                        <div class="fun-poppins uk-padding-small uk-padding-remove-horizontal">Developer : Fun Technology</div>
                        <div class="uk-padding-small uk-padding-remove-horizontal">
                            <a href="<?php echo base_url(); ?>cart/tambah?id=<?php echo $produk->id; ?>" class="fun-button-1 uk-button uk-button-large uk-border-rounded"><span class="iconify uk-text-large" data-icon="eva:shopping-bag-outline" data-inline="false"></span> Tambah Ke Keranjang</a>
                            <a href="<?php echo base_url(); ?>wishlist/tambah?id=<?php echo $produk->id; ?>" class="fun-button-1 uk-button uk-button-large uk-border-rounded"><span class="iconify uk-text-large" data-icon="akar-icons:heart" data-inline="false"></span> Tambah Ke Suka</a>
                        </div>
                        <div class="uk-padding-remove uk-margin-remove fun-poppins" id="share">
                            <!-- <span class="uk-padding uk-padding-remove-vertical uk-padding-remove-left">Share: <a href="#"><span class="iconify" data-icon="eva:facebook-outline" data-inline="false"></span></a> <a href="#"><span class="iconify" data-icon="feather:twitter" data-inline="false"></span></a> <a href="#"><span class="iconify" data-icon="eva:linkedin-outline" data-inline="false"></span></a> <a href="#"><span class="iconify" data-icon="bi:whatsapp" data-inline="false"></span></a> <a href="#"><span class="iconify" data-icon="ph:telegram-logo-bold" data-inline="false"></span></a></span> -->
                            <span style="white-space: nowrap;"><span class="iconify" data-icon="akar-icons:heart" data-inline="false"></span> Suka (<?php echo $jml_like->nilai; ?>)</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="body_mid">
                    <ul id="tab" uk-tab>
                        <li><a href="#">Deskripsi</a></li>
                        <li><a href="#">Ulasan</a></li>
                    </ul>
                    
                    <ul class="uk-switcher uk-margin" id="deskripsi_produk">
                        <li>
                            <?php echo $produk->deskripsi; ?>
                        </li>
                        <li class="uk-padding-small uk-width-1-1">
                            <div class="uk-border-rounded" id="form_comment">
                                <div class="uk-padding-small" id="form_comment_head" uk-grid>
                                    <div class="uk-width-auto">
                                        <?php
                                        $img_pelanggan = $this->session->userdata('ecommerce_fun_photo');
                                        $img_default = 'avatar_default.jpg';
                                        ?>
                                        <div class="uk-display-block gambar_comment uk-border-circle" style="background-image: url('<?php echo base_url(); ?>assets/img/pelanggan/<?php if($img_pelanggan == null) echo $img_default; else echo $img_pelanggan; ?>'); width: 50px; height:50px"></div>
                                    </div>
                                    <div class="uk-width-expand">
                                        <h4 class="fun-poppins-semi-bold"><?php echo $this->session->userdata('ecommerce_fun_nama'); ?></h4>
                                    </div>
                                </div>
                                <hr class="uk-padding-remove uk-margin-remove">
                                <div class="stars uk-width-1-1 uk-padding-small uk-margin-remove uk-padding-remove-top">
                                    <form action="<?php echo base_url(); ?>produk/comment_tambah" method="POST">
                                        <input type="hidden" name="id_produk" value="<?php echo $produk->id; ?>">
                                        <div class="uk-margin">
                                            <input type="hidden" name="id" value="<?php echo $this->session->userdata('ecommerce_fun_id'); ?>">
                                            <div class="uk-form-controls">
                                                <div class="uk-float-left">
                                                    <input class="star star-5" id="star-5" type="radio" value="5" name="star" />
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" value="4" name="star" />
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" value="3" name="star" />
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" value="2" name="star" />
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" value="1" name="star" />
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <textarea class="uk-textarea uk-width-1-1 uk-margin-small-top" rows="5" placeholder="Textarea" name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <input type="submit" class="uk-button uk-button-primary uk-button-small" value="Kirim">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr />
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" id="body_comment_body">
                                <div uk-filter="target: .js-filter">
                                
                                    <ul class="uk-subnav uk-subnav-pill">
                                        <li class="uk-active uk-text-small" uk-filter-control><a href="#">All</a></li>
                                        <li class="uk-text-small" uk-filter-control="[data-rating='1']">
                                            <a href="#" class="fun-poppins-semi-bold">
                                                1
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                            </a>
                                        </li>
                                        <li class="uk-text-small" uk-filter-control="[data-rating='2']">
                                            <a href="#" class="fun-poppins-semi-bold">
                                                2
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                            </a>
                                        </li>
                                        <li class="uk-text-small" uk-filter-control="[data-rating='3']">
                                            <a href="#" class="fun-poppins-semi-bold">
                                                3
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                            </a>
                                        </li>
                                        <li class="uk-text-small" uk-filter-control="[data-rating='4']">
                                            <a href="#" class="fun-poppins-semi-bold">
                                                4
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                            </a>
                                        </li>
                                        <li class="uk-text-small" uk-filter-control="[data-rating='5']">
                                            <a href="#" class="fun-poppins-semi-bold">
                                                5
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                                 <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                            </a>
                                        </li>
                                    </ul>
                                
                                    <ul class="js-filter uk-child-width-1-1" uk-grid>
                                        <?php
                                        foreach ($comment as $pb) {
                                        ?>
                                        <li class="<?php echo $pb->star; ?> uk-padding-remove uk-margin-remove" data-rating="<?php echo $pb->star; ?>">
                                            <div class="uk-padding-small uk-margin-remove">
                                                <div id="body_comment">
                                                    <div class="uk-padding-small" id="body_comment_head" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <?php $photo_default = 'avatar_default.jpg'; ?>
                                                            <div class="uk-display-block gambar_comment uk-border-circle"
                                                                style="background-image: url('<?php echo base_url(); ?>assets/img/pelanggan/<?php if($pb->photoPelanggan == null) echo $photo_default; else echo $pb->photoPelanggan; ?>'); width: 50px; height:50px"></div>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="fun-poppins-semi-bold uk-padding-remove uk-margin-remove"><?php echo $pb->namaPelanggan; ?></h4>
                                                            <div class="jstars uk-padding-remove uk-margin-remove" data-value="<?php echo $pb->star; ?>" data-color="#33B0E5"
                                                                data-size="18px"><?php echo $pb->star; ?> </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="uk-padding-small">
                                                        <p><?php echo $pb->comment; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($pb->reply != null)
                                            {
                                            ?>
                                            <div class="uk-padding-small uk-margin-large-left">
                                                <div id="body_comment">
                                                    <div class="uk-padding-small" id="body_comment_head" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <div class="uk-display-block gambar_comment uk-border-circle uk-background-cover uk-background-center-center"
                                                                style="background-image: url('<?php echo base_url(); ?>assets/img/web/admin_default.jpg'); width: 50px; height:50px"></div>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="fun-poppins-semi-bold uk-padding-remove uk-margin-remove"><?php echo $pb->namaUser; ?></h4>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="uk-padding-small">
                                                        <p><?php echo $pb->reply; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="newproduk_allproduk uk-padding-large uk-padding-remove-top">
                <div id="new" class="uk-margin-medium-top uk-clearfix">
                    <div class="uk-width-1-1 uk-padding-renive uk-float-right" id="new">
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="head_new_rekomendasi">
                            <span class="uk-text-bold">Produk Terbaru</span><span class="uk-float-right"><a href="<?php echo base_url(); ?>produk/search"
                                    class="uk-button uk-button-text">Lihat Semua Product</a></span>
                        </div>
                        <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="body_new">
                            <div class="uk-child-width-1-2 uk-child-width-1-6@s uk-padding-remove uk-margin-small-top">
                                <?php
                                $no=1;
                                foreach ($produk_baru as $pb) {
                                    if($no >= 6)
                                    {
                                        break;
                                    }
                                ?>
                                <div class="uk-float-left bodyProduk">
                                    <div>
                                        <div class="produk uk-border-rounded">
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