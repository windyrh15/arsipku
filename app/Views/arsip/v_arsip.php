<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <?php if (session()->get('level') == 1) : ?>
            <div class="box box-primary box-solid">
            <?php endif; ?>
            <?php if (session()->get('level') == 2) : ?>
                <div class="box box-success box-solid">
                <?php endif; ?>
                <div class="box-header with-border">
                    <h3 class="box-title">Data Instansi</h3>
                    <?php if (session()->get('level') == 1) : ?>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url('arsip/add/' . $id_instansi . '/' . $nama); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Add</a>
                        </div>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url('arsip/laporan/' . $id_instansi . '/' . $nama); ?>" class="btn btn-primary btn-sm btn-flat">Laporan</a>
                        </div>
                    <?php endif; ?>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <?php
                    if (session()->getFlashdata('pesan-error')) {
                        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Failed!</h4>';
                        echo session()->getFlashdata('pesan-error');
                        echo '</div>';
                    }
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="2px">No</th>
                                <th class="text-center">No.arsip</th>
                                <th class="text-center">Nama Arsip</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center" width="15px">Deskripsi</th>
                                <th class="text-center">Upload</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Nama user</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center" width="120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($arsip as $a) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $a['no_arsip']; ?></td>
                                    <td><?= $a['nama_file']; ?></td>
                                    <td><?= $a['nama_kategori']; ?></td>
                                    <td><?= $a['deskripsi']; ?></td>
                                    <td><?= $a['tgl_upload']; ?></td>
                                    <td><?= $a['tgl_update']; ?></td>
                                    <td><?= $a['nama_user']; ?></td>
                                    <td><?= $a['nama_jabatan']; ?></td>
                                    <td><?= number_format($a['size_file'], 0); ?> Byte</td>
                                    <!-- ------------------ -->

                                    <!-- Admin -->
                                    <?php if (session()->get('level') == 1) : ?>
                                        <?php if ($a['tipe_file'] == '7z') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-danger btn-sm">7z</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'zip') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-danger btn-sm">ZIP</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'pdf') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-primary btn-sm">PDF</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'docx') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-primary btn-sm">DOCX</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'jpg') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-warning btn-sm">JPG</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'png') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-warning btn-sm">PNG</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'mp3') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-info btn-sm">mp3</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'wav') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-info btn-sm">wav</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'mp4') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsip/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-success btn-sm">mp4</a></td>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- User -->
                                    <?php if (session()->get('level') == 2) : ?>
                                        <?php if ($a['tipe_file'] == '7z') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-danger btn-sm">7z</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'zip') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-danger btn-sm">ZIP</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'pdf') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-primary btn-sm">PDF</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'docx') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-primary btn-sm">DOCX</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'jpg') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-warning btn-sm">JPG</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'png') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-warning btn-sm">PNG</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'mp3') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-info btn-sm">mp3</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'wav') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-info btn-sm">wav</a></td>
                                        <?php endif; ?>
                                        <?php if ($a['tipe_file'] == 'mp4') : ?>
                                            <td class="text-center"><a href="<?= base_url('arsipuser/preview/' . $a['id_arsip'] . '/' . $nama); ?>" class="btn btn-success btn-sm">mp4</a></td>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- ---------------- -->
                                    <?php if (session()->get('level') == 1) : ?>
                                        <td class="text-center">
                                            <a href="<?= base_url('arsip/edit/' . $a['id_arsip'] . '/' . $id_instansi . '/' . $nama); ?>" class="btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
                                            <a href="<?= base_url('arsip/downloadData/' . '/' . $a['id_arsip'] . '/' . $a['file_arsip']); ?>" class="btn btn-success btn-sm"><span class="fa fa-download"></span></a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $a['id_arsip']; ?>"><span class="fa fa-trash-o"></span></button>
                                        </td>
                                    <?php endif; ?>
                                    <?php if (session()->get('level') == 2) : ?>
                                        <td class="text-center">
                                            <a href="<?= base_url('arsipuser/downloadData/' . '/' . $a['id_arsip'] . '/' . $a['file_arsip']); ?>" class="btn btn-success btn-sm"><span class="fa fa-download"></span></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (session()->get('level') == 1) : ?>
                        <form action="<?= base_url('arsip'); ?>" method="post">
                            <input type="hidden" value="<?= session()->get('pin'); ?>" name="pin2">
                            <button type="submit" class="btn btn-primary btn-md ml-2">Kembali</button>
                        </form>
                        <!-- <a href="<?= base_url('arsip'); ?>" class="btn btn-primary btn-md ml-2">Kembali</a> -->
                    <?php endif; ?>
                    <?php if (session()->get('level') == 2) : ?>
                        <form action="<?= base_url('arsipuser'); ?>" method="post">
                            <input type="hidden" value="<?= session()->get('pin'); ?>" name="pin2">
                            <button type="submit" class="btn btn-primary btn-md ml-2">Kembali</button>
                        </form>
                    <?php endif; ?>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
    </div>

    <!-- Modal Delete -->
    <?php foreach ($arsip as $a) : ?>
        <div class="modal fade" id="delete<?= $a['id_arsip']; ?>">
            <div class="modal-dialog modal-danger modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Arsip</h4>
                    </div>
                    <div class="modal-body">
                        Apakah ada yakin data arsip <b><?= $a['nama_file']; ?></b> ini ingin di hapus ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('arsip/hapus/' . $a['id_arsip'] . '/' . $a['id_instansi'] . '/' . $nama); ?>" type="submit" class="btn btn-warning">Ya</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php endforeach; ?>
    <!-- /.modal -->
    <!-- End Modal Delete -->
    <?= $this->endSection(); ?>