<!--TIMKIEM.PHP-->
<!--Chức năng: tìm kiếm, sửa, xóa, in hóa đơn khách hàng-->

<?php
$connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM dat_san 
	WHERE ten_kh LIKE '%".$search."%'
	OR sdt LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM dat_san ORDER BY ngay_dat DESC
	";
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
	echo $output;
}
else
{
	echo 'Không tìm thấy thông tin khách hàng';
}

?>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nhập thông tin khách hàng</b></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Sân số</label>
                    <select name="masan" id="masan" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
						<option value="5">6</option>
                    </select>
                    <label>Khách hàng</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Số điện thoại</label>
                    <input name="phone" id="phone" class="form-control">
                    </input>
                    <br />
                    <label>Giờ bắt đầu</label>
                    <select name="start" id="start" class="form-control">
                        <option value="7:00">7:00</option>
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                    </select>
                    <label>Giờ kết thúc</label>
                    <select name="end" id="end" class="form-control">
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                    </select>
                    <br />
                    <input type="hidden" name="employee_id" id="employee_id" />
                    <input type="submit" name="insert" id="insert" value="Cập nhật" class="btn btn-success" />
                    <!-- nut dat san-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <!-- nut dong-->
            </div>
        </div>
    </div>
</div>
<script>
//Xu ly insert khach hang vao database
$(document).ready(function() {
    //Chinh sua khach hang
    $(document).on('click', '.edit_data', function() {
        var employee_id = $(this).attr("id"); //lay id xu ly
        $.ajax({
            url: "edit.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            dataType: "json",
            success: function(data) {
                $('#name').val(data.ten_kh);
                $('#phone').val(data.sdt);
                $('#masan').val(data.ma_san);
                $('#start').val(data.bat_dau);
                $('#end').val(data.ket_thuc);
                $('#employee_id').val(data.id);
                $('#add_data_Modal').modal('show');
            }
        });
    });
    //Them khach hang
    $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#name').val() == "") {
            alert("Vui lòng nhập tên khách hàng");
        } else if ($('#phone').val() == '') {
            alert("Vui lòng nhập số điện thoại");
        } else {
            $.ajax({
                url: "update.php",
                method: "POST",
                data: $('#insert_form')
            .serialize(), //Mã hóa các giá trị này thành giá trị chuỗi, giá trị sẽ được hiển thị theo các cặp
                beforeSend: function() {
                    $('#insert').val("Thêm");
                },
                success: function(data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('.table-responsive').html(data);
                }
            });
        }
    });
});
</script>
<script type="text/javascript">
	 //chuc nang xoa
	 function deleteAjax(id){
   
       if(confirm('Bạn có chắc muốn xóa không?')){
         
         $.ajax({

              type:'post',
              url:'delete.php',
              data:{delete_id:id},
              success:function(data){
              
                   $('#delete'+id).hide('slow');
					$('.message').html('Xóa thành công!');
              }

         });

       }
	}

</script>