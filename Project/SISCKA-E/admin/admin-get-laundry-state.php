<?php
    require_once("../connector.php");

    $get_customer = "SELECT status, transaksi_id FROM status_laundry ORDER BY transaksi_id ASC";
    $stmt = $db->query($get_customer);
?>

<table class="table table-bordered" style="margin-left:auto;margin-right:auto;border:1px solid #B762C1;text-align:center;height:auto;width:100%;border-radius:10px">
    <tr>
        <th>Transaksi ID</th>
        <th>Status</th>
        <th>Change State</th>
        <th> </th>
    </tr>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['transaksi_id']) ?></td>
            <td><?php echo htmlspecialchars($row['status']) ?></td>
            <td><select name="state_laundry" id="state_laundry">
                    <option value="">Select Laundry State</option>
                    <option value="ON HOLD">ON HOLD</option>
                    <option value="ON PROCESS">ON PROCESS</option>
                    <option value="FINISHED">FINISHED</option>
                </select>
            </td>
            <td><button class="btnSelect">Change</button></td>
        </tr>
    <?php endwhile;?>
</table>