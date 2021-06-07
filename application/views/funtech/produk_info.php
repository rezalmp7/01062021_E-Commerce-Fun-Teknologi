
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal nama">
                        <h3 class="uk-text-bold uk-padding-remove uk-margin-remove"><?php echo $produk->nama; ?></h3>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                        <div class="uk-width-1-1 uk-padding-small uk-padding-remove-left uk-clearfix">
                            <div class="uk-child-width-1-6@m" uk-grid uk-lightbox="animation: scale">
                                <?php
                                foreach ($gambar_produk as $gp) {
                                ?>
                                <div class="padding-small uk-margin-remove">
                                    <a class="uk-inline" href="<?php echo base_url(); ?>assets/img/produk/<?php echo $gp->src; ?>" data-caption="<?php echo $gp->alt; ?>">
                                        <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $gp->src; ?>" alt="<?php echo $gp->alt; ?>">
                                    </a>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                            <div class="deskripsi uk-width-4-5@s uk-padding-small uk-padding-remove-left">
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Kode</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $produk->kode; ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Tautan</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><a href="<?php echo $produk->link; ?>"><?php echo $produk->link; ?></a></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Harga</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo "Rp " . number_format($produk->harga,0,',','.'); ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Tanggal Masuk</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo date('d F Y', strtotime($produk->create_at)); ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Deskripsi</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove">
                                        <?php echo $produk->deskripsi; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="deskripsi uk-width-1-5@s uk-padding-small uk-padding-remove-left">
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Dibeli</label>
                                    <hr>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $dibeli->nilai; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>