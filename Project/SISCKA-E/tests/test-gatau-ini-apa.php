<?php
    require_once("test-connector.php");
    // session_start();
    $profile_username = $_SESSION['username'];
    $profile_firstname = $_SESSION['firstname'];
    $profile_lastname = $_SESSION['lastname'];

    $get_customerid = "SELECT customer_id FROM customer";
    $stmt = $db->query($get_customerid);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(ISSET($_POST['updatecustomer'])){
        $state_laundry = $_POST['state_laundry'];

        $sql2 = "UPDATE customer SET state_laundry='$state_laundry' WHERE customer_id='$row'";
        $stmt = $db->query($sql2);

        $saved = $stmt->execute();

        if($saved){
            echo "<script>alert('Change saved.')</script>";
        }
    }
    // $sql = "SELECT customer_id FROM customer";
    // $sql2 = "UPDATE customer SET"
?>

<a>Customer ID</a>
<select name="customerid">Customer ID</option>
    <?php foreach($db->query($get_customerid) as $row){
        echo "<option value=".$row['id'].">".$row['customer_id']."</option>";
        }?>
</select>

<label for="changelaundrystate">Change state</label>
    <select name="state_laundry" id="state_laundry">
        <option value="">Select</option>
        <option value="On Hold">On hold</option>
        <option value="On Process">On process</option>
        <option value="Finished">Finished</option>
    </select>

<button type="updatecustomer" name="updatecustomer" class="btn btn-outline-primary btn-block">Edit state</button>