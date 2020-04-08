<!--UPDATE.PHP-->
<!--Chức năng: UPDATE khách hàng-->
<?php

$connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini");
if(!empty($_POST))
{
	$output = '';
	$masan = mysqli_real_escape_string($connect, $_POST["masan"]);  
	$name = mysqli_real_escape_string($connect, $_POST["name"]);  
    $phone = mysqli_real_escape_string($connect, $_POST["phone"]);  
    $start = mysqli_real_escape_string($connect, $_POST["start"]);  
    $end = mysqli_real_escape_string($connect, $_POST["end"]);  
    $date = date('Y/m/d - H:i:s');
	
	if($_POST["employee_id"] != '')  
    {  
		$query = "  
		UPDATE dat_san
		SET ten_kh='$name',   
		sdt='$phone',
		ma_san='$masan',
		bat_dau='$start',   
		ket_thuc = '$end'
		WHERE id='".$_POST["employee_id"]."'";  
		$message = 'Cập nhật thành công';  
    }  
	
    $result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)	//Kiem tra co tim kiem duoc dong nao hay khong, neu co thi hien thi
	{
		$output .= '<label class="text-success message"></label>';
		$output .= '
		<div class="table-responsive">
		<table class="table table-striped">
			<tr>
			 <th>Khách hàng</th>
			 <th>Số điện thoại</th>
			 <th>Mã sân</th>
			 <th>Bắt đầu</th>
			 <th>Kết thúc</th>
			 <th>Ngày đặt</th>
			 <th>Sửa</th>
			 <th>Xóa</th>
			 <th>Hóa đơn</th>
			</tr>
		';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<tr id="delete'.$row["id"].'">
				<td>'.$row["ten_kh"].'</td>
				<td>'.$row["sdt"].'</td>
				<td>'.$row["ma_san"].'</td>
				<td>'.$row["bat_dau"].'</td>
				<td>'.$row["ket_thuc"].'</td>
				<td>'.$row["ngay_dat"].'</td>
				<td><input type="button" name="Sửa" value="Sửa" id="'.$row["id"] .'" class="btn btn-warning btn-xs edit_data" /></td>
				<td><input type="button" onclick="deleteAjax('.$row["id"].')" value="Xóa" class="btn btn-danger btn-xs"></td>
				<td><a href="inhoadon.php?pid=' .$row["id"]. '" target="_blank" class="btn btn-primary btn-xs">In hóa đơn</a></td>
			</tr>
			';
		}
		$output .= '</table>';
	}
	echo $output;
}
?>