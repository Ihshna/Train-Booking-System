<?php include("../config/database.php");

$query="SELECT * FROM users WHERE role='customer'";
$result=$conn->query($query);
?>


<h2>Customer Report</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Username</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Active</th>
        
    </tr>
    <?php while($row=$result->fetch_assoc()){?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['role']?></td>
            <td><?=$row['username']?></td>
            <td><?=$row['mobile_no']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['date_of_birth']?></td>
            <td><?=$row['address']?></td>
            <td><a href="dashboard.php?page=add_customer&id=<?=$row['id'];?>">Edit</a></td>
        </tr>

    <?php } ?>
    
</table>