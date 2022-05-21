<?php
    require('../connector.php');
    $transaksi_id = $_POST['transaksi_id'];
    $status = $_POST['status'];

    $sql = "UPDATE status_laundry SET status='$status' WHERE transaksi_id='$transaksi_id'";
    $stmt = $db->prepare($sql);

    $saved = $stmt->execute();

    $msg = "Changes saved.";
    echo $msg;
?>