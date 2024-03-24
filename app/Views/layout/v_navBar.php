<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <?php if (session()->get('level') == 1) : ?>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url('home'); ?>">Home</a></li>
            <li><a href="<?= base_url('user'); ?>">User</a></li>
            <li><a href="<?= base_url('kategori'); ?>">Kategori</a></li>
            <li><a href="<?= base_url('jabatan'); ?>">Jabatan</a></li>
            <li><a href="<?= base_url('instansi'); ?>">Instansi</a></li>
            <li><a href="<?= base_url('arsip'); ?>">Arsip</a></li>
        </ul>
    <?php else : ?>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url('home'); ?>">Home</a></li>
            <li><a href="<?= base_url('arsip'); ?>">Arsip</a></li>
        </ul>
    <?php endif; ?>

</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('img/' . $foto); ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> <?= $profile; ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="<?= base_url('img/' . $foto); ?>" class="img-circle" alt="User Image">

                    <p>
                        <?= $profile; ?> - <?php if (session()->get('level') == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'User';
                                            } ?>
                        <small><?= session()->get('email') ?></small>
                        <small><?= date('d-M-Y'); ?></small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <?php if (session()->get('level') == 1) : ?>
                            <a href="<?= base_url(); ?>/user/editProfile" class="btn btn-default pull-left">Profile</a>
                        <?php endif; ?>
                        <?php if (session()->get('level') == 2) : ?>
                            <a href="<?= base_url(); ?>/userprofile/editProfile" class="btn btn-default pull-left">Profile</a>
                        <?php endif; ?>
                    </div>
                    <div class="pull-right">
                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>

<!-- /.modal -->
<!-- End Modal arsip -->

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Arsipku</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">