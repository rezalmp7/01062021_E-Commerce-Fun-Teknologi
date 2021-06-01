
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <p><b>Kode Pembelian:</b> <?php echo $penjualan->id; ?></p>
                        <p><b>ID | Nama:</b><br><?php echo $penjualan->id_pelanggan; ?> | <?php echo $penjualan->nama; ?></p>
                        <p><b>Tanggal Pembelian:</b><br><?php echo date('d-m-Y', strtotime($penjualan->checkout_at)); ?></p>
                        <p><b>Total Harga:</b><br>Rp. <?php echo number_format($penjualan->total_bayar, 2, ',', ' '); ?></p>
                        <table class="uk-table uk-margin-medium-top">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th class="uk-text-bold">Kode</th>
                                    <th class="uk-text-bold">Nama</th>
                                    <th class="uk-text-bold">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_pending as $b) {
                                ?>
                                <tr>
                                    <td><?php echo $b->kode; ?></td>
                                    <td><?php echo $b->nama; ?></td>
                                    <td>Rp. <?php echo number_format($b->harga, 2, ',', ' '); ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>