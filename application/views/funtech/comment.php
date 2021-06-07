
                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-overflow-auto">
                            <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="fun-poppins-semi-bold">Status</th>
                                        <th class="fun-poppins-semi-bold">Tanggal</th>
                                        <th class="fun-poppins-semi-bold">Produk</th>
                                        <th class="fun-poppins-semi-bold">Ulasan</th>
                                        <th class="fun-poppins-semi-bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($comment as $a) {
                                    ?>
                                    <tr>
                                        <td class="uk-text-large"><?php if($a->reply != null) echo '<span class="iconify color-success" data-icon="ion:checkmark-done-circle" data-inline="false"></span>'; else { echo '<span class="iconify color-warning" data-icon="ph:timer-fill" data-inline="false"></span>'; } ?></td>
                                        <td><?php echo date('H:s:i d F Y', strtotime($a->comment_at)); ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td><?php echo $a->comment; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>funtech/comment/answer?id=<?php echo $a->id; ?>"
                                                class="uk-button uk-button-small button-primary uk-border-rounded"><span class="iconify" data-icon="ic:twotone-question-answer" data-inline="false"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>