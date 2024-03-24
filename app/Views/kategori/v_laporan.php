<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan kategori</h3>
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
                        <h1>Data Kategori</h1>
                    </center>
                    <hr>
                    <span> Tanggal : <?= date('d-M-Y'); ?></span>
                    <br>
                    <span>Jumlah data : <?= count($kategori); ?></span>
                    <br>
                    <br>
                    <br>
                    <center>
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px">No</th>
                                    <th class="text-center" width="100px">Nama Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kategori as $a) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $a['nama_kategori']; ?></td>
                                    </tr>
                                    <?php $i++; ?>
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