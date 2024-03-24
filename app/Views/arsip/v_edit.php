<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Data Arsip</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="<?= base_url('arsip/ubah/' . $arsip['id_arsip'] . '/' . $id_instansi); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="fileLama" value="<?= $arsip['file_arsip']; ?>">
                <input type="hidden" name="sizeLama" value="<?= $arsip['size_file']; ?>">
                <input type="hidden" name="nama" value="<?= $nama ?>">

                <div class="form-group">
                    <label>No arsip</label>
                    <input type="text" placeholder="..." value="<?= $arsip['no_arsip']; ?>" class="form-control" name="no_arsip" readonly>
                </div>
                <div class="form-group <?= ($validation->hasError('nama_file')) ? 'has-error' : ''; ?>">
                    <label>Nama arsip</label>
                    <input type="text" class="form-control" autofocus placeholder="<?= $arsip['nama_file']; ?>" name="nama_file">
                    <span class="error"><?= $validation->getError('nama_file'); ?></span>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" id="" class="form-control">
                        <option value="<?= $arsip['id_kategori']; ?>">-- <?= $arsip['nama_kategori']; ?> --</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea maxlength="50" name="deskripsi" class="form-control" id="" rows="5" placeholder="(Optional) max 50 karakter"><?= $arsip['deskripsi']; ?></textarea>
                </div>
                <div class="form-group <?= ($validation->hasError('file_arsip')) ? 'has-error' : ''; ?>">
                    <label>File arsip</label>
                    <input name="file_arsip" type="file" class="form-control custom-file-input">
                    <label class="error">Format : 7Z/ZIP/PDF/DOCX/JPG/PNG/MP3/WAV/MP4/</label>
                    <span class="error"><?= $validation->getError('file_arsip'); ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Ubah data</button>
                    <a href="<?= base_url('arsip/berkas/' . $id_instansi . '/' . $nama); ?>" class="btn btn-primary">Kemabali</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.box -->
</div>
<div class="col-md-2">
</div>
<?= $this->endSection(); ?>