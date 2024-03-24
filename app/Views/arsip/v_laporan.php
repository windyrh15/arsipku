<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan arsip</h3>
                <!-- /.box-tools -->
                <div class="box-tools pull-right">
                    <a onclick="printContent('div1')" class="btn btn-primary btn-sm btn-flat">Print Laporan</a>
                </div>
                <div class="box-tools pull-right">
                    <div class="input-group">
                        <table>
                            <tr>
                                <td><button class="btn btn-success" onclick="searchTable()">Cari</button></td>
                                <td><input type="text" id="searchInput" class="form-control" placeholder="Cari data arsip"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div id="div1">
                    <center>
                        <h1>Laporan</h1>
                        <h1><?= $nama; ?></h1>
                    </center>
                    <hr>
                    <span> Tanggal : <?= date('d-M-Y'); ?></span>
                    <br>
                    <span>Jumlah data : <?= count($arsip); ?></span>
                    <br>
                    <br>
                    <br>
                    <center>
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No Arsip</th>
                                    <th class="text-center" width="100px">Nama Arsip</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Upload</th>
                                    <th class="text-center">Update</th>
                                    <th class="text-center">Nama user</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Tipe</th>
                                    <th class="text-center">Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($arsip as $a) : ?>
                                    <tr>
                                        <td><?= $a['no_arsip']; ?></td>
                                        <td><?= $a['nama_file']; ?></td>
                                        <td><?= $a['nama_kategori']; ?></td>
                                        <td><?= $a['tgl_upload']; ?></td>
                                        <td><?= $a['tgl_update']; ?></td>
                                        <td><?= $a['nama_user']; ?></td>
                                        <td><?= $a['nama_jabatan']; ?></td>
                                        <td><?= number_format($a['size_file'], 0); ?> Byte</td>
                                        <td><?= $a['tipe_file']; ?></td>
                                        <td><?= $a['nama_instansi']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?= $this->endSection(); ?>