
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove uk-clearfix">
                        <a href="<?php echo base_url(); ?>funtech/promo/tambah" class="uk-button button-success uk-border-rounded"><span
                                class="iconify" data-icon="akar-icons:plus" data-inline="false"></span> Tambah</a>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-overflow-auto">
                            <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="fun-poppins-semi-bold">No</th>
                                        <th class="fun-poppins-semi-bold">Nama</th>
                                        <th class="fun-poppins-semi-bold">Kode</th>
                                        <th class="fun-poppins-semi-bold">Tanggal Start</th>
                                        <th class="fun-poppins-semi-bold">Tanggal End</th>
                                        <th class="fun-poppins-semi-bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($promo as $a) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td><?php echo $a->kode; ?></td>
                                        <td><?php echo date('d F Y', strtotime($a->start_date)); ?></td>
                                        <td><?php echo date('d F Y', strtotime($a->end_date)); ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>funtech/promo/info?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-primary uk-border-rounded"><span
                                                    class="iconify" data-icon="akar-icons:search"
                                                    data-inline="false"></span></a>
                                            <a href="<?php echo base_url(); ?>funtech/promo/edit?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-warning uk-border-rounded"><span
                                                    class="iconify" data-icon="clarity:pencil-solid"
                                                    data-inline="false"></span></a>
                                            <a href="<?php echo base_url(); ?>funtech/promo/hapus?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-danger uk-border-rounded"><span
                                                    class="iconify" data-icon="bx:bxs-trash-alt"
                                                    data-inline="false"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>