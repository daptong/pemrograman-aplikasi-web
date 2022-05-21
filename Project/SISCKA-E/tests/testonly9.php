<?php
    require_once("test-connector.php");
    $get_users = "SELECT * FROM users ORDER BY id ASC";
    $stmt = $db->query($get_users); 

?>

<table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Username</th>
       <th>Email</th>
       <th>First name</th>
       <th>Last name</th>
       <th>Address</th>
       <th>Phone</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr class="active-row">
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['username']); ?></td>
       <td><?php echo htmlspecialchars($row['email']); ?></td>
       <td><?php echo htmlspecialchars($row['firstname']); ?></td>
       <td><?php echo htmlspecialchars($row['lastname']); ?></td>
       <td><?php echo htmlspecialchars($row['address']); ?></td>
       <td><?php echo htmlspecialchars($row['telephone']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
</table>