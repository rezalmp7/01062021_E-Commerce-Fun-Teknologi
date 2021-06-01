
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/kategori/tambah_aksi">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">ID</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="hidden" name="id" value="<?php echo $id; ?>" readonly><?php echo $id; ?>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="nama" maxlength="100" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Alias</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="alias" maxlength="3" required>
                                    <small class="uk-text-danger uk-text-small">Alias digunakan untuk kode Produk contoh <strong>and-991</strong> terdiri dari 3 huruf</small>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Icon</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" id="form-stacked-text" name="icon" rows="3" placeholder="&lt;span class=&quot;iconify&quot; data-icon=&quot;ant-design:file-search-outlined&quot; data-inline=&quot;false&quot;&gt;&lt;/span&gt;" required></textarea>
                                    <small class="uk-text-danger uk-text-small">Icon diambil dari <a target="_black" href="https://iconify.design/icon-sets/">Iconify</a>. Salin kode html berupa span, contoh:<br><span class="uk-text-emphasis">&lt;span class=&quot;iconify&quot; data-icon=&quot;ant-design:file-search-outlined&quot; data-inline=&quot;false&quot;&gt;&lt;/span&gt;</span></small>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-success uk-float-right"
                                    value="Tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>