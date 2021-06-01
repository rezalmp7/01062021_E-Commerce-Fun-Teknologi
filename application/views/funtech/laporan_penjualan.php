
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                        <form method="post" target="_blank" action="<?php echo base_url(); ?>funtech/laporan_penjualan/cetak" class="uk-clearfix">
                            <input class="uk-input uk-form-width-medium" type="date" name="tgl_awal" required> - 
                            <input class="uk-input uk-form-width-medium" type="date" name="tgl_akhir" required>
                            <button type="submit" class="uk-button button-success uk-float-right uk-border-rounded"><span class="iconify" data-icon="bytesize:print" data-inline="false"></span> Cetak</button>
                        </form>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-overflow-auto">
                            <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="fun-poppins-semi-bold">No</th>
                                        <th class="fun-poppins-semi-bold">Tanggal</th>
                                        <th class="fun-poppins-semi-bold">Nama</th>
                                        <th class="fun-poppins-semi-bold">Harga</th>
                                        <th class="fun-poppins-semi-bold">Status</th>
                                        <th class="fun-poppins-semi-bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($laporan_penjualan as $a) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo date('d-m-Y H:i:s', strtotime($a->checkout_at)); ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td>Rp <?php echo number_format($a->total_bayar, 0, ',', ' '); ?></td>
                                        <td><?php echo $a->status; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>funtech/laporan_penjualan/info?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-primary uk-border-rounded"><span
                                                    class="iconify" data-icon="akar-icons:search"
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