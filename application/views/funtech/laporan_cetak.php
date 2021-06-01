<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/uikit/css/uikit.min.css" />
    <script src="<?php echo base_url(); ?>assets/vendor/uikit/js/uikit.min.js"></script>

    <script>
        window.print();
    </script>
</head>
<body class="uk-padding-large">
    <article class="uk-article uk-width-1-1 uk-text-center">
        <h1 class="uk-article-title">Laporan Penjualan</h1>
        <p class="uk-article-meta">Source Code CV Fun Teknologi</p>
        <p class="uk-article-meta"></p>
    </article>
    <table class="uk-table uk-table-small uk-table-divider">
        <thead>
            <tr>
                <th class="fun-poppins-semi-bold">No</th>
                <th class="fun-poppins-semi-bold">Tanggal</th>
                <th class="fun-poppins-semi-bold">Nama</th>
                <th class="fun-poppins-semi-bold">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $pendapatan = 0;
            foreach ($laporan_penjualan as $a) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($a->done_at)); ?></td>
                <td><?php echo $a->nama; ?></td>
                <td>Rp <?php echo number_format($a->total_bayar, 0, ',', '.'); ?></td>
            </tr>
            <?php
            $pendapatan = $pendapatan+$a->total_bayar;
            $no++;
            }
            ?>
            <tr>
                <td colspan='3'>Total Pendapatan</td>
                <td>Rp <?php echo number_format($pendapatan, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>