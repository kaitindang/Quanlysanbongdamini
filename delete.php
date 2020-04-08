<!--Delete.php-->

<?php

  include 'config.php';
  $id = $_POST['delete_id'];
  $query = mysqli_query($db,"DELETE FROM dat_san WHERE id='$id'");

 ?>