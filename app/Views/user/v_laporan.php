<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan user</h3>
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
                        <h1>Data User</h1>
                    </center>
                    <hr>
                    <span> Tanggal : <?= date('d-M-Y'); ?></span>
                    <br>
                    <span>Jumlah data : <?= count($user); ?></span>
                    <br>
                    <br>
                    <br>
                    <center>
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $a) : ?>
                                    <tr>
                                        <td class="text-center"><?= $a['nama_user']; ?></td>
                                        <td class="text-center"><?= $a['email']; ?></td>
                                        <td class="text-center"><?= ($a['level'] == 1) ? 'Admin' : 'User'; ?></td>
                                        <td class="text-center"><?= $a['nama_jabatan']; ?></td>
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