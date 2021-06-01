
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove uk-clearfix">
                        <a href="<?php echo base_url(); ?>funtech/kategori/tambah" class="uk-button button-success uk-border-rounded"><span
                                class="iconify" data-icon="akar-icons:plus" data-inline="false"></span> Tambah</a>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-overflow-auto">
                            <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="fun-poppins-semi-bold">ID</th>
                                        <th class="fun-poppins-semi-bold">Nama</th>
                                        <th class="fun-poppins-semi-bold">Alias</th>
                                        <th class="fun-poppins-semi-bold">Icon</th>
                                        <th class="fun-poppins-semi-bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($kategori as $a) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a->id; ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td><?php echo $a->alias; ?></td>
                                        <td><?php echo $a->icon; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>funtech/kategori/edit?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-warning uk-border-rounded"><span
                                                    class="iconify" data-icon="clarity:pencil-solid"
                                                    data-inline="false"></span></a>
                                            <a href="<?php echo base_url(); ?>funtech/kategori/hapus?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-danger uk-border-rounded"><span
                                                    class="iconify" data-icon="bx:bxs-trash-alt"
                                                    data-inline="false"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>