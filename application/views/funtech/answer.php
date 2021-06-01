
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-3-5">
                        <form class="uk-form-stacked" method="post" action="<?php echo base_url(); ?>funtech/comment/answer_aksi">
                            <input type="hidden" name="id" value="<?php echo $comment->id; ?>">
                            <div class="uk-margin">
                                <div class="uk-width-1-1 uk-grid-match uk-padding-remove uk-margin-remove" uk-grid>
                                    <div class="uk-width-1-1 uk-padding-small uk-margin-remove uk-inline" style="width: 75px;">
                                        <div class="uk-background-cover uk-background-top-center uk-background-norepeat uk-border-circle" style="width:50px; height: 50px; background-image: url('<?php if($comment->photo_pelanggan == null) echo base_url().'assets/img/pelanggan/avatar_default.jpg'; else echo base_url().'assets/img/pelanggan/'.$comment->photo_pelanggan; ?>');"></div>
                                        <div class="uk-height-expand" style="height: auto; border-left: 1px solid black;"></div>
                                    </div>
                                    <div class="uk-width-expand uk-padding-small">
                                        <div class="uk-width-1-1">
                                            <span class="uk-text-bold"><?php echo $comment->nama_pelanggan; ?></span>
                                            <span class="uk-float-right poppins-light uk-text-small"><?php echo date('H:s:i d F Y', strtotime($comment->comment_at)); ?></span>
                                        </div>
                                        <div class="uk-width-1-1 uk-margin-small-top">
                                            <p class="uk-text-justify uk-text-small" style="text-indent: 30px"><?php echo $comment->comment; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if($comment->reply != null)
                                {
                                ?>
                                <div class="uk-width-1-1 uk-padding-remove uk-padding-remove-vertical uk-padding-remove-right uk-margin-remove" uk-grid>
                                    <div class="uk-width-1-1 uk-padding-small uk-margin-remove" style="width: 75px">
                                        <img class="uk-width-1-1" src="<?php echo base_url(); ?>assets/img/web/arrow_answer.png">
                                    </div>
                                    <div class="uk-width-1-1 uk-padding-small uk-margin-remove" style="width: 75px">
                                        <div class="uk-background-cover uk-background-top-center uk-background-norepeat uk-border-circle" style="width:50px; height: 50px; background-image: url('<?php echo base_url(); ?>assets/img/web/admin_default.jpg');"></div>
                                    </div>
                                    <div class="uk-width-expand uk-padding-small">
                                        <div class="uk-width-1-1">
                                            <span class="uk-text-bold"><?php echo $comment->nama_user; ?></span>
                                            <span class="uk-float-right poppins-light uk-text-small"><?php echo date('H:s:i d F Y', strtotime($comment->reply_at)); ?></span>
                                        </div>
                                        <div class="uk-width-1-1 uk-margin-small-top">
                                            <p class="uk-text-justify uk-text-small" style="text-indent: 30px"><?php echo $comment->reply; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text"><?php if($comment->reply == "") echo 'Balasan'; else echo 'Edit Balasan'; ?></label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" name="answer" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <button type="submit" class="uk-button button-success uk-float-right"
                                    value="Tambah"><?php if($comment->reply == "") echo 'Jawab'; else echo 'Edit'; ?></button>
                            </div>
                        </form>
                    </div>
                </div>