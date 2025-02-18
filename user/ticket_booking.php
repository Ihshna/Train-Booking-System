<?php
include('../config/database.php'); // Database connection

// Initialize variables
$from_city= $to_city=$travel_date = $adult =$child= $infant=$class= "";
$updateMode = false;
$id = "";

// Check if an ID is provided (for editing)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bookings WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $from_city=$row['from_city'];
        $to_city = $row['to_city'];
        $travel_date=$row['travel_date'];
        $adult = $row['adult'];
        $child=$row['child'];
        $infant=$row['infant'];
        $class=$row['class'];
        $updateMode = true;
    }
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_city=$_POST['from_city'];
    $to_city = $_POST['to_city'];
    $travel_date=$_POST['travel_date'];
    $adult = $_POST['adult'];
    $child=$_POST['child'];
    $infant=$_POST['infant'];
    $class=$_POST['class'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing train
        $id = $_POST['id'];
        $query = "UPDATE bookings SET 
                    from_city='$from_city', 
                    to_city = '$to_city', 
                    travel_date='$travel_date',
                    adult= '$adult',
                    child='$child',
                    infant='$infant',
                    class='$class'
                    WHERE id = $id";
    } else {
        // Insert new train
        $query="INSERT INTO bookings(from_city,to_city,travel_date,adult,child,infant,class)
    VALUES('$from_city','$to_city','$travel_date','$adult','$child','$infant','$class')";

    }

    if ($conn->query($query) === TRUE) {
        header("Location: ../admin/dashboard.php?page=reports/booking_report"); // Redirect to the report page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="form-container">
    <h2><?= $updateMode ? "Edit booking details" : "Book your ticket"; ?></h2>
    <form action="ticket_booking.php" method="POST" enctype="multipart/form-data">
    <?php if ($updateMode): ?>
        <input type="hidden" name="id" value="<?= $id; ?>">
    <?php endif; ?>
    
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
   <label for="date">Date:</label>
   <input type="date" id="searchDateId" name="searchDate" value="<?=$travel_date;?>">
   </div>

   <div class="form-group">
   <label for="passengers_cat">Passengers:</label>
   <select name="adult" id="adult" style="width:30%;" value="<?=$adult;?>">
    <option value="adult">Adult</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
   </select>
   

   <select name="child" id="child" style="width:30%;" value="<?=$child;?>">
    <option value="child">Child</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
   </select>

   <select name="infant" id="infant" style="width:30%; value="<?=$infant;?>"">
    <option value="infant">Infant</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
   </select>
   </div>

   
    <label for="class" style="font-weight:bold;">Class:</label>
     
    <input type="radio" id="ac" name="class" value="AC" value="<?=$class;?>">
    <label for="ac">AC</label>
    
    <input type="radio" id="sleeper" name="class" value="Sleeper" value="<?=$class;?>">
    <label for="sleeper">Sleeper</label>

    <input type="radio" id="general" name="class" value="General" value="<?=$class;?>">
    <label for="general">General</label>
    

     <div class="btn-container">
    <button type="submit" class="btn btn-submit"><?= $updateMode ? "Update booking" : "Book train"; ?></button>
    <button type="submit" class="btn btn-reset">Reset</button>
    </div>
    </form>
    </div>
    



