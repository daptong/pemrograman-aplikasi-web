<?php
    require("../connector.php");

    $get_driver = "SELECT driver_nama FROM driver";
    $stmt1 = $db->query($get_driver);
?>

<?php while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
    <option value="<?php echo $row['driver_nama']?>"><?php echo $row['driver_nama']?></option>
<?php endwhile;?>