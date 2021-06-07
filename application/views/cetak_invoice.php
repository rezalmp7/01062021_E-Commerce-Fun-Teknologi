<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/uikit/css/uikit.min.css" />
    <script src="<?php echo base_url(); ?>assets/vendor/uikit/js/uikit.min.js"></script>

    <script>
        window.print();
    </script>
</head>
<body class="uk-padding-large">
    <div class="uk-margin-medium-bottom">
        <h4 class="fun-poppins uk-padding-remove uk-margin-remove">CV Fun Teknologi</h4>
        <small class="fun-poppins-light uk-padding-remove uk-margin-remove">Jl. Petek, No 18, Purwosari, Semarang Utara, Kota Semarang</small>
    </div>
    <article class="uk-article uk-width-1-1 uk-text-center">
        <h1 class="uk-article-title fun-poppins-semi-bold uk-padding-remove uk-margin-remove">INVOICE</h1>
        <p class="uk-article-meta fun-poppins-light uk-padding-remove uk-margin-remove">No. <?php echo $transaksi['id']; ?></p>
        <p class="uk-article-meta"></p>
    </article>
    <div class="uk-margin-small-top uk-margin-medium-bottom">
        <h5 class="fun-poppins">Customer</h5>
        <div class="uk-width-1-1 uk-child-width-1-2 uk-margin-remove uk-padding-remove" uk-grid>
            <div>
                <table class="uk-table uk-table-small">
                    <tbody>
                        <tr>
                            <th class="uk-margin-remove uk-padding-remove">Nama</th>
                            <td class="uk-margin-remove uk-padding-remove">: <?php echo $pelanggan['nama']; ?></td>
                        </tr>
                        <tr>
                            <th class="uk-margin-remove uk-padding-remove">Alamat</th>
                            <td class="uk-margin-remove uk-padding-remove">: <?php echo $pelanggan['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th class="uk-margin-remove uk-padding-remove">Email</th>
                            <td class="uk-margin-remove uk-padding-remove">: <?php echo $pelanggan['email']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="uk-table uk-table-small">
                    <tbody>
                        <tr>
                            <th class="uk-padding-remove uk-margin-remove">Status</th>
                            <td class="uk-padding-remove uk-margin-remove">: Lunas</td>
                        </tr>
                        <tr>
                            <th class="uk-padding-remove uk-margin-remove">Tgl Order</th>
                            <td class="uk-padding-remove uk-margin-remove">: <?php echo date('d F Y, H:i:s', strtotime($transaksi['checkout_at'])); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="uk-width-1-1">
        <table class="uk-table uk-table-small uk-table-striped">
            <thead>
                <tr>
                    <th class="fun-poppins-semi-bold">No</th>
                    <th class="fun-poppins-semi-bold">Nama Produk</th>
                    <th class="fun-poppins-semi-bold">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_harga = 0;
                foreach ($pending as $a) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $a->nama; ?></td>
                    <td>Rp <?php echo number_format($a->harga, 0, ',', '.'); ?></td>
                </tr>
                <?php
                $no++;
                $total_harga = $total_harga+$a->harga;
                }
                ?>
                <tr>
                    <td colspan='2'>Total Harga<br></td>
                    <td>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan='2'>Kupon</td>
                    <?php
                    $potongan_harga = $total_harga*$kupon['disc']/100; ?>
                    <td>Rp <?php echo number_format($potongan_harga, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan='2'>Total Bayar<br> <small class="uk-text-danger">Jika berbeda dengan total diatas<br>berarti ada perbedaan harga waktu pembelian dengan sekarang</small></td>
                    <td>Rp <?php echo number_format($transaksi['total_bayar'], 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>