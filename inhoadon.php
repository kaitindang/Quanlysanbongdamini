 <!--IN HOA DON-->
 <!--chức năng: lấy id tìm kiếm và in khi click các button tương ứng-->
 <html>

 <head>
     <title>In hóa đơn</title>
     <meta charset="utf-8">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link rel="shortcut icon" type="image/png" href="images/icon.png" />
 </head>

 <?php
	$connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini");
	$pid=$_GET['pid'];
	$sel="SELECT * FROM dat_san WHERE id = '$pid'";
	$rs=$connect->query($sel);
	while($row=$rs->fetch_assoc())
	{
		
  ?>
 <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
 <div class="row">
     <div class="col-md-6" align="center">
         <h2>HÓA ĐƠN THANH TOÁN</h2>
         <p>---------oOo---------</p>
     </div>
     <div class="col-md-6">
         <h5>Mã hóa đơn: <?php echo date('dmY', time()); ?><?php echo $row['id'];?></h5>
     </div>
     <div class="col-md-6">
         <h5>Ngày: <?php echo date('d-m-Y H:i:s', time()); ?></h5>
     </div>
 </div>

 <table class="table table-striped">
     <tr>
         <th>Khách hàng</th>
         <td><?php echo $row['ten_kh']; ?></td>
     </tr>
     <tr>
         <th>Số điện thoại</th>
         <td><?php echo $row['sdt']; ?></td>
     </tr>
     <tr>
         <th>Sân số</th>
         <td><?php echo $row['ma_san']; ?></td>
     </tr>
     <tr>
         <th>Bắt đầu</th>
         <td><?php echo $row['bat_dau']; ?></td>
     </tr>
     <tr>
         <th>kết thúc</th>
         <td><?php echo $row['ket_thuc']; ?></td>
     </tr>
     <tr>
         <th>Ngày đặt</th>
         <td><?php echo $row['ngay_dat']; ?></td>
     </tr>
     <tr>
         <th>Thanh toán</th>
         <td>300.000</td>
     </tr>
 </table>
<?php
}
?>
 <script type="text/javascript">
	print();
 </script>