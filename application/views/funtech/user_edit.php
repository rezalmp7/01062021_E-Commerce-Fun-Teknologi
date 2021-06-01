
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/user/edit_aksi">
                            <input type="hidden" value="<?php echo $user->id; ?>" name="id">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $user->nama; ?>" name="nama" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Username</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="username" value="<?php echo $user->username; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Password</label>
                                <div class="uk-form-controls">
                                    <input type="hidden" name="password_lama" value="<?php echo $user->password; ?>">
                                    <input class="uk-input" id="form-stacked-text" type="password" name="password">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">No Hp</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="no_hp" value="<?php echo $user->no_hp; ?>" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="email" name="email" value="<?php echo $user->email; ?>" required>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-success uk-float-right" value="Tambah">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>