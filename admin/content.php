<?php
if(isset($_GET['page'])){
   $page=$_GET['page'].".php";

   if(file_exists($page)){
    include $page;
   }else{
    echo "Page not found";
   }

}else{
    echo "<h2>Welcome to the Train Booking System</h2>";
    
}
?>


