
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/produk/produk_edit_gambar_edit_aksi" enctype='multipart/form-data'>
                        <div class="uk-padding-remove uk-margin-remove uk-width-1-1">
                            <div class="uk-width-3-5 uk-padding-small">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-text">Kode</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $gambar->id; ?>" name="id" required readonly>
                                        <input class="uk-input" id="form-stacked-text" type="hidden" value="<?php echo $gambar->id_produk; ?>" name="id_produk" required readonly>
                                        <input type="hidden" value="<?php echo $gambar->src; ?>" name="gambar_lama">
                                    </div>
                                </div>
                                <img style="height: 200px;" src="<?php echo base_url(); ?>assets/img/produk/<?php echo $gambar->src; ?>">
                                <div class="uk-margin">
                                    <label class="uk-form-label uk-text-bold" for="form-stacked-text">Gambar Baru</label>
                                    <div>
                                        <input type="file" name="gambar" required>
                                    </div>
                                </div>
                                <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                    <input type="submit" class="uk-button button-warning uk-float-right" value="Edit Gambar">
                                </div>
                            </div>
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