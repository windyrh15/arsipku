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
                    <h3 class="box-title">Data Arsip</h3>
                    <!-- /.box-tools -->
                    <?php if (session()->get('level') == 1) : ?>
                        <div class="box-tools pull-right">
                            <a href="<?= base_url('arsip/laporan_all'); ?>" class="btn btn-primary btn-sm btn-flat">Laporan All Data</a>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Instansi</th>
                                <th width="200px" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($instansi as $ins) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $ins['nama_instansi']; ?></td>
                                    <td class="text-center">
                                        <?php if (session()->get('level') == 1) : ?>
                                            <a href="<?= base_url('arsip/berkas/' . $ins['id_instansi'] . '/' . $ins['nama_instansi']); ?>" class="btn btn-success btn-md">Archive</span></a>
                                        <?php endif; ?>
                                        <?php if (session()->get('level') == 2) : ?>
                                            <a href="<?= base_url('arsipuser/berkas/' . $ins['id_instansi'] . '/' . $ins['nama_instansi']); ?>" class="btn btn-success btn-md">Archive</span></a>
                                        <?php endif; ?>
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
    <?= $this->endSection(); ?>