
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-padding-remove-bottom">
                            <h2 class="fun-poppins-semi-bold uk-padding-remove uk-margin-remove">Goals This Month</h2>
                        </div>
                        <div class="uk-width-1-1 uk-child-width-1-3@s uk-padding-small uk-padding-remove-horizontal uk-margin-remove uk-grid-match" uk-grid>
                            <div class="uk-padding-small uk-margin-remove goals">
                                <div class="uk-padding-small uk-margin-remove transaksi">
                                    <h6 class="fun-poppins-semi-bold"><?php echo $jml_transaksi; ?> Transaksi</h6>
                                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                                        <span class="iconify" data-icon="el:shopping-cart" data-inline="false"></span>
                                    </div>
                                    <p class="uk-padding-remove uk-margin-remove fun-poppins">Penjualan Bulan Ini</p>
                                </div>
                            </div>
                            <div class="uk-padding-small uk-margin-remove goals">
                                <div class="uk-padding-small uk-margin-remove user">
                                    <h6 class="fun-poppins-semi-bold"><?php echo $jml_pelanggan; ?> Pelanggan</h6>
                                    <div class="uk-width-1-1">
                                        <span class="iconify" data-icon="bx:bxs-user" data-inline="false"></span>
                                    </div>
                                    <p class="uk-padding-remove uk-margin-remove fun-poppins">User Baru Bulan Ini</p>
                                </div>
                            </div>
                            <div class="uk-padding-small uk-margin-remove goals">
                                <div class="uk-padding-small uk-margin-remove produk">
                                    <h6 class="fun-poppins-semi-bold"><?php echo $jml_produk; ?> Produk</h6>
                                    <div class="uk-width-1-1">
                                        <span class="iconify" data-icon="gridicons:product" data-inline="false"></span>
                                    </div>
                                    <p class="uk-padding-remove uk-margin-remove fun-poppins">Produk Baru Bulan Ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-remove" id="rating">
                        <div class="uk-width-1-1 uk-padding- uk-padding-remove-horizontal uk-padding-remove-bottom">
                            <h2 class="fun-poppins-semi-bold uk-padding-small uk-padding-remove-horizontal uk-padding-remove-top uk-margin-remove">Rating</h2>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-padding-remove-left uk-margin-remove">
                            <div class="uk-padding-small uk-padding-remove-horizontal uk-padding-remove-top uk-margin-remove uk-width-1-1 cart" uk-grid>
                                <div style="width: 25px; height: 25px" class="uk-margin-remove label">
                                    <span class="iconify uk-width-1-1" data-icon="ant-design:shopping-cart-outlined" data-inline="false"></span>
                                </div>
                                <div class="uk-width-expand" style="line-height: 80%;">
                                    <progress class="uk-progress uk-margin-remove uk-padding-remove" value="<?php echo $avg_produk; ?>" max="100"></progress><br>
                                    <span class="uk-padding-remove uk-margin-remove fun-poppins uk-text-small">Rating Produk</span>
                                </div>
                                <div style="width: 20px; height: 20px" class="uk-margin-remove fun-poppins">
                                    <?php echo $avg_produk; ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-remove" id="chart">
                        <div class="uk-width-1-1 uk-padding- uk-padding-remove-horizontal uk-padding-remove-bottom">
                            <h2 class="fun-poppins-semi-bold uk-padding-small uk-padding-remove-horizontal uk-padding-remove-top uk-margin-remove">Transaksi Per Bulan</h2>
                        </div>
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                            <canvas id="MyTransaction" style="height: 40vh;"></canvas>
                        </div>
                    </div>
                </div>
                <script>
                $(document).ready(function () {
                    var ctx = document.getElementById('MyTransaction').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',

                        // The data for our dataset
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                            datasets: [{
                                label: 'Transaksi <?php echo date("Y"); ?>',
                                backgroundColor: 'rgba(166, 206, 227, 0.2)',
                                borderColor: '#A6CEE3',
                                data: [<?php echo $trnB1; ?>, <?php echo $trnB2; ?>, <?php echo $trnB3; ?>, <?php echo $trnB4; ?>, <?php echo $trnB5; ?>, <?php echo $trnB6; ?>, <?php echo $trnB7; ?>, <?php echo $trnB8; ?>, <?php echo $trnB9; ?>, <?php echo $trnB10; ?>, <?php echo $trnB11; ?>, <?php echo $trnB12; ?>]
                            }]
                        },

                        // Configuration options go here

                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            legend: {
                                labels: {
                                    // This more specific font property overrides the global property
                                    fontColor: 'black',
                                    defaultFontFamily: 'poppins'
                                }
                            },
                            tooltips: {
                                mode: 'nearest'
                            },
                            responsive: true,
                            maintainAspectRatio: false
                        },
                        order: [[1, 'desc']]
                    });
                });
                </script>