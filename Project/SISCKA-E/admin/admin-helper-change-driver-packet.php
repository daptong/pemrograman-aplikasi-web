<?php
    require("../connector.php");

    $transaksi_id = $_POST['transaksi_id'];
    $paket_state = $_POST['paket_state'];
    $paket_driver = $_POST['paket_driver'];
    $tanggal_pengiriman = $_POST['tanggal_pengiriman'];

    $sql = "UPDATE paket SET paket_state='$paket_state', paket_driver='$paket_driver', tanggal_pengiriman='$tanggal_pengiriman' WHERE transaksi_id='$transaksi_id'";
    $stmt = $db->prepare($sql);

    $saved = $stmt->execute();

    $msg = "Changes saved.";
    echo $msg;
?>