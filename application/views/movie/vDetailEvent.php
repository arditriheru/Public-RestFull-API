<body class="hold-transition sidebar-mini">
    <nav class="navbar navbar-light" style="background-color: #f7d217;">
        <!-- Navbar content -->
    </nav>
    <nav class="navbar navbar-light sticky-top" style="background-color: #06337b;">
        <div class="container-fluid">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/dist/img/HomeLogo.png" height="90px" alt="Main Logo" class="brand-image">
            </a>
            <ul class="nav nav-pills">

                <?php if (!empty($this->session->userdata('seminar_id_peserta'))) { ?>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('peserta/userPeserta/index?menuUtama=active'); ?>">Kembali ke profil <i class="fas fa-arrow-right fa-sm mr-2"></i></a>
                    </li>

                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('login/loginPeserta'); ?>">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page">/</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('login/loginPeserta'); ?>">Sign in</a>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </nav>
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <?php foreach ($detailEvent as $d) : ?>

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="position-relative">
                                    <img src="<?php echo base_url() . 'uploads/flyer-event/' . $d->file_flyer; ?>" alt="Flyer Image" class="img-fluid">
                                    <div class="ribbon-wrapper ribbon-lg">

                                        <?php
                                        if ($this->mHome->countData(
                                            'pendaftaran',
                                            array(
                                                'id_user' => $this->session->userdata('seminar_id_peserta'),
                                                'id_event' => $d->id_event,
                                            )
                                        ) > 0) {
                                            echo ' <div class="ribbon bg-secondary text-lg">Terdaftar</div>';
                                        } elseif ($d->biaya_status == 1) {
                                            echo ' <div class="ribbon bg-danger text-lg">' . $d->biaya_sts . '</div>';
                                        } else {
                                            echo ' <div class="ribbon bg-primary text-lg">' . $d->biaya_sts . '</div>';
                                        } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 mt-3">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo $this->input->get('tabEvent'); ?>" id="custom-tabs-one-event-tab" data-toggle="pill" href="#custom-tabs-one-event" role="tab" aria-controls="custom-tabs-one-event" aria-selected="false">Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo $this->input->get('tabReviewer'); ?>" id="custom-tabs-one-reviewer-tab" data-toggle="pill" href="#custom-tabs-one-reviewer" role="tab" aria-controls="custom-tabs-one-reviewer" aria-selected="false">Reviewer</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade <?php echo $this->input->get('eventShow'); ?>" id="custom-tabs-one-event" role="tabpanel" aria-labelledby="custom-tabs-one-event-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="mt-3"><?= '<strong>' . $d->nama_event . '</strong>'; ?></h3>
                                                    <h5> <?= $d->tema ?></h5>
                                                    <p class="text-primary"><strong>
                                                            <?php
                                                            if ($d->tgl_mulai == $d->tgl_akhir) {
                                                                echo formatDateIndo($d->tgl_mulai);
                                                            } else {
                                                                echo formatDateIndo($d->tgl_mulai) . ' s/d ' . formatDateIndo($d->tgl_akhir);
                                                            }
                                                            ?>
                                                            <?= ' @ ' . $d->jam_mulai . ' - ' . $d->jam_akhir; ?>
                                                        </strong></p>

                                                    <?php
                                                    if ($d->biaya_status == 1) {
                                                        echo ' <hr><div class="bg-secondary py-2 px-3 mt-4">
                                                        <h5 class="mb-0">
                                                        Pendaftaran
                                                        </h5>
                                                        <h2 class="mt-0">Rp' . number_format($d->biaya_nominal, 0, ",", ".") . '</h2>
                                                    </div>';
                                                    } ?>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Kategori</th>
                                                                <td><?php echo $d->event_kategori; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Tingkat</th>
                                                                <td><?php echo $d->tingkat; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Pembayaran</th>
                                                                <td>
                                                                    <?php echo $d->biaya_sts;
                                                                    if ($d->biaya_status == 1) {
                                                                        echo ' Rp' . number_format($d->biaya_nominal, 0, ",", ".");
                                                                    } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Periode Pendaftaran</th>
                                                                <td><?php echo formatDateIndo($d->daftar_mulai) . ' s/d ' . formatDateIndo($d->daftar_akhir); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Periode Review</th>
                                                                <td><?php echo formatDateIndo($d->tgl_review_awal) . ' s/d ' . formatDateIndo($d->tgl_review_akhir); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-left" style="width:20%">Contact Person</th>
                                                                <td><?php echo $d->kontak . '&nbsp;<a href="https://api.whatsapp.com/send?phone=62' . substr($d->kontak, 1) . '" target="_blank"><span class="right badge badge-success">Hubungi</span></a><br><p class="text-danger">'; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>


                                                    <?php if ($this->mHome->countData(
                                                        'pendaftaran',
                                                        array(
                                                            'id_user' => $this->session->userdata('seminar_id_peserta'),
                                                            'id_event' => $d->id_event,
                                                        )
                                                    ) > 0) { ?>

                                                        <a href="#" class="btn btn-primary btn-md btn-flat disabled">
                                                            <i class="fas fa-check fa-lg mr-2"></i>
                                                            Sudah Terdaftar
                                                        </a>

                                                    <?php } elseif ($this->session->userdata('peserta_login') == '1') { ?>

                                                        <a href="<?php echo base_url('peserta/userPeserta/daftarEvent/' . $d->id_event); ?>" class="btn btn-primary btn-md btn-flat">
                                                            <i class="fas fa-plus fa-lg mr-2"></i>
                                                            Mendaftar
                                                        </a>

                                                    <?php } else { ?>

                                                        <a href="<?php echo base_url('login/loginPeserta?id=' . $d->id_event); ?>" class="btn btn-primary btn-md btn-flat">
                                                            <i class="fas fa-plus fa-lg mr-2"></i>
                                                            Mendaftar
                                                        </a>

                                                    <?php } ?>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade <?php echo $this->input->get('reviewerShow'); ?>" id="custom-tabs-one-reviewer" role="tabpanel" aria-labelledby="custom-tabs-one-reviewer-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table id="dataTablesAsc1" class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nama Reviewer</th>
                                                                    <th class="text-center">Instansi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($dataReviewer as $a) : ?>
                                                                    <tr>
                                                                        <td class="text-left"><?php echo '<strong>' . $a->gelar_front . $a->nama_user . $a->gelar_back . '</strong><br>' . $a->email; ?></td>
                                                                        <td class="text-center"><?php echo $a->instansi; ?></td>
                                                                    </tr>

                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            <?php endforeach; ?>

        </div>
    </section>
    <!-- /.content -->