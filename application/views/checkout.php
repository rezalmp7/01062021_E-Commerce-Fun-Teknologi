
            <div class="uk-padding-large uk-clearfix" id="body">
                <div class="uk-width-1-1" id="body_head">
                    <h4 class="uk-padding-remove uk-margin-remove fun-poppins-semi-bold">Checkout</h4>
                </div>
                <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove" id="body_body">
                    <div class="uk-padding-small uk-padding-remove-horizontal">
                        <div class="uk-padding-small" id="body_produk_checkout">
                            <?php
                            $harga_total=0;
                            foreach ($data_checkout as $a) {
                            ?>
                            <div class="uk-padding-small uk-padding-remove-horizontal uk-width-1-1 uk-margin-remove">
                                <div class="uk-padding-remove uk-margin-remove uk-grid-match" uk-grid>
                                    <div class="uk-padding-remove" style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>')"
                                        id="gambar_produk_checkout"></div>
                                    <div class="uk-width-expand uk-padding-small uk-margin-remove" id="checkout_produk_body_detail" uk-grid>
                                        <div class="uk-width-expand uk-float-left uk-padding-remove" id="nama">
                                            <a href="http://localhost/ecommerce_fun/produk_detail.html"
                                                class="uk-display-block uk-padding-remove uk-margin-remove fun-poppins-semi-bold"><?php echo $a->nama; ?></a>
                                            <span class="uk-visible@s uk-padding-remove uk-margin-medium-bottom uk-display-block">Development : Fun
                                                Technology</span>
                                        </div>
                                        <div class="uk-width-auto@s uk-float-right uk-padding-remove uk-margin-margin-small-top uk-text-small fun-poppins-semi-bold"
                                            id="harga">
                                            
                                            <div class=""><span id="harga_diskon">Rp <?php echo number_format($a->harga,2,",","."); ?> <span class="uk-margin-small-left uk-visible@s" id="diskon"><?php if($a->discount != null) echo $a->discount.' off'; else echo '0% off' ?></span></span></div>
                                            <?php $harga_akhir = $a->harga-($a->harga*$a->discount/100); ?>
                                            <div class="">Rp <?php echo number_format($harga_akhir,2,",","."); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $harga_total = $harga_total+$harga_akhir;
                            }
                            ?>
                            <hr style="border-top: 1px solid black">
                            <div class="uk-width-1-1 uk-clearfix" id="bayar">
                                <div class="uk-width-1-3@s uk-float-right fun-poppins uk-text-small black uk-clearfix uk-padding-remove uk-margin-remove">
                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            Total: 
                                        </div>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            Rp. <?php echo number_format($harga_total,2,",","."); ?>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            Potongan Promo: 
                                        </div>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            <?php
                                            if($kupon != null)
                                            {
                                                $potonganPromo = ($harga_total*$kupon['disc']/100);
                                            }
                                            else {
                                                $potonganPromo = 0;
                                            }
                                            ?>
                                            Rp. <?php echo number_format($potonganPromo,2,",","."); ?>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            Jumlah Bayar: 
                                        </div>
                                        <div class="uk-width-1-2 uk-text-right uk-padding-remove uk-margin-remove">
                                            <?php
                                            $jumlah_bayar = $harga_total-$potonganPromo;
                                            ?>
                                            Rp. <?php echo number_format($jumlah_bayar,2,",","."); ?>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1 uk-text-right uk-margin-medium-top">
                                        <div class="uk-padding-small-left uk-margin-remove uk-display-inline">
                                            <a href="<?php echo $data_transaksi->pdf_url; ?>" class="uk-button uk-button-primary uk-button-small">Downnload Panduan Bayar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>