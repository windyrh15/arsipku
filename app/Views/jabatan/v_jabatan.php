<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Jabatan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i>Add</button>
                </div>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('jabatan/laporan_jabatan'); ?>" class="btn btn-primary btn-sm btn-flat">Laporan</a>
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
                            <th>Jabatan</th>
                            <th width="200px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($jabatan as $d) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $d['nama_jabatan']; ?></td>
                                <td class="text-center"><button href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $d['id_jabatan']; ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $d['id_jabatan']; ?>">Delete</button>
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

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Jabatan</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/Jabatan/add" method="post">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Enter Jabatan" name="nama_jabatan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php foreach ($jabatan as $d) : ?>
    <div class="modal fade" id="edit<?= $d['id_jabatan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Jabatan</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>/jabatan/edit/<?= $d['id_jabatan']; ?>" method="post">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" placeholder="Enter Jabatan" name="nama_jabatan" value="<?= $d['nama_jabatan']; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- /.modal -->
<!-- End Modal Edit -->

<!-- Modal Delete -->
<?php foreach ($jabatan as $d) : ?>
    <div class="modal fade" id="delete<?= $d['id_jabatan']; ?>">
        <div class="modal-dialog modal-danger modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Jabatan</h4>
                </div>
                <div class="modal-body">
                    Apakah ada yakin Jabatan <b><?= $d['nama_jabatan']; ?></b> ingin di hapus ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('jabatan/hapus/' . $d['id_jabatan']); ?>" type="submit" class="btn btn-warning">Ya</a>
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