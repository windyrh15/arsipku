<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Add</a>
                </div>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('user/laporan_user'); ?>" class="btn btn-primary btn-sm btn-flat">Laporan</a>
                </div>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Jabatan</th>
                            <th class="text-center">foto</th>
                            <th width="200px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $u['nama_user']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?php if ($u['level'] == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    } ?></td>
                                <td><?= $u['nama_jabatan']; ?></td>
                                <td class="text-center"><img width="100" src="img/<?= $u['foto']; ?>" alt=""></td>
                                <td class="text-center">
                                    <a href="<?= base_url('user/edit/' . $u['id_user']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $u['id_user']; ?>">Delete</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal Delete -->
<?php foreach ($user as $u) : ?>
    <div class="modal fade" id="delete<?= $u['id_user']; ?>">
        <div class="modal-dialog modal-danger modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus user</h4>
                </div>
                <div class="modal-body">
                    Apakah ada yakin user <b><?= $u['nama_user']; ?></b> ingin di hapus ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('user/' . $u['id_user']); ?>" type="submit" class="btn btn-warning">Ya</a>
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