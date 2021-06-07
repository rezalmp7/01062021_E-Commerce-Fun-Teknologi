
            <div class="uk-padding-large uk-clearfix" id="body">
                <div class="uk-width-1-1 uk-margin-remove uk-padding-remove" id="body_profil" uk-grid>
                    <div class="uk-width-1-5@s uk-padding-remove" id="menu">
                        <?php
                        $img_pelanggan = $pengguna->photo;
                        $img_default = 'avatar_default.jpg';
                        ?>
                        <div class="uk-border-circle uk-margin-auto uk-background-cover uk-background-center-center uk-background-norepeat" id="foto_profil" style="background-image: url('<?php echo base_url(); ?>assets/img/pelanggan/<?php if($img_pelanggan == null) echo $img_default; else echo $img_pelanggan; ?>'); width: 100px; height: 100px;"></div>
                        <div class="uk-padding-small uk-padding-remove-horizontal" id="nama">
                            <h5 class="uk-padding-remove uk-margin-remove uk-text-center"><?php echo $this->session->userdata('ecommerce_fun_nama'); ?></h5>
                            <p class="uk-padding-remove uk-margin-remove uk-text-center"><?php echo $this->session->userdata('ecommerce_fun_email'); ?></p>
                        </div>
                        <div class="uk-padding uk-padding-remove-horizontal" id="nav">
                            <ul class="uk-tab-left uk-margin-remove" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                                <li class="uk-padding-remove"><a class="uk-paddin-remove" href="#"><span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span> Akun</a></li>
                                <li class="uk-padding-remove"><a class="uk-paddin-remove" href="#"><span class="iconify" data-icon="ant-design:code-sandbox-outlined" data-inline="false"></span> Source Code</a></li>
                                <li class="uk-padding-remove"><a class="uk-paddin-remove" href="#"><span class="iconify" data-icon="clarity:shopping-cart-line" data-inline="false"></span> Pesanan</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uk-width-4-5@s uk-padding-remove uk-margin-remove" id="profil_content">
                        <ul id="component-tab-left" class="uk-switcher">
                            <li class="uk-width-1-1 uk-padding-remove uk-padding-remove-vertical">
                                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove uk-clearfix">
                                    <div class="uk-width-1-5@s uk-float-right uk-padding-small uk-padding-remove-vertical">
                                        <div class="uk-border-circle uk-margin-auto" id="foto_profil" style="background-image: url('img/web/profil.jpg'); width: 100px; height: 100px;"></div>
                                        <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal uk-margin-remove">
                                            <form class="uk-width-1-1 uk-padding-remove uk-margin-remove" enctype='multipart/form-data' method="POST" action="<?php echo base_url(); ?>profil/edit_photo">
                                                <?php
                                                $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
                                                ?>
                                                <input type="hidden" name="id" value="<?php echo $id_pelanggan; ?>">
                                                <div class="uk-margin" uk-margin>
                                                    <div uk-form-custom="target: true">
                                                        <input type="file" name="photo">
                                                        <input class="uk-input uk-form-width-medium uk-form-small" type="text" placeholder="Select file" disabled>
                                                    </div>
                                                    <button class="uk-button uk-button-primary uk-button-small uk-width-1-1"><span class="iconify" data-icon="akar-icons:pencil" data-inline="false"></span> Ganti Photo</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="uk-width-4-5@s uk-float-left uk-padding-small uk-padding-remove-vertical">
                                        <div class="uk-padding-remove fun-poppins">
                                            Username : <?php echo $pengguna->username; ?>
                                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>profil/edit_pengguna">
                                                <div class="uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Nama<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" id="form-stacked-text" type="text" name="nama" value="<?php echo $pengguna->nama; ?>" placeholder="Nama..." required>
                                                    </div>
                                                </div>
                                                <div class="uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Password Baru<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <input type="hidden" name="password_lama" value="<?php echo $pengguna->password; ?>">
                                                        <input class="uk-input" id="form-stacked-text" type="text" name="password" placeholder="Password Baru...">
                                                    </div>
                                                </div>
                                                <div class="uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">TTL<sup>*</sup></label>
                                                    <div class="uk-form-controls" uk-grid>
                                                        <div class="uk-width-1-2@s">
                                                            <input class="uk-input" type="text" placeholder="Tempat Lahir" name="tmp_lahir" value="<?php echo $pengguna->tmp_lahir; ?>" required>
                                                        </div>
                                                        <div class="uk-width-1-2@s">
                                                            <input class="uk-input" type="date" placeholder="Tanggal" name="tgl_lahir" value="<?php echo $pengguna->tgl_lahir; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Alamat<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <textarea class="uk-textarea" rows="5" placeholder="Alamat" name="alamat" required><?php echo $pengguna->alamat; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Email<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" id="form-stacked-text" type="text" name="email" value="<?php echo $pengguna->email; ?>" placeholder="Email..." required>
                                                    </div>
                                                </div>
                                                <div class="uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Telegram<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" id="form-stacked-text" type="text" name="telegram" value="<?php echo $pengguna->telegram; ?>" placeholder="Telegram...">
                                                    </div>
                                                </div>
                                                <div class="uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <label class="uk-form-label" for="form-stacked-text">Whatsapp<sup>*</sup></label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" id="form-stacked-text" type="text" name="whatsapp" value="<?php echo $pengguna->whatsapp; ?>" placeholder="Whatsapp..." required>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top uk-margin-remove-bottom">
                                                    <button type="submit" class="uk-button uk-button-primary uk-float-right"><span class="iconify" data-icon="bx:bx-save" data-inline="false"></span> Simpan</button>
                                                    <a href="<?php echo base_url(); ?>login/logout" class="uk-button uk-button-danger uk-margin-small-right uk-float-right">Logout</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="sourcecode" class="uk-margin-remove uk-padding-remove">
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-vertical uk-margin-remove">
                                    <div class="uk-width-1-1 uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-6@l uk-clearfix uk-margin-medium-bottom uk-padding-remove">
                                        <?php
                                        foreach ($source_code as $b) {
                                        ?>
                                        <div class="uk-float-left bodyProduk">
                                            <div>
                                                <div class="produk uk-border-rounded">
                                                    <div class="gambar_produk_profil uk-width-1-1 uk-border-rounded uk-clearfix"
                                                        style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $b->src; ?>'); position: relative;">
                                                        <span class="viewcart_produk"></span>
                                                        <span
                                                            class="uk-padding-small uk-padding-remove-vertical uk-display-block uk-width-1-1 uk-text-center uk-animation-slide-bottom viewcart_produk">
                                                            <a href="<?php echo base_url(); ?>profil/download?id=<?php echo $b->id; ?>" target="_blank"
                                                                class="uk-padding-small uk-padding-remove-vertical">
                                                                <span class="iconify" data-icon="cil:cloud-download" data-inline="false"></span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <a href="<?php echo base_url(); ?>produk/detail?id=<?php echo $b->id; ?>" class="uk-width-1-1 uk-margin-small-top uk-padding-remove uk-overflow-hidden">
                                                        <h6 class="uk-card-title uk-padding-remove uk-margin-remove uk-padding-remove"><?php echo $b->nama; ?></h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="uk-padding uk-padding-remove-vertical">
                                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                                    <div uk-filter="target: .js-filter">
                                    
                                        <ul class="uk-subnav uk-subnav-pill uk-flex-center">
                                            <li class="uk-margin-remove uk-padding-remove uk-active" uk-filter-control><a href="#" class="uk-button uk-button-default uk-padding-small uk-padding-large uk-padding-remove-vertical">Semua</a></li>
                                            <li class="uk-margin-remove uk-padding-remove" uk-filter-control="[data-color='checkout']"><a href="#" class="uk-button uk-button-default uk-padding-small uk-padding-large uk-padding-remove-vertical">Checkout</a></li>
                                            <li class="uk-margin-remove uk-padding-remove" uk-filter-control="[data-color='done']"><a href="#" class="uk-button uk-button-default uk-padding-small uk-padding-large uk-padding-remove-vertical">Selesai</a></li>
                                        </ul>
                                    
                                        <ul class="js-filter uk-child-width-1-1 uk-text-center" uk-grid>
                                            <?php
                                                $harga_total=0;
                                                foreach ($data_checkout as $a) {
                                            ?>
                                            <li class="uk-padding-small uk-margin-remove" data-color="<?php echo $a->status; ?>">
                                                <div class="uk-padding-small" id="body_produk_checkout">
                                                    <?php
                                                        if($a->status == 'checkout')
                                                        {
                                                    ?>
                                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove pending uk-text-left" id="status">
                                                        <span class="iconify" data-icon="akar-icons:circle-fill" data-inline="false"></span> Checkout
                                                    </div>
                                                    <?php
                                                        }
                                                        if ($a->status == 'done') {
                                                    ?>
                                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove success uk-text-left" id="status">
                                                        <span class="iconify" data-icon="akar-icons:circle-fill" data-inline="false"></span> Done
                                                    </div>
                                                    <?php
                                                        }

                                                        foreach ($data_pending[$a->id] as $c) {
                                                    ?>
                                                    <div class="uk-padding-small uk-padding-remove-horizontal uk-width-1-1 uk-margin-remove">
                                                        <div class="uk-padding-remove uk-margin-remove uk-grid-match" uk-grid>
                                                            <div class="uk-padding-remove" style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $c->src; ?>')"
                                                                id="gambar_produk_checkout"></div>
                                                            <div class="uk-width-expand uk-padding-small uk-margin-remove" id="checkout_produk_body_detail" uk-grid>
                                                                <div class="uk-width-expand uk-float-left uk-padding-remove" id="nama">
                                                                    <a href="http://localhost/ecommerce_fun/produk_detail.html"
                                                                        class="uk-display-block uk-padding-remove uk-margin-remove fun-poppins-semi-bold"><?php echo $c->nama; ?></a>
                                                                    <span class="uk-visible@s uk-padding-remove uk-margin-medium-bottom uk-display-block">Development : Fun
                                                                        Technology</span>
                                                                </div>
                                                                <div class="uk-width-auto@s uk-float-right uk-padding-remove uk-margin-margin-small-top uk-text-small fun-poppins-semi-bold"
                                                                    id="harga">
                                                                    
                                                                    <div class=""><span id="harga_diskon">Rp <?php echo number_format($c->harga,2,",","."); ?> <span class="uk-margin-small-left uk-visible@s" id="diskon"><?php if($c->discount != null) echo $c->discount.' off'; else echo '0% off' ?></span></span></div>
                                                                    <?php $harga_akhir = $c->harga-($c->harga*$c->discount/100); ?>
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
                                                                    if($a->disc != null)
                                                                    {
                                                                        $potonganPromo = $harga_total-($harga_total*$a->disc/100);
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
                                                                    <a href="<?php echo base_url(); ?>profil/cetak?id=<?php echo $a->id; ?>" class="uk-button uk-button-primary uk-button-small">Invoice</a>
                                                                    <a href="<?php echo $a->pdf_url; ?>" class="uk-button uk-button-primary uk-button-small">Downnload Panduan Bayar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            </div>