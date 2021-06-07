                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/pelanggan/edit_aksi">
                            <input type="hidden" name="id" value="<?php echo $pelanggan->id; ?>">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="nama" value="<?php echo $pelanggan->nama; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Username</label>
                                <div class="uk-form-controls">
                                    <input type="hidden" name="username_lama" value="<?php echo $pelanggan->username; ?>" required>
                                    <input class="uk-input" id="form-stacked-text" type="text" name="username" value="<?php echo $pelanggan->username; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Password</label>
                                <div class="uk-form-controls">
                                    <input type="hidden" name="password_lama" value="<?php echo $pelanggan->password; ?>">
                                    <input class="uk-input" id="form-stacked-text" type="password" name="password">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">TTL</label>
                                <div class="uk-form-controls" uk-grid>
                                    <div class="uk-width-1-2@s">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="tempat" value="<?php echo $pelanggan->tmp_lahir; ?>" placeholder="Tempat Lahir..." required>
                                    </div>
                                    <div class="uk-width-1-2@s">
                                        <input class="uk-input" id="form-stacked-text" type="date" name="tanggal" value="<?php echo $pelanggan->tgl_lahir; ?>" placeholder="Tanggal Lahir...">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-width-1-1 uk-textarea" rows="4" name="alamat" placeholder="Alamat..." required><?php echo $pelanggan->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Kontak</label>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="email" name="email" value="<?php echo $pelanggan->email; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Telegram</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="telegram" value="<?php echo $pelanggan->telegram; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Whatsapp</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="number" name="whatsapp" value="<?php echo $pelanggan->whatsapp; ?>" required>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-success uk-float-right" value="Tambah">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>