
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/produk/kriteria_edit_aksi">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">ID</label>
                                <div class="uk-form-controls">
                                    <?php echo $kriteria->id; ?>
                                    <input class="uk-input" id="form-stacked-text" type="hidden" name="id" value="<?php echo $kriteria->id; ?>">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $kriteria->nama; ?>" name="nama" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Tipe</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $kriteria->tipe; ?>" name="tipe" required>
                                </div>
                            </div>
                            <?php
                            foreach ($all_kriteria as $a) {
                                if($a->id == $kriteria->id)
                                {
                                    continue;
                                }
                            ?>
                            <input type="hidden" step="any" name="bobot_all[]" value="<?php echo $a->bobot; ?>">
                            <?php
                            }
                            ?>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Bobot</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" step="any" id="form-stacked-text" type="number" value="<?php echo $kriteria->bobot; ?>" name="bobot" required>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-warning uk-float-right"
                                    value="Edit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>