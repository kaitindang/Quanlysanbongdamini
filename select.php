<!--SELECT.PHP-->
<!--Chức năng: Hiển thị chi tiết thông tin khách hàng ở trang chủ khi nhấn nút XEM-->
<?php 
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini");
 $query = "SELECT * FROM dat_san WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td width="30%"><label>Sân số</label></td>
                <td width="70%">'.$row["ma_san"].'</td>
            </tr>
            <tr>  
                <td width="30%"><label>Khách hàng</label></td>  
                <td width="70%">'.$row["ten_kh"].'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Điện thoại</label></td>  
                <td width="70%">'.$row["sdt"].'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Băt đầu</label></td>  
                <td width="70%">'.$row["bat_dau"].'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Kết thúc</label></td>  
                <td width="70%">'.$row["ket_thuc"].'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Ngày đặt</label></td>  
                <td width="70%">'.$row["ngay_dat"].'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Thành tiền</label></td>  
                <td width="70%">300.000VNĐ</td>  
            </tr>
        ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>