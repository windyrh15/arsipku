<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: x-small;
        }

        h1 {
            font-size: medium;
        }

        th {
            background-color: #f7f7f7;
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            text-align: center;
            padding: 7px;
        }

        .bordered td {
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            padding: 7px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<!-- DivTable.com -->

<body>
    <div class="container">

        <center>
            <h1>Laporan</h1>
            <h1><?= $judul; ?></h1>
        </center>
        <hr>
        <span> Tanggal : <?= date('d-M-Y'); ?></span>
        <br>
        <span>Jumlah data : <?= count($arsip); ?></span>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th width="2px">No</th>
                    <th class="text-center">No.arsip</th>
                    <th class="text-center">Nama Arsip</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Upload</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Nama user</th>
                    <th class="text-center">Departemen</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Tipe</th>
                    <th class="text-center">Instansi</th>
                </tr>
            </thead>
            <tbody class="bordered">
                <?php $i = 1; ?>
                <?php foreach ($arsip as $a) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $a['no_arsip']; ?></td>
                        <td><?= $a['nama_file']; ?></td>
                        <td><?= $a['nama_kategori']; ?></td>
                        <td><?= $a['tgl_upload']; ?></td>
                        <td><?= $a['tgl_update']; ?></td>
                        <td><?= $a['nama_user']; ?></td>
                        <td><?= $a['nama_dep']; ?></td>
                        <td><?= number_format($a['size_file'], 0); ?> Byte</td>
                        <td><?= $a['tipe_file']; ?></td>
                        <td><?= $a['nama_instansi']; ?></td>
                        <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>