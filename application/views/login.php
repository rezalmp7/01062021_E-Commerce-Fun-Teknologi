            
            <div class="uk-padding-large uk-clearfix" id="body">
                <div class="uk-padding-remove uk-margin-remove uk-width-1-1" uk-grid>
                    <div class="uk-padding uk-width-1-2@s" style="border-right: 1px solid rgb(233, 233, 233)">
                        <div class="uk-padding-small uk-margin-remove uk-width-1-1">
                            <label class="uk-text-meta uk-padding-remove uk-margin-remove">Selamat Datang</label>
                            <h2 class="uk-text-large uk-text-bold uk-padding-remove uk-margin-remove">Daftar</h2>
                            <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="<?php echo base_url(); ?>login/aksi_daftar">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="nama" placeholder="Nama..." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Username</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="username" placeholder="Username..." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="password" name="password" placeholder="Password..." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">TTL</label>
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="text" name="tmp_lahir" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <input class="uk-input" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea" name="alamat" rows="2" placeholder="Alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Kontak</label>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Email</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Telegram</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" name="telegram" placeholder="Telagram">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Whatsapp</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" name="whatsapp" placeholder="Whatsapp">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <input class="uk-button uk-button-primary uk-input uk-float-right" type="submit" value="Daftar Sekarang">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="uk-padding uk-width-1-2@s">
                        <label class="uk-text-meta uk-padding-remove uk-margin-remove">Selamat Datang Kembali</label>
                        <h2 class="uk-text-large uk-text-bold uk-padding-remove uk-margin-remove">Masuk</h2>
                        <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="<?php echo base_url(); ?>login/aksi_login">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Username</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="username" placeholder="Username...">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Password</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="password" name="password" placeholder="Password...">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-button uk-button-primary uk-input uk-float-right" type="submit" value="Masuk">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>