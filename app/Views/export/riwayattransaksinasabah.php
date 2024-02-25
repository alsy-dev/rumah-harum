<!DOCTYPE html>
<html>

<head>
    <style>
        #riwayat-transaksi-nasabah {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #riwayat-transaksi-nasabah td,
        #riwayat-transaksi-nasabah th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #riwayat-transaksi-nasabah tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #riwayat-transaksi-nasabah tr:hover {
            background-color: #ddd;
        }

        #riwayat-transaksi-nasabah th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Riwayat Transaksi Nasabah</h1>

    <table id="riwayat-transaksi-nasabah">
        <thead>
            <tr>
                <th>#</th>
                <th>Nasabah</th>
                <th>Unit</th>
                <th>Ketua Unit</th>
                <th>Waktu</th>
                <th>Nominal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($riwayatTransaksi as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $r['nama_lengkap']; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['ketua']; ?></td>
                    <td><?= $r['created_at']; ?></td>
                    <td>+<?= number_to_currency((float) $r['nominal'], 'IDR', 'id_ID'); ?></td>
                    <td><?= $r['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>
