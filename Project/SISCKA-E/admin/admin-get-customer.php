<?php
    require_once("../connector.php");

    $get_customer = "SELECT * FROM pelanggan WHERE pelanggan_id != 1";
    $stmt = $db->query($get_customer);
?>

<table class="table table-bordered" style="text-align:center">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Username</th>
        <th>Email</th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['pelanggan_id']) ?></td>
            <td><?php echo htmlspecialchars($row['nama']) ?></td>
            <td><?php echo htmlspecialchars($row['alamat']) ?></td>
            <td><?php echo htmlspecialchars($row['telepon']) ?></td>
            <td><?php echo htmlspecialchars($row['username']) ?></td>
            <td><?php echo htmlspecialchars($row['email']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>