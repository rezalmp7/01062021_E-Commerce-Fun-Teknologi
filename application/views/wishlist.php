
            <div class="uk-padding-large uk-clearfix" id="body">
                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" id="body_head">
                        <h4 class="uk-width-1-1 uk-padding-remove uk-margin-remove fun-poppins-semi-bold">Wishlist</h4>
                    </div>
                    <div class="uk-width-1-1 uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-6@l uk-clearfix uk-margin-medium-bottom">
                        <?php
                        foreach ($wishlist as $a) {
                        ?>
                        <div class="uk-float-left bodyProduk">
                            <div>
                                <div class="produk uk-border-rounded">
                                    <div class="gambar_produk uk-border-rounded uk-clearfix"
                                        style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>'); position: relative;">
                                        <?php
                                        if($a->discount != null)
                                        {
                                        ?>
                                        <span class="uk-label uk-float-left" id="discount-gambar"><?php echo $a->discount; ?></span>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?php echo base_url(); ?>wishlist/hapus?id=<?php echo $a->id; ?>"
                                            class="uk-rounded uk-border-circle uk-float-right" id="add-wishlist">
                                            <span class="iconify" data-icon="bi:trash" data-inline="false"></span>
                                        </a>
                                        <span class="viewcart_produk"></span>
                                        <span
                                            class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                            <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $a->id_produk; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                <span class="iconify" data-icon="carbon:view" data-inline="false"></span>
                                            </a>
                                            <a href="<?php echo base_url(); ?>cart/tambah?id=<?php echo $a->id_produk; ?>" class="uk-padding-small uk-padding-remove-vertical">
                                                <span class="iconify" data-icon="fluent:cart-24-regular" data-inline="false"></span>
                                            </a>
                                        </span>
                                    </div>
                                    <a href="#" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                        <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $a->nama; ?></h6>
                                        <div class="uk-margin-remove uk-padding-remove uk-padding-remove">
                                        <?php
                                        if($a->discount != null)
                                        {
                                        ?>
                                            <span id="diskon">Rp. <?php echo number_format($a->harga,2,",","."); ?></span>
                                        <?php
                                        }
                                        
                                        if($a->discount == null)
                                        {
                                            $discount = 0;
                                        }
                                        else {
                                            $discount = $a->discount;
                                        }
                                        $harga_akhir = $a->harga-($a->harga*$discount/100);
                                        ?>
                                            <span id="harga"><?php echo number_format($harga_akhir,2,",","."); ?></span>
                                        </div>
                                        <div class="jstars" data-value="<?php echo $star[$a->id_produk]['star']; ?>" data-color="#33B0E5" data-size="18px"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="uk-width-1-1 uk-text-center">
                        <a href="<?php echo base_url(); ?>produk/search" class="uk-button uk-button-large uk-border-rounded uk-button-primary">Discover more products <span class="iconify" data-icon="akar-icons:arrow-right" data-inline="false"></span></a>
                    </div>
                </div>
            </div>