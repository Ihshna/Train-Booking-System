<?php include("../config/database.php");

$query="SELECT * FROM routes";
$result=$conn->query($query);
?>


<h2>Train Route Report</h2>
<table>
    <tr>
        <th>ID</th>
        <th> Train Number</th>
        <th>From city</th>
        <th>To city</th>
        <th>Departure time</th>
        <th>Arrival time</th>
        <th>Sleeper Fare</th>
        <th>Ac Fare</th>
        <th>Action</th>
        
    </tr>
    <?php while($row=$result->fetch_assoc()){?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['train_number']?></td>
            <td><?=$row['from_city']?></td>
            <td><?=$row['to_city']?></td>
            <td><?=$row['departure_time']?></td>
            <td><?=$row['arrival_time']?></td>
            <td><?=$row['sleeper_fare']?></td>
            <td><?=$row['ac_fare']?></td>
            
            <td><a href="dashboard.php?page=add_train_route&id=<?=$row['id'];?>">Edit</a></td>
            
        </tr>

    <?php } ?>
    
</table>