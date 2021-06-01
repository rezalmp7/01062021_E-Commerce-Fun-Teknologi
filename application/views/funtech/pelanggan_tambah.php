                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/pelanggan/tambah_aksi">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="nama" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Username</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="username" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Password</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="password" name="password" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">TTL</label>
                                <div class="uk-form-controls" uk-grid>
                                    <div class="uk-width-1-2@s">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="tempat" placeholder="Tempat Lahir..." required>
                                    </div>
                                    <div class="uk-width-1-2@s">
                                        <input class="uk-input" id="form-stacked-text" type="date" name="tanggal" placeholder="Tanggal Lahir...">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-width-1-1 uk-textarea" rows="4" name="alamat" placeholder="Alamat..." required></textarea>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Contact</label>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Telegram</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="telegram" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Whatsapp</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="number" name="whatsapp" required>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-success uk-float-right" value="Tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>