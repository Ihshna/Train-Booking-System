<?php include("../config/database.php");

$query="SELECT * FROM trains";
$result=$conn->query($query);
?>


<h2>Train Report</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Name</th>
        <th>Number</th>
        <th>From city</th>
        <th>To city</th>
        <th>Departure time</th>
        <th>Arrival time</th>
        <th>Total distance</th>
        <th>Active</th>
        
    </tr>
    <?php while($row=$result->fetch_assoc()){?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['train_type']?></td>
            <td><?=$row['train_name']?></td>
            <td><?=$row['train_number']?></td>
            <td><?=$row['from_city']?></td>
            <td><?=$row['to_city']?></td>
            <td><?=$row['departure_time']?></td>
            <td><?=$row['arrival_time']?></td>
            <td><?=$row['total_distance']?></td>
            <td><a href="dashboard.php?page=add_train&id=<?=$row['id'];?>">Edit</a></td>
            
        </tr>

    <?php } ?>
    
</table>