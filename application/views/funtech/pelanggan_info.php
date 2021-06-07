                <div class="uk-width-1-1 uk-padding uk-margin-remove" id="isi_content">
                    <div class="uk-width-1-1 uk-padding-small uk-padding-remove-horizontal nama">
                        <h3 class="uk-text-bold uk-padding-remove uk-margin-remove"><?php echo $pelanggan->nama; ?></h3>
                        <p class="uk-padding-remove uk-margin-remove"><?php echo $pelanggan->username; ?></p>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-remove" uk-grid>
                        <div class="uk-width-1-3@s uk-padding-small uk-padding-remove-left">
                            <img class="uk-width-1-1" src="<?php if($pelanggan->photo == null) echo base_url().'assets/img/pelanggan/avatar_default.jpg'; else echo base_url().'assets/img/pelanggan/'.$pelanggan->photo; ?>">
                        </div>
                        <div class="right uk-width-2-3@s uk-padding-small uk-padding-remove-left">
                            <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                <label class="uk-text-bold uk-padding-remove uk-margin-remove">TTL</label>
                                <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $pelanggan->tmp_lahir; ?>, <?php echo date('d F Y', strtotime($pelanggan->tgl_lahir)); ?></p>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                <label class="uk-text-bold uk-padding-remove uk-margin-remove">Alamat</label>
                                <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo $pelanggan->alamat; ?></p>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-padding-remove-top uk-margin-remove">
                                <label class="uk-text-bold uk-padding-remove uk-margin-remove">Kontak</label>
                                <div class="uk-text-small uk-padding-remove uk-margin-remove">
                                    <table>
                                        <tr>
                                            <th style="text-align: left; padding-right: 15px;">Email</th>
                                            <td><?php echo $pelanggan->email; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding-right: 15px;">Telegram</th>
                                            <td><?php echo $pelanggan->telegram; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding-right: 15px;">Whatapp</th>
                                            <td><?php echo $pelanggan->whatsapp; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove">
                                <label class="uk-text-bold uk-padding-remove uk-margin-remove">Tgl Pendaftaran</label>
                                <p class="uk-text-small uk-padding-remove uk-margin-remove"><?php echo date('d F Y', strtotime($pelanggan->create_at)); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-padding-remove uk-margin-medium-top">
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-small">
                            <label class="uk-margin-medium-top uk-margin-medium-bottom">Transaksi</label>
                        </div>
                        <div class="uk-width-1-1 uk-padding-remove uk-margin-small-top">
                            <table id="table" class="uk-table uk-table-hover uk-table-striped uk-text-small fun-poppins" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="fun-poppins-semi-bold">ID Project</th>
                                        <th class="fun-poppins-semi-bold">Nama</th>
                                        <th class="fun-poppins-semi-bold">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($done as $d) {
                                    ?>
                                    <tr>
                                        <td class="uk-text-bold"><?php echo $d->kode; ?></td>
                                        <td><?php echo $d->nama; ?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($d->done_at)); ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>