<?php  
     $connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini");  
     if(isset($_POST["employee_id"]))  
     {  
          $query = "SELECT * FROM dat_san WHERE id = '".$_POST["employee_id"]."'";  
          $result = mysqli_query($connect, $query);  
          $row = mysqli_fetch_array($result);  
          echo json_encode($row);  
     }  
?>