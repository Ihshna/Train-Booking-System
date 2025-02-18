<?php include("../config/database.php");

$query="SELECT * FROM bookings";
$result=$conn->query($query);
?>


<h2>Booking Report</h2>
<table>
    <tr>
        <th>ID</th>
        <th>From city</th>
        <th>To city</th>
        <th>Travel date</th>
        <th>Adult</th>
        <th>Child</th>
        <th>Infant</th>
        <th>Class</th>
        <th>Active</th>
        
    </tr>
    <?php while($row=$result->fetch_assoc()){?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['from_city']?></td>
            <td><?=$row['to_city']?></td>
            <td><?=$row['travel_date']?></td>
            <td><?=$row['adult']?></td>
            <td><?=$row['child']?></td>
            <td><?=$row['infant']?></td>
            <td><?=$row['class']?></td>
            <td><a href="../user/dashboard2.php?page=ticket_booking&id=<?=$row['id'];?>">Edit</a></td>
            
        </tr>

    <?php } ?>
    
</table>