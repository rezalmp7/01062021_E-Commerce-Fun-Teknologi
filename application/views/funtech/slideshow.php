
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-overflow-auto">
                            <table class="uk-table">
                                <?php
                                foreach ($slideshow as $a) {
                                ?>
                                <tr>
                                    <td><img src="<?php echo base_url(); ?>assets/img/slideshow/<?php echo $a->src; ?>" style="width: 100px;"></td>
                                    <td>
                                        <h2 class="uk-text-bold"><?php echo $a->judul; ?></h2>
                                        <p><?php echo $a->deskripsi; ?></p>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>funtech/slideshow/edit?id=<?php echo $a->id; ?>" class="uk-button uk-button-small button-warning uk-border-rounded"><span class="iconify"
                                                data-icon="clarity:pencil-solid" data-inline="false"></span></a>
                                        <a href="<?php echo base_url(); ?>funtech/slideshow/hapus?id=<?php echo $a->id; ?>" class="uk-button uk-button-small button-danger uk-border-rounded"><span class="iconify"
                                                data-icon="bx:bxs-trash-alt" data-inline="false"></span></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove uk-clearfix">
                        <a href="<?php echo base_url(); ?>funtech/slideshow/tambah" class="uk-button button-success uk-border-rounded"><span class="iconify"
                                data-icon="akar-icons:plus" data-inline="false"></span> Tambah</a>
                    </div>
                </div>