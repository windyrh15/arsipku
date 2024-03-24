<?= $this->extend('layout/v_template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-2">
</div>
<div class="col-md-8">
    <?php if (session()->get('level') == 1) : ?>

        <div class="box box-primary box-solid">
        <?php endif; ?>
        <?php if (session()->get('level') == 2) : ?>

            <div class="box box-success box-solid">
            <?php endif; ?>

            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (session()->get('level') == 1) : ?>
                    <form action="<?= base_url('user/ubahProfile/' . $user['id_user']); ?>" method="post" enctype="multipart/form-data">
                    <?php endif; ?>

                    <?php if (session()->get('level') == 2) : ?>
                        <form action="<?= base_url('userprofile/ubahProfile/' . $user['id_user']); ?>" method="post" enctype="multipart/form-data">
                        <?php endif; ?>

                        <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">

                        <div class="form-group">
                            <label>Nama user</label>
                            <input type="text" class="form-control" autofocus value="<?= (old('nama_user')) ? old('nama_user') : $user['nama_user'] ?>" placeholder="Enter Name" name="nama_user">
                        </div>
                        <fieldset disabled>
                            <div class="form-group">
                                <label>Email</label>
                                <input readonly type="text" class="form-control" autofocus value="<?= (old('email')) ? old('email') : $user['email'] ?>" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <input readonly type="text" class="form-control" value="<?= ($user['level'] == 1) ? 'Admin' : 'User'; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input readonly type="text" class="form-control" value="<?= $user['nama_jabatan']; ?>">
                            </div>
                        </fieldset>
                        <hr>
                        <h5 class="login-box-msg"><b>Ubah Password</b></h5>

                        <center>
                            <small id="passwordLengthMessage" class="text-danger"></small>
                        </center>

                        <div class="form-group">
                            <label>Password lama</label>
                            <input type="password" minlength="6" maxlength="8" class="form-control" placeholder="Enter Password" name="password" oninput="checkPasswordLength(this)">
                            <label>Password Baru</label>
                            <input type="password" minlength="6" maxlength="8" class="form-control" placeholder="Enter New Password" name="password1" oninput="checkPasswordLength(this)">
                            <label>Konfirmasi Password</label>
                            <input type="password" minlength="6" maxlength="8" class="form-control" placeholder="Enter Confirm Password" name="password2" oninput="checkPasswordLength(this)">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <img width="200" src="<?= base_url('img/' . $user['foto']); ?>">
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="file" class="form-control custom-file-input">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Ubah Data</button>
                            <a href="<?= base_url('home/'); ?>" class="btn btn-primary">Kemabali</a>
                        </div>
                        </form>
            </div>

            </div>
        </div>
        <!-- /.box -->
</div>
<div class="col-md-2">
</div>
<?= $this->endSection(); ?>