<?php
        require('../connector.php');
        session_start();

        include_once("customer-check-login.php");

        $profile_id = $_SESSION['pelanggan_id'];

        // get name
        $stmt = $db->query("SELECT nama, alamat FROM pelanggan WHERE pelanggan_id='$profile_id'");
        $temp = $stmt->fetch(PDO::FETCH_ASSOC);

        $nama = $temp['nama'];
        $alamat = $temp['alamat'];
        $tanggal_pemesanan = date('Y-m-d');
        $nama_laundry = $_POST['nama_laundry'];
        $tipe_laundry = $_POST['tipe_laundry'];
        $antar_pickup_laundry = $_POST['antar_pickup_laundry'];
        $berat = $_POST['berat'];
        $total_harga = $_POST['total_harga'];

        $items = array(
                'nama_customer' => $nama,
                'alamat' => $alamat,
                'tanggal_pemesanan' => $tanggal_pemesanan,
                'nama_laundry' => $nama_laundry,
                'tipe_laundry' => $tipe_laundry,
                'antar_pickup_laundry' => $antar_pickup_laundry,
                'berat' => $berat,
                'total_harga' => $total_harga
        );

        $items1 = array(
                ':nama_customer' => $nama,
                ':tanggal_pemesanan' => $tanggal_pemesanan,
                ':nama_laundry' => $nama_laundry,
                ':tipe_laundry' => $tipe_laundry,
                ':antar_pickup_laundry' => $antar_pickup_laundry,
                ':berat' => $berat,
                ':total_harga' => $total_harga
        );

        $_SESSION['order'] = $items1;
        $_SESSION['cart'][0] = $items;

        $msg = "Order saved.";
        echo $msg;
?>