
            <div class="uk-padding-large uk-clearfix" id="body">
                <div class="uk-width-1-1" id="body_head">
                    <h4 class="uk-padding-remove uk-margin-remove fun-poppins-semi-bold">Keranjang</h4>
                </div>
                <div class="uk-width-1-1" id="body_body">
                    <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal">
                        <?php
                        $total_harga = 0;
                        $i = 0;
                        $disc = array();
                        $kategori = array();
                        foreach ($cart as $a) {
                        ?>
                        <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal" id="cart_produk">
                            <div class="uk-padding-remove uk-margin-remove uk-grid-match" id="cart_produk_body" uk-grid>
                                <div class="uk-width-1-5 uk-padding-remove uk-background-cover uk-background-center-center uk-background-norepeat" style="background-image: url('<?php echo base_url(); ?>assets/img/produk/<?php echo $a->src; ?>')"></div>
                                <div class="uk-width-expand uk-padding uk-margin-remove" id="cart_produk_body_detail" uk-grid>
                                    <div class="uk-width-auto uk-float-left uk-padding-small uk-padding-remove-vertical">
                                        <h6 class="uk-padding-remove uk-margin-remove fun-poppins-semi-bold"><?php echo $a->nama; ?></h6>
                                        <span class="uk-padding-remove uk-margin-remove">Development : Fun Technology</span>
                                        <table class="uk-margin-small-top">
                                            <tbody>
                                                <tr>
                                                    <td id="label">harga: </td>
                                                    <td id="harga">Rp <?php echo number_format($a->harga,2,",","."); ?> <span class="uk-margin-small-left uk-visible@s" id="diskon"><?php if($a->discount != null) echo $a->discount.' off'; else echo '0% off' ?></span></td>
                                                </tr>
                                                <?php
                                                $harga_akhir = $a->harga-($a->harga*$a->discount/100);
                                                ?>
                                                <tr>
                                                    <td id="label">Total: </td>
                                                    <td id="harga">Rp <?php echo number_format($harga_akhir,2,",","."); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="delete uk-padding-remove">
                                    <a class="uk-display-block uk-height-1-1 uk-padding-small" href="<?php echo base_url(); ?>cart/hapus?id=<?php echo $a->id; ?>"><span class="iconify" data-icon="feather:trash-2" data-inline="false"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($a->discount))
                        {
                            if($a->discount != null)
                            {
                                $produk_disc = $a->discount;
                            }
                            else {
                                $produk_disc = 0;
                            }
                        }
                        else {
                            $produk_disc = 0;
                        }

                        $disc[$i] = $produk_disc;
                        $kat_cart[$i] = $a->kategori;
                        $i++;
                        $total_harga = $total_harga+$harga_akhir;
                        }
                        ?>
                    </div>
                </div>
                <div class="uk-width-1-1 price uk-padding-remove uk-margin-remove" uk-grid>
                    <div class="uk-width-1-2@s uk-padding-remove uk-margin-remove">
                        <form method="POST" action="<?php echo base_url(); ?>cart/tambah_promo">
                            <div class="uk-margin" uk-margin>
                                <div uk-form-custom="target: true">
                                <?php
                                if($cart != null)
                                {
                                    foreach ($disc as $d) {
                                    ?>
                                        <input type="hidden" name="disc[]" value="<?php echo $d; ?>">
                                    <?php
                                    }
                                    ?>
                                    <input type="hidden" name="harga" value="<?php echo $total_harga; ?>">
                                    <?php
                                    foreach ($kat_cart as $kat) {
                                    ?>
                                        <input type="hidden" name="kategori[]" value="<?php echo $kat; ?>">
                                    <?php
                                    }
                                }
                                    ?>
                                    <input class="uk-input uk-form-width-medium" type="text" name="kode" placeholder="Kupon" value="<?php if(isset($promo->kode)) echo $promo->kode; ?>" required>
                                </div>
                                <button type="submit" class="uk-button uk-button-primary uk-padding-small uk-padding-remove-vertical">Masukkan</button>
                                <?php if(isset($promo->kode))
                                {
                                ?>
                                <a href="<?php echo base_url(); ?>cart/hapus_promo" class="uk-button uk-button-danger uk-padding-small uk-padding-remove-vertical">Hapus Promo</a>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if(isset($promo->kode))
                            {
                            ?>
                            <div class="uk-margin" uk-margin>
                              <h5 class="uk-text-bold"><?php echo $promo->nama; ?></h5>
                              <?php echo $promo->deskripsi; ?>  
                            </div>
                            <?php
                            }
                            ?>
                        </form>
                        
                        <?php
                        $potongan_kupon = 0; 
                        ?>
                    </div>
                    <div class="uk-width-1-2@s uk-text-small uk-padding uk-padding-remove-horizontal uk-margin-remove">
                        <div class="uk-width-1-1">
                            <div class="fun-poppins-semi-bold uk-width-1-1 uk-clearfix"><span class="uk-float-left">Subtotal</span><span class="uk-float-right">Rp <?php echo number_format($total_harga,2,",","."); ?></span></div>
                            <div class="fun-poppins-semi-bold uk-width-1-1 uk-clearfix"><span class="uk-float-left">Diskon Kupon</span><span class="uk-float-right"><?php if(isset($promo->disc)) echo $promo->disc.'%'; else echo '0%'; ?></span></div>
                            <?php
                            if(isset($promo->disc))
                            {
                                $potongan_kupon = ($total_harga*$promo->disc/100); 
                            }
                            ?>
                            <div class="fun-poppins-semi-bold uk-width-1-1 uk-clearfix"><span class="uk-float-left">Potongan Kupon</span><span class="uk-float-right">Rp <?php echo number_format($potongan_kupon,2,",","."); ?></span></div>
                            <hr style="border-top: 2px solid black">
                            <?php
                            $harga_dibayar = $total_harga-$potongan_kupon;
                            ?>
                            <div class="fun-poppins-semi-bold uk-width-1-1 uk-clearfix"><span class="uk-float-left">Total</span><span class="uk-float-right">Rp <?php echo number_format($harga_dibayar,2,",","."); ?></span></div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-clearfix">
                            <form id="payment-form" method="POST" action="<?php echo base_url(); ?>checkout/finish">
                                <input type="hidden" name="result_type" id="result-type" value="">
                                <input type="hidden" name="result_data" id="result-data" value="">
                                <?php
                                    $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
                                    $id_transaction = $id_pelanggan.date('YmdHis');
                                ?>
                                <input type="hidden" value="<?php echo $id_transaction; ?>" name="id_transaksi">
                                <input type="hidden" value="<?php echo $id_pelanggan; ?>" name="id_pelanggan">
                                <input type="hidden" name="kupon" value="<?php if(isset($promo->kode)) echo $promo->kode; ?>" required>
                                <input type="hidden" name="potongan_kupon" value="<?php echo $potongan_kupon; ?>">
                                <input type="hidden" name="harga_dibayar" value="<?php echo $harga_dibayar; ?>" required>
                            </form>
                            <button id="pay-button" class="uk-button uk-button-primary uk-border-pill uk-border-large uk-float-right">Lanjutkan</button>
                        </div>
                        <script type="text/javascript">
  
                            $('#pay-button').click(function (event) {
                                event.preventDefault();
                                    var vid_transaksi = $('input[name=id_transaksi').val();
                                    var vid_pelanggan = $('input[name=id_pelanggan').val();
                                    var vkupon = $('input[name=kupon').val();
                                    var vharga_dibayar = $('input[name=harga_dibayar').val();
                                    var vpotongan_kupon = $('input[name=potongan_kupon').val();

                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url(); ?>checkout/token',
                                        data: {
                                            id_transaksi: vid_transaksi,
                                            id_pelanggan: vid_pelanggan,
                                            kupon: vkupon,
                                            harga_dibayar: vharga_dibayar,
                                            potongan_kupon: vpotongan_kupon
                                        },
                                        cache: false,
                                        success: function(msg){
                                            alert( "Data Saved: " + msg );
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("some error");
                                        },

                                        success: function(data) {
                                            //location = data;

                                            console.log('token = '+data);
                                            
                                            var resultType = document.getElementById('result-type');
                                            var resultData = document.getElementById('result-data');

                                            function changeResult(type,data){
                                            $("#result-type").val(type);
                                            $("#result-data").val(JSON.stringify(data));
                                            //resultType.innerHTML = type;
                                            //resultData.innerHTML = JSON.stringify(data);
                                            }

                                            snap.pay(data, {
                                            
                                            onSuccess: function(result){
                                                changeResult('success', result);
                                                console.log(result.status_message);
                                                console.log(result);
                                                $("#payment-form").submit();
                                            },
                                            onPending: function(result){
                                                changeResult('pending', result);
                                                console.log(result.status_message);
                                                $("#payment-form").submit();
                                            },
                                            onError: function(result){
                                                changeResult('error', result);
                                                console.log(result.status_message);
                                                $("#payment-form").submit();
                                            }
                                            });
                                        }
                                        });
                                    });

                        </script>
                    </div>
                </div>
            </div>