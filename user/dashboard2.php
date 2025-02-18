<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<body>
    
    <header>
        <div class="header-title">TRAIN TICKET BOOKING SYSTEM</div>
        <div class="header-user">
            <span>Welcome,User</span>
            <img src="../assets/images/user.png"/>
        </div>
    </header>
   

    <nav>
        <ul>
            <li><a href="dashboard2.php?page=../index">HOME</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="dashboard2.php?page=ticket_booking">BOOK TICKET</a></li>
            <li><a href="dashboard2.php?page=Contact">CONTACT US</a></li>
            <li><a href="dashboard2.php?page=registration">REGISTER</a></li>
            <li><a href="../login.php">LOGOUT</a></li>
        </ul>
    </nav>
  
    
    
   

    <!--main content-->
    <div class="main-container">
    <div class="content"> 
        <?php
          include 'content2.php';
        ?>
    </div> 
     
    <aside class="advertisement"> 
        <h2>ADVERTISEMENT</h2>
        <img src="../assets/images/images.jpg"/><br><br><br>    
        <img src="../assets/images/images.jpeg"/>
    </aside>
    
   

</div><br><br>

<!-- Footer Section -->
<footer>
    <div class="footer-container">
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank" class="icon"><i class="fa fa-facebook"></i></a>
            <a href="https://linkedin.com" target="_blank" class="icon"><i class="fa fa-linkedin"></i></a>
            <a href="https://github.com" target="_blank" class="icon"><i class="fa fa-github"></i></a>
            <a href="https://wa.me/your-phone-number" target="_blank" class="icon"><i class="fa fa-whatsapp"></i></a>
        </div>
        <p>&copy; 2025 SLIATE students. All rights reserved.</p>
    </div>
</footer>
 <script src="js/script.js"></script>

</body>
</html>
