<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Arsip</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="<?= base_url('arsip/tambah'); ?>" method="post" enctype="multipart/form-data">
                <?php
                helper('text');
                ?>
                <input type="hidden" placeholder="..." value="<?= $id_instansi; ?>" class="form-control" name="id_instansi" readonly>
                <input type="hidden" placeholder="..." value="<?= date('ymd'); ?>" class="form-control" name="date" readonly>
                <input type="hidden" placeholder="..." value="<?= "-" . random_string('alnum', 5); ?>" class="form-control" name="namdom" readonly>
                <div class="form-group">
                    <input type="hidden" placeholder="..." value="<?= $id_instansi; ?>" class="form-control" name="id_instansi" readonly>
                </div>
                <div class="form-group">
                    <input type="hidden" placeholder="..." value="<?= $nama; ?>" class="form-control" name="nama" readonly>
                </div>
                <div class="form-group <?= ($validation->hasError('nama_file')) ? 'has-error' : ''; ?>">
                    <label>Nama arsip</label>
                    <input type="text" class="form-control" autofocus value="<?= old('nama_file'); ?>" placeholder="Enter arsip name" name="nama_file">
                    <span class="error"><?= $validation->getError('nama_file'); ?></span>
                </div>
                <div class="form-group <?= ($validation->hasError('id_kategori')) ? 'has-error' : ''; ?>">
                    <label>Kategori</label>
                    <select name="id_kategori" id="" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="error"><?= $validation->getError('id_kategori'); ?></span>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="" rows="5" placeholder="(Optional)"></textarea>
                </div>
                <div class="form-group <?= ($validation->hasError('file_arsip')) ? 'has-error' : ''; ?>">
                    <label>File arsip</label>
                    <input name="file_arsip" type="file" class="form-control custom-file-input">
                    <label class="error">Format : 7Z/ZIP/PDF/DOCX/JPG/PNG/MP3/WAV/MP4/</label>
                    <br>
                    <span class="error"><?= $validation->getError('file_arsip'); ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Tambah Arsip</button>
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