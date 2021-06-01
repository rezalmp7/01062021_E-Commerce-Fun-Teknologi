
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/promo/tambah_aksi">
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1">
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">KODE</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="kode" placeholder="Kode">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="nama" placeholder="nama">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Discount</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="number" name="disc" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Durasi</label>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_start" placeholder="Date Start">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_end" placeholder="Date End">
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
                                            <option value="<?php echo $a->id;?>"><?php echo $a->nama; ?></option>
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
                                            <input class="uk-input" type="number" name="harga_start" placeholder="Harga Mulai">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="number" name="harga_end" placeholder="Harga Akhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Barang Discount</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="form-horizontal-select" name="discount" id="kategori">
                                            <option value="">-- Syarat Produk Discount --</option>
                                            <option value="all">Semua</option>
                                            <option value="disc">Discount</option>
                                            <option value="non">Tanpa Discount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Deskripsi</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-width-1-1 editor" rows="4" name="deskripsi"
                                            placeholder="Deskripsi..." focusable></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <button type="submit" class="uk-button button-success">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>