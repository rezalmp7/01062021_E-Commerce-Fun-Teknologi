
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/produk/edit_aksi" enctype='multipart/form-data'>
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1" uk-grid>
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Kode</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="hidden" value="<?php echo $produk->id; ?>" name="id" required>
                                        <input class="uk-input" id="form-stacked-text" type="hidden" id="kd_kat" name="kd_kat" required>
                                        <input class="uk-input" id="form-stacked-text" type="hidden" value="<?php echo $produk->kode; ?>" name="kode" required>
                                        <span id="idkat"></span> - <?php echo $produk->id; ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $produk->nama; ?>" name="nama" placeholder="nama" required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Kategori</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select" id="kategori" name="kategori" required>
                                            <option value="">-- Select Kategori --</option>
                                            <?php
                                            foreach ($kategori as $k) {
                                            ?>
                                            <option <?php if($produk->kategori == $k->id) echo 'selected'; ?> value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Link</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="link" value="<?php echo $produk->link; ?>" placeholder="Link.." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Harga</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="rupiah" type="text" name="harga" value="<?php echo $produk->harga; ?>" placeholder="Harga.." require>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Deskripsi</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-width-1-1 editor" rows="4" name="deskripsi"
                                            placeholder="Deskripsi..." focusable><?php echo $produk->deskripsi; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-padding-small uk-margin-remove uk-width-2-5 field_wrapper">
                                <div class="uk-margin">
                                    <label class="uk-form-label uk-text-bold" for="form-stacked-text">Gambar</label>
                                    <?php
                                    foreach ($produk_gambar as $pg) {
                                    ?>
                                    <div>
                                        <div class="uk-inline uk-margin-small-top">
                                            <img src="<?php echo base_url(); ?>assets/img/produk/<?php echo $pg->src; ?>" alt="">
                                            <div class="uk-overlay uk-overlay-primary uk-position-top uk-padding-small">
                                                <span uk-lightbox>
                                                    <a href="<?php echo base_url(); ?>assets/img/produk/<?php echo $pg->src; ?>" class="uk-button uk-button-small button-primary"><span class="iconify" data-icon="carbon:image-search" data-inline="false"></span></a>
                                                </span>
                                                <a href="<?php echo base_url(); ?>funtech/produk/produk_edit_gambar_edit?id=<?php echo $pg->id; ?>" class="uk-button uk-button-small button-warning"><span class="iconify" data-icon="bi:pencil-square" data-inline="false"></span></a>
                                                <?php
                                                $photo = explode(".",$pg->src);
                                                $exp_photo = explode("_", $photo[0]);
                                                if($exp_photo[1] != '0')
                                                {
                                                ?>
                                                    <a href="<?php echo base_url(); ?>funtech/produk/produk_edit_gambar_hapus?id=<?php echo $pg->id; ?>&gmb=<?php echo $pg->src; ?>&id_produk=<?php echo $produk->id; ?>" class="uk-button uk-button-small button-danger"><span class="iconify" data-icon="bx:bx-trash" data-inline="false"></span></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <a class="uk-button button-success uk-margin-small-top" href="<?php echo base_url(); ?>funtech/produk/produk_edit_gambar_tambah?id_produk=<?php echo $produk->id; ?>">Tambah Gambar</a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                            <input type="submit" class="uk-button button-primary uk-float-right" value="Edit">
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function(){
                        <?php
                            foreach ($kategori as $jsk) {
                            ?>
                            if ( $('#kategori').val() == <?php echo $jsk->id; ?> ) { 
                                $( "#idkat" ).text('<?php echo $jsk->alias; ?>');
                                $('input[name="kd_kat"]').val('<?php echo $jsk->alias; ?>');
                            }
                            <?php
                            }
                            ?>
                        $("#kategori").change(function(){
                            <?php
                            foreach ($kategori as $jsk) {
                            ?>
                            if ( $(this).val() == <?php echo $jsk->id; ?> ) { 
                                $( "#idkat" ).text('<?php echo $jsk->alias; ?>');
                                $('input[name="kd_kat"]').val('<?php echo $jsk->alias; ?>');
                            }
                            <?php
                            }
                            ?>
                            if( $(this).val() == "" ) 
                            {
                                $( "#idkat" ).text('');
                            }
                        }); 
                    });
                    $(document).ready(function(){
                        var maxField = 6; //Input fields increment limitation
                        var addButton = $('#button-tambah-gambar'); //Add button selector
                        var wrapper = $('.field_wrapper'); //Input field wrapper
                        var fieldHTML = '<div class="uk-margin"><div><input type="file" name="gambar[]"></div></div>'; //New input field html 
                        var x = 1; //Initial field counter is 1
                        
                        //Once add button is clicked
                        $(addButton).click(function(){
                            //Check maximum number of input fields
                            if(x < maxField){ 
                                x++; //Increment field counter
                                $(wrapper).append(fieldHTML); //Add field html
                            }
                        });
                    });
                </script>