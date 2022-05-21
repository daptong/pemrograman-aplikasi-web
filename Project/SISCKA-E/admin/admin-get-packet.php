<?php
    require_once("../connector.php");

    $get_packets = "SELECT * FROM paket";
    $stmt = $db->query($get_packets);

    $get_driver = "SELECT driver_nama FROM driver";
    $stmt1 = $db->query($get_driver);
?>

<table class="table table-bordered" style="text-align:center">
    <tr>
        <th>TxID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Ongkos Kirim</th>
        <th>Driver</th>
        <th>Change State</th>
        <th>Assign Driver</th>
        <th> </th>
    </tr>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?php echo htmlspecialchars($row['transaksi_id'])?></td>
        <td><?php echo htmlspecialchars($row['nama_customer'])?></td>
        <td><?php echo htmlspecialchars($row['alamat_customer'])?></td>
        <td><?php echo htmlspecialchars($row['paket_state'])?></td>
        <td>Rp. <?php echo number_format(($row['paket_ongkir']), 2, ',', '.')?></td>
        <td><?php echo htmlspecialchars($row['paket_driver'])?></td>
        <td><select name="paket_state" id="paket_state">
                <option value="">Select Packet State</option>
                <option value="ON HOLD">ON HOLD</option>
                <option value="DELIVERING">DELIVERING</option>
                <option value="DELIVERED">DELIVERED</option>
            </select>
        </td>
        <td><select name="assign_driver" id="assign_driver">
                <option value="">Select Driver</option>
                <?php include("admin-helper-get-driver.php") ?>
            </select>
        </td>
        <td><button class="changeStateDriver">Change</button></td>
    </tr>
    <?php endwhile;?>    
</table>