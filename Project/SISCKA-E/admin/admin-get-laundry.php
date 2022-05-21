<?php
    require_once("../connector.php");

    $get_customer = "SELECT * FROM transaksi ORDER BY transaksi_id ASC";
    $stmt = $db->query($get_customer);
?>

<table class="table table-bordered" style="text-align:center">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Tanggal Pemesanan</th>
        <th>Laundry</th>
        <th>Tipe Laundry</th>
        <th>Antar / Pickup</th>
        <th>Berat</th>
        <th>Harga</th>
        <th> </th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['transaksi_id']) ?></td>
            <td><?php echo htmlspecialchars($row['nama_customer']) ?></td>
            <td><?php echo htmlspecialchars($row['tanggal_pemesanan']) ?></td>
            <td><?php echo htmlspecialchars($row['nama_laundry']) ?></td>
            <td><?php echo htmlspecialchars($row['tipe_laundry']) ?></td>
            <td><?php echo htmlspecialchars($row['antar_pickup_laundry']) ?></td>
            <td><?php echo htmlspecialchars($row['berat'])?> kg</td>
            <td>Rp. <?php echo number_format(($row['total_harga']), 2, ',', '.') ?></td>
            <td><a href="admin-delete-transaction.php?action=delete&transaksi_id=<?php echo $row['transaksi_id']?>"><span class="text-danger">Remove</span></a></td>
        </tr>
    <?php endwhile; ?>
</table>