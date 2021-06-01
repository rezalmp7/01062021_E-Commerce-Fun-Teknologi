
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/promo/edit_aksi">
                        <input type="hidden" name="id" value="<?php echo $promo->id; ?>">
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1">
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">KODE</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" value="<?php echo $promo->kode; ?>" type="text" name="kode_lama" placeholder="Kode">
                                        <input class="uk-input" id="form-stacked-text" value="<?php echo $promo->kode; ?>" type="text" name="kode" placeholder="Kode">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="nama" value="<?php echo $promo->nama; ?>" placeholder="nama">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Discount</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="number" value="<?php echo $promo->disc; ?>" name="disc" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Durasi</label>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_start" value="<?php echo $promo->start_date; ?>" placeholder="Date Start">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_end" value="<?php echo $promo->end_date; ?>" placeholder="Date End">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label uk-text-bold" for="form-stacked-text">Syarat</label>
                                </div>
                                <div class="uk-margin" id="kategori">
                                    <label class="uk-form-label" for="form-stacked-text">Kategori</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="form-horizontal-select" name="kategori">
                                            <option value="">-- Select Kategori --</option>
                                            <?php
                                            foreach ($kategori as $a) {
                                            ?>
                                            <option <?php if($promo->kategori == $a->id) echo 'selected'; ?> value="<?php echo $a->id;?>"><?php echo $a->nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin" id="kategori">
                                    <label class="uk-form-label" for="form-stacked-text">Harga</label>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" value="<?php echo $promo->harga_mulai; ?>" type="number" name="harga_start" placeholder="Harga Mulai">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" value="<?php echo $promo->harga_akhir; ?>" type="number" name="harga_end" placeholder="Harga Akhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Barang Discount</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="form-horizontal-select" name="discount" id="kategori">
                                            <option value="">-- Syarat Produk Discount --</option>
                                            <option value="all" <?php if($promo->syt_dsc == 'all') echo 'selected'; ?>>Semua</option>
                                            <option value="disc" <?php if($promo->syt_dsc == 'disc') echo 'selected'; ?>>Discount</option>
                                            <option value="non" <?php if($promo->syt_dsc == 'non') echo 'selected'; ?>>Tanpa Discount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Deskripsi</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-width-1-1 editor" rows="4" name="deskripsi"
                                            placeholder="Deskripsi..." focusable><?php echo $promo->deskripsi; ?></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <button type="submit" class="uk-button button-warning">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>