<?php
include('../config/database.php'); // Database connection

// Initialize variables
$train_number=$from_city= $to_city=$departure_time = $arrival_time =$sleeper_fare=$ac_fare="";
$updateMode = false;
$id = "";

// Check if an ID is provided (for editing)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM routes WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $train_number=$row['train_number'];
        $from_city=$row['from_city'];
        $to_city = $row['to_city'];
        $departure_time=$row['departure_time'];
        $arrival_time = $row['arrival_time'];
        $sleeper_fare = $row['sleeper_fare'];
        $ac_fare = $row['ac_fare'];
        $updateMode = true;
    }
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_number=$_POST['train_number'];
    $from_city=$_POST['from_city'];
    $to_city = $_POST['to_city'];
    $departure_time=$_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $sleeper_fare = $_POST['sleeper_fare'];
    $ac_fare = $_POST['ac_fare'];
    

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing train
        $id = $_POST['id'];
        $query = "UPDATE routes SET 
                    train_number='$train_number',
                    from_city='$from_city', 
                    to_city = '$to_city', 
                    departure_time='$departure_time',
                    arrival_time = '$arrival_time',
                    sleeper_fare='$sleeper_fare',
                    ac_fare='$ac_fare'
                    WHERE id = $id";
    } else {
        // Insert new train
        $query="INSERT INTO routes(train_number,from_city,to_city,departure_time,arrival_time,sleeper_fare,ac_fare)
    VALUES('$train_number','$from_city','$to_city','$departure_time','$arrival_time','$sleeper_fare','$ac_fare')";

    }

    if ($conn->query($query) === TRUE) {
        header("Location: dashboard.php?page=reports/route_report"); // Redirect to the report page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="form-container">
<h2><?= $updateMode ? "Edit Train Route Details" : "Add Train Route Details"; ?></h2>
<form action="add_train_route.php" method="POST" enctype="multipart/form-data">
<?php if ($updateMode): ?>
        <input type="hidden" train_number="id" value="<?= $id; ?>">
    <?php endif; ?>


    <div class="form-group">
        <label>Train number</label>
        <input type="text" name="train_number" value="<?=$train_number;?>"required>
    </div>

    <div class="form-group">
        <label>From city</label>
        <select name="from_city" value="<?=$from_city;?>">
            <option value="anuradhapura">Anuradhapura</option>
            <option value="Avissawella">Avissawella</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Colombo Fort">Colombo Fort</option>
            <option value="Galle">Galle</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kandy">Kandy</option>
            <option value="Mannar">Mannar</option>
            <option value="Maradana">Maradana</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Peradeniya">Peradeniya</option>
            <option value="Ragama">Ragama</option>
            <option value="Talaimannar">Talaimannar</option>
            <option value="Trincomalee">Trincomalee</option>
            
        </select>
    </div>

    <div class="form-group">
        <label>To city</label>
        <select name="to_city" value="<?=$to_city;?>">
            <option value="anuradhapura">Anuradhapura</option>
            <option value="Avissawella">Avissawella</option>
            <option value="Badulla">Badulla</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Colombo Fort">Colombo Fort</option>
            <option value="Galle">Galle</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kandy">Kandy</option>
            <option value="Mannar">Mannar</option>
            <option value="Maradana">Maradana</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Peradeniya">Peradeniya</option>
            <option value="Ragama">Ragama</option>
            <option value="Talaimannar">Talaimannar</option>
            <option value="Trincomalee">Trincomalee</option>
            
        </select>
    </div>


    <div class="form-group">
        <label>Departure time</label>
        <input type="time" name="departure_time" value="<?=$departure_time;?>"required>
    </div>

    <div class="form-group">
        <label>Arrival time</label>
        <input type="time" name="arrival_time" value="<?=$arrival_time;?>"required>
    </div>
    <div class="form-group">
    <label>Sleeper Fare</label>
    <input type="number" name="sleeper_fare" value="<?=$sleeper_fare;?>">
</div>

<div class="form-group">
    <label>AC Fare</label>
    <input type="number" name="ac_fare" value="<?=$ac_fare;?>">
</div>

    <div class="btn-container">
        <button type="submit" class="btn btn-submit"> <?= $updateMode ? "Update Train route" : "Add Train route"; ?></button>
        <button type="reset" class="btn btn-reset">Reset</button>
    </div>

     
</form>
</div>
