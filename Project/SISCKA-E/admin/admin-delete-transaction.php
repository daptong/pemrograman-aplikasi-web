<?php
    require("../connector.php");

    if(ISSET($_GET['action'])){
        if($_GET['action'] == 'delete'){
            $transaksi_id = $_GET['transaksi_id'];

            $sql1 = "DELETE FROM transaksi WHERE transaksi_id='$transaksi_id'";
            $sql2 = "DELETE FROM status_laundry WHERE transaksi_id='$transaksi_id'";

            $stmt1 = $db->prepare($sql1);
            $stmt2 = $db->prepare($sql2);

            $saved1 = $stmt1->execute();
            $saved2 = $stmt2->execute();

            if($saved1 && $saved2){
                header("Location: admin-check-laundry.php");
            }
        }
    }
?>
