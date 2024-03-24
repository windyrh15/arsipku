<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data kategori</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i>Add</button>
                </div>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('kategori/laporan_kategori'); ?>" class="btn btn-primary btn-sm btn-flat">Laporan</a>
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
                            <th>Kategori</th>
                            <th width="200px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kategori as $k) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $k['nama_kategori']; ?></td>
                                <td class="text-center">
                                    <button href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_kategori']; ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $k['id_kategori']; ?>">Delete</button>
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
                <h4 class="modal-title">Add Kategori</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/kategori/add" method="post">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" placeholder="Enter kategori" name="nama_kategori">
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
<?php foreach ($kategori as $k) : ?>
    <div class="modal fade" id="edit<?= $k['id_kategori']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>/kategori/edit/<?= $k['id_kategori']; ?>" method="post">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" placeholder="Enter kategori" name="nama_kategori" value="<?= $k['nama_kategori']; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
<?php foreach ($kategori as $k) : ?>
    <div class="modal fade" id="delete<?= $k['id_kategori']; ?>">
        <div class="modal-dialog modal-danger modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Kategori</h4>
                </div>
                <div class="modal-body">
                    Apakah ada yakin kategori <b><?= $k['nama_kategori']; ?></b> ingin di hapus ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('kategori/hapus/' . $k['id_kategori']); ?>" type="submit" class="btn btn-warning">Ya</a>
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