<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-3">
        <table class="table border">
            <tr>
                <th>Uploader</th>
                <th>:</th>
                <td><?= $arsip['nama_user']; ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <th>:</th>
                <td><?= $arsip['nama_jabatan']; ?></td>
            </tr>
            <tr>
                <th width="100px">No Arsip</th>
                <th width="30px">:</th>
                <td><?= $arsip['no_arsip']; ?></td>
            </tr>
            <tr>
                <th>Nama Arsip</th>
                <th>:</th>
                <td><?= $arsip['nama_file']; ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <th>:</th>
                <td><?= $arsip['nama_kategori']; ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <th>:</th>
                <td><?= $arsip['deskripsi']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Upload</th>
                <th>:</th>
                <td><?= $arsip['tgl_upload']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Update</th>
                <th>:</th>
                <td><?= $arsip['tgl_update']; ?></td>
            </tr>
            <tr>
                <th>Format file</th>
                <th>:</th>
                <td><?= $arsip['tipe_file']; ?></td>
            </tr>
            <tr>
                <th>Ukuran file</th>
                <th>:</th>
                <td><?= $arsip['size_file']; ?> Byte</td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <center>
                    <?php if (session()->get('level') == 1) : ?>
                        <a href="<?= base_url('arsip/berkas/' . $arsip['id_instansi'] . '/' . $nama); ?>" class="btn btn-primary btn-md ml-2">Kembali</a>
                    <?php endif; ?>
                    <?php if (session()->get('level') == 2) : ?>
                        <a href="<?= base_url('arsipuser/berkas/' . $arsip['id_instansi'] . '/' . $nama); ?>" class="btn btn-success btn-md ml-2">Kembali</a>
                    <?php endif; ?>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <center>
            <?php if ($arsip['tipe_file'] == 'pdf') : ?>
                <iframe src="<?= base_url('file_upload/' . $arsip['file_arsip']); ?>" height="500" width="100%" title="PDF" frameborder="0"></iframe>
            <?php elseif ($arsip['tipe_file'] == 'jpg') : ?>
                <image src="<?= base_url('file_upload/' . $arsip['file_arsip']); ?>" height="500" width="50%" title="Image" frameborder="0"></image>
            <?php elseif ($arsip['tipe_file'] == 'mp4') : ?>
                <iframe src="<?= base_url('file_upload/' . $arsip['file_arsip']); ?>" height="500" width="100%" title="Video" frameborder="0"></iframe>
            <?php elseif ($arsip['tipe_file'] == 'mp3' || 'wav') : ?>
                <iframe src="<?= base_url('file_upload/' . $arsip['file_arsip']); ?>" height="500" width="50%" title="Audio" frameborder="0"></iframe>
            <?php endif; ?>
        </center>
    </div>
</div>

<?= $this->endSection(); ?>