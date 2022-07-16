<?php
     $conn = mysqli_connect("localhost", "root", "", "qlthuvien");
     $conn->set_charset("utf8");
 
     // Check connection
     if (mysqli_connect_errno()){
          echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
          exit;
     }
?>