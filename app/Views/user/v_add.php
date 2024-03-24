<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="<?= base_url('user/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group <?= ($validation->hasError('nama_user')) ? 'has-error' : ''; ?>">
                    <label>Nama user</label>
                    <input type="text" class="form-control" autofocus value="<?= old('nama_user'); ?>" placeholder="Enter Name" name="nama_user">
                    <span class="error"><?= $validation->getError('nama_user'); ?></span>

                </div>
                <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                    <label>Email</label>
                    <input type="text" class="form-control" autofocus value="<?= old('email'); ?>" placeholder="Enter email" name="email">
                    <span class="error"><?= $validation->getError('email'); ?></span>
                </div>
                <hr>
                <h5 class="login-box-msg"><b>Password</b></h5>
                <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" minlength="6" maxlength="8" class="form-control" autofocus value="<?= old('password'); ?>" placeholder="Enter Password" name="password" oninput="checkPasswordLength(this)">
                    <small id="passwordLengthMessage" class="text-danger"></small>
                    <span class="error"><?= $validation->getError('password'); ?></span>
                </div>
                <div class="form-group <?= ($validation->hasError('password2')) ? 'has-error' : ''; ?>">
                    <label>Konfirmasi Password</label>
                    <input type="password" minlength="6" maxlength="8" class="form-control" autofocus value="<?= old('password'); ?>" placeholder="Enter Password" name="password2">
                    <span class="error"><?= $validation->getError('password2'); ?></span>
                </div>
                <hr>
                <div class="form-group <?= ($validation->hasError('level')) ? 'has-error' : ''; ?>">
                    <label>Level</label>
                    <select name="level" id="" class="form-control">
                        <option value="">--Pilih level--</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    <span class="error"><?= $validation->getError('level'); ?></span>
                </div>
                <div class="form-group <?= ($validation->hasError('id_jabatan')) ? 'has-error' : ''; ?>">
                    <label>Jabatan</label>
                    <select name="id_jabatan" id="" class="form-control">
                        <option value="">--Pilih jabatan--</option>
                        <?php foreach ($jabatan as $d) : ?>
                            <option value="<?= $d['id_jabatan']; ?>"><?= $d['nama_jabatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="error"><?= $validation->getError('id_jabatan'); ?></span>
                </div>
                <div class="form-group <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>">
                    <label>Foto</label>
                    <input name="foto" type="file" class="form-control custom-file-input" autofocus value="<?= old('foto'); ?>">
                    <span class="error"><?= $validation->getError('foto'); ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Tambah user</button>
                    <a href="<?= base_url('user/'); ?>" class="btn btn-primary">Kemabali</a>
                </div>
            </form>

        </div>
    </div>
    <!-- /.box -->
</div>
<div class="col-md-2">
</div>
<?= $this->endSection(); ?>