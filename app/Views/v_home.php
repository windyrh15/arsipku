<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="row">
    <!-- <h1>ini halaman home</h1> -->
    <?php
    if (session()->getFlashdata('pesan-error')) {
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Failed!</h4>';
        echo session()->getFlashdata('pesan-error');
        echo '</div>';
    }
    ?>
    <?php
    if (session()->getFlashdata('pesan-error-pin')) {
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Failed!</h4>';
        echo session()->getFlashdata('pesan-error-pin');
        echo '</div>';
    }
    ?>
    <?php
    if (session()->getFlashdata('pesan-error-password')) {
        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Failed!</h4>';
        echo session()->getFlashdata('pesan-error-password');
        echo '</div>';
    }
    ?>
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="jumbotron jumbotron-fluid" style="background-color: #36454F;">
        <div class="container">
            <table>
                <tr>
                    <td style="padding-right: 50px;"><img src="img/<?= $foto; ?>" width="200" height="200"></td>
                    <td>
                        <h1 style="color: #fff;" class="display-4">Selamat datang <?= $profile; ?></h1>
                        <p style="color: #fff;" class="lead">Kami senang Anda berada di sini.</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="row">
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= count($user); ?></h3>

                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?= count($kategori); ?></h3>

                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="fa fa-folder"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= count($jabatan); ?></h3>

                    <p>Jabatan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-vcard"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= count($instansi); ?></h3>

                    <p>Instansi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= count($arsip); ?></h3>

                    <p>Arsip</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<?= $this->endSection(); ?>