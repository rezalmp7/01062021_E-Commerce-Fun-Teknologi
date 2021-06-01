<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal nama">
                        <h3 class="uk-text-bold uk-padding-remove uk-margin-remove">Aplikasi Pembelajaran</h3>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                            <div class="deskripsi uk-width-4-5@s uk-padding-small uk-padding-remove-left">
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Kode</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $promo->kode; ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Nama</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $promo->nama; ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Discount</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $promo->disc; ?>%</p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Tanggal</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo date('d F Y', strtotime($promo->start_date)).' - '.date('d F Y', strtotime($promo->end_date)); ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Kategori</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $promo->nama_kategori; ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Harga</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo rupiah($promo->harga_mulai).' - '.rupiah($promo->harga_akhir); ?></p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Produk Discount</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove">
                                    <?php
                                    if($promo->syt_dsc == 'all')
                                    {
                                        echo "Semua Barang";
                                    }
                                    elseif ($promo->syt_dsc == 'disc') {
                                        echo "Hanya Barang Discount";
                                    }
                                    else {
                                        echo "Hanya Barang Tanpa Discount";
                                    }
                                    ?>
                                    </p>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Keterangan</label>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove">
                                        <?php echo $promo->deskripsi; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="deskripsi uk-width-1-5@s uk-padding-small uk-padding-remove-left">
                                <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                    <label class="uk-text-bold uk-padding-remove uk-margin-remove">Digunakan</label>
                                    <hr>
                                    <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $digunakan; ?> X</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>