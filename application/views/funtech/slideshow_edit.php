
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked uk-margin-medium-top" method="post" enctype='multipart/form-data' action="<?php echo base_url(); ?>funtech/slideshow/edit_aksi">
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1">
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">ID</label>
                                    <div class="uk-form-controls">
                                        <input type="hidden" name="id" value="<?php echo $slideshow->id; ?>">
                                        <?php echo $slideshow->id; ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Judul</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="judul" value="<?php echo $slideshow->judul; ?>" placeholder="Judul...">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Deskripsi</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea" id="form-stacked-text" name="deskripsi" placeholder="Judul..."><?php echo $slideshow->deskripsi; ?></textarea>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Ganti Gambar</label>
                                    <input type="hidden" name="gambar_lama" value="<?php echo $slideshow->src; ?>">
                                    <div uk-form-custom="target: true">
                                        <input type="file" name="gambar">
                                        <input class="uk-input uk-form-width-large" type="text" placeholder="Select file" disabled>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <img class="uk-margin-small" style="height: 100px" src="<?php echo base_url(); ?>assets/img/slideshow/<?php echo $slideshow->src; ?>"> 
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <input class="uk-button button-success" type="submit" value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>