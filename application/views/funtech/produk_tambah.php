
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/produk/tambah_aksi" enctype='multipart/form-data'>
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1" uk-grid>
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Kode</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="hidden" value="<?php echo $id; ?>" name="id" required>
                                        <input class="uk-input" id="form-stacked-text" type="hidden" id="kd_kat" name="kd_kat" required>
                                        <span id="idkat"></span> - <?php echo $id; ?>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="nama" placeholder="nama" required>
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
                                            <option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Tautan</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="link" placeholder="Tautan.." required>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Harga</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" name="harga" placeholder="Harga.." require>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Deskripsi</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-width-1-1 editor" rows="4" name="deskripsi"
                                            placeholder="Deskripsi..." focusable></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-padding-small uk-margin-remove uk-width-2-5 field_wrapper">
                                <a type="button" id="button-tambah-gambar" class="uk-button uk-button-small uk-button-primary">Tambah Form Gambar</a>
                                <div class="uk-margin">
                                    <label class="uk-form-label uk-text-bold" for="form-stacked-text">Gambar</label>
                                    <div>
                                        <input type="file" name="gambar[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                            <input type="submit" class="uk-button button-success uk-float-right" value="Tambah">
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function(){
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