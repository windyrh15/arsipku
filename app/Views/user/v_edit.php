<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-8">
    <?php
    if (session()->getFlashdata('pesan-error')) {
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Failed!</h4>';
        echo session()->getFlashdata('pesan-error');
        echo '</div>';
    }
    ?>
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Data User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="<?= base_url('user/ubah/' . $user['id_user']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">

                <div class="form-group <?= ($validation->hasError('nama_user')) ? 'has-error' : ''; ?>">
                    <label>Nama user</label>
                    <input type="text" class="form-control" autofocus value="<?= (old('nama_user')) ? old('nama_user') : $user['nama_user'] ?>" placeholder="Enter Name" name="nama_user">
                    <span class="error"><?= $validation->getError('nama_user'); ?></span>
                </div>
                <fieldset disabled>
                    <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input readonly type="text" class="form-control" autofocus value="<?= (old('email')) ? old('email') : $user['email'] ?>" placeholder="Enter email" name="email">
                        <span class="error"><?= $validation->getError('email'); ?></span>
                    </div>
                </fieldset>
                <hr>
                <h5 class="login-box-msg"><b>Ubah Password</b></h5>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" minlength="6" maxlength="8" class="form-control" value="<?= old('password'); ?>" placeholder="Enter New Password" name="password1" oninput="checkPasswordLength(this)">
                    <small id="passwordLengthMessage" class="text-danger"></small>
                </div>
                <div class="form-group <?= (session()->getFlashdata('pesan-error-password')) ? 'has-error' : ''; ?>">
                    <label>Konfirmasi Password</label>
                    <input type="password" minlength="6" maxlength="8" class="form-control" placeholder=" Enter Confirm Password" name="password2">
                    <span class="error"><?= session()->getFlashdata('pesan-error-password'); ?></span>
                </div>
                <hr>
                <div class="form-group <?= ($validation->hasError('level')) ? 'has-error' : ''; ?>">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="<?= $user['level']; ?>">--<?= ($user['level'] == 1) ? 'Admin' : 'User'; ?>--</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    <span class="error"><?= $validation->getError('level'); ?></span>
                </div>
                <div class="form-group <?= ($validation->hasError('id_dep')) ? 'has-error' : ''; ?>">
                    <label>Jabatan</label>
                    <select name="id_jabatan" class="form-control">
                        <option value="<?= $user['id_jabatan']; ?>">--<?= $user['nama_jabatan']; ?>--</option>
                        <?php foreach ($jabatan as $d) : ?>
                            <option value="<?= $d['id_jabatan']; ?>"><?= $d['nama_jabatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="error"><?= $validation->getError('id_dep'); ?></span>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <img width="200" src="<?= base_url('img/' . $user['foto']); ?>">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input name="foto" type="file" class="form-control custom-file-input">
                            <span class="error"><?= $validation->getError('foto'); ?></span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Ubah Data</button>
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