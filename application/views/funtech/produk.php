
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <ul class="uk-subnav uk-subnav-pill" uk-switcher>
                        <li><a href="#">Daftar Produk</a></li>
                        <li><a href="#">Rekomendasi Produk</a></li>
                        <li><a href="#">Kriteria</a></li>
                    </ul>
                    
                    <ul class="uk-switcher uk-margin">
                        <li>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-remove uk-clearfix">
                                <a href="<?php echo base_url(); ?>funtech/produk/tambah" class="uk-button button-success uk-border-rounded"><span class="iconify"
                                        data-icon="akar-icons:plus" data-inline="false"></span> Tambah</a>
                            </div>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                                <div class="uk-overflow-auto">
                                    <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="fun-poppins-semi-bold">Kode</th>
                                                <th class="fun-poppins-semi-bold">Nama</th>
                                                <th class="fun-poppins-semi-bold">Discount</th>
                                                <th class="fun-poppins-semi-bold">Harga</th>
                                                <th class="fun-poppins-semi-bold">link</th>
                                                <th class="fun-poppins-semi-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($produk as $a) {
                                            ?>
                                            <tr>
                                                <td><?php echo $a->kode; ?></td>
                                                <td><?php echo $a->nama; ?></td>
                                                <td><?php if($a->discount != null) echo $a->discount; else echo '0'; ?>%</td>
                                                <td>Rp <?php echo number_format($a->harga,2,',','.'); ?></td>
                                                <td><?php echo $a->link; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/edit_discount?id=<?php echo $a->id; ?>"
                                                        class="uk-button uk-button-small button-ungu uk-border-rounded"><span class="iconify"
                                                            data-icon="bx:bxs-discount" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/info?id=<?php echo $a->id; ?>"
                                                        class="uk-button uk-button-small button-primary uk-border-rounded"><span class="iconify"
                                                            data-icon="akar-icons:search" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/edit?id=<?php echo $a->id; ?>"
                                                        class="uk-button uk-button-small button-warning uk-border-rounded"><span class="iconify"
                                                            data-icon="clarity:pencil-solid" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/hapus?id=<?php echo $a->id; ?>" class="uk-button uk-button-small button-danger uk-border-rounded"><span
                                                            class="iconify" data-icon="bx:bxs-trash-alt" data-inline="false"></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                                <div class="uk-overflow-auto">
                                    <?php
                                    if($sum_bobot->bobot == 1)
                                    {
                                    ?>
                                    <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="fun-poppins-semi-bold">Kode</th>
                                                <th class="fun-poppins-semi-bold">Nama</th>
                                                <th class="fun-poppins-semi-bold">Harga</th>
                                                <th class="fun-poppins-semi-bold">Discount</th>
                                                <th class="fun-poppins-semi-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rekomendasi as $a) {
                                            ?>
                                            <tr>
                                                <td><?php echo $vikor[$a]->kode; ?></td>
                                                <td><?php echo $vikor[$a]->nama; ?></td>
                                                <td><?php echo $vikor[$a]->harga; ?></td>
                                                <td><?php if($vikor[$a]->discount != null) echo $vikor[$a]->discount; else echo '0'; ?>%</td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/edit_discount?id=<?php echo $a; ?>"
                                                        class="uk-button uk-button-small button-ungu uk-border-rounded"><span class="iconify"
                                                            data-icon="bx:bxs-discount" data-inline="false"></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }
                                    else {
                                    ?>
                                    <p>Jumlah Kriteria Tidak Sama Dengan 1</p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                                <div class="uk-overflow-auto">
                                    <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="fun-poppins-semi-bold">Nama</th>
                                                <th class="fun-poppins-semi-bold">Bobot</th>
                                                <th class="fun-poppins-semi-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($kriteria as $c) {
                                            ?>
                                            <tr>
                                                <td><?php echo $c->nama; ?></td>
                                                <td><?php echo $c->bobot; ?></td>
                                                <td>
                                                
                                                    <a href="<?php echo base_url(); ?>funtech/produk/edit_kriteria?id=<?php echo $c->id; ?>"
                                                        class="uk-button uk-button-small button-warning uk-border-rounded"><span class="iconify"
                                                            data-icon="clarity:pencil-solid" data-inline="false"></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <p>Jumlah Kriteria <b><?php echo $sum_bobot->bobot; ?>/1</b> (Bobot Harus Berjumlah 1); 
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>