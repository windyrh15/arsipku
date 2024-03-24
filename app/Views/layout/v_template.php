<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>ArsipKu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template./dist/css/skins/_all-skins.min.css">

    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style3.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php if (session()->get('level') == 1) : ?>

    <body class="hold-transition skin-blue layout-top-nav">
    <?php endif; ?>
    <?php if (session()->get('level') == 2) : ?>

        <body class="hold-transition skin-green layout-top-nav">
        <?php endif; ?>

        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?= base_url(); ?>" class="navbar-brand"><b>Arsip</b>ku</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <?= $this->include('layout/v_navBar'); ?>
                        <?= $this->renderSection('content'); ?>

                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="container">
                <strong>Copyright &copy; 2014-2019 ItsWenday.</strong>
            </div> 
            <!-- /.container -->
        </footer>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?= base_url(); ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url(); ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url(); ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url(); ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url(); ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url(); ?>/template/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function() {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': false,
                    'info': true,
                    'autoWidth': false
                })
                $('#example3').DataTable({
                    'paging': false,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': false,
                    'info': false,
                    'autoWidth': true
                })
            })
        </script>
        <script>
            function printContent(el) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
        </script>
        <script>
            function searchTable() {
                var input = document.getElementById("searchInput");
                var filter = input.value.toUpperCase();
                var table = document.getElementById("myTable");
                var rows = table.getElementsByTagName("tr");

                for (var i = 1; i < rows.length; i++) {
                    var cells = rows[i].getElementsByTagName("td");
                    var found = false;

                    for (var j = 0; j < cells.length; j++) {
                        var cell = cells[j];
                        if (cell) {
                            var value = cell.textContent || cell.innerText;
                            if (value.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }

                    if (found) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        </script>
        <script>
            function checkPasswordLength(input) {
                var minLength = parseInt(input.getAttribute('minlength'));
                var maxLength = parseInt(input.getAttribute('maxlength'));
                var password = input.value;
                var message = document.getElementById('passwordLengthMessage');

                if (password.length < minLength) {
                    message.textContent = 'Password minimal 6 karakter dan maximal 8 karakter';
                } else if (password.length > maxLength) {
                    message.textContent = 'Password maximal 8 karakter';
                } else {
                    message.textContent = '';
                }
            }
        </script>
        <script>
            function checkPinLength(input) {
                var minLength = parseInt(input.getAttribute('minlength'));
                var maxLength = parseInt(input.getAttribute('maxlength'));
                var pin = input.value;
                var message = document.getElementById('pinLengthMessage');

                input.value = input.value.replace(/\D/g, '');

                if (pin.length < minLength) {
                    message.textContent = 'Pin harus 6 digit';
                } else if (password.length > maxLength) {
                    message.textContent = 'Pin harus 6 digit';
                } else {
                    message.textContent = '';
                }
            }
        </script>
        <script>
            window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        </script>
        </body>

</html>