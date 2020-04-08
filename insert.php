<!--INSERT.PHP-->
<!--Chức năng: thêm, cập nhật dữ liệu vào database và hiển thị ra trang chủ danh sách khách hàng-->
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
    else  
    {  
        $query = "
		INSERT INTO dat_san(ten_kh, sdt, ma_san, bat_dau, ket_thuc, ngay_dat)  
		VALUES('$name', '$phone', '$masan','$start', '$end', '$date')
		";
        $message = 'Đặt sân thành công';  
    }
	
    
    if(mysqli_query($connect, $query))
    {
        $output .= '<label class="text-success">'.$message.'</label>';
        $select_query = "SELECT * FROM dat_san WHERE ngay_dat = CURDATE() ORDER BY id DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '
            <table class="table table-bordered">  
                <tr>  
                    <th width="30%">Khách hàng</th>
                    <th width="20%">Điện thoại</th>
                    <th width="20%">Thành tiền</th>
                    <th width="10%">Chi tiết</th>
                    <th width="10%">Hóa đơn</th>
                </tr>

            ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
                <tr>  
		            <td>' . $row["ten_kh"] . '</td>
		            <td>' . $row["ngay_dat"] . '</td>
                    <td>300.000</td>
		            <td><input type="button" name="view" value="Xem" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
			        <td><a href="inhoadon.php?pid='.$row["id"].'" target="_blank" class="btn btn-primary btn-xs">In hóa đơn</a></td>
                </tr>
            ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>